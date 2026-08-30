<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

header('Content-Type: application/json');
require '../db.php';


# -------------------------
# Validate required fields
# -------------------------
$required = ['term','co_term','class','student_id','session','marks'];

foreach ($required as $f) {
    if (!isset($_POST[$f])) {
        echo json_encode([
            'status'=>false,
            'message'=>"$f is required"
        ]);
        exit;
    }
}

$term    = $_POST['term'];
$exam    = $_POST['co_term'];
$class   = $_POST['class'];
$student = $_POST['student_id'];
$session = $_POST['session'];

$marksData = json_decode($_POST['marks'], true);

if (!is_array($marksData)) {
    echo json_encode([
        'status'=>false,
        'message'=>'marks must be valid JSON array'
    ]);
    exit;
}

$inserted = 0;
$updated  = 0;


# -------------------------
# Loop marks array
# -------------------------
foreach ($marksData as $m) {

    $subject  = $m['subject'] ?? '';
    $suffix   = $m['subject_suffix'] ?? '';
    $marks    = $m['obtainmarks'] ?? null;
    $per      = $m['obtainper'] ?? 70;
    $total    = $m['total'] ?? 0;
    $division = $m['division'] ?? 'PASS';
    $status   = $m['status'] ?? 'pass';


    # -------- Check existing --------
    $check = mysqli_query($con, "
        SELECT id FROM marks_co
        WHERE student='$student'
          AND class='$class'
          AND exam='$exam'
          AND term='$term'
          AND ses='$session'
          AND subject='$subject'
        LIMIT 1
    ");

    if (mysqli_num_rows($check) > 0) {

        # -------- UPDATE --------
        mysqli_query($con, "
            UPDATE marks_co SET
                obtainmarks='$marks',
                obtainper='$per',
                total='$total',
                division='$division',
                status='$status'
            WHERE student='$student'
              AND class='$class'
              AND exam='$exam'
              AND term='$term'
              AND ses='$session'
              AND subject='$subject'
        ");

        $updated++;

    } else {

        # -------- INSERT --------
        mysqli_query($con, "
            INSERT INTO marks_co
            (student,class,exam,term,ses,
             subject,subject_suffix,
             obtainmarks,obtainper,total,
             division,status)
            VALUES
            ('$student','$class','$exam','$term','$session',
             '$subject','$suffix',
             '$marks','$per','$total',
             '$division','$status')
        ");

        $inserted++;
    }
}
$resultData = [];

$res = mysqli_query($con, "
    SELECT student,class,exam,term,ses,
           subject,subject_suffix,
           obtainmarks,obtainper,total,
           division,status
    FROM marks_co
    WHERE student='$student'
      AND class='$class'
      AND exam='$exam'
      AND term='$term'
      AND ses='$session'
    ORDER BY subject_suffix ASC
");

while ($row = mysqli_fetch_assoc($res)) {
    $resultData[] = $row;
}

# -------------------------
# Response
# -------------------------
echo json_encode([
    'status'=>true,
    'inserted'=>$inserted,
    'updated'=>$updated,
	 'data'=>$resultData,
    'message'=>'Co-scholastic marks saved successfully'
]);
