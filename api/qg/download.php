<?php
// api/qg/download.php
// API endpoint to download/print the section-based question paper in PDF or DOCX formats

ini_set('display_errors', 0);

require_once __DIR__ . '/../../db.php';
require_once __DIR__ . '/../../school/qg/db_helpers.php';

// Token Authentication (Supports Authorization header OR ?token= query parameter)
$token = '';
$headers = getallheaders();
$authHeader = $headers['Authorization'] ?? $headers['authorization'] ?? '';

if (preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
    $token = $matches[1];
} elseif (isset($_GET['token'])) {
    $token = trim($_GET['token']);
}

if (empty($token)) {
    http_response_code(401);
    header('Content-Type: application/json');
    echo json_encode(['status' => false, 'message' => 'Authorization token is required']);
    exit;
}

$token = mysqli_real_escape_string($con, $token);
$auth_q = mysqli_query($con, "SELECT * FROM user_tokens WHERE token = '$token' LIMIT 1");
if (!$auth_q || mysqli_num_rows($auth_q) === 0) {
    http_response_code(401);
    header('Content-Type: application/json');
    echo json_encode(['status' => false, 'message' => 'Invalid or expired token']);
    exit;
}

$auth_user = mysqli_fetch_assoc($auth_q);
$session_uid = $auth_user['uid'];
$session_type = $auth_user['type'];
$is_admin = ($session_type === 'admin' || strtolower($session_uid) === 'admin' || strtolower($session_uid) === 'shining');

$school_id = 'shining';

$uuid = isset($_GET['uuid']) ? trim($_GET['uuid']) : '';
$format = isset($_GET['format']) ? trim($_GET['format']) : 'pdf';

$paper = qg_get_paper_by_uuid($con, $uuid, $school_id);
if (!$paper) {
    http_response_code(404);
    header('Content-Type: application/json');
    echo json_encode(['status' => false, 'message' => 'Question Paper not found']);
    exit;
}

// Teacher authorization check: Non-admin can only access own papers
if (!$is_admin && strtolower($paper['created_by']) !== strtolower($session_uid)) {
    http_response_code(403);
    header('Content-Type: application/json');
    echo json_encode(['status' => false, 'message' => 'Access denied: Unauthorized access to this question paper']);
    exit;
}

// If this is an uploaded question paper, stream the uploaded file directly
if (($paper['paper_type'] ?? '') === 'upload' && !empty($paper['file_path'])) {
    $full_file_path = __DIR__ . '/../../' . $paper['file_path'];
    if (file_exists($full_file_path)) {
        $ext = strtolower(pathinfo($full_file_path, PATHINFO_EXTENSION));
        $download_name = !empty($paper['original_filename']) ? $paper['original_filename'] : basename($full_file_path);
        
        if ($ext === 'pdf') {
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename="' . $download_name . '"');
        } elseif ($ext === 'docx' || $ext === 'doc') {
            header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
            header('Content-Disposition: attachment; filename="' . $download_name . '"');
        } else {
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $download_name . '"');
        }
        header('Content-Length: ' . filesize($full_file_path));
        readfile($full_file_path);
        exit;
    } else {
        http_response_code(404);
        header('Content-Type: application/json');
        echo json_encode(['status' => false, 'message' => 'Uploaded question paper file was not found on server']);
        exit;
    }
}

// Fetch class name and subject name
$class_res = mysqli_query($con, "SELECT class, class_section FROM class WHERE class_id={$paper['class_id']}");
$class_row = mysqli_fetch_assoc($class_res);
$erp_class_name = $class_row ? $class_row['class'] . (!empty($class_row['class_section']) ? ' (' . $class_row['class_section'] . ')' : '') : 'N/A';
$display_class_name = !empty($paper['paper_class_name']) ? $paper['paper_class_name'] : $erp_class_name;

$sub_res = mysqli_query($con, "SELECT name AS subject_name FROM subjects WHERE subj_id={$paper['subject_id']}");
$sub_row = mysqli_fetch_assoc($sub_res);
$subject_name = $sub_row ? $sub_row['subject_name'] : 'N/A';

$sections = qg_get_paper_sections($con, $paper['id']);

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

