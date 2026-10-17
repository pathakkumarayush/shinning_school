<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');
require '../db.php';


// --------------------
// Validate request
// --------------------
$required = ['class', 'term', 'session'];

foreach ($required as $field) {
    if (empty($_POST[$field])) {
        echo json_encode([
            'status' => false,
            'message' => "$field is required"
        ]);
        exit;
    }
}

$class_id = $_POST['class'];
$term     = $_POST['term'];     // will match exam column
$session  = $_POST['session'];


// --------------------
// Get class info
// --------------------
$classRes = mysqli_query($con, "SELECT * FROM class WHERE class='$class_id'");
$classRow = mysqli_fetch_assoc($classRes);

if (!$classRow) {
    echo json_encode([
        'status' => false,
        'message' => 'Invalid class'
    ]);
    exit;
}

$className = $classRow['class'];


$className_esc = mysqli_real_escape_string($con, $className);
$session_esc   = mysqli_real_escape_string($con, $session);

$studentsQuery = mysqli_query($con, "
    SELECT s.student_id, s.uid, s.student_name, s.student_class, r.rno AS current_rno 
    FROM student s
    LEFT JOIN roll_no r ON (
        r.sid = s.student_id 
        AND r.ses = '$session_esc' 
        AND (r.class = s.student_class OR r.class IS NULL)
    )
    WHERE s.student_class = '$className_esc'
      AND s.status = 0
      AND s.student_session = '$session_esc'
    ORDER BY 
        CASE 
            WHEN r.rno IS NULL OR TRIM(r.rno) = '' THEN 2
            WHEN r.rno REGEXP '^[0-9]+$' THEN 0
            ELSE 1
        END ASC,
        CAST(r.rno AS UNSIGNED) ASC,
        CAST(REGEXP_REPLACE(r.rno, '[^0-9]', '') AS UNSIGNED) ASC,
        r.rno ASC,
        s.student_name ASC
");

$students = [];

while ($stu = mysqli_fetch_assoc($studentsQuery)) {

    // --------------------
    // Check attendance_remark
    // --------------------
    $remarkQuery = mysqli_query($con, "
        SELECT attend, rmk, rank
        FROM attendance_remark
        WHERE student = '".$stu['student_id']."'
          AND class = '$className'
          AND exam = '$term'
          AND session = '$session'
        LIMIT 1
    ");

    $remarkRow = mysqli_fetch_assoc($remarkQuery);

    $students[] = [
        'student_id'   => $stu['student_id'],
        'student_name' => $stu['student_name'],
        'rno'          => $stu['current_rno'] ?? '',
        'class'        => $stu['student_class'],
        'attendance'   => $remarkRow ? $remarkRow['attend'] : null,
        'remark'       => $remarkRow ? $remarkRow['rmk'] : null,
        'rank'         => $remarkRow ? $remarkRow['rank'] : null
    ];
}


// --------------------
// Final Response
// --------------------
echo json_encode([
    'status' => true,
    'data' => [
        'class'    => $className,
        'term'     => $term,
        'session'  => $session,
        'students' => $students
    ]
]);

?>
