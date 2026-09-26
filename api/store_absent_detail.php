<?php
ini_set('display_errors', 0);
header('Content-Type: application/json');
require '../db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only POST method is allowed']);
    exit;
}

$data = $_POST;

// ✅ session, class, date are still required; student can be empty (means all-present)
if (
    !isset($data['session']) || trim($data['session']) === '' ||
    !isset($data['class'])   || trim($data['class']) === ''   ||
    !isset($data['date'])    || trim($data['date']) === ''
) {
    http_response_code(422);
    echo json_encode(['status' => false, 'message' => 'Missing required parameters: session, class, date']);
    exit;
}

$session    = mysqli_real_escape_string($con, trim($data['session']));
$class      = mysqli_real_escape_string($con, trim($data['class']));
$date_input = trim($data['date']);
$remark     = isset($data['rmk']) ? mysqli_real_escape_string($con, trim($data['rmk'])) : null;

$date_obj = DateTime::createFromFormat('d-m-Y', $date_input);
if (!$date_obj) {
    http_response_code(400);
    echo json_encode(['status' => false, 'message' => 'Invalid date format. Use d-m-Y']);
    exit;
}
$date  = $date_obj->format('d-m-Y');
$month = $date_obj->format('M');

// ✅ If student field is empty/missing → all students are present; nothing to record
$studentRaw = isset($data['student']) ? trim($data['student']) : '';
if ($studentRaw === '') {
    echo json_encode([
        'status'   => true,
        'message'  => 'Attendance marked – all students present',
        'inserted' => 0,
        'updated'  => 0,
        'errors'   => []
    ]);
    exit;
}

// Parse comma-separated student IDs
$students = array_filter(array_map('trim', explode(',', $studentRaw)));

$errors   = [];
$updated  = 0;
$inserted = 0;

foreach ($students as $student) {
    $student = mysqli_real_escape_string($con, $student);

    // Check if the record already exists
    $checkQuery = "
        SELECT id FROM absentdetail 
        WHERE student = '$student' AND date = '$date' AND session = '$session' AND class = '$class'
    ";
    $result = mysqli_query($con, $checkQuery);

    if ($result && mysqli_num_rows($result) > 0) {
        // Record exists — update it
        $updateQuery = "
            UPDATE absentdetail 
            SET absent = 'absent', month = '$month', rmk = " . ($remark !== null ? "'$remark'" : "NULL") . "
            WHERE student = '$student' AND date = '$date' AND session = '$session' AND class = '$class'
        ";
        if (mysqli_query($con, $updateQuery)) {
            $updated++;
        } else {
            $errors[] = "Update failed for '$student': " . mysqli_error($con);
        }
    } else {
        // Record does not exist — insert new one
        $insertQuery = "
            INSERT INTO absentdetail (student, date, session, class, absent, month, rmk)
            VALUES ('$student', '$date', '$session', '$class', 'absent', '$month', " . ($remark !== null ? "'$remark'" : "NULL") . ")
        ";
        if (mysqli_query($con, $insertQuery)) {
            // ✅ Push notification (best-effort, function may not be defined yet)
            if (function_exists('send_push_notif_to_device')) {
                $stuQ  = "SELECT uid FROM student WHERE student_session='$session' AND student_class='$class' AND student_id='$student'";
                $stuR  = mysqli_query($con, $stuQ);
                $uids  = [];
                if ($stuR) {
                    while ($row = mysqli_fetch_assoc($stuR)) {
                        if (!empty($row['uid'])) $uids[] = $row['uid'];
                    }
                }
                if (!empty($uids)) {
                    send_push_notif_to_device($con, $uids, [
                        'title'       => 'Teacher update attendance',
                        'description' => 'You are absent on ' . $date,
                        'type'        => 'attendance',
                        'type_id'     => 1,
                        'image'       => null
                    ]);
                }
            }
            $inserted++;
        } else {
            $errors[] = "Insert failed for '$student': " . mysqli_error($con);
        }
    }
}

echo json_encode([
    'status'   => count($errors) === 0,
    'message'  => "$inserted inserted, $updated updated.",
    'inserted' => $inserted,
    'updated'  => $updated,
    'errors'   => $errors
]);
