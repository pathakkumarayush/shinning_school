<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');
require '../db.php';

// --------------------
// Validate request
// --------------------
$required = ['term', 'exam', 'class_id', 'session'];
foreach ($required as $field) {
    if (empty($_POST[$field])) {
        echo json_encode(['status' => false, 'message' => "$field is required"]);
        exit;
    }
}

$teacher_id   = $_POST['teacher_id'] ?? null;
$teacher_type = $_POST['type'] ?? null;
$term         = $_POST['term'];
$exam         = $_POST['exam'];
$class_id     = $_POST['class_id'];
$session      = $_POST['session'];

// --------------------
// Get class info
// --------------------
$classRes = mysqli_query($con, "SELECT * FROM class WHERE class='$class_id'");
$classRow = mysqli_fetch_assoc($classRes);

if (!$classRow) {
    echo json_encode(['status' => false, 'message' => "Invalid class"]);
    exit;
}

$className = $classRow['class'];
$fullClass = $className;

// --------------------
// Fetch all exam subjects for this class
// --------------------
$subjectsQuery = mysqli_query($con, "
    SELECT * FROM exam 
    WHERE class='$fullClass' 
      AND examination='$exam' 
      AND session='$session'
");

$subjects = [];
while ($row = mysqli_fetch_assoc($subjectsQuery)) {
    $subjects[] = [
        'subject'    => $row['subject'],
        'max_marks'  => ($exam == 'MID TERM' || $exam == 'Annual') && $row['subject'] == 'COMPUTER'
                        ? 100
                        : $row['marks']
    ];
}

// --------------------
// Determine allowed subjects for this teacher
// --------------------
$allowedSubjects = [];

if ($teacher_id && $teacher_type) {
    if ($teacher_type == 'subject_teacher') {
        // Subject teacher → only assigned subjects
        $subQuery = "
            SELECT DISTINCT sub 
            FROM class_teacher_sub 
            WHERE teacher = '$teacher_id'
              AND class = '$fullClass'
              AND teacher_session = '$session'
        ";
		
        $subResult = mysqli_query($con, $subQuery);
	
        while ($subRow = mysqli_fetch_assoc($subResult)) {
            $allowedSubjects[] = $subRow['sub'];
        }
    } else {
		
		 $subQuery = "
            SELECT *
            FROM class_teacher 
            WHERE teacher = '$teacher_id'
              AND class = '$fullClass'
              AND teacher_session = '$session'
        ";
		
        $subResult = mysqli_query($con, $subQuery);
		
		if ($subResult && mysqli_num_rows($subResult) > 0) {
			
               // Class teacher or admin → all subjects
          foreach ($subjects as $s) {
            $allowedSubjects[] = $s['subject'];
          }
		}
	}
       
    
} else {
	
	if($teacher_id){
	      $subQuery = "
            SELECT *
            FROM class_teacher 
            WHERE teacher = '$teacher_id'
              AND class = '$fullClass'
              AND teacher_session = '$session'
        ";
		
        $subResult = mysqli_query($con, $subQuery);
		if ($subResult && mysqli_num_rows($subResult) > 0) {
			// Class teacher or admin → all subjects
          foreach ($subjects as $s) {
            $allowedSubjects[] = $s['subject'];
          }
		}
	}else{
		 // Class teacher or admin → all subjects
          foreach ($subjects as $s) {
            $allowedSubjects[] = $s['subject'];
          }
	}
              
		
}

// --------------------
// Fetch all students for this class
// --------------------
$className_esc = mysqli_real_escape_string($con, $className);
$session_esc   = mysqli_real_escape_string($con, $session);

$studentsQuery = mysqli_query($con, "
    SELECT s.*, r.rno AS current_rno 
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

while ($student = mysqli_fetch_assoc($studentsQuery)) {
    $studentData = [
        'student_id'       => $student['student_id'],
        'student_username' => $student['uid'],
        'student_name'     => $student['student_name'],
        'rno'              => $student['current_rno'] ?? '',
        'class'            => $student['student_class'],
        'mobile'           => $student['student_contactno'],
        'subjects'         => []
    ];

    // For each subject, fetch existing marks if available
    foreach ($subjects as $index => $sub) {
        $subName = $sub['subject'];

        $marksRes = mysqli_query($con, "
            SELECT obtainmarks 
            FROM marks 
            WHERE student='" . $student['uid'] . "' 
              AND exam='$exam' 
              AND class='$className' 
              AND ses='$session' 
              AND subject_suffix=$index
        ");
        $marksRow = mysqli_fetch_assoc($marksRes);
        $obtainMarks = $marksRow ? $marksRow['obtainmarks'] : null;

        $status = in_array($subName, $allowedSubjects) ? 1 : 0;

        $studentData['subjects'][] = [
            'subject'       => $subName,
            'max_marks'     => $sub['max_marks'],
            'obtain_marks'  => $obtainMarks,
            'status'        => $status
        ];
    }

    $students[] = $studentData;
}

// --------------------
// Final JSON Response
// --------------------
echo json_encode([
    'status' => true,
    'data' => [
        'class'    => $fullClass,
        'exam'     => $exam,
        'term'     => $term,
        'session'  => $session,
        'students' => $students,
        'subjects' => $subjects
    ]
]);
?>
