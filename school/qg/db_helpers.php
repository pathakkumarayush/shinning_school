<?php
// school/qg/db_helpers.php
// Reusable database helper routines & schema migrations for the Question Paper Generator

// Automatic Schema Migration / Upgrade Routine
if (!function_exists('qg_run_migrations')) {
    function qg_run_migrations($con) {
        // 1. Create paper_settings table if not exists
        mysqli_query($con, "
            CREATE TABLE IF NOT EXISTS `paper_settings` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `general_instruction` text DEFAULT NULL,
                `watermark` varchar(255) DEFAULT 'S.P.S.',
                `school` varchar(100) DEFAULT 'shining',
                `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
                `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ");

        // Seed default row if empty
        $check_set = mysqli_query($con, "SELECT id FROM paper_settings WHERE school = 'shining' LIMIT 1");
        if ($check_set && mysqli_num_rows($check_set) == 0) {
            $def_instruction = "1. All questions are compulsory.\n2. Read each question carefully before attempting.\n3. Write your answers clearly and neatly.";
            $stmt = mysqli_prepare($con, "INSERT INTO paper_settings(general_instruction, watermark, school) VALUES(?, 'S.P.S.', 'shining')");
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "s", $def_instruction);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
        }

        // 2. Add paper_class_name column to qg_papers if not exists
        $col_check = mysqli_query($con, "SHOW COLUMNS FROM `qg_papers` LIKE 'paper_class_name'");
        if ($col_check && mysqli_num_rows($col_check) == 0) {
            mysqli_query($con, "ALTER TABLE `qg_papers` ADD COLUMN `paper_class_name` varchar(100) DEFAULT NULL AFTER `class_id`");
        }

        // 3. Add image_path column to qg_questions if not exists
        $col_check_q = mysqli_query($con, "SHOW COLUMNS FROM `qg_questions` LIKE 'image_path'");
        if ($col_check_q && mysqli_num_rows($col_check_q) == 0) {
            mysqli_query($con, "ALTER TABLE `qg_questions` ADD COLUMN `image_path` varchar(255) DEFAULT NULL AFTER `marks`");
        }

        // 4. Ensure PRIMARY KEY and AUTO_INCREMENT on all qg_* tables
        $tables = [
            'qg_papers',
            'qg_paper_sections',
            'qg_paper_questions',
            'qg_questions',
            'qg_mcq_options',
            'qg_match_options',
            'qg_true_false',
            'qg_blanks',
            'qg_text_answers',
            'qg_audit_logs'
        ];
        foreach ($tables as $tbl) {
            $pk_check = mysqli_query($con, "SHOW KEYS FROM `$tbl` WHERE Key_name = 'PRIMARY'");
            $has_pk = ($pk_check && mysqli_num_rows($pk_check) > 0);
            if (!$has_pk) {
                @mysqli_query($con, "ALTER TABLE `$tbl` MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`)");
            } else {
                $col_check = mysqli_query($con, "SHOW COLUMNS FROM `$tbl` WHERE Field = 'id' AND Extra LIKE '%auto_increment%'");
                if (!$col_check || mysqli_num_rows($col_check) == 0) {
                    @mysqli_query($con, "ALTER TABLE `$tbl` MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT");
                }
            }
        }
    }
}

// Run migrations on helper load
if (isset($con) && $con instanceof mysqli) {
    qg_run_migrations($con);
}

// Generate a random version 4 UUID
if (!function_exists('qg_uuidv4')) {
    function qg_uuidv4() {
        $data = random_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
}

// Fetch paper default settings (general_instruction and watermark)
function qg_get_paper_settings($con, $school = 'shining') {
    $settings = [
        'general_instruction' => "1. All questions are compulsory.\n2. Read each question carefully before attempting.\n3. Write your answers clearly and neatly.",
        'watermark' => 'S.P.S.'
    ];
    $stmt = mysqli_prepare($con, "SELECT general_instruction, watermark FROM paper_settings WHERE school = ? ORDER BY id DESC LIMIT 1");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $school);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($res)) {
            $settings['general_instruction'] = $row['general_instruction'] ?? '';
            $settings['watermark'] = $row['watermark'] ?? 'S.P.S.';
        }
        mysqli_stmt_close($stmt);
    }
    return $settings;
}

