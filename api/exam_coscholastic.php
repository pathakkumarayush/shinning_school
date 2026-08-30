<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');
require '../db.php';


// --------------------
// Validate POST
// --------------------
$required = ['class', 'term', 'session', 'co_term'];

foreach ($required as $f) {
    if (empty($_POST[$f])) {
        echo json_encode([
            'status' => false,
            'message' => "$f is required"
        ]);
        exit;
    }
}

$class_id = $_POST['class'];
$term     = $_POST['term'];
$session  = $_POST['session'];
$co_term  = $_POST['co_term'];   // exam


// --------------------
// Get class info
// --------------------
$classRes = mysqli_query($con, "SELECT * FROM class WHERE class='$class_id'");
$classRow = mysqli_fetch_assoc($classRes);

if (!$classRow) {
    echo json_encode(['status'=>false,'message'=>'Invalid class']);
    exit;
}

$className = $classRow['class'];
$classSec  = $classRow['class_section'];
$fullClass = $className . $classSec;


// --------------------
// Get Co-Scholastic Subjects
// --------------------
$subRes = mysqli_query($con, "
    SELECT subject, marks 
    FROM exam_coscholastic
    WHERE class='$fullClass'
      AND examination='$co_term'
      AND session='$session'
");

$subjects = [];
while ($s = mysqli_fetch_assoc($subRes)) {
    $subjects[] = $s;
}


// --------------------
// Get Students
// --------------------
$stuRes = mysqli_query($con, "
    SELECT student_id, uid, student_name, student_class, student_section
    FROM student
    WHERE student_class='$className'
     
      AND student_session='$session'
      AND status='0'
    ORDER BY student_name ASC
");

$students = [];

while ($stu = mysqli_fetch_assoc($stuRes)) {

    $stuData = [
        'student_id'   => $stu['student_id'],
        'uid'          => $stu['uid'],
        'student_name' => $stu['student_name'],
        'subjects'     => []
    ];

    // loop subjects like your page (subject_suffix index based)
    foreach ($subjects as $idx => $sub) {

        $marksRes = mysqli_query($con, "
            SELECT obtainmarks
            FROM marks_co
            WHERE student='".$stu['uid']."'
              AND exam='$co_term'
              AND term='$term'
              AND class='$className'
              AND ses='$session'
              AND subject='".$sub['subject']."'
        ");

        $marksRow = mysqli_fetch_assoc($marksRes);

        $stuData['subjects'][] = [
            'subject'      => $sub['subject'],
            'obtainmarks'  => $marksRow ? $marksRow['obtainmarks'] : null,
			'subject_suffix' => $idx,
            'obtainper'    => 70,
            'total'        => 0
        ];
    }

    $students[] = $stuData;
}


// --------------------
// Response
// --------------------
echo json_encode([
    'status' => true,
    'data' => [
        'class'    => $fullClass,
        'term'     => $term,
        'co_term'  => $co_term,
        'session'  => $session,
        'subjects' => $subjects,
        'students' => $students
    ]
]);
