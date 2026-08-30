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


// --------------------
// Fetch all students class-wise
// --------------------
$studentsQuery = mysqli_query($con, "
    SELECT student_id, uid, student_name, student_class 
    FROM student 
    WHERE student_class='$className'
      AND status = 0
      AND student_session='$session'
    ORDER BY student_name ASC
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