// Save or update paper settings
function qg_save_paper_settings($con, $school, $general_instruction, $watermark) {
    $stmt = mysqli_prepare($con, "SELECT id FROM paper_settings WHERE school = ? LIMIT 1");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $school);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        $existing = mysqli_fetch_assoc($res);
        mysqli_stmt_close($stmt);

        if ($existing) {
            $stmt_u = mysqli_prepare($con, "UPDATE paper_settings SET general_instruction = ?, watermark = ? WHERE id = ?");
            mysqli_stmt_bind_param($stmt_u, "ssi", $general_instruction, $watermark, $existing['id']);
            mysqli_stmt_execute($stmt_u);
            mysqli_stmt_close($stmt_u);
        } else {
            $stmt_i = mysqli_prepare($con, "INSERT INTO paper_settings(general_instruction, watermark, school) VALUES(?, ?, ?)");
            mysqli_stmt_bind_param($stmt_i, "sss", $general_instruction, $watermark, $school);
            mysqli_stmt_execute($stmt_i);
            mysqli_stmt_close($stmt_i);
        }
        return true;
    }
    return false;
}

// Resolve Teacher Name from creator username or teacher ID
function qg_get_teacher_name($con, $creator_or_uid, $session = null) {
    if (empty($creator_or_uid)) return 'N/A';
    
    // Check if creator is 'admin' or matches an admin login
    if (strtolower($creator_or_uid) === 'admin' || strtolower($creator_or_uid) === 'shining') {
        return 'Admin';
    }

    // Try finding teacher by teacher_username, teacher_id, or uid
    $sql = "SELECT teacher_name FROM teacher WHERE (teacher_username = ? OR teacher_id = ? OR uid = ?)";
    if (!empty($session)) {
        $sql .= " AND teacher_session = ?";
    }
    $sql .= " LIMIT 1";

    $stmt = mysqli_prepare($con, $sql);
    if ($stmt) {
        if (!empty($session)) {
            mysqli_stmt_bind_param($stmt, "ssss", $creator_or_uid, $creator_or_uid, $creator_or_uid, $session);
        } else {
            mysqli_stmt_bind_param($stmt, "sss", $creator_or_uid, $creator_or_uid, $creator_or_uid);
        }
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($res)) {
            $teacher_name = $row['teacher_name'];
            mysqli_stmt_close($stmt);
            return $teacher_name;
        }
        mysqli_stmt_close($stmt);
    }

    return $creator_or_uid;
}

// Fetch list of active teachers for dropdown selection
function qg_get_teachers_list($con, $school = 'shining', $session = null) {
    $teachers = [];
    $sql = "SELECT DISTINCT teacher_username, teacher_id, teacher_name FROM teacher WHERE status = 'Active'";
    if (!empty($session)) {
        $sql .= " AND teacher_session = '" . mysqli_real_escape_string($con, $session) . "'";
    }
    $sql .= " ORDER BY teacher_name ASC";
    $res = mysqli_query($con, $sql);
    if ($res) {
        while ($row = mysqli_fetch_assoc($res)) {
            $teachers[] = $row;
        }
    }
    return $teachers;
}

// Fetch all classes for the current school and session
function qg_get_classes($con, $school, $session) {
    $classes = [];
    $stmt = mysqli_prepare($con, "SELECT DISTINCT class_id, class, class_section FROM class WHERE school = ? ORDER BY class ASC, class_section ASC");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $school);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($result)) {
            $classes[] = $row;
        }
        mysqli_stmt_close($stmt);
    }
    return $classes;
}

