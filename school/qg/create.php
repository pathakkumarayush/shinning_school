<?php
// school/qg/create.php
// Flexible Section-Based Question Paper Builder: Paper -> Sections/Headings -> Questions

if (!isset($_SESSION['uid'])) {
    header("Location:../index.php");
    exit;
}

$school_id = $_SESSION['uid'];
$current_session = $_SESSION['session'] ?? '2026-2027';
$current_user = $_SESSION['userid'] ?? 'admin';
$user_type = $_SESSION['type'] ?? 'admin';
$is_admin = ($user_type === 'admin' || strtolower($current_user) === 'admin' || strtolower($current_user) === 'shining');

// Ensure image upload directory exists
$upload_dir = __DIR__ . '/../upload/qg/';
if (!is_dir($upload_dir)) {
    @mkdir($upload_dir, 0777, true);
}

// Fetch default paper settings
$default_settings = qg_get_paper_settings($con, $school_id);

// Check if editing existing paper
$uuid = isset($_GET['uuid']) ? trim($_GET['uuid']) : '';
$paper = null;
if (!empty($uuid)) {
    $paper = qg_get_paper_by_uuid($con, $uuid, $school_id);
    if (!$paper) {
        echo "<script>alert('Question Paper not found or access denied.'); window.location='?pageid=qg_index&action=list';</script>";
        exit;
    }

    // Teacher authorization check: Non-admin can only edit their own papers
    if (!$is_admin && strtolower($paper['created_by']) !== strtolower($current_user)) {
        echo "<script>alert('Unauthorized: You can only edit question papers created by you.'); window.location='?pageid=qg_index&action=list';</script>";
        exit;
    }
}

// Load existing sections and questions if editing
$existing_sections = [];
if ($paper) {
    $sections_db = qg_get_paper_sections($con, $paper['id']);
    foreach ($sections_db as $sec) {
        $sec_id = $sec['id'];
        $sec_item = [
            'id' => $sec_id,
            'heading' => $sec['name'] ?? '',
            'instruction' => $sec['instructions'] ?? '',
            'question_type' => $sec['question_type'] ?? 'mcq',
            'questions' => []
        ];

        $q_list = qg_get_section_questions($con, $sec_id);
        foreach ($q_list as $q) {
            $q_id = $q['id'];
            $raw_type = $q['question_type'];
            
            // Map legacy types to supported 7 types
            $mapped_type = $raw_type;
            if ($raw_type === 'match_columns') $mapped_type = 'matching';
            elseif ($raw_type === 'fill_blanks') $mapped_type = 'fill_blank';
            elseif (in_array($raw_type, ['very_short', 'short', 'long', 'very_long'])) $mapped_type = 'other';

            $q_item = [
                'id' => $q_id,
                'type' => $mapped_type,
                'text' => $q['question_text'] ?? '',
                'marks' => floatval($q['marks_override'] ?? $q['marks']),
                'image_path' => $q['image_path'] ?? '',
                'mcq_options' => ['', '', '', ''],
                'match_pairs' => []
            ];

            if ($mapped_type === 'mcq') {
                $opts = qg_get_mcq_options($con, $q_id);
                $opt_texts = [];
                foreach ($opts as $o) {
                    $opt_texts[] = $o['option_text'];
                }
                while (count($opt_texts) < 4) $opt_texts[] = '';
                $q_item['mcq_options'] = $opt_texts;
            } elseif ($mapped_type === 'matching') {
                $matches = qg_get_match_options($con, $q_id);
                foreach ($matches as $m) {
                    $q_item['match_pairs'][] = [
                        'left' => $m['left_content'],
                        'right' => $m['right_content']
                    ];
                }
                if (empty($q_item['match_pairs'])) {
                    $q_item['match_pairs'] = [
                        ['left' => '', 'right' => ''],
                        ['left' => '', 'right' => '']
                    ];
                }
            }

            $sec_item['questions'][] = $q_item;
        }

        $existing_sections[] = $sec_item;
    }
}

// If creating new paper, provide a default Section A
if (empty($existing_sections)) {
    $existing_sections = [
        [
            'id' => '',
            'heading' => 'SECTION-A',
            'instruction' => 'Choose the correct option:',
            'question_type' => 'mcq',
            'questions' => [
                [
                    'id' => '',
                    'type' => 'mcq',
                    'text' => '',
                    'marks' => 1,
                    'image_path' => '',
                    'mcq_options' => ['', '', '', ''],
                    'match_pairs' => [
                        ['left' => '', 'right' => ''],
                        ['left' => '', 'right' => '']
                    ]
                ]
            ]
        ]
    ];
}

$existing_sections_json = json_encode($existing_sections);

