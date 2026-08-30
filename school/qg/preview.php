<?php
// school/qg/preview.php
// Print Preview: Displays compiled printable preview of the section-based question paper

if (!isset($_SESSION['uid'])) {
    header("Location:../index.php");
    exit;
}

$school_id = $_SESSION['uid'];
$current_session = $_SESSION['session'] ?? '2026-2027';
$current_user = $_SESSION['userid'] ?? 'admin';
$user_type = $_SESSION['type'] ?? 'admin';
$is_admin = ($user_type === 'admin' || strtolower($current_user) === 'admin' || strtolower($current_user) === 'shining');

$uuid = isset($_GET['uuid']) ? trim($_GET['uuid']) : '';
$paper = null;
if (!empty($uuid)) {
    $paper = qg_get_paper_by_uuid($con, $uuid, $school_id);
}

if (!$paper) {
    echo "<script>alert('Question Paper not found.'); window.location='?pageid=qg_index&action=list';</script>";
    exit;
}

// Teacher authorization check: Non-admin can only view their own papers
if (!$is_admin && strtolower($paper['created_by']) !== strtolower($current_user)) {
    echo "<script>alert('Unauthorized: You can only view question papers created by you.'); window.location='?pageid=qg_index&action=list';</script>";
    exit;
}

// Fetch class name and subject name
$class_res = mysqli_query($con, "SELECT class, class_section FROM class WHERE class_id={$paper['class_id']}");
$class_row = mysqli_fetch_assoc($class_res);
$erp_class_name = $class_row ? $class_row['class'] . (!empty($class_row['class_section']) ? ' (' . $class_row['class_section'] . ')' : '') : 'N/A';
$display_class_name = !empty($paper['paper_class_name']) ? $paper['paper_class_name'] : $erp_class_name;

$sub_res = mysqli_query($con, "SELECT name AS subject_name FROM subjects WHERE subj_id={$paper['subject_id']}");
$sub_row = mysqli_fetch_assoc($sub_res);
$subject_name = $sub_row ? $sub_row['subject_name'] : 'N/A';

// Handle publishing
if (isset($_POST['publish_paper'])) {
    mysqli_query($con, "UPDATE qg_papers SET status='published' WHERE id={$paper['id']}");
    $paper['status'] = 'published';
    $msg_success = "Question paper published successfully!";
}

$sections = qg_get_paper_sections($con, $paper['id']);
?>

