<?php
// school/qg/exam_master.php
// Dedicated Exam Master Management Screen for Question Paper System

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

// Handle Delete (Soft Delete)
if (isset($_GET['del_id']) && $is_admin) {
    $del_id = intval($_GET['del_id']);
    $now = date('Y-m-d H:i:s');
    $stmt = mysqli_prepare($con, "UPDATE qg_exam_master SET deleted_at = ? WHERE id = ? AND school = ?");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sis", $now, $del_id, $school_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        $msg_success = "Exam deleted successfully.";
    }
}

// Handle Form Submission (Add or Update)
$edit_id = 0;
$edit_exam = null;
if (isset($_GET['edit_id'])) {
    $edit_id = intval($_GET['edit_id']);
    $edit_exam = qg_get_exam_by_id($con, $edit_id, $school_id);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_exam'])) {
    $exam_name = trim($_POST['exam_name'] ?? '');
    $exam_code = trim($_POST['exam_code'] ?? '');
    $status    = trim($_POST['status'] ?? 'Active');
    $session   = trim($_POST['session'] ?? $current_session);
    $p_id      = intval($_POST['exam_id'] ?? 0);

    if (empty($exam_name)) {
        $msg_error = "Exam Name is required.";
    } else {
        if ($p_id > 0) {
            // Update
            $stmt = mysqli_prepare($con, "UPDATE qg_exam_master SET exam_name = ?, exam_code = ?, status = ?, session = ? WHERE id = ? AND school = ?");
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "ssssis", $exam_name, $exam_code, $status, $session, $p_id, $school_id);
                if (mysqli_stmt_execute($stmt)) {
                    $msg_success = "Exam updated successfully.";
                    $edit_id = 0;
                    $edit_exam = null;
                } else {
                    $msg_error = "Error updating exam: " . mysqli_error($con);
                }
                mysqli_stmt_close($stmt);
            }
        } else {
            // Insert
            $stmt = mysqli_prepare($con, "INSERT INTO qg_exam_master(exam_name, exam_code, session, school, status) VALUES(?, ?, ?, ?, ?)");
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "sssss", $exam_name, $exam_code, $session, $school_id, $status);
                if (mysqli_stmt_execute($stmt)) {
                    $msg_success = "Exam added successfully.";
                } else {
                    $msg_error = "Error adding exam: " . mysqli_error($con);
                }
                mysqli_stmt_close($stmt);
            }
        }
    }
}

