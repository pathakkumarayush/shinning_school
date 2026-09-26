<?php
// school/qg/upload_paper.php
// Admin Question Paper Upload Submodule (PDF & DOCX file uploads)

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

$edit_uuid = isset($_GET['uuid']) ? trim($_GET['uuid']) : '';
$paper = null;
if (!empty($edit_uuid)) {
    $paper = qg_get_paper_by_uuid($con, $edit_uuid, $school_id);
    if (!$paper) {
        $msg_error = "Question Paper not found.";
    } elseif (!$is_admin && strtolower($paper['created_by']) !== strtolower($current_user)) {
        $msg_error = "Unauthorized: You can only edit papers created by you.";
        $paper = null;
    }
}

// Handle Form Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_uploaded_paper'])) {
    $title            = trim($_POST['title'] ?? '');
    $class_id         = isset($_POST['class_id']) && $_POST['class_id'] !== '' ? intval($_POST['class_id']) : -1;
    $paper_class_name = trim($_POST['paper_class_name'] ?? '');
    $subject_id       = isset($_POST['subject_id']) && $_POST['subject_id'] !== '' ? intval($_POST['subject_id']) : -1;
    $exam_id          = isset($_POST['exam_id']) && $_POST['exam_id'] !== '' ? intval($_POST['exam_id']) : 0;
    $max_marks        = floatval($_POST['max_marks'] ?? 100);
    $duration_minutes = intval($_POST['duration_minutes'] ?? 180);
    $instructions     = trim($_POST['instructions'] ?? '');
    $creator_teacher  = trim($_POST['created_by'] ?? $current_user);

    // Fetch exam name from exam_master
    $exam_name = '';
    if ($exam_id > 0) {
        $ex_row = qg_get_exam_by_id($con, $exam_id, $school_id);
        if ($ex_row) {
            $exam_name = $ex_row['exam_name'];
        }
    }

    if (empty($title)) {
        $msg_error = "Paper Title is required.";
    } elseif ($class_id < 0) {
        $msg_error = "Please select a Class.";
    } elseif ($subject_id < 0) {
        $msg_error = "Please select a Subject.";
    } elseif ($exam_id <= 0) {
        $msg_error = "Please select an Exam from the Exam Master.";
    } else {
        $upload_file_path = $paper['file_path'] ?? null;
        $file_type = $paper['file_type'] ?? null;
        $file_size = $paper['file_size'] ?? null;
        $orig_filename = $paper['original_filename'] ?? null;

        $has_file = isset($_FILES['paper_file']) && $_FILES['paper_file']['error'] === UPLOAD_ERR_OK;

        if (!$paper && !$has_file) {
            $msg_error = "Please select a question paper file (PDF or DOCX) to upload.";
        } else {
            if ($has_file) {
                $file_tmp = $_FILES['paper_file']['tmp_name'];
                $file_name = $_FILES['paper_file']['name'];
                $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                $allowed = ['pdf', 'docx', 'doc'];

                if (!in_array($ext, $allowed)) {
                    $msg_error = "Invalid file type. Only PDF (.pdf) and Word (.docx, .doc) files are supported.";
                } else {
                    $upload_dir = __DIR__ . '/../../upload/qg/papers/';
                    if (!is_dir($upload_dir)) {
                        @mkdir($upload_dir, 0777, true);
                    }

                    $unique_name = 'paper_' . time() . '_' . bin2hex(random_bytes(4)) . '.' . $ext;
                    $target_file = $upload_dir . $unique_name;

                    if (move_uploaded_file($file_tmp, $target_file)) {
                        // Clean up old file if updating
                        if ($paper && !empty($paper['file_path'])) {
                            $old_target = __DIR__ . '/../../' . $paper['file_path'];
                            if (file_exists($old_target)) {
                                @unlink($old_target);
                            }
                        }
                        $upload_file_path = 'upload/qg/papers/' . $unique_name;
                        $file_type = ($ext === 'doc') ? 'docx' : $ext;
                        $file_size = filesize($target_file);
                        $orig_filename = $file_name;
                    } else {
                        $msg_error = "Failed to upload file. Please check folder permissions.";
                    }
                }
            }

            if (empty($msg_error)) {
                if ($paper) {
                    // Update
                    $stmt = mysqli_prepare($con, "UPDATE qg_papers SET title = ?, exam_id = ?, exam_name = ?, class_id = ?, paper_class_name = ?, subject_id = ?, duration_minutes = ?, max_marks = ?, instructions = ?, file_path = ?, file_type = ?, file_size = ?, original_filename = ?, created_by = ? WHERE id = ?");
                    mysqli_stmt_bind_param($stmt, "sisisiidsssissi", $title, $exam_id, $exam_name, $class_id, $paper_class_name, $subject_id, $duration_minutes, $max_marks, $instructions, $upload_file_path, $file_type, $file_size, $orig_filename, $creator_teacher, $paper['id']);
                    if (mysqli_stmt_execute($stmt)) {
                        $msg_success = "Uploaded Question Paper updated successfully!";
                        $paper = qg_get_paper_by_uuid($con, $paper['uuid'], $school_id);
                    } else {
                        $msg_error = "Error updating question paper: " . mysqli_error($con);
                    }
                    mysqli_stmt_close($stmt);
                } else {
                    // Insert
                    $new_uuid = qg_uuidv4();
                    $stmt = mysqli_prepare($con, "INSERT INTO qg_papers(uuid, title, exam_id, exam_name, class_id, paper_class_name, subject_id, academic_year, duration_minutes, max_marks, instructions, paper_type, file_path, file_type, file_size, original_filename, status, created_by, school) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'upload', ?, ?, ?, ?, 'published', ?, ?)");
                    mysqli_stmt_bind_param($stmt, "ssisisisidsssisss", $new_uuid, $title, $exam_id, $exam_name, $class_id, $paper_class_name, $subject_id, $current_session, $duration_minutes, $max_marks, $instructions, $upload_file_path, $file_type, $file_size, $orig_filename, $creator_teacher, $school_id);
                    if (mysqli_stmt_execute($stmt)) {
                        echo "<script>alert('Question paper uploaded successfully!'); window.location='?pageid=qg_index&action=list';</script>";
                        exit;
                    } else {
                        $msg_error = "Error saving uploaded paper: " . mysqli_error($con);
                    }
                    mysqli_stmt_close($stmt);
                }
            }
        }
    }
}