<style>
.enquiry{ width:100%; height:45px;background-color:#FFFFFF; margin-top:10px; border:4px #006633 solid;}
.col_4{ width:100%; height:auto; margin-left:2px; background-color:#FFFFFF;float:left; margin-top:10px;-webkit-box-shadow: 0 0 10px rgba(0,0,0, .65);
-moz-box-shadow: 0 0 10px rgba(0,0,0, .65);
box-shadow: 0 0 10px rgba(0,0,0, .65); padding: 20px; box-sizing: border-box;}
input[type=submit], input[type=button], .qg-btn-legacy {
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
input[type=submit]:hover, .qg-btn-legacy:hover {
    background: #EA7B00;
}

/* Updated Question Paper Styling */
.qg-paper-container {
    border: 2px solid #000000;
    padding: 25px 30px;
    background-color: #ffffff;
    width: 95%;
    max-width: 800px;
    margin: 15px auto;
    font-family: 'Times New Roman', Times, serif;
    line-height: 1.4;
    color: #000000 !important;
    position: relative;
    box-sizing: border-box;
}
.qg-roll-no-row {
    text-align: right;
    font-weight: bold;
    font-size: 14px;
    margin-bottom: 8px;
    color: #000000 !important;
}
.qg-header-main {
    text-align: center;
    padding: 6px 0;
}
.qg-school-title {
    margin: 0 0 4px 0;
    font-size: 20px;
    font-weight: bold;
    text-transform: uppercase;
    color: #000000 !important;
}
.qg-exam-title {
    margin: 0;
    font-size: 15px;
    font-weight: bold;
    color: #000000 !important;
}
.qg-header-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-weight: bold;
    font-size: 14px;
    padding: 6px 0;
    color: #000000 !important;
}
.qg-meta-left {
    width: 30%;
    text-align: left;
}
.qg-meta-center {
    width: 40%;
    text-align: center;
    text-transform: uppercase;
}
.qg-meta-right {
    width: 30%;
    text-align: right;
    text-transform: uppercase;
}
.qg-header-divider {
    border-top: 1px solid #000000;
    margin: 2px 0;
}
.qg-header-divider-thick {
    border-top: 2px solid #000000;
    margin: 2px 0 15px 0;
}
.qg-watermark-container {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    pointer-events: none;
    z-index: 1;
    overflow: hidden;
}
.qg-watermark-text {
    font-size: 180px;
    font-weight: bold;
    color: rgba(180, 180, 180, 0.22);
    transform: rotate(-35deg);
    white-space: nowrap;
    user-select: none;
}
.qg-paper-content {
    position: relative;
    z-index: 2;
    color: #000000 !important;
}
.qg-section-heading {
    text-align: center;
    font-weight: bold;
    font-size: 15px;
    margin: 18px 0 6px 0;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}
.qg-section-instruction {
    font-size: 13px;
    font-weight: bold;
    font-style: italic;
    margin-bottom: 10px;
}
.qg-footer-divider {
    border-top: 1px solid #000000;
    margin-top: 40px;
    padding-top: 5px;
}
.qg-paper-footer {
    display: flex;
    justify-content: space-between;
    font-size: 12px;
    font-weight: bold;
    margin-top: 5px;
    color: #000000 !important;
}
</style>

<div class="full_div">
<br clear="all" />
<div class="left_sect">
    <img src="images/Student Detail/home.png" />
    <a href="?pageid=qg_index&action=create&uuid=<?php echo $paper['uuid']; ?>"><img src="images/buttonGoBack.png" style="float:right; width:150px; height:60px;"/></a>
</div>
<div class="shell">
<div class="shell_main">
<div class="enquiry">
    <img src="std.png" style="float:left; width:35px; height:40px; margin-left:5px; margin-top:2px;"/>
    <center><h2 style="text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Print Preview</h2></center>
</div>

<div class="col_4">
    <div style="display:flex; justify-content:space-between; margin-bottom:15px">
        <div>
            <a href="qg/download.php?format=pdf&uuid=<?php echo $paper['uuid']; ?>" target="_blank" class="qg-btn-legacy" style="background:#006633">Download / Print PDF</a>
            <a href="qg/download.php?format=docx&uuid=<?php echo $paper['uuid']; ?>" class="qg-btn-legacy" style="margin-left:10px">Download Word (DOC)</a>
            <a href="?pageid=qg_index&action=create&uuid=<?php echo $paper['uuid']; ?>" class="qg-btn-legacy" style="background:#475569; margin-left:10px">Edit Paper</a>
        </div>
        <div>
            <?php if($paper['status'] == 'draft'): ?>
                <form method="post" action="" style="display:inline">
                    <input type="submit" name="publish_paper" value="Publish Question Paper" onclick="return confirm('Publish paper?')" class="qg-btn-legacy" style="background:#006633" />
                </form>
            <?php endif; ?>
        </div>
    </div>

    <?php if(!empty($msg_success)): ?>
        <div style="color: #4F8A10; background-color: #FFD9FF; padding: 10px; margin-bottom: 10px; font-weight: bold; border-radius: 4px;"><?php echo $msg_success; ?></div>
    <?php endif; ?>

    <?php
    $sch_q = mysqli_query($con, "SELECT school_name FROM school LIMIT 1");
    $sch_row = mysqli_fetch_assoc($sch_q);
    $school_name = $sch_row ? $sch_row['school_name'] : 'SHINING SCHOOL';
    
    $duration_str = '';
    if (!empty($paper['duration_minutes'])) {
        $min = intval($paper['duration_minutes']);
        if ($min % 60 === 0) {
            $hours = $min / 60;
            $duration_str = $hours . " Hour" . ($hours > 1 ? "s" : "");
        } else {
            $duration_str = $min . " Mins";
        }
    } else {
        $duration_str = "N/A";
    }
    
    $watermark_text = !empty($paper['watermark_text']) ? $paper['watermark_text'] : 'S.P.S.';
    ?>
    <div class="qg-paper-container">
        
        <!-- Watermark background layer -->
        <div class="qg-watermark-container">
            <div class="qg-watermark-text"><?php echo htmlspecialchars($watermark_text); ?></div>
        </div>

        <div class="qg-paper-content">
            <!-- Roll No at top right -->
            <div class="qg-roll-no-row">
                Roll No............................
            </div>

            <!-- Top Header divider line -->
            <div class="qg-header-divider"></div>

            <!-- School name and exam header -->
            <div class="qg-header-main">
                <h1 class="qg-school-title"><?php echo htmlspecialchars($school_name); ?></h1>
                <h2 class="qg-exam-title"><?php echo htmlspecialchars($paper['exam_name'] . ' - ' . $paper['academic_year']); ?></h2>
            </div>

            <!-- Middle Header divider line -->
            <div class="qg-header-divider"></div>

            <!-- Header metadata row -->
            <div class="qg-header-meta">
                <div class="qg-meta-left">Time: <?php echo htmlspecialchars($duration_str); ?></div>
                <div class="qg-meta-center"><?php echo htmlspecialchars($subject_name . ' - ' . $display_class_name); ?></div>
                <div class="qg-meta-right">M M: <?php echo htmlspecialchars(floatval($paper['max_marks'])); ?></div>
            </div>

            <!-- Thick Header divider line -->
            <div class="qg-header-divider-thick"></div>

            <?php if (!empty($paper['instructions'])): ?>
                <div style="font-size: 12px; border: 1px solid #000000; padding: 8px 12px; margin-bottom: 15px">
                    <strong>General Instructions:</strong>
                    <div style="white-space: pre-line; margin-top: 3px"><?php echo htmlspecialchars($paper['instructions']); ?></div>
                </div>
            <?php endif; ?>

            <?php if (empty($sections)): ?>
                <div style="font-style:italic; color:#64748b; font-size:13px; text-align:center; padding:20px">No sections or questions linked to this paper.</div>
            <?php else: ?>
                <?php 
                $global_q_counter = 1;
                foreach ($sections as $sec): 
                    $questions = qg_get_section_questions($con, $sec['id']);
                ?>
                    <!-- Section Heading -->
                    <?php if (!empty($sec['name'])): ?>
                        <div class="qg-section-heading"><?php echo htmlspecialchars($sec['name']); ?></div>
                    <?php endif; ?>

                    <!-- Section Instruction -->
                    <?php if (!empty($sec['instructions'])): ?>
                        <div class="qg-section-instruction"><?php echo htmlspecialchars($sec['instructions']); ?></div>
                    <?php endif; ?>

                    <?php foreach ($questions as $q): ?>
                        <div style="margin-bottom: 16px; font-size: 13px">
                            <div style="display:flex; justify-content:space-between; align-items:flex-start">
                                <div style="width:90%">
                                    <strong>Q.<?php echo $global_q_counter; ?>.</strong> <?php echo nl2br(htmlspecialchars($q['question_text'])); ?>
                                </div>
                                <div style="font-weight:bold; white-space:nowrap">[<?php echo floatval($q['marks_override'] ?? $q['marks']); ?>]</div>
                            </div>

                            <!-- Image Question Rendering -->
                            <?php if (!empty($q['image_path'])): ?>
                                <div style="text-align:center; margin:10px 0">
                                    <img src="<?php echo htmlspecialchars($q['image_path']); ?>" style="max-width:320px; max-height:220px; object-fit:contain; border:1px solid #ddd; border-radius:3px" />
                                </div>
                            <?php endif; ?>

                            <!-- Type Specific Layouts -->
                            <?php if ($q['question_type'] === 'mcq'): ?>
                                <?php $mcq_opts = qg_get_mcq_options($con, $q['id']); ?>
                                <div style="padding-left:25px; margin-top:6px; display:flex; flex-wrap:wrap">
                                    <?php foreach ($mcq_opts as $opt): ?>
                                        <div style="width:50%; margin-bottom:4px; box-sizing:border-box">
                                            (<?php echo strtolower($opt['option_letter']); ?>) <?php echo htmlspecialchars($opt['option_text']); ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                            <?php elseif ($q['question_type'] === 'true_false'): ?>
                                <div style="padding-left:25px; margin-top:4px; text-align:right; font-weight:bold">
                                    ( &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; )
                                </div>

                            <?php elseif ($q['question_type'] === 'matching' || $q['question_type'] === 'match_columns'): ?>
                                <?php 
                                    $match_opts = qg_get_match_options($con, $q['id']); 
                                ?>
                                <table style="width:80%; margin:8px auto; font-size:12px; border-collapse:collapse">
                                    <tr style="font-weight:bold; text-decoration:underline">
                                        <td style="padding:2px 0; width:50%">Column A</td>
                                        <td style="padding:2px 0; width:50%">Column B</td>
                                    </tr>
                                    <?php foreach ($match_opts as $m_idx => $m): ?>
                                        <tr>
                                            <td style="padding:2px 0"><?php echo chr(65 + $m_idx); ?>. <?php echo htmlspecialchars($m['left_content']); ?></td>
                                            <td style="padding:2px 0"><?php echo ($m_idx + 1); ?>. <?php echo htmlspecialchars($m['right_content']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>

                            <?php elseif ($q['question_type'] === 'one_word'): ?>
                                <div style="padding-left:25px; margin-top:4px; font-weight:bold">
                                    Answer: ____________________________________________________
                                </div>

                            <?php elseif ($q['question_type'] === 'fill_blank' || $q['question_type'] === 'fill_blanks'): ?>
                                <!-- Statement already includes blanks ______ -->
                            <?php endif; ?>
                        </div>
                    <?php 
                        $global_q_counter++;
                    endforeach; ?>
                <?php endforeach; ?>
            <?php endif; ?>

            <!-- Bottom footer line and footer content -->
            <div class="qg-footer-divider"></div>
            <div class="qg-paper-footer">
                <div style="width:100%; text-align:right">Date - ----------------</div>
            </div>
        </div>
    </div>
</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>