// Fetch all subjects for a class
function qg_get_subjects($con, $class_id, $school, $session) {
    $subjects = [];
    // 1. Fetch class name from class_id
    $stmt1 = mysqli_prepare($con, "SELECT class FROM class WHERE class_id = ? LIMIT 1");
    if ($stmt1) {
        mysqli_stmt_bind_param($stmt1, "i", $class_id);
        mysqli_stmt_execute($stmt1);
        $res1 = mysqli_stmt_get_result($stmt1);
        $class_row = mysqli_fetch_assoc($res1);
        mysqli_stmt_close($stmt1);

        if ($class_row) {
            $class_name = $class_row['class'];
            // 2. Fetch subjects matching this class name
            $stmt2 = mysqli_prepare($con, "SELECT DISTINCT subj_id AS subject_id, name AS subject_name FROM subjects WHERE class = ? AND school = ? AND session = ? ORDER BY name ASC");
            if ($stmt2) {
                mysqli_stmt_bind_param($stmt2, "sss", $class_name, $school, $session);
                mysqli_stmt_execute($stmt2);
                $res2 = mysqli_stmt_get_result($stmt2);
                while ($row = mysqli_fetch_assoc($res2)) {
                    $subjects[] = $row;
                }
                mysqli_stmt_close($stmt2);
            }
        }
    }
    return $subjects;
}

// Fetch chapters for a subject and class
function qg_get_chapters($con, $class_id, $subject_id, $session) {
    $chapters = [];
    $stmt = mysqli_prepare($con, "SELECT id, cname FROM add_chapter WHERE class_id = ? AND subject_id = ? AND session = ? ORDER BY id ASC");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "iis", $class_id, $subject_id, $session);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($result)) {
            $chapters[] = $row;
        }
        mysqli_stmt_close($stmt);
    }
    return $chapters;
}

// Fetch topics for a chapter
function qg_get_topics($con, $chapter_id, $session) {
    $topics = [];
    $stmt = mysqli_prepare($con, "SELECT id, topic FROM add_topic WHERE chapter_id = ? AND session = ? ORDER BY id ASC");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "is", $chapter_id, $session);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($result)) {
            $topics[] = $row;
        }
        mysqli_stmt_close($stmt);
    }
    return $topics;
}

// Fetch paper by UUID
function qg_get_paper_by_uuid($con, $uuid, $school = 'shining') {
    $stmt = mysqli_prepare($con, "SELECT * FROM qg_papers WHERE uuid = ? AND school = ? AND deleted_at IS NULL LIMIT 1");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $uuid, $school);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $paper = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);
        return $paper;
    }
    return null;
}

// Fetch sections of a paper
function qg_get_paper_sections($con, $paper_id) {
    $sections = [];
    $stmt = mysqli_prepare($con, "SELECT * FROM qg_paper_sections WHERE paper_id = ? ORDER BY sort_order ASC, id ASC");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $paper_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($result)) {
            $sections[] = $row;
        }
        mysqli_stmt_close($stmt);
    }
    return $sections;
}

// Fetch questions of a section
function qg_get_section_questions($con, $section_id) {
    $questions = [];
    $query = "SELECT q.*, pq.id as mapping_id, pq.sort_order as pq_sort_order, pq.marks_override, pq.is_alternative_choice, pq.parent_choice_id 
              FROM qg_paper_questions pq 
              JOIN qg_questions q ON pq.question_id = q.id 
              WHERE pq.section_id = ? AND q.deleted_at IS NULL 
              ORDER BY pq.sort_order ASC, pq.id ASC";
    $stmt = mysqli_prepare($con, $query);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $section_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($result)) {
            $questions[] = $row;
        }
        mysqli_stmt_close($stmt);
    }
    return $questions;
}

// Fetch a single question details by id
function qg_get_question_by_id($con, $question_id, $school = 'shining') {
    $stmt = mysqli_prepare($con, "SELECT * FROM qg_questions WHERE id = ? AND school = ? AND deleted_at IS NULL LIMIT 1");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "is", $question_id, $school);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $question = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);
        return $question;
    }
    return null;
}

// Fetch MCQ options for a question
function qg_get_mcq_options($con, $question_id) {
    $options = [];
    $stmt = mysqli_prepare($con, "SELECT * FROM qg_mcq_options WHERE question_id = ? ORDER BY option_letter ASC, id ASC");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $question_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($result)) {
            $options[] = $row;
        }
        mysqli_stmt_close($stmt);
    }
    return $options;
}

