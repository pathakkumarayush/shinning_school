<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');
require '../db.php';

$required = ['session','student_id','class','term'];

foreach ($required as $f) {
    if (!isset($_POST[$f])) {
        echo json_encode([
            'status'=>false,
            'message'=>"$f is required"
        ]);
        exit;
    }
}

$session    = $_POST['session'];
$student    = $_POST['student_id'];
$class      = $_POST['class'];
$term       = $_POST['term'];     // exam column
$attendance = $_POST['attendance'] ?? null;
$remark     = $_POST['remark'] ?? null;
$rank       = $_POST['rank'] ?? null;


# -------------------------
# Check Existing
# -------------------------
$check = mysqli_query($con, "
    SELECT id FROM attendance_remark
    WHERE student='$student'
      AND class='$class'
      AND exam='$term'
      AND session='$session'
    LIMIT 1
");

if (mysqli_num_rows($check) > 0) {

    // UPDATE
    mysqli_query($con, "
        UPDATE attendance_remark SET
            attend='$attendance',
            rmk='$remark',
            rank='$rank'
        WHERE student='$student'
          AND class='$class'
          AND exam='$term'
          AND session='$session'
    ");

    echo json_encode([
        'status'=>true,
        'action'=>'updated'
    ]);

} else {

    // INSERT
    mysqli_query($con, "
        INSERT INTO attendance_remark
        (attend, rmk, rank, student, class, exam, session)
        VALUES
        ('$attendance','$remark','$rank',
         '$student','$class','$term','$session')
    ");

    echo json_encode([
        'status'=>true,
        'action'=>'inserted'
    ]);
}