// Handle Form Submission
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_paper'])) {
    $exam_name = trim($_POST['exam_name'] ?? '');
    $title = trim($_POST['title'] ?? '') ?: $exam_name;
    $class_id = isset($_POST['class_id']) && $_POST['class_id'] !== '' ? intval($_POST['class_id']) : -1;
    $paper_class_name = trim($_POST['paper_class_name'] ?? '');
    $subject_id = isset($_POST['subject_id']) && $_POST['subject_id'] !== '' ? intval($_POST['subject_id']) : -1;
    $duration = intval($_POST['duration_minutes'] ?? 180);
    $max_marks = floatval($_POST['max_marks'] ?? 0);
    $instructions = trim($_POST['instructions'] ?? $default_settings['general_instruction']);
    $watermark = $default_settings['watermark'];

    // Creator / Teacher assignment
    if ($is_admin) {
        $creator_teacher = !empty($_POST['created_by']) ? trim($_POST['created_by']) : $current_user;
    } else {
        $creator_teacher = $current_user;
    }

    $submitted_sections = $_POST['sections'] ?? [];

    // Validations
    if (empty($exam_name)) $errors[] = "Exam Name is required.";
    if ($class_id < 0) $errors[] = "Please select Class.";
    if ($subject_id < 0) $errors[] = "Please select Subject.";
    if ($duration <= 0) $errors[] = "Duration must be greater than 0 minutes.";
    if (empty($submitted_sections)) $errors[] = "Please add at least one section with questions.";

    // Validate that at least one question exists across sections
    $total_q_count = 0;
    foreach ($submitted_sections as $s_idx => $s_data) {
        if (!empty($s_data['questions']) && is_array($s_data['questions'])) {
            foreach ($s_data['questions'] as $q_data) {
                if (!empty(trim($q_data['text'] ?? '')) || !empty($_FILES['section_images']['name'][$s_idx] ?? '')) {
                    $total_q_count++;
                }
            }
        }
    }
    if ($total_q_count === 0) {
        $errors[] = "Question paper must contain at least one question with text or an image.";
    }

    if (empty($errors)) {
        mysqli_begin_transaction($con);
        try {
            $paper_id = 0;

            if ($paper) {
                // Update paper meta
                $paper_id = $paper['id'];
                $stmt = mysqli_prepare($con, "UPDATE qg_papers SET title = ?, exam_name = ?, class_id = ?, paper_class_name = ?, subject_id = ?, duration_minutes = ?, max_marks = ?, instructions = ?, watermark_text = ?, created_by = ? WHERE id = ?");
                mysqli_stmt_bind_param($stmt, "ssisiidsssi", $title, $exam_name, $class_id, $paper_class_name, $subject_id, $duration, $max_marks, $instructions, $watermark, $creator_teacher, $paper_id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);

                // Fetch old questions of this paper to clean up
                $q_ids_res = mysqli_query($con, "SELECT question_id FROM qg_paper_questions WHERE section_id IN (SELECT id FROM qg_paper_sections WHERE paper_id = {$paper_id})");
                $old_q_ids = [];
                while ($q_row = mysqli_fetch_assoc($q_ids_res)) {
                    $old_q_ids[] = $q_row['question_id'];
                }

                // Delete linked mappings and sections
                mysqli_query($con, "DELETE FROM qg_paper_questions WHERE section_id IN (SELECT id FROM qg_paper_sections WHERE paper_id = {$paper_id})");
                mysqli_query($con, "DELETE FROM qg_paper_sections WHERE paper_id = {$paper_id}");

                // Clean up old question tables
                if (!empty($old_q_ids)) {
                    $old_q_ids_str = implode(',', $old_q_ids);
                    mysqli_query($con, "DELETE FROM qg_mcq_options WHERE question_id IN ($old_q_ids_str)");
                    mysqli_query($con, "DELETE FROM qg_match_options WHERE question_id IN ($old_q_ids_str)");
                    mysqli_query($con, "DELETE FROM qg_true_false WHERE question_id IN ($old_q_ids_str)");
                    mysqli_query($con, "DELETE FROM qg_blanks WHERE question_id IN ($old_q_ids_str)");
                    mysqli_query($con, "DELETE FROM qg_text_answers WHERE question_id IN ($old_q_ids_str)");
                    mysqli_query($con, "DELETE FROM qg_questions WHERE id IN ($old_q_ids_str)");
                }

                qg_log_audit($con, $current_user, $school_id, 'update', 'Paper', $paper_id);
            } else {
                // Insert new paper
                $new_uuid = qg_uuidv4();
                $stmt = mysqli_prepare($con, "INSERT INTO qg_papers(uuid, title, exam_name, class_id, paper_class_name, subject_id, academic_year, duration_minutes, max_marks, instructions, watermark_text, show_qr_code, show_page_number, status, created_by, school) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 0, 1, 'draft', ?, ?)");
                mysqli_stmt_bind_param($stmt, "sssisidssssss", $new_uuid, $title, $exam_name, $class_id, $paper_class_name, $subject_id, $current_session, $duration, $max_marks, $instructions, $watermark, $creator_teacher, $school_id);
                mysqli_stmt_execute($stmt);
                $paper_id = mysqli_insert_id($con);
                mysqli_stmt_close($stmt);

                qg_log_audit($con, $current_user, $school_id, 'create', 'Paper', $paper_id);
            }

            // Iterate over each Section
            $sec_sort_order = 1;
            foreach ($submitted_sections as $s_key => $s_data) {
                $sec_heading = trim($s_data['heading'] ?? ('SECTION-' . chr(64 + $sec_sort_order)));
                $sec_instruction = trim($s_data['instruction'] ?? '');
                $sec_default_type = trim($s_data['question_type'] ?? 'mcq');
                $sec_questions = $s_data['questions'] ?? [];
                $sec_q_count = count($sec_questions);

                // Insert section into qg_paper_sections
                $stmt_sec = mysqli_prepare($con, "INSERT INTO qg_paper_sections(paper_id, name, instructions, question_type, marks_per_question, negative_marks, number_of_questions, sort_order) VALUES(?, ?, ?, ?, 1.00, 0.00, ?, ?)");
                mysqli_stmt_bind_param($stmt_sec, "isssii", $paper_id, $sec_heading, $sec_instruction, $sec_default_type, $sec_q_count, $sec_sort_order);
                mysqli_stmt_execute($stmt_sec);
                $section_id = mysqli_insert_id($con);
                mysqli_stmt_close($stmt_sec);

                // Iterate over questions in section
                $q_sort_order = 1;
                foreach ($sec_questions as $q_key => $q_data) {
                    $q_text = trim($q_data['text'] ?? '');
                    $q_type = trim($q_data['type'] ?? $sec_default_type);
                    $q_marks = floatval($q_data['marks'] ?? 1.0);
                    $q_image_path = trim($q_data['existing_image'] ?? '');

                    // Handle file upload for Image Question
                    $file_key_name = "image_file_{$s_key}_{$q_key}";
                    if (isset($_FILES[$file_key_name]) && $_FILES[$file_key_name]['error'] === UPLOAD_ERR_OK) {
                        $tmp_name = $_FILES[$file_key_name]['tmp_name'];
                        $ext = strtolower(pathinfo($_FILES[$file_key_name]['name'], PATHINFO_EXTENSION));
                        $allowed_exts = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                        if (in_array($ext, $allowed_exts)) {
                            $new_img_name = 'qg_' . time() . '_' . rand(1000, 9999) . '.' . $ext;
                            $destination = $upload_dir . $new_img_name;
                            if (move_uploaded_file($tmp_name, $destination)) {
                                $q_image_path = 'upload/qg/' . $new_img_name;
                            }
                        }
                    }

                    // Insert to qg_questions
                    $q_uuid = qg_uuidv4();
                    $stmt_q = mysqli_prepare($con, "INSERT INTO qg_questions(uuid, question_text, question_type, class_id, subject_id, academic_year, difficulty, marks, image_path, created_by, school) VALUES(?, ?, ?, ?, ?, ?, 'medium', ?, ?, ?, ?)");
                    mysqli_stmt_bind_param($stmt_q, "sssiisdsss", $q_uuid, $q_text, $q_type, $class_id, $subject_id, $current_session, $q_marks, $q_image_path, $creator_teacher, $school_id);
                    mysqli_stmt_execute($stmt_q);
                    $new_q_id = mysqli_insert_id($con);
                    mysqli_stmt_close($stmt_q);

                    // Insert type-specific sub-data
                    if ($q_type === 'mcq') {
                        $opts = $q_data['mcq_options'] ?? [];
                        $letters = ['A', 'B', 'C', 'D', 'E', 'F'];
                        foreach ($opts as $o_idx => $o_text) {
                            $o_text = trim($o_text);
                            if ($o_text === '') continue;
                            $letter = $letters[$o_idx] ?? 'A';
                            $stmt_opt = mysqli_prepare($con, "INSERT INTO qg_mcq_options(question_id, option_letter, option_text, is_correct) VALUES(?, ?, ?, 0)");
                            mysqli_stmt_bind_param($stmt_opt, "iss", $new_q_id, $letter, $o_text);
                            mysqli_stmt_execute($stmt_opt);
                            mysqli_stmt_close($stmt_opt);
                        }
                    } elseif ($q_type === 'matching') {
                        $pairs = $q_data['match_pairs'] ?? [];
                        foreach ($pairs as $p_idx => $p) {
                            $left_val = trim($p['left'] ?? '');
                            $right_val = trim($p['right'] ?? '');
                            if ($left_val === '' && $right_val === '') continue;

                            $stmt_m = mysqli_prepare($con, "INSERT INTO qg_match_options(question_id, left_content, right_content, sort_order) VALUES(?, ?, ?, ?)");
                            mysqli_stmt_bind_param($stmt_m, "issi", $new_q_id, $left_val, $right_val, $p_idx);
                            mysqli_stmt_execute($stmt_m);
                            mysqli_stmt_close($stmt_m);
                        }
                    }

                    // Map question to section
                    $stmt_map = mysqli_prepare($con, "INSERT INTO qg_paper_questions(section_id, question_id, sort_order, marks_override) VALUES(?, ?, ?, ?)");
                    mysqli_stmt_bind_param($stmt_map, "iiid", $section_id, $new_q_id, $q_sort_order, $q_marks);
                    mysqli_stmt_execute($stmt_map);
                    mysqli_stmt_close($stmt_map);

                    $q_sort_order++;
                }

                $sec_sort_order++;
            }

            mysqli_commit($con);
            echo "<script>window.location='?pageid=qg_index&action=list';</script>";
            exit;
        } catch (Exception $e) {
            mysqli_rollback($con);
            $errors[] = "Database Transaction Error: " . $e->getMessage();
        }
    }
}