// 1. DOCX (Word) Format stream
if ($format === 'docx') {
    $filename = preg_replace('/[^a-zA-Z0-9_-]/', '_', $paper['title']) . ".doc";
    
    header("Content-Type: application/vnd.ms-word; charset=utf-8");
    header("Content-Disposition: attachment; filename=\"$filename\"");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("content-Transfer-Encoding: binary");
    ?>
    <html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'>
    <head>
        <title><?php echo htmlspecialchars($paper['title']); ?></title>
        <style>
            @page Section1 {
                size: 8.27in 11.69in;
                margin: 0.7in 0.7in 0.7in 0.7in;
                border: 1.5pt solid #000000;
            }
            body { 
                font-family: 'Times New Roman', Times, serif; 
                font-size: 11pt; 
                line-height: 1.4; 
                color: #000000; 
            }
            .paper-container {
                page: Section1;
            }
            .roll-no-row {
                text-align: right;
                font-weight: bold;
                font-size: 11pt;
                margin-bottom: 6px;
            }
            .header-main {
                text-align: center;
                padding: 6px 0;
            }
            .school-title {
                margin: 0 0 4px 0;
                font-size: 18pt;
                font-weight: bold;
                text-transform: uppercase;
            }
            .exam-title {
                margin: 0;
                font-size: 13pt;
                font-weight: bold;
            }
            .header-divider {
                border-top: 1px solid #000000;
                margin: 2px 0;
            }
            .header-divider-thick {
                border-top: 2px solid #000000;
                margin: 2px 0 12px 0;
            }
            .meta-table {
                width: 100%;
                border-collapse: collapse;
                font-weight: bold;
                font-size: 11pt;
                margin: 4px 0;
            }
            .section-heading {
                text-align: left;
                font-weight: bold;
                font-size: 13pt;
                margin: 14pt 0 4pt 0;
                text-transform: uppercase;
            }
            .section-instruction {
                font-size: 11pt;
                font-weight: bold;
                font-style: italic;
                margin-bottom: 8pt;
            }
            .question-table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 12pt;
            }
            .question-text {
                width: 90%;
                font-size: 11pt;
                text-align: left;
                vertical-align: top;
            }
            .question-marks {
                width: 10%;
                font-weight: bold;
                font-size: 11pt;
                text-align: right;
                vertical-align: top;
            }
            .match-table {
                width: 80%;
                margin: 6pt auto;
                font-size: 10pt;
                border-collapse: collapse;
            }
        </style>
    </head>
    <body>
        <div class="paper-container">
            <div class="roll-no-row">Roll No............................</div>
            <div class="header-divider"></div>

            <div class="header-main">
                <h1 class="school-title"><?php echo htmlspecialchars($school_name); ?></h1>
                <h2 class="exam-title"><?php echo htmlspecialchars($paper['exam_name'] . ' - ' . $paper['academic_year']); ?></h2>
            </div>

            <div class="header-divider"></div>

            <table class="meta-table" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td style="width:30%; text-align:left">Time: <?php echo htmlspecialchars($duration_str); ?></td>
                    <td style="width:40%; text-align:center; text-transform:uppercase"><?php echo htmlspecialchars($subject_name . ' - ' . $display_class_name); ?></td>
                    <td style="width:30%; text-align:right; text-transform:uppercase">M M: <?php echo htmlspecialchars(floatval($paper['max_marks'])); ?></td>
                </tr>
            </table>

            <div class="header-divider-thick"></div>

            <?php if (!empty($paper['instructions'])): ?>
                <div style="font-size: 10pt; border: 1px solid #000000; padding: 8px; margin-bottom: 15px">
                    <strong>General Instructions:</strong>
                    <div style="margin-top: 4px"><?php echo nl2br(htmlspecialchars($paper['instructions'])); ?></div>
                </div>
            <?php endif; ?>

            <?php 
            $doc_sec_counter = 1;
            foreach ($sections as $sec): 
                $questions = qg_get_section_questions($con, $sec['id']);
                $sec_title = 'Q' . $doc_sec_counter . (!empty($sec['name']) ? '. ' . $sec['name'] : '');
            ?>
                <div class="section-heading"><?php echo htmlspecialchars($sec_title); ?></div>

                <?php if (!empty($sec['instructions'])): ?>
                    <div class="section-instruction"><?php echo htmlspecialchars($sec['instructions']); ?></div>
                <?php endif; ?>

                <?php 
                $doc_q_counter = 1;
                foreach ($questions as $q): 
                ?>
                    <div style="margin-bottom:12pt; page-break-inside: avoid">
                        <table class="question-table" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td class="question-text">
                                    <strong><?php echo $doc_q_counter; ?>.</strong> <?php echo nl2br(htmlspecialchars($q['question_text'])); ?>
                                </td>
                                <td class="question-marks">
                                    [<?php echo floatval($q['marks_override'] ?? $q['marks']); ?>]
                                </td>
                            </tr>
                        </table>

                        <?php if ($q['question_type'] === 'mcq'): ?>
                            <?php $mcq_opts = qg_get_mcq_options($con, $q['id']); ?>
                            <div style="margin-left: 20pt; margin-top: 4pt">
                                <?php foreach ($mcq_opts as $opt): ?>
                                    <span style="display:inline-block; width:45%; margin-bottom:4pt">
                                        (<?php echo strtolower($opt['option_letter']); ?>) <?php echo htmlspecialchars($opt['option_text']); ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>

                        <?php elseif ($q['question_type'] === 'true_false'): ?>
                            <!-- True / False options rendered without extra blank brackets -->

                        <?php elseif ($q['question_type'] === 'matching' || $q['question_type'] === 'match_columns'): ?>
                            <?php $match_opts = qg_get_match_options($con, $q['id']); ?>
                            <table class="match-table" border="0" cellspacing="0" cellpadding="0">
                                <tr style="font-weight:bold; text-decoration:underline">
                                    <td style="width:50%">Column A</td>
                                    <td style="width:50%">Column B</td>
                                </tr>
                                <?php foreach ($match_opts as $m_idx => $m): ?>
                                    <tr>
                                        <td style="padding:2pt 0"><?php echo chr(65 + $m_idx); ?>. <?php echo htmlspecialchars($m['left_content']); ?></td>
                                        <td style="padding:2pt 0"><?php echo ($m_idx + 1); ?>. <?php echo htmlspecialchars($m['right_content']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>

                        <?php elseif ($q['question_type'] === 'one_word'): ?>
                            <!-- One Word question without placeholder answer line -->
                        <?php endif; ?>
                    </div>
                <?php 
                    $doc_q_counter++;
                endforeach; ?>
            <?php 
                $doc_sec_counter++;
            endforeach; ?>

            <div style="margin-top: 30px;">
                <hr style="border: 0; border-top: 1px solid #000000; margin-bottom: 10px;" />
                <table style="width:100%; font-weight:bold; font-size:10pt" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td style="width:100%; text-align:right">Date - ----------------</td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
    </html>
    <?php
    exit;
}

