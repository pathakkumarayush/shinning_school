<?php
// school/qg/list.php
// Question Papers listing dashboard with role-based visibility, teacher filtering, and management

if (!isset($_SESSION['uid'])) {
    header("Location:../index.php");
    exit;
}

$school_id = $_SESSION['uid'];
$current_session = $_SESSION['session'] ?? '2026-2027';
$current_user = $_SESSION['userid'] ?? 'admin';
$user_type = $_SESSION['type'] ?? 'admin';
$is_admin = ($user_type === 'admin' || strtolower($current_user) === 'admin' || strtolower($current_user) === 'shining');

$msg_success = '';
$msg_error = '';

// Handle Paper Deletion with Authorization check
if (isset($_GET['delete_uuid'])) {
    $del_uuid = trim($_GET['delete_uuid']);
    $paper = qg_get_paper_by_uuid($con, $del_uuid, $school_id);
    if ($paper) {
        if (!$is_admin && strtolower($paper['created_by']) !== strtolower($current_user)) {
            $msg_error = "Unauthorized: You can only delete question papers created by you.";
        } else {
            $now = date('Y-m-d H:i:s');
            mysqli_query($con, "UPDATE qg_papers SET deleted_at = '{$now}' WHERE id = {$paper['id']}");
            qg_log_audit($con, $current_user, $school_id, 'delete', 'Paper', $paper['id']);
            $msg_success = "Question paper deleted successfully.";
        }
    }
}