// Dropdown lists
$classes = qg_get_classes($con, $school_id, $current_session);
$class_val = $paper ? intval($paper['class_id']) : -1;
$paper_class_name_val = $paper ? ($paper['paper_class_name'] ?? '') : '';
$subject_val = $paper ? intval($paper['subject_id']) : -1;
$subjects = $class_val >= 0 ? qg_get_subjects($con, $class_val, $school_id, $current_session) : [];
$teachers_list = qg_get_teachers_list($con, $school_id, $current_session);
$selected_teacher = $paper ? $paper['created_by'] : $current_user;
?>

<style>
.enquiry{ width:100%; height:45px;background-color:#FFFFFF; margin-top:10px; border:4px #006633 solid;}
.col_4{ width:100%; height:auto; margin-left:2px; background-color:#FFFFFF;float:left; margin-top:10px;-webkit-box-shadow: 0 0 10px rgba(0,0,0, .65);
-moz-box-shadow: 0 0 10px rgba(0,0,0, .65);
box-shadow: 0 0 10px rgba(0,0,0, .65); padding: 20px; box-sizing: border-box;}
.form-style-2-heading{
    font-weight: bold;
    font-style: normal;
    border-bottom: 2px solid #006633;
    margin-bottom: 15px;
    font-size: 16px;
    padding: 8px 0;
    color: #006633;
}
input[type="text"], input[type="number"], .qg-input {
    padding: 6px 8px;
    border: 1px solid #cbd5e1;
    border-radius: 4px;
    height: 32px;
    box-sizing: border-box;
    font-size: 13px;
}
.select, select.qg-select {
    padding: 4px 8px;
    border: 1px solid #cbd5e1;
    border-radius: 4px;
    height: 32px;
    box-sizing: border-box;
    font-size: 13px;
    background: #fff;
}
textarea, .qg-textarea {
    padding: 6px 8px;
    border: 1px solid #cbd5e1;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 13px;
    font-family: inherit;
}
input:focus, textarea:focus, select:focus {
    border-color: #006633 !important;
    outline: none;
    box-shadow: 0 0 4px rgba(0, 102, 51, 0.3);
}
.qg-btn-legacy {
    border: none;
    background: #FF8500;
    color: #fff !important;
    box-shadow: 1px 1px 4px #DADADA;
    border-radius: 3px;
	padding: 8px 16px;
	font-weight: bold;
    text-decoration: none;
    cursor: pointer;
    display: inline-block;
}
.qg-btn-legacy:hover {
    background: #EA7B00;
}
.qg-btn-green {
    background: #006633 !important;
}
.qg-btn-green:hover {
    background: #004d26 !important;
}
.qg-btn-danger {
    background: #dc2626 !important;
}
.qg-btn-danger:hover {
    background: #b91c1c !important;
}
.qg-btn-sm {
    padding: 4px 10px;
    font-size: 12px;
}

/* Section Builder Styles */
.section-card {
    background: #f8fafc;
    border: 2px solid #cbd5e1;
    border-radius: 6px;
    padding: 16px;
    margin-bottom: 24px;
    position: relative;
    box-shadow: 0 1px 3px rgba(0,0,0,0.05);
}
.section-card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #e2e8f0;
    padding: 10px 14px;
    margin: -16px -16px 16px -16px;
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
    border-bottom: 1px solid #cbd5e1;
}
.question-row-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-left: 4px solid #006633;
    border-radius: 4px;
    padding: 12px;
    margin-bottom: 12px;
    position: relative;
}
.live-summary-bar {
    position: sticky;
    bottom: 0;
    background: #1e293b;
    color: #ffffff;
    padding: 12px 20px;
    border-radius: 6px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 20px;
    z-index: 100;
    box-shadow: 0 -2px 10px rgba(0,0,0,0.2);
}
</style>