// 2. PDF/Print engine view
?>
<!DOCTYPE html>
<html>
<head>
    <title>Print: <?php echo htmlspecialchars($paper['title']); ?></title>
    <style>
        @page {
            size: A4 portrait;
            margin: 10mm 12mm;
        }
        @media print {
            html, body { 
                font-family: 'Times New Roman', Times, serif; 
                font-size: 12pt; 
                line-height: 1.35; 
                color: #000000; 
                padding: 0 !important; 
                margin: 0 !important;
                background-color: #ffffff !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            .no-print { display: none !important; }
            .paper-container {
                width: 100% !important;
                max-width: 100% !important;
                margin: 0 !important;
                border: 2px solid #000000 !important;
                padding: 15px 20px !important;
                box-sizing: border-box !important;
                min-height: auto !important;
                height: auto !important;
                display: block !important;
                background-color: transparent !important;
                position: relative !important;
            }
            .paper-content {
                display: block !important;
            }
            .q-item {
                page-break-inside: avoid !important;
                break-inside: avoid !important;
                margin-bottom: 12px !important;
            }
            .section-heading {
                page-break-after: avoid !important;
                break-after: avoid !important;
            }
            .footer-block {
                page-break-inside: avoid !important;
                break-inside: avoid !important;
                margin-top: 15px !important;
            }
        }
        body { 
            font-family: 'Times New Roman', Times, serif; 
            font-size: 12pt; 
            line-height: 1.35; 
            color: #000000; 
            padding: 30px 20px; 
            background-color: #f1f5f9; 
        }
        .print-btn-bar { 
            background-color: #ffffff; 
            padding: 15px; 
            border-radius: 6px; 
            border: 1px solid #cbd5e1; 
            margin-bottom: 25px; 
            text-align: center; 
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .qg-btn { 
            display: inline-block; 
            padding: 10px 20px; 
            font-size: 14px; 
            font-weight: 600; 
            border-radius: 4px; 
            cursor: pointer; 
            text-decoration: none; 
            border: none; 
            background-color: #008040; 
            color: #ffffff; 
        }
        .qg-btn-sec { background-color: #6c757d; margin-left: 10px; }
        
        .paper-container {
            background-color: #ffffff;
            border: 2px solid #000000;
            padding: 30px 40px;
            max-width: 800px;
            margin: 0 auto;
            box-sizing: border-box;
            position: relative;
            z-index: 1;
            display: block;
            color: #000000 !important;
        }
        
        .watermark-container { 
            position: absolute; 
            top: 0; 
            left: 0; 
            width: 100%; 
            height: 100%; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            pointer-events: none; 
            z-index: 0; 
            overflow: hidden; 
        }
        .watermark-text { 
            font-size: 140px; 
            font-weight: bold; 
            color: #888888; 
            opacity: 0.18; 
            transform: rotate(-35deg); 
            -webkit-transform: rotate(-35deg); 
            white-space: nowrap; 
            user-select: none; 
        }

        .roll-no-row {
            text-align: right;
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 8px;
            color: #000000 !important;
        }
        .header-main {
            text-align: center;
            padding: 4px 0;
        }
        .school-title {
            margin: 0 0 4px 0;
            font-size: 22px;
            font-weight: bold;
            text-transform: uppercase;
            color: #000000 !important;
        }
        .exam-title {
            margin: 0;
            font-size: 16px;
            font-weight: bold;
            color: #000000 !important;
        }
        .header-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: bold;
            font-size: 14px;
            padding: 6px 0;
            color: #000000 !important;
        }
        .meta-left {
            width: 30%;
            text-align: left;
        }
        .meta-center {
            width: 40%;
            text-align: center;
            text-transform: uppercase;
        }
        .meta-right {
            width: 30%;
            text-align: right;
            text-transform: uppercase;
        }
        .header-divider {
            border-top: 1px solid #000000;
            margin: 2px 0;
        }
        .header-divider-thick {
            border-top: 2px solid #000000;
            margin: 2px 0 12px 0;
        }
        .paper-content {
            position: relative;
            z-index: 1;
            display: block;
            color: #000000 !important;
        }
        .section-heading {
            text-align: left;
            font-weight: bold;
            font-size: 15px;
            margin: 14px 0 6px 0;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            page-break-after: avoid;
            break-after: avoid;
        }
        .section-instruction {
            font-size: 13px;
            font-weight: bold;
            font-style: italic;
            margin-bottom: 8px;
        }
        .q-item {
            margin-bottom: 14px;
            font-size: 13px;
            page-break-inside: avoid;
            break-inside: avoid;
        }
        .footer-block {
            margin-top: 18px;
            page-break-inside: avoid;
            break-inside: avoid;
        }
        .footer-divider {
            border-top: 1px solid #000000;
            margin-bottom: 6px;
        }
        .paper-footer {
            font-size: 12px;
            font-weight: bold;
            text-align: right;
            color: #000000 !important;
        }
    </style>
</head>
<body>
    <div class="print-btn-bar no-print">
        <button onclick="window.print()" class="qg-btn">Print / Save to PDF</button>
        <button onclick="window.close()" class="qg-btn qg-btn-sec">Close Window</button>
    </div>

    <div class="paper-container">
        <div class="watermark-container">
            <div class="watermark-text"><?php echo htmlspecialchars($watermark_text); ?></div>
        </div>

        <div class="paper-content">
            <div class="roll-no-row">Roll No............................</div>
            <div class="header-divider"></div>

            <div class="header-main">
                <h1 class="school-title"><?php echo htmlspecialchars($school_name); ?></h1>
                <h2 class="exam-title"><?php echo htmlspecialchars($paper['exam_name'] . ' - ' . $paper['academic_year']); ?></h2>
            </div>

            <div class="header-divider"></div>

            <div class="header-meta">
                <div class="meta-left">Time: <?php echo htmlspecialchars($duration_str); ?></div>
                <div class="meta-center"><?php echo htmlspecialchars($subject_name . ' - ' . $display_class_name); ?></div>
                <div class="meta-right">M M: <?php echo htmlspecialchars(floatval($paper['max_marks'])); ?></div>
            </div>

            <div class="header-divider-thick"></div>

            <?php if (!empty($paper['instructions'])): ?>
                <div style="font-size: 12px; border: 1px solid #000000; padding: 6px 10px; margin-bottom: 12px; page-break-inside: avoid; break-inside: avoid;">
                    <strong>General Instructions:</strong>
                    <div style="white-space: pre-line; margin-top: 2px"><?php echo htmlspecialchars($paper['instructions']); ?></div>
                </div>
            <?php endif; ?>

            <?php 
            $pdf_sec_counter = 1;
            foreach ($sections as $sec): 
                $questions = qg_get_section_questions($con, $sec['id']);
                $sec_title = 'Q' . $pdf_sec_counter . (!empty($sec['name']) ? '. ' . $sec['name'] : '');
            ?>
                <div class="section-heading"><?php echo htmlspecialchars($sec_title); ?></div>

                <?php if (!empty($sec['instructions'])): ?>
                    <div class="section-instruction"><?php echo htmlspecialchars($sec['instructions']); ?></div>
                <?php endif; ?>

                <?php 
                $pdf_q_counter = 1;
                foreach ($questions as $q): 
                ?>
                    <div class="q-item">
                        <div style="display:flex; justify-content:space-between; align-items:flex-start">
                            <div style="width:90%">
                                <strong><?php echo $pdf_q_counter; ?>.</strong> <?php echo nl2br(htmlspecialchars($q['question_text'])); ?>
                            </div>
                            <div style="font-weight:bold; white-space:nowrap">[<?php echo floatval($q['marks_override'] ?? $q['marks']); ?>]</div>
                        </div>

                        <?php if (!empty($q['image_path'])): ?>
                            <div style="text-align:center; margin:8px 0">
                                <img src="../../school/<?php echo htmlspecialchars($q['image_path']); ?>" style="max-width:320px; max-height:200px; object-fit:contain; border:1px solid #ddd; border-radius:3px" />
                            </div>
                        <?php endif; ?>

                        <?php if ($q['question_type'] === 'mcq'): ?>
                            <?php $mcq_opts = qg_get_mcq_options($con, $q['id']); ?>
                            <div style="padding-left:25px; margin-top:4px; display:flex; flex-wrap:wrap">
                                <?php foreach ($mcq_opts as $opt): ?>
                                    <div style="width:50%; margin-bottom:3px; box-sizing:border-box">
                                        (<?php echo strtolower($opt['option_letter']); ?>) <?php echo htmlspecialchars($opt['option_text']); ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                        <?php elseif ($q['question_type'] === 'true_false'): ?>
                            <!-- True / False options rendered without extra blank brackets -->

                        <?php elseif ($q['question_type'] === 'matching' || $q['question_type'] === 'match_columns'): ?>
                            <?php $match_opts = qg_get_match_options($con, $q['id']); ?>
                            <table style="width:80%; margin:6px auto; font-size:12px; border-collapse:collapse">
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
                            <!-- One Word question without placeholder answer line -->
                        <?php endif; ?>
                    </div>
                <?php 
                    $pdf_q_counter++;
                endforeach; ?>
            <?php 
                $pdf_sec_counter++;
            endforeach; ?>
        </div>

        <div class="footer-block">
            <div class="footer-divider"></div>
            <div class="paper-footer">
                <div>Date - ----------------</div>
            </div>
        </div>
    </div>
</body>
</html>