// Handle Paper Duplication with Authorization check
if (isset($_GET['duplicate_uuid'])) {
    $dup_uuid = trim($_GET['duplicate_uuid']);
    $paper = qg_get_paper_by_uuid($con, $dup_uuid, $school_id);
    if ($paper) {
        if (!$is_admin && strtolower($paper['created_by']) !== strtolower($current_user)) {
            $msg_error = "Unauthorized: You can only duplicate question papers created by you.";
        } else {
            mysqli_begin_transaction($con);
            try {
                $new_uuid = qg_uuidv4();
                $new_title = $paper['title'] . " (Copy)";
                $target_creator = $is_admin ? $paper['created_by'] : $current_user;
                
                $stmt = mysqli_prepare($con, "INSERT INTO qg_papers(uuid, title, exam_name, class_id, paper_class_name, section_id, subject_id, academic_year, duration_minutes, max_marks, instructions, school_logo_path, watermark_text, show_qr_code, show_barcode, show_page_number, layout_settings, status, created_by, school) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'draft', ?, ?)");
                mysqli_stmt_bind_param($stmt, "sssisissdssssssssss", $new_uuid, $new_title, $paper['exam_name'], $paper['class_id'], $paper['paper_class_name'], $paper['section_id'], $paper['subject_id'], $paper['academic_year'], $paper['duration_minutes'], $paper['max_marks'], $paper['instructions'], $paper['school_logo_path'], $paper['watermark_text'], $paper['show_qr_code'], $paper['show_barcode'], $paper['show_page_number'], $paper['layout_settings'], $target_creator, $school_id);
                mysqli_stmt_execute($stmt);
                $new_paper_id = mysqli_insert_id($con);
                mysqli_stmt_close($stmt);

                $sections = qg_get_paper_sections($con, $paper['id']);
                foreach ($sections as $sec) {
                    $stmt_s = mysqli_prepare($con, "INSERT INTO qg_paper_sections(paper_id, name, instructions, question_type, marks_per_question, negative_marks, number_of_questions, internal_choice, difficulty_level, mandatory, sort_order) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                    mysqli_stmt_bind_param($stmt_s, "isssddiiiii", $new_paper_id, $sec['name'], $sec['instructions'], $sec['question_type'], $sec['marks_per_question'], $sec['negative_marks'], $sec['number_of_questions'], $sec['internal_choice'], $sec['difficulty_level'], $sec['mandatory'], $sec['sort_order']);
                    mysqli_stmt_execute($stmt_s);
                    $new_sec_id = mysqli_insert_id($con);
                    mysqli_stmt_close($stmt_s);

                    $questions = qg_get_section_questions($con, $sec['id']);
                    foreach ($questions as $q) {
                        // Clone question to ensure independence
                        $q_uuid = qg_uuidv4();
                        $stmt_q_copy = mysqli_prepare($con, "INSERT INTO qg_questions(uuid, question_text, question_type, class_id, subject_id, chapter_id, topic_id, academic_year, difficulty, marks, blooms_taxonomy, learning_outcome, explanation, hints, image_path, created_by, school) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                        mysqli_stmt_bind_param($stmt_q_copy, "sssiisissdsssssss", $q_uuid, $q['question_text'], $q['question_type'], $q['class_id'], $q['subject_id'], $q['chapter_id'], $q['topic_id'], $q['academic_year'], $q['difficulty'], $q['marks'], $q['blooms_taxonomy'], $q['learning_outcome'], $q['explanation'], $q['hints'], $q['image_path'], $target_creator, $school_id);
                        mysqli_stmt_execute($stmt_q_copy);
                        $copied_q_id = mysqli_insert_id($con);
                        mysqli_stmt_close($stmt_q_copy);

                        // Clone options for MCQ
                        if ($q['question_type'] === 'mcq') {
                            $opts = qg_get_mcq_options($con, $q['id']);
                            foreach ($opts as $o) {
                                $stmt_o = mysqli_prepare($con, "INSERT INTO qg_mcq_options(question_id, option_letter, option_text, is_correct) VALUES(?, ?, ?, ?)");
                                mysqli_stmt_bind_param($stmt_o, "issi", $copied_q_id, $o['option_letter'], $o['option_text'], $o['is_correct']);
                                mysqli_stmt_execute($stmt_o);
                                mysqli_stmt_close($stmt_o);
                            }
                        } elseif ($q['question_type'] === 'matching' || $q['question_type'] === 'match_columns') {
                            $matches = qg_get_match_options($con, $q['id']);
                            foreach ($matches as $m) {
                                $stmt_m = mysqli_prepare($con, "INSERT INTO qg_match_options(question_id, left_content, right_content, sort_order) VALUES(?, ?, ?, ?)");
                                mysqli_stmt_bind_param($stmt_m, "issi", $copied_q_id, $m['left_content'], $m['right_content'], $m['sort_order']);
                                mysqli_stmt_execute($stmt_m);
                                mysqli_stmt_close($stmt_m);
                            }
                        }

                        $stmt_map = mysqli_prepare($con, "INSERT INTO qg_paper_questions(section_id, question_id, sort_order, marks_override, is_alternative_choice, parent_choice_id) VALUES(?, ?, ?, ?, ?, ?)");
                        mysqli_stmt_bind_param($stmt_map, "iiidii", $new_sec_id, $copied_q_id, $q['pq_sort_order'], $q['marks_override'], $q['is_alternative_choice'], $q['parent_choice_id']);
                        mysqli_stmt_execute($stmt_map);
                        mysqli_stmt_close($stmt_map);
                    }
                }
                mysqli_commit($con);
                $msg_success = "Question paper duplicated successfully.";
            } catch (Exception $e) {
                mysqli_rollback($con);
                $msg_error = "Error duplicating paper: " . $e->getMessage();
            }
        }
    }
}

// Retrieve filters
$classes = qg_get_classes($con, $school_id, $current_session);
$filter_class = isset($_GET['f_class']) && $_GET['f_class'] !== '' ? intval($_GET['f_class']) : -1;
$filter_subject = isset($_GET['f_subject']) && $_GET['f_subject'] !== '' ? intval($_GET['f_subject']) : -1;
$filter_status = trim($_GET['f_status'] ?? '');
$filter_teacher = trim($_GET['f_teacher'] ?? '');

$subjects = $filter_class >= 0 ? qg_get_subjects($con, $filter_class, $school_id, $current_session) : [];
$teachers_list = qg_get_teachers_list($con, $school_id, $current_session);

// Build Papers Query
$sql = "SELECT p.*, c.class, c.class_section, s.name AS subject_name 
        FROM qg_papers p 
        LEFT JOIN class c ON p.class_id = c.class_id 
        LEFT JOIN subjects s ON p.subject_id = s.subj_id 
        WHERE p.school = ? AND p.deleted_at IS NULL";
$types = "s";
$params = [$school_id];

// Role-based filter: Non-admin only sees own papers
if (!$is_admin) {
    $sql .= " AND p.created_by = ?";
    $types .= "s";
    $params[] = $current_user;
} elseif (!empty($filter_teacher)) {
    // Admin filtering by a specific teacher
    $sql .= " AND p.created_by = ?";
    $types .= "s";
    $params[] = $filter_teacher;
}

if ($filter_class >= 0) {
    $sql .= " AND p.class_id = ?";
    $types .= "i";
    $params[] = $filter_class;
}
if ($filter_subject >= 0) {
    $sql .= " AND p.subject_id = ?";
    $types .= "i";
    $params[] = $filter_subject;
}
if (!empty($filter_status)) {
    $sql .= " AND p.status = ?";
    $types .= "s";
    $params[] = $filter_status;
}
$sql .= " ORDER BY p.id DESC";

$papers = [];
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
        $papers[] = $row;
    }
    mysqli_stmt_close($stmt);
}
?>