<div class="full_div">
<br clear="all" />
<div class="left_sect">
    <img src="images/Examination/exa.png" />
    <a href="./?pageid=qg_index"><img src="images/buttonGoBack.png" style="float:right; width:150px; height:60px;"/></a>
</div>
<div class="shell">
<div class="shell_main">
<div class="enquiry">
    <img src="std.png" style="float:left; width:35px; height:40px; margin-left:5px; margin-top:2px;"/>
    <center><h2 style="text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;"><?php echo $paper ? 'Edit Question Paper' : 'Create Question Paper (Section-Based)'; ?></h2></center>
</div>

<div class="col_4">
    <?php if(!empty($errors)): ?>
        <div style="color:#D8000C; background:#FFD9FF; padding:10px; border-radius:4px; margin-bottom:20px">
            <ul style="margin:0; padding-left:15px">
                <?php foreach($errors as $err): ?>
                    <li><?php echo $err; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="post" action="" id="paper_builder_form" enctype="multipart/form-data">
        <div class="form-style-2-heading">1. Paper Basic Information</div>
        <table cellspacing="10" style="width:100%">
            <tr>
                <td style="font-weight:bold; width:180px">Exam Name: <span style="color:#FF0000">*</span></td>
                <td><input type="text" name="exam_name" required value="<?php echo $paper ? htmlspecialchars($paper['exam_name']) : ''; ?>" placeholder="e.g. Annual Examination 2026-27" style="width:360px" /></td>
                
                <td style="font-weight:bold; width:180px">Duration (Minutes): <span style="color:#FF0000">*</span></td>
                <td><input type="number" name="duration_minutes" required value="<?php echo $paper ? $paper['duration_minutes'] : '180'; ?>" style="width:160px" /> mins</td>
            </tr>
            <tr>
                <td style="font-weight:bold">Target Class (ERP): <span style="color:#FF0000">*</span></td>
                <td>
                    <select name="class_id" id="p_class" class="select" required onchange="onClassChange(this)" style="width:360px">
                        <option value="">-- Select Class --</option>
                        <?php foreach($classes as $c): ?>
                            <option value="<?php echo $c['class_id']; ?>" data-classname="<?php echo htmlspecialchars($c['class']); ?>" <?php echo $class_val == $c['class_id'] ? 'selected' : ''; ?>><?php echo $c['class'] . ' (' . $c['class_section'] . ')'; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>

                <td style="font-weight:bold">Display Class on Paper:</td>
                <td>
                    <input type="text" name="paper_class_name" id="p_display_class" value="<?php echo htmlspecialchars($paper_class_name_val); ?>" placeholder="e.g. XI, or Class XI – A" style="width:360px" />
                    <small style="color:#64748b; display:block">Custom text printed on PDF (e.g. "XI")</small>
                </td>
            </tr>
            <tr>
                <td style="font-weight:bold">Subject: <span style="color:#FF0000">*</span></td>
                <td>
                    <select name="subject_id" id="p_subject" class="select" required style="width:360px">
                        <option value="">-- Select Subject --</option>
                        <?php foreach($subjects as $s): ?>
                            <option value="<?php echo $s['subject_id']; ?>" <?php echo $subject_val == $s['subject_id'] ? 'selected' : ''; ?>><?php echo $s['subject_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>

                <td style="font-weight:bold">Teacher / Creator:</td>
                <td>
                    <?php if ($is_admin): ?>
                        <select name="created_by" class="select" style="width:360px">
                            <option value="<?php echo htmlspecialchars($current_user); ?>">-- Current User (<?php echo htmlspecialchars($current_user); ?>) --</option>
                            <?php foreach($teachers_list as $t): ?>
                                <option value="<?php echo htmlspecialchars($t['teacher_username']); ?>" <?php echo ($selected_teacher == $t['teacher_username'] || $selected_teacher == $t['teacher_id']) ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($t['teacher_name'] . ' (' . $t['teacher_username'] . ')'); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    <?php else: ?>
                        <input type="text" readonly value="<?php echo htmlspecialchars(qg_get_teacher_name($con, $current_user)); ?>" style="width:360px; background:#f1f5f9" />
                        <input type="hidden" name="created_by" value="<?php echo htmlspecialchars($current_user); ?>" />
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td style="font-weight:bold">Maximum Marks: <span style="color:#FF0000">*</span></td>
                <td colspan="3">
                    <input type="number" step="any" name="max_marks" id="p_max_marks" required value="<?php echo $paper ? $paper['max_marks'] : '100'; ?>" style="width:160px" />
                    <span id="calculated_marks_hint" style="margin-left:10px; font-weight:bold; color:#006633; font-size:12px"></span>
                </td>
            </tr>
            <tr>
                <td style="font-weight:bold">General Instructions:</td>
                <td colspan="3">
                    <textarea name="instructions" style="width:100%; height:60px" placeholder="General instructions for students..."><?php echo $paper ? htmlspecialchars($paper['instructions']) : htmlspecialchars($default_settings['general_instruction']); ?></textarea>
                </td>
            </tr>
        </table>

        <!-- Sections Builder -->
        <div style="display:flex; justify-content:space-between; align-items:center; margin-top:30px; margin-bottom:15px">
            <div class="form-style-2-heading" style="border:none; margin:0; padding:0">2. Sections & Questions Builder</div>
            <button type="button" class="qg-btn-legacy qg-btn-green" onclick="addNewSection()">+ Add Section</button>
        </div>

        <div id="sections_container">
            <!-- Dynamic Sections rendered via JS -->
        </div>

        <div style="margin-top:15px; margin-bottom:30px">
            <button type="button" class="qg-btn-legacy qg-btn-green" onclick="addNewSection()">+ Add Section</button>
        </div>

        <!-- Sticky Live Summary & Action Bar -->
        <div class="live-summary-bar">
            <div>
                <strong>Total Sections:</strong> <span id="summary_section_count">0</span> | 
                <strong>Total Questions:</strong> <span id="summary_question_count">0</span> | 
                <strong>Sum of Marks:</strong> <span id="summary_marks_sum">0</span>
            </div>
            <div>
                <input type="submit" name="save_paper" value="Save Question Paper" class="qg-btn-legacy qg-btn-green" style="font-size:14px; padding:10px 20px" />
                <a href="?pageid=qg_index" class="qg-btn-legacy" style="background:#64748b; margin-left:10px">Cancel</a>
            </div>
        </div>
    </form>
</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

<script type="text/javascript">
var initialSections = <?php echo $existing_sections_json; ?>;
var sectionCounter = 0;
var questionGlobalCounter = 0;

var questionTypesList = [
    { id: 'mcq', name: 'MCQ (Multiple Choice)' },
    { id: 'fill_blank', name: 'Fill in the Blanks' },
    { id: 'true_false', name: 'True & False' },
    { id: 'matching', name: 'Matching (Column A & B)' },
    { id: 'one_word', name: 'Answer in One Word or Sentence' },
    { id: 'image_question', name: 'Image Question' },
    { id: 'other', name: 'Other' }
];

function onClassChange(selectEl) {
    var classId = selectEl.value;
    var $opt = $(selectEl).find('option:selected');
    var className = $opt.data('classname') || '';

    // Auto fill display class name if empty or user hasn't customized it heavily
    var $dispInput = $('#p_display_class');
    if ($dispInput.val() === '' || $dispInput.val() === 'Class ' + className) {
        $dispInput.val(className);
    }

    if (!classId) {
        $('#p_subject').empty().append('<option value="">-- Select Subject --</option>');
        return;
    }

    $.getJSON('?pageid=qg_index&action=questions_bank&ajax=1&fetch=subjects&class_id=' + classId, function(res) {
        var $el = $('#p_subject');
        $el.empty().append('<option value="">-- Select Subject --</option>');
        if (res.success) {
            $.each(res.data, function(idx, item) {
                $el.append('<option value="' + item.subject_id + '">' + item.subject_name + '</option>');
            });
        }
    });
}

// Add a New Section
function addNewSection(secData) {
    var sIdx = sectionCounter++;
    var defaultHeading = secData ? secData.heading : ('SECTION-' + String.fromCharCode(65 + sIdx));
    var defaultInstruction = secData ? secData.instruction : '';
    var defaultType = secData ? secData.question_type : 'mcq';

    var typeOptionsHtml = '';
    $.each(questionTypesList, function(idx, qt) {
        var sel = (qt.id === defaultType) ? ' selected' : '';
        typeOptionsHtml += '<option value="' + qt.id + '"' + sel + '>' + qt.name + '</option>';
    });

    var secHtml = '<div class="section-card" id="section_card_' + sIdx + '">' +
        '<div class="section-card-header">' +
            '<div>' +
                '<strong style="color:#006633; font-size:15px">Section <span class="sec-number-badge">' + (sIdx + 1) + '</span></strong>' +
            '</div>' +
            '<div>' +
                '<button type="button" class="qg-btn-legacy qg-btn-sm" style="background:#475569" onclick="moveSectionUp(' + sIdx + ')">↑ Move Up</button> ' +
                '<button type="button" class="qg-btn-legacy qg-btn-sm" style="background:#475569" onclick="moveSectionDown(' + sIdx + ')">↓ Move Down</button> ' +
                '<button type="button" class="qg-btn-legacy qg-btn-sm qg-btn-danger" onclick="removeSection(' + sIdx + ')">Delete Section</button>' +
            '</div>' +
        '</div>' +
        '<table cellspacing="8" style="width:100%; margin-bottom:15px">' +
            '<tr>' +
                '<td style="width:140px; font-weight:bold">Section Heading:</td>' +
                '<td style="width:320px">' +
                    '<input type="text" name="sections[' + sIdx + '][heading]" class="qg-input" style="width:95%" required value="' + $('<div/>').text(defaultHeading).html() + '" placeholder="e.g. SECTION-A or (UNSEEN PASSAGE)" />' +
                '</td>' +
                '<td style="width:160px; font-weight:bold">Default Question Type:</td>' +
                '<td>' +
                    '<select name="sections[' + sIdx + '][question_type]" class="qg-select" style="width:95%" onchange="onSectionDefaultTypeChange(' + sIdx + ', this.value)">' +
                        typeOptionsHtml +
                    '</select>' +
                '</td>' +
            '</tr>' +
            '<tr>' +
                '<td style="font-weight:bold">Instruction / Subtitle:</td>' +
                '<td colspan="3">' +
                    '<input type="text" name="sections[' + sIdx + '][instruction]" class="qg-input" style="width:98%" value="' + $('<div/>').text(defaultInstruction).html() + '" placeholder="e.g. Choose the correct option / Read the passage carefully:" />' +
                '</td>' +
            '</tr>' +
        '</table>' +
        '<div style="font-weight:bold; color:#334155; margin-bottom:8px; border-bottom:1px solid #cbd5e1; padding-bottom:4px">Questions under this Section:</div>' +
        '<div class="questions-container-in-section" id="q_container_' + sIdx + '"></div>' +
        '<div style="margin-top:10px">' +
            '<button type="button" class="qg-btn-legacy qg-btn-sm qg-btn-green" onclick="addQuestionToSection(' + sIdx + ')">+ Add Question</button>' +
        '</div>' +
    '</div>';

    $('#sections_container').append(secHtml);

    if (secData && secData.questions && secData.questions.length > 0) {
        $.each(secData.questions, function(qIdx, qData) {
            addQuestionToSection(sIdx, qData);
        });
    } else {
        // Add one initial question
        addQuestionToSection(sIdx);
    }

    updateLiveCalculations();
}

function removeSection(sIdx) {
    if ($('.section-card').length <= 1) {
        alert('The question paper must contain at least one section.');
        return;
    }
    if (confirm('Are you sure you want to delete this section and all its questions?')) {
        $('#section_card_' + sIdx).remove();
        updateLiveCalculations();
    }
}

function moveSectionUp(sIdx) {
    var $elem = $('#section_card_' + sIdx);
    var $prev = $elem.prev('.section-card');
    if ($prev.length) {
        $elem.insertBefore($prev);
        updateLiveCalculations();
    }
}

function moveSectionDown(sIdx) {
    var $elem = $('#section_card_' + sIdx);
    var $next = $elem.next('.section-card');
    if ($next.length) {
        $elem.insertAfter($next);
        updateLiveCalculations();
    }
}

function onSectionDefaultTypeChange(sIdx, newType) {
    // Optionally update any empty questions
}

// Add a Question into a Section
function addQuestionToSection(sIdx, qData) {
    var qIdx = questionGlobalCounter++;
    var defaultSecType = $('select[name="sections[' + sIdx + '][question_type]"]').val() || 'mcq';
    var qType = qData ? qData.type : defaultSecType;
    var qText = qData ? qData.text : '';
    var qMarks = qData ? qData.marks : 1;
    var qExistingImage = qData ? (qData.image_path || '') : '';

    var typeOptionsHtml = '';
    $.each(questionTypesList, function(idx, qt) {
        var sel = (qt.id === qType) ? ' selected' : '';
        typeOptionsHtml += '<option value="' + qt.id + '"' + sel + '>' + qt.name + '</option>';
    });

    var qHtml = '<div class="question-row-card" id="q_row_' + qIdx + '">' +
        '<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:8px">' +
            '<div>' +
                '<span style="font-weight:bold; color:#006633" class="q-label-number">Question</span>' +
            '</div>' +
            '<div>' +
                '<button type="button" class="qg-btn-legacy qg-btn-sm" style="background:#64748b" onclick="moveQuestionUp(' + qIdx + ')">↑</button> ' +
                '<button type="button" class="qg-btn-legacy qg-btn-sm" style="background:#64748b" onclick="moveQuestionDown(' + qIdx + ')">↓</button> ' +
                '<button type="button" class="qg-btn-legacy qg-btn-sm qg-btn-danger" onclick="removeQuestion(' + qIdx + ')">Remove</button>' +
            '</div>' +
        '</div>' +
        '<table style="width:100%">' +
            '<tr>' +
                '<td style="width:80px; font-weight:bold">Type:</td>' +
                '<td style="width:260px">' +
                    '<select name="sections[' + sIdx + '][questions][' + qIdx + '][type]" class="qg-select" style="width:95%" onchange="onQuestionTypeChange(' + sIdx + ', ' + qIdx + ', this.value)">' +
                        typeOptionsHtml +
                    '</select>' +
                '</td>' +
                '<td style="width:80px; font-weight:bold; text-align:right">Marks:</td>' +
                '<td>' +
                    '<input type="number" step="any" name="sections[' + sIdx + '][questions][' + qIdx + '][marks]" class="qg-input q-marks-input" style="width:80px" value="' + qMarks + '" oninput="updateLiveCalculations()" />' +
                '</td>' +
            '</tr>' +
            '<tr>' +
                '<td style="font-weight:bold; padding-top:8px; vertical-align:top">Question:</td>' +
                '<td colspan="3" style="padding-top:8px">' +
                    '<textarea name="sections[' + sIdx + '][questions][' + qIdx + '][text]" class="qg-textarea" style="width:98%; height:45px" placeholder="Type question content here...">' + $('<div/>').text(qText).html() + '</textarea>' +
                '</td>' +
            '</tr>' +
        '</table>' +
        '<div id="q_type_specific_container_' + qIdx + '" style="margin-top:8px; padding-left:80px"></div>' +
    '</div>';

    $('#q_container_' + sIdx).append(qHtml);
    renderQuestionTypeSpecificInputs(sIdx, qIdx, qType, qData);
    updateLiveCalculations();
}

function removeQuestion(qIdx) {
    $('#q_row_' + qIdx).remove();
    updateLiveCalculations();
}

function moveQuestionUp(qIdx) {
    var $elem = $('#q_row_' + qIdx);
    var $prev = $elem.prev('.question-row-card');
    if ($prev.length) {
        $elem.insertBefore($prev);
        updateLiveCalculations();
    }
}

function moveQuestionDown(qIdx) {
    var $elem = $('#q_row_' + qIdx);
    var $next = $elem.next('.question-row-card');
    if ($next.length) {
        $elem.insertAfter($next);
        updateLiveCalculations();
    }
}

function onQuestionTypeChange(sIdx, qIdx, newType) {
    renderQuestionTypeSpecificInputs(sIdx, qIdx, newType);
}

// Render dynamic fields for question types
function renderQuestionTypeSpecificInputs(sIdx, qIdx, type, qData) {
    var $container = $('#q_type_specific_container_' + qIdx);
    $container.empty();

    if (type === 'mcq') {
        var opts = (qData && qData.mcq_options) ? qData.mcq_options : ['', '', '', ''];
        var letters = ['A', 'B', 'C', 'D'];
        var mcqHtml = '<div style="background:#f1f5f9; padding:10px; border-radius:4px; border:1px solid #e2e8f0">' +
            '<div style="font-weight:bold; font-size:12px; margin-bottom:6px; color:#334155">MCQ Options (Enter Options A, B, C, D):</div>' +
            '<table cellspacing="4" style="width:100%">';
        for (var i = 0; i < 4; i++) {
            var val = opts[i] || '';
            mcqHtml += '<tr>' +
                '<td style="width:80px; font-weight:bold">(' + letters[i] + ')</td>' +
                '<td><input type="text" name="sections[' + sIdx + '][questions][' + qIdx + '][mcq_options][' + i + ']" class="qg-input" style="width:90%" value="' + $('<div/>').text(val).html() + '" placeholder="Option ' + letters[i] + ' text" /></td>' +
            '</tr>';
        }
        mcqHtml += '</table></div>';
        $container.append(mcqHtml);

    } else if (type === 'fill_blank') {
        var fbHtml = '<div style="background:#f1f5f9; padding:8px 12px; border-radius:4px; font-size:12px; color:#475569; border:1px solid #e2e8f0">' +
            '<em>Note: Use underscores <code>______</code> in the question statement above to designate blanks.</em>' +
        '</div>';
        $container.append(fbHtml);

    } else if (type === 'true_false') {
        var tfHtml = '<div style="background:#f1f5f9; padding:8px 12px; border-radius:4px; font-size:12px; color:#475569; border:1px solid #e2e8f0">' +
            '<em>Note: Question statement will automatically print with <code>(        )</code> for students to write True or False.</em>' +
        '</div>';
        $container.append(tfHtml);

    } else if (type === 'matching') {
        var pairs = (qData && qData.match_pairs && qData.match_pairs.length > 0) ? qData.match_pairs : [
            { left: '', right: '' },
            { left: '', right: '' }
        ];

        var mHtml = '<div style="background:#f1f5f9; padding:10px; border-radius:4px; border:1px solid #e2e8f0">' +
            '<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:6px">' +
                '<span style="font-weight:bold; font-size:12px; color:#334155">Matching Pairs (Column A & Column B):</span>' +
                '<button type="button" class="qg-btn-legacy qg-btn-sm" style="background:#006633" onclick="addMatchPairRow(' + sIdx + ', ' + qIdx + ')">+ Add Pair</button>' +
            '</div>' +
            '<table class="match-pairs-table" id="match_table_' + qIdx + '" cellspacing="4" style="width:100%">' +
                '<tr style="font-weight:bold; font-size:12px; color:#64748b">' +
                    '<td>Column A (Left)</td>' +
                    '<td>Column B (Right)</td>' +
                    '<td style="width:40px"></td>' +
                '</tr>';

        $.each(pairs, function(pIdx, p) {
            mHtml += '<tr class="match-pair-row">' +
                '<td><input type="text" name="sections[' + sIdx + '][questions][' + qIdx + '][match_pairs][' + pIdx + '][left]" class="qg-input" style="width:95%" value="' + $('<div/>').text(p.left || '').html() + '" placeholder="e.g. 1. Apple" /></td>' +
                '<td><input type="text" name="sections[' + sIdx + '][questions][' + qIdx + '][match_pairs][' + pIdx + '][right]" class="qg-input" style="width:95%" value="' + $('<div/>').text(p.right || '').html() + '" placeholder="e.g. i. Fruit" /></td>' +
                '<td><a href="#" onclick="$(this).closest(\'tr\').remove(); return false;" style="color:#ef4444; font-weight:bold; text-decoration:none">✕</a></td>' +
            '</tr>';
        });

        mHtml += '</table></div>';
        $container.append(mHtml);

    } else if (type === 'one_word') {
        var owHtml = '<div style="background:#f1f5f9; padding:8px 12px; border-radius:4px; font-size:12px; color:#475569; border:1px solid #e2e8f0">' +
            '<em>Preview on generated paper: <strong>Answer: ______________________</strong></em>' +
        '</div>';
        $container.append(owHtml);

    } else if (type === 'image_question') {
        var existingImg = (qData && qData.image_path) ? qData.image_path : '';
        var imgHtml = '<div style="background:#f1f5f9; padding:10px; border-radius:4px; border:1px solid #e2e8f0">' +
            '<div style="font-weight:bold; font-size:12px; margin-bottom:6px; color:#334155">Upload Question Image:</div>' +
            '<input type="hidden" name="sections[' + sIdx + '][questions][' + qIdx + '][existing_image]" id="exist_img_' + qIdx + '" value="' + $('<div/>').text(existingImg).html() + '" />' +
            '<input type="file" name="image_file_' + sIdx + '_' + qIdx + '" accept="image/*" class="qg-input" style="height:auto" onchange="previewUploadedImage(this, ' + qIdx + ')" />';

        if (existingImg) {
            imgHtml += '<div id="img_preview_box_' + qIdx + '" style="margin-top:8px">' +
                '<img src="' + existingImg + '" style="max-height:100px; border:1px solid #cbd5e1; border-radius:4px" />' +
                '<button type="button" class="qg-btn-legacy qg-btn-sm qg-btn-danger" style="margin-left:10px; vertical-align:top" onclick="removeImageFromQuestion(' + qIdx + ')">Delete Image</button>' +
            '</div>';
        } else {
            imgHtml += '<div id="img_preview_box_' + qIdx + '" style="margin-top:8px; display:none"></div>';
        }

        imgHtml += '</div>';
        $container.append(imgHtml);
    }
}

function addMatchPairRow(sIdx, qIdx) {
    var $table = $('#match_table_' + qIdx);
    var pIdx = $table.find('tr.match-pair-row').length;
    var rowHtml = '<tr class="match-pair-row">' +
        '<td><input type="text" name="sections[' + sIdx + '][questions][' + qIdx + '][match_pairs][' + pIdx + '][left]" class="qg-input" style="width:95%" placeholder="Column A" /></td>' +
        '<td><input type="text" name="sections[' + sIdx + '][questions][' + qIdx + '][match_pairs][' + pIdx + '][right]" class="qg-input" style="width:95%" placeholder="Column B" /></td>' +
        '<td><a href="#" onclick="$(this).closest(\'tr\').remove(); return false;" style="color:#ef4444; font-weight:bold; text-decoration:none">✕</a></td>' +
    '</tr>';
    $table.append(rowHtml);
}

function previewUploadedImage(input, qIdx) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#img_preview_box_' + qIdx).html('<img src="' + e.target.result + '" style="max-height:100px; border:1px solid #cbd5e1; border-radius:4px" />').show();
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function removeImageFromQuestion(qIdx) {
    $('#exist_img_' + qIdx).val('');
    $('#img_preview_box_' + qIdx).empty().hide();
}

// Live calculation of sections, questions, and marks sum
function updateLiveCalculations() {
    var secCount = $('.section-card').length;
    var qCount = $('.question-row-card').length;
    var totalMarks = 0;

    $('.q-marks-input').each(function() {
        var m = parseFloat($(this).val());
        if (!isNaN(m)) {
            totalMarks += m;
        }
    });

    $('#summary_section_count').text(secCount);
    $('#summary_question_count').text(qCount);
    $('#summary_marks_sum').text(totalMarks);

    // Update section badges
    $('.section-card').each(function(i) {
        $(this).find('.sec-number-badge').text(i + 1);
    });

    // Update calculated hint
    var targetMax = parseFloat($('#p_max_marks').val()) || 0;
    if (targetMax > 0 && totalMarks > 0) {
        if (targetMax === totalMarks) {
            $('#calculated_marks_hint').text('(Exact match: ' + totalMarks + ' marks)').css('color', '#006633');
        } else {
            $('#calculated_marks_hint').text('(Sum of questions: ' + totalMarks + ' marks)').css('color', '#FF8500');
        }
    }
}

$(document).ready(function() {
    if (initialSections && initialSections.length > 0) {
        $.each(initialSections, function(idx, sec) {
            addNewSection(sec);
        });
    } else {
        addNewSection();
    }
    updateLiveCalculations();
});
</script>