// Fetch column matching options for a question
function qg_get_match_options($con, $question_id) {
    $options = [];
    $stmt = mysqli_prepare($con, "SELECT * FROM qg_match_options WHERE question_id = ? ORDER BY sort_order ASC, id ASC");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $question_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($result)) {
            $options[] = $row;
        }
        mysqli_stmt_close($stmt);
    }
    return $options;
}

// Fetch blanks details for a question
function qg_get_blanks($con, $question_id) {
    $blanks = [];
    $stmt = mysqli_prepare($con, "SELECT * FROM qg_blanks WHERE question_id = ? ORDER BY blank_index ASC");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $question_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($result)) {
            $blanks[] = $row;
        }
        mysqli_stmt_close($stmt);
    }
    return $blanks;
}

// Fetch true/false details for a question
function qg_get_true_false($con, $question_id) {
    $stmt = mysqli_prepare($con, "SELECT * FROM qg_true_false WHERE question_id = ? LIMIT 1");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $question_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);
        return $row;
    }
    return null;
}

// Fetch text answers detail for a question
function qg_get_text_answer($con, $question_id) {
    $stmt = mysqli_prepare($con, "SELECT * FROM qg_text_answers WHERE question_id = ? LIMIT 1");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $question_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);
        return $row;
    }
    return null;
}

// Search and filter in the Question Bank
function qg_search_questions($con, $school, $filters = [], $limit = 50, $offset = 0) {
    $questions = [];
    $sql = "SELECT * FROM qg_questions WHERE school = ? AND deleted_at IS NULL";
    $types = "s";
    $params = [$school];

    if (isset($filters['class_id']) && $filters['class_id'] !== '' && intval($filters['class_id']) >= 0) {
        $sql .= " AND class_id = ?";
        $types .= "i";
        $params[] = intval($filters['class_id']);
    }
    if (isset($filters['subject_id']) && $filters['subject_id'] !== '' && intval($filters['subject_id']) >= 0) {
        $sql .= " AND subject_id = ?";
        $types .= "i";
        $params[] = intval($filters['subject_id']);
    }
    if (!empty($filters['chapter_id'])) {
        $sql .= " AND chapter_id = ?";
        $types .= "i";
        $params[] = intval($filters['chapter_id']);
    }
    if (!empty($filters['topic_id'])) {
        $sql .= " AND topic_id = ?";
        $types .= "i";
        $params[] = intval($filters['topic_id']);
    }
    if (!empty($filters['question_type'])) {
        $sql .= " AND question_type = ?";
        $types .= "s";
        $params[] = $filters['question_type'];
    }
    if (!empty($filters['difficulty'])) {
        $sql .= " AND difficulty = ?";
        $types .= "s";
        $params[] = $filters['difficulty'];
    }
    if (!empty($filters['search'])) {
        $sql .= " AND question_text LIKE ?";
        $types .= "s";
        $params[] = "%" . $filters['search'] . "%";
    }

    $sql .= " ORDER BY id DESC LIMIT ? OFFSET ?";
    $types .= "ii";
    $params[] = intval($limit);
    $params[] = intval($offset);

    $stmt = mysqli_prepare($con, $sql);
    if ($stmt) {
        $bind_params = array_merge([$stmt, $types], $params);
        $ref = [];
        foreach ($bind_params as $key => $value) {
            $ref[$key] = &$bind_params[$key];
        }
        call_user_func_array('mysqli_stmt_bind_param', $ref);

        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($result)) {
            $questions[] = $row;
        }
        mysqli_stmt_close($stmt);
    }
    return $questions;
}

// Log audit activities
function qg_log_audit($con, $user_id, $school, $action, $target_type, $target_id, $payload = null) {
    $payload_str = $payload ? json_encode($payload) : null;
    $stmt = mysqli_prepare($con, "INSERT INTO qg_audit_logs(user_id, school, action, target_type, target_id, payload) VALUES(?, ?, ?, ?, ?, ?)");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssis", $user_id, $school, $action, $target_type, $target_id, $payload_str);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}
?>