<style>
.enquiry{ width:100%; height:45px;background-color:#FFFFFF; margin-top:10px; border:4px #006633 solid;}
.col_4{ width:100%; height:auto; margin-left:2px; background-color:#FFFFFF;float:left; margin-top:10px;-webkit-box-shadow: 0 0 10px rgba(0,0,0, .65);
-moz-box-shadow: 0 0 10px rgba(0,0,0, .65);
box-shadow: 0 0 10px rgba(0,0,0, .65); padding: 15px; box-sizing: border-box;}
.select {
    padding: 5px;
    border: solid 1px #cbd5e1;
    border-radius: 4px;
    height: 35px;
    font-size: 13px;
    background: #fff;
}
input[type=submit], input[type=button], .qg-btn-legacy {
    border: none;
    background: #FF8500;
    color: #fff !important;
    box-shadow: 1px 1px 4px #DADADA;
    border-radius: 3px;
	padding: 8px 14px;
	font-weight: bold;
    text-decoration: none;
    cursor: pointer;
    display: inline-block;
}
input[type=submit]:hover, input[type=button]:hover, .qg-btn-legacy:hover {
    background: #EA7B00;
}
.table{ width:100%; margin-top:10px; border-collapse:collapse;}
.table th, .table td { padding: 8px 10px; border: 1px solid #cbd5e1; }
</style>

<div class="full_div">
<br clear="all" />
<div class="left_sect">
    <img src="images/Examination/exa.png" />
    <a href="./?pageid=home"><img src="images/buttonGoBack.png" style="float:right; width:150px; height:60px;"/></a>
</div>
<div class="shell">
<div class="shell_main">
<div class="enquiry">
    <img src="std.png" style="float:left; width:35px; height:40px; margin-left:5px; margin-top:2px;"/>
    <center><h2 style="text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Question Papers Dashboard</h2></center>
</div>

<div class="col_4">
    <!-- Header Actions -->
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:15px">
        <div>
            <span style="font-weight:bold; color:#334155">Viewing as: </span>
            <span style="color:#006633; font-weight:bold"><?php echo $is_admin ? 'Administrator (All Papers)' : 'Teacher: ' . htmlspecialchars(qg_get_teacher_name($con, $current_user)); ?></span>
        </div>
        <div>
            <a href="?pageid=qg_index&action=create" class="qg-btn-legacy" style="background:#006633">+ Create Exam Paper</a>
        </div>
    </div>

    <?php if(!empty($msg_success)): ?>
        <div style="color: #4F8A10; background-color: #FFD9FF; padding: 10px; margin-bottom: 10px; font-weight: bold; border-radius: 4px;"><?php echo $msg_success; ?></div>
    <?php endif; ?>
    <?php if(!empty($msg_error)): ?>
        <div style="color: #D8000C; background-color: #FFD9FF; padding: 10px; margin-bottom: 10px; font-weight: bold; border-radius: 4px;"><?php echo $msg_error; ?></div>
    <?php endif; ?>

    <!-- Filter Form -->
    <form method="get" action="" style="background:#f1f5f9; padding:12px; border-radius:6px; border:1px solid #e2e8f0; margin-bottom:20px">
        <input type="hidden" name="pageid" value="qg_index" />
        <input type="hidden" name="action" value="list" />
        
        <table style="width:100%">
            <tr>
                <td style="font-weight:bold; width:60px">Class:</td>
                <td>
                    <select name="f_class" class="select" onchange="this.form.submit()" style="width:180px">
                        <option value="">-- All Classes --</option>
                        <?php foreach($classes as $c): ?>
                            <option value="<?php echo $c['class_id']; ?>" <?php echo $filter_class == $c['class_id'] ? 'selected' : ''; ?>><?php echo $c['class'] . ' (' . $c['class_section'] . ')'; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td style="font-weight:bold; width:70px">Subject:</td>
                <td>
                    <select name="f_subject" class="select" onchange="this.form.submit()" style="width:180px">
                        <option value="">-- All Subjects --</option>
                        <?php foreach($subjects as $s): ?>
                            <option value="<?php echo $s['subject_id']; ?>" <?php echo $filter_subject == $s['subject_id'] ? 'selected' : ''; ?>><?php echo $s['subject_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <?php if ($is_admin): ?>
                    <td style="font-weight:bold; width:70px">Teacher:</td>
                    <td>
                        <select name="f_teacher" class="select" onchange="this.form.submit()" style="width:180px">
                            <option value="">-- All Teachers --</option>
                            <?php foreach($teachers_list as $t): ?>
                                <option value="<?php echo htmlspecialchars($t['teacher_username']); ?>" <?php echo $filter_teacher == $t['teacher_username'] ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($t['teacher_name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                <?php endif; ?>
                <td style="font-weight:bold; width:60px">Status:</td>
                <td>
                    <select name="f_status" class="select" onchange="this.form.submit()" style="width:130px">
                        <option value="">-- All Status --</option>
                        <option value="draft" <?php echo $filter_status == 'draft' ? 'selected' : ''; ?>>Draft</option>
                        <option value="published" <?php echo $filter_status == 'published' ? 'selected' : ''; ?>>Published</option>
                    </select>
                </td>
                <td style="text-align:right">
                    <a href="?pageid=qg_index&action=list" style="color:#64748b; font-size:12px">Clear Filters</a>
                </td>
            </tr>
        </table>
    </form>

    <!-- Question Papers Table -->
    <table class="table" style="font-size:12px">
        <thead style="background-color:#009933; color:#FFFFFF">
            <tr>
                <th style="width:40px; text-align:center">#</th>
                <th>Exam Name</th>
                <th>Display Class</th>
                <th>Subject</th>
                <th>Teacher</th>
                <th style="width:70px; text-align:center">Max Marks</th>
                <th style="width:80px; text-align:center">Status</th>
                <th style="width:220px; text-align:center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($papers)): ?>
                <tr>
                    <td colspan="8" style="text-align:center; padding:25px; color:#64748b">
                        No question papers found. Click "<strong>+ Create Exam Paper</strong>" to create a new section-based question paper.
                    </td>
                </tr>
            <?php else: ?>
                <?php foreach($papers as $idx => $p): 
                    $t_name = qg_get_teacher_name($con, $p['created_by']);
                    $disp_class = !empty($p['paper_class_name']) ? $p['paper_class_name'] : ($p['class'] . (!empty($p['class_section']) ? ' (' . $p['class_section'] . ')' : ''));
                ?>
                    <tr>
                        <td style="text-align:center"><?php echo $idx + 1; ?></td>
                        <td><strong><?php echo htmlspecialchars($p['exam_name']); ?></strong></td>
                        <td><span style="background:#e2e8f0; padding:2px 6px; border-radius:3px; font-weight:bold"><?php echo htmlspecialchars($disp_class); ?></span></td>
                        <td><?php echo htmlspecialchars($p['subject_name'] ?? 'N/A'); ?></td>
                        <td><?php echo htmlspecialchars($t_name); ?></td>
                        <td style="text-align:center; font-weight:bold"><?php echo floatval($p['max_marks']); ?></td>
                        <td style="text-align:center">
                            <span style="font-weight:bold; padding:2px 6px; border-radius:3px; font-size:11px; background:<?php echo $p['status'] == 'published' ? '#dcfce7; color:#166534' : '#fef3c7; color:#92400e'; ?>">
                                <?php echo strtoupper($p['status']); ?>
                            </span>
                        </td>
                        <td style="text-align:center">
                            <a href="?pageid=qg_index&action=create&uuid=<?php echo $p['uuid']; ?>" style="font-weight:bold; color:#0284c7">Edit</a> | 
                            <a href="?pageid=qg_index&action=preview&uuid=<?php echo $p['uuid']; ?>" style="font-weight:bold; color:#0d9488">Preview</a> | 
                            <a href="qg/download.php?format=pdf&uuid=<?php echo $p['uuid']; ?>" target="_blank" style="font-weight:bold; color:#16a34a">PDF</a> | 
                            <a href="?pageid=qg_index&action=list&duplicate_uuid=<?php echo $p['uuid']; ?>" onclick="return confirm('Duplicate paper?')" style="font-weight:bold; color:#d97706">Copy</a> | 
                            <a href="?pageid=qg_index&action=list&delete_uuid=<?php echo $p['uuid']; ?>" onclick="return confirm('Are you sure you want to delete this question paper?')" style="font-weight:bold; color:#dc2626">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>