// Fetch Metadata
$classes = qg_get_classes($con, $school_id, $current_session);
$exams = qg_get_exam_master_list($con, $school_id, $current_session, true);
$teachers = qg_get_teachers_list($con, $school_id, $current_session);
$selected_class_id = $paper['class_id'] ?? (isset($_POST['class_id']) ? intval($_POST['class_id']) : -1);
$subjects = ($selected_class_id >= 0) ? qg_get_subjects($con, $selected_class_id, $school_id, $current_session) : [];
?>

<div class="full_div">
    <br clear="all" />
    <div class="left_sect">
        <img src="images/Examination/exa.png" style="height:60px;" />
        <a href="./?pageid=qg_index&action=list">
            <img src="images/buttonGoBack.png" style="float:right; width:140px; height:50px; margin-top:5px;"/>
        </a>
    </div>

    <div class="shell">
        <div class="shell_main">
            <div class="enquiry" style="display:flex; justify-content:space-between; align-items:center; padding:0 15px;">
                <div style="display:flex; align-items:center; gap:10px;">
                    <img src="images/attend.png" style="width:35px; height:35px;"/>
                    <h2 style="margin:0; text-transform:uppercase; color:#006633; font-size:18px;">
                        <?php echo $paper ? 'Edit Uploaded Question Paper' : 'Upload Exam Question Paper'; ?>
                    </h2>
                </div>
                <div>
                    <a href="./?pageid=qg_index&action=exam_master" style="background:#475569; color:#fff; padding:6px 14px; text-decoration:none; border-radius:4px; font-weight:bold; font-size:13px; margin-right:5px;">Exam Master</a>
                    <a href="./?pageid=qg_index&action=create" style="background:#006633; color:#fff; padding:6px 14px; text-decoration:none; border-radius:4px; font-weight:bold; font-size:13px;">+ Generate Paper</a>
                </div>
            </div>

            <?php if (!empty($msg_success)): ?>
                <div style="background:#dcfce7; color:#15803d; border:1px solid #86efac; padding:10px 15px; border-radius:4px; margin:15px 0; font-weight:bold;">
                    <?php echo htmlspecialchars($msg_success); ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($msg_error)): ?>
                <div style="background:#fee2e2; color:#b91c1c; border:1px solid #fca5a5; padding:10px 15px; border-radius:4px; margin:15px 0; font-weight:bold;">
                    <?php echo htmlspecialchars($msg_error); ?>
                </div>
            <?php endif; ?>

            <div style="background:#fff; border:1px solid #cbd5e1; border-radius:6px; padding:25px; margin-top:15px; box-shadow:0 1px 3px rgba(0,0,0,0.1); max-width:900px;">
                <form method="POST" action="" enctype="multipart/form-data">
                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:18px;">
                        <!-- Paper Title -->
                        <div style="grid-column: span 2;">
                            <label style="display:block; font-weight:bold; margin-bottom:6px; font-size:13px;">Paper Title <span style="color:red;">*</span></label>
                            <input type="text" name="title" value="<?php echo htmlspecialchars($paper['title'] ?? ($_POST['title'] ?? '')); ?>" placeholder="e.g. Class 10 Mathematics Final Term Paper" required style="width:100%; box-sizing:border-box; padding:9px; border:1px solid #cbd5e1; border-radius:4px; font-size:14px;" />
                        </div>

                        <!-- Class Dropdown -->
                        <div>
                            <label style="display:block; font-weight:bold; margin-bottom:6px; font-size:13px;">Class <span style="color:red;">*</span></label>
                            <select name="class_id" id="upload_class_id" required style="width:100%; box-sizing:border-box; padding:9px; border:1px solid #cbd5e1; border-radius:4px; font-size:13px;" onchange="loadSubjects(this.value)">
                                <option value="">Select Class</option>
                                <?php foreach ($classes as $c): ?>
                                    <option value="<?php echo $c['class_id']; ?>" <?php echo ($selected_class_id == $c['class_id']) ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($c['class'] . (!empty($c['class_section']) ? ' (' . $c['class_section'] . ')' : '')); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Display Class Name Override -->
                        <div>
                            <label style="display:block; font-weight:bold; margin-bottom:6px; font-size:13px;">Custom Display Class (Optional)</label>
                            <input type="text" name="paper_class_name" value="<?php echo htmlspecialchars($paper['paper_class_name'] ?? ($_POST['paper_class_name'] ?? '')); ?>" placeholder="e.g. X – A & B" style="width:100%; box-sizing:border-box; padding:9px; border:1px solid #cbd5e1; border-radius:4px; font-size:13px;" />
                        </div>

                        <!-- Subject Dropdown -->
                        <div>
                            <label style="display:block; font-weight:bold; margin-bottom:6px; font-size:13px;">Subject <span style="color:red;">*</span></label>
                            <select name="subject_id" id="upload_subject_id" required style="width:100%; box-sizing:border-box; padding:9px; border:1px solid #cbd5e1; border-radius:4px; font-size:13px;">
                                <option value="">Select Subject</option>
                                <?php foreach ($subjects as $s): ?>
                                    <?php $cur_sub = $paper['subject_id'] ?? ($_POST['subject_id'] ?? -1); ?>
                                    <option value="<?php echo $s['subject_id']; ?>" <?php echo ($cur_sub == $s['subject_id']) ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($s['subject_name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Exam Dropdown from Exam Master -->
                        <div>
                            <label style="display:block; font-weight:bold; margin-bottom:6px; font-size:13px;">Exam Name <span style="color:red;">*</span></label>
                            <select name="exam_id" required style="width:100%; box-sizing:border-box; padding:9px; border:1px solid #cbd5e1; border-radius:4px; font-size:13px;">
                                <option value="">Select Exam ▼</option>
                                <?php foreach ($exams as $ex): ?>
                                    <?php $cur_exam = $paper['exam_id'] ?? ($_POST['exam_id'] ?? 0); ?>
                                    <option value="<?php echo $ex['id']; ?>" <?php echo ($cur_exam == $ex['id'] || (!empty($paper['exam_name']) && $paper['exam_name'] === $ex['exam_name'])) ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($ex['exam_name'] . (!empty($ex['exam_code']) ? ' (' . $ex['exam_code'] . ')' : '')); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Max Marks -->
                        <div>
                            <label style="display:block; font-weight:bold; margin-bottom:6px; font-size:13px;">Maximum Marks</label>
                            <input type="number" step="0.5" name="max_marks" value="<?php echo htmlspecialchars($paper['max_marks'] ?? ($_POST['max_marks'] ?? '100')); ?>" style="width:100%; box-sizing:border-box; padding:9px; border:1px solid #cbd5e1; border-radius:4px; font-size:13px;" />
                        </div>

                        <!-- Duration -->
                        <div>
                            <label style="display:block; font-weight:bold; margin-bottom:6px; font-size:13px;">Duration (Minutes)</label>
                            <input type="number" name="duration_minutes" value="<?php echo htmlspecialchars($paper['duration_minutes'] ?? ($_POST['duration_minutes'] ?? '180')); ?>" style="width:100%; box-sizing:border-box; padding:9px; border:1px solid #cbd5e1; border-radius:4px; font-size:13px;" />
                        </div>

                        <!-- Teacher / Creator -->
                        <div>
                            <label style="display:block; font-weight:bold; margin-bottom:6px; font-size:13px;">Assigned Teacher / Author</label>
                            <select name="created_by" style="width:100%; box-sizing:border-box; padding:9px; border:1px solid #cbd5e1; border-radius:4px; font-size:13px;">
                                <option value="<?php echo htmlspecialchars($current_user); ?>">Admin (You)</option>
                                <?php foreach ($teachers as $t): ?>
                                    <?php $cur_cr = $paper['created_by'] ?? ($_POST['created_by'] ?? $current_user); ?>
                                    <option value="<?php echo htmlspecialchars($t['teacher_username'] ?: $t['teacher_id']); ?>" <?php echo ($cur_cr === ($t['teacher_username'] ?: $t['teacher_id'])) ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($t['teacher_name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- File Upload -->
                        <div>
                            <label style="display:block; font-weight:bold; margin-bottom:6px; font-size:13px;">
                                Question Paper File (.PDF or .DOCX) <?php if(!$paper): ?><span style="color:red;">*</span><?php endif; ?>
                            </label>
                            <input type="file" name="paper_file" accept=".pdf,.docx,.doc,application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword" <?php echo (!$paper) ? 'required' : ''; ?> style="width:100%; box-sizing:border-box; padding:7px; border:1px solid #cbd5e1; border-radius:4px; font-size:13px;" />
                            <?php if ($paper && !empty($paper['file_path'])): ?>
                                <div style="margin-top:6px; font-size:12px; color:#475569;">
                                    Current File: <strong><?php echo htmlspecialchars($paper['original_filename'] ?: basename($paper['file_path'])); ?></strong>
                                    (<?php echo strtoupper($paper['file_type'] ?: 'FILE'); ?>)
                                    <a href="<?php echo htmlspecialchars('../' . $paper['file_path']); ?>" target="_blank" style="color:#0284c7; text-decoration:none; font-weight:bold; margin-left:8px;">[View Current File]</a>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Instructions -->
                        <div style="grid-column: span 2;">
                            <label style="display:block; font-weight:bold; margin-bottom:6px; font-size:13px;">General Instructions (Optional)</label>
                            <textarea name="instructions" rows="3" placeholder="Enter special instructions if any..." style="width:100%; box-sizing:border-box; padding:9px; border:1px solid #cbd5e1; border-radius:4px; font-size:13px; font-family:sans-serif;"><?php echo htmlspecialchars($paper['instructions'] ?? ($_POST['instructions'] ?? '')); ?></textarea>
                        </div>
                    </div>

                    <div style="margin-top:25px; display:flex; gap:12px;">
                        <button type="submit" name="save_uploaded_paper" style="background:#006633; color:#fff; padding:10px 24px; border:none; border-radius:4px; font-weight:bold; cursor:pointer; font-size:14px;">
                            <?php echo $paper ? 'Update Uploaded Paper' : 'Upload Question Paper'; ?>
                        </button>
                        <a href="./?pageid=qg_index&action=list" style="background:#64748b; color:#fff; padding:10px 20px; text-decoration:none; border-radius:4px; font-weight:bold; font-size:14px;">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function loadSubjects(classId) {
    var subSelect = document.getElementById('upload_subject_id');
    subSelect.innerHTML = '<option value="">Loading subjects...</option>';
    if (!classId || classId === '-1') {
        subSelect.innerHTML = '<option value="">Select Subject</option>';
        return;
    }
    fetch('../api/qg/get_metadata.php?class_id=' + encodeURIComponent(classId))
        .then(function(res) { return res.json(); })
        .then(function(json) {
            if (json.status && json.data && json.data.subjects) {
                var opts = '<option value="">Select Subject</option>';
                json.data.subjects.forEach(function(s) {
                    opts += '<option value="' + s.subject_id + '">' + s.subject_name + '</option>';
                });
                subSelect.innerHTML = opts;
            } else {
                subSelect.innerHTML = '<option value="">No subjects found</option>';
            }
        })
        .catch(function(err) {
            subSelect.innerHTML = '<option value="">Error loading subjects</option>';
        });
}
</script>