// Fetch all exams for listing
$exams = qg_get_exam_master_list($con, $school_id, $current_session, false);
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
                    <h2 style="margin:0; text-transform:uppercase; color:#006633; font-size:18px;">Exam Master (Question Paper)</h2>
                </div>
                <div>
                    <a href="./?pageid=qg_index&action=upload" style="background:#0284c7; color:#fff; padding:6px 14px; text-decoration:none; border-radius:4px; font-weight:bold; font-size:13px; margin-right:5px;">+ Upload Paper</a>
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

            <div style="display:flex; gap:20px; margin-top:15px; flex-wrap:wrap;">
                <!-- Add / Edit Form -->
                <div style="flex:1; min-width:300px; background:#fff; border:1px solid #cbd5e1; border-radius:6px; padding:20px; box-shadow:0 1px 3px rgba(0,0,0,0.1); height:fit-content;">
                    <h3 style="margin-top:0; color:#006633; border-bottom:2px solid #e2e8f0; padding-bottom:8px; font-size:16px;">
                        <?php echo $edit_exam ? 'Edit Exam' : 'Add New Exam'; ?>
                    </h3>
                    <form method="POST" action="">
                        <input type="hidden" name="exam_id" value="<?php echo $edit_exam['id'] ?? 0; ?>" />
                        
                        <div style="margin-bottom:12px;">
                            <label style="display:block; font-weight:bold; margin-bottom:5px; font-size:13px;">Exam Name <span style="color:red;">*</span></label>
                            <input type="text" name="exam_name" value="<?php echo htmlspecialchars($edit_exam['exam_name'] ?? ''); ?>" placeholder="e.g. Annual Examination 2026-27" required style="width:100%; box-sizing:border-box; padding:8px; border:1px solid #cbd5e1; border-radius:4px; font-size:13px;" />
                        </div>

                        <div style="margin-bottom:12px;">
                            <label style="display:block; font-weight:bold; margin-bottom:5px; font-size:13px;">Exam Code (Optional)</label>
                            <input type="text" name="exam_code" value="<?php echo htmlspecialchars($edit_exam['exam_code'] ?? ''); ?>" placeholder="e.g. ANNUAL-2026" style="width:100%; box-sizing:border-box; padding:8px; border:1px solid #cbd5e1; border-radius:4px; font-size:13px;" />
                        </div>

                        <div style="margin-bottom:12px;">
                            <label style="display:block; font-weight:bold; margin-bottom:5px; font-size:13px;">Academic Session</label>
                            <input type="text" name="session" value="<?php echo htmlspecialchars($edit_exam['session'] ?? $current_session); ?>" readonly style="width:100%; box-sizing:border-box; padding:8px; border:1px solid #cbd5e1; border-radius:4px; background:#f1f5f9; font-size:13px;" />
                        </div>

                        <div style="margin-bottom:15px;">
                            <label style="display:block; font-weight:bold; margin-bottom:5px; font-size:13px;">Status</label>
                            <select name="status" style="width:100%; box-sizing:border-box; padding:8px; border:1px solid #cbd5e1; border-radius:4px; font-size:13px;">
                                <option value="Active" <?php echo (($edit_exam['status'] ?? 'Active') === 'Active') ? 'selected' : ''; ?>>Active</option>
                                <option value="Inactive" <?php echo (($edit_exam['status'] ?? '') === 'Inactive') ? 'selected' : ''; ?>>Inactive</option>
                            </select>
                        </div>

                        <div style="display:flex; gap:10px;">
                            <button type="submit" name="save_exam" style="background:#006633; color:#fff; padding:9px 18px; border:none; border-radius:4px; font-weight:bold; cursor:pointer; font-size:13px;">
                                <?php echo $edit_exam ? 'Update Exam' : 'Save Exam'; ?>
                            </button>
                            <?php if ($edit_exam): ?>
                                <a href="./?pageid=qg_index&action=exam_master" style="background:#64748b; color:#fff; padding:9px 18px; text-decoration:none; border-radius:4px; font-weight:bold; font-size:13px;">Cancel</a>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>

                <!-- Exams List Table -->
                <div style="flex:2; min-width:400px; background:#fff; border:1px solid #cbd5e1; border-radius:6px; padding:20px; box-shadow:0 1px 3px rgba(0,0,0,0.1);">
                    <h3 style="margin-top:0; color:#006633; border-bottom:2px solid #e2e8f0; padding-bottom:8px; font-size:16px;">
                        Exam Master List (Session: <?php echo htmlspecialchars($current_session); ?>)
                    </h3>
                    <table style="width:100%; border-collapse:collapse; font-size:13px; margin-top:10px;">
                        <thead>
                            <tr style="background:#006633; color:#fff; text-align:left;">
                                <th style="padding:10px; border:1px solid #00552b;">#</th>
                                <th style="padding:10px; border:1px solid #00552b;">Exam Name</th>
                                <th style="padding:10px; border:1px solid #00552b;">Exam Code</th>
                                <th style="padding:10px; border:1px solid #00552b;">Session</th>
                                <th style="padding:10px; border:1px solid #00552b; text-align:center;">Status</th>
                                <th style="padding:10px; border:1px solid #00552b; text-align:center;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($exams)): ?>
                                <tr>
                                    <td colspan="6" style="padding:20px; text-align:center; color:#64748b; border:1px solid #e2e8f0;">
                                        No exams found for this session. Add your first exam using the form on the left.
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php $sn = 1; foreach ($exams as $ex): ?>
                                    <tr style="border-bottom:1px solid #e2e8f0; background: <?php echo ($sn % 2 === 0) ? '#f8fafc' : '#fff'; ?>;">
                                        <td style="padding:10px; border:1px solid #e2e8f0;"><?php echo $sn++; ?></td>
                                        <td style="padding:10px; border:1px solid #e2e8f0; font-weight:bold; color:#1e293b;">
                                            <?php echo htmlspecialchars($ex['exam_name']); ?>
                                        </td>
                                        <td style="padding:10px; border:1px solid #e2e8f0; color:#475569;">
                                            <?php echo htmlspecialchars($ex['exam_code'] ?: '-'); ?>
                                        </td>
                                        <td style="padding:10px; border:1px solid #e2e8f0; color:#475569;">
                                            <?php echo htmlspecialchars($ex['session']); ?>
                                        </td>
                                        <td style="padding:10px; border:1px solid #e2e8f0; text-align:center;">
                                            <span style="background:<?php echo ($ex['status'] === 'Active') ? '#dcfce7' : '#fee2e2'; ?>; color:<?php echo ($ex['status'] === 'Active') ? '#15803d' : '#b91c1c'; ?>; padding:3px 8px; border-radius:12px; font-weight:bold; font-size:11px;">
                                                <?php echo htmlspecialchars($ex['status']); ?>
                                            </span>
                                        </td>
                                        <td style="padding:10px; border:1px solid #e2e8f0; text-align:center; white-space:nowrap;">
                                            <a href="./?pageid=qg_index&action=exam_master&edit_id=<?php echo $ex['id']; ?>" style="color:#0284c7; text-decoration:none; font-weight:bold; margin-right:10px;">Edit</a>
                                            <a href="./?pageid=qg_index&action=exam_master&del_id=<?php echo $ex['id']; ?>" onclick="return confirm('Are you sure you want to delete this exam?');" style="color:#ef4444; text-decoration:none; font-weight:bold;">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
