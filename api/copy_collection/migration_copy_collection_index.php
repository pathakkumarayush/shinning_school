<?php
/**
 * Database Migration: Ensure primary key, auto_increment, and indexes on exam_copy_collection
 */

require_once __DIR__ . '/../../db.php';

// Check if primary key exists
$pkRes = mysqli_query($con, "SHOW KEYS FROM `exam_copy_collection` WHERE Key_name = 'PRIMARY'");
if (!$pkRes || mysqli_num_rows($pkRes) === 0) {
    // Check if there are any duplicate or 0 IDs
    $dupCheck = mysqli_query($con, "SELECT id, COUNT(*) as c FROM `exam_copy_collection` GROUP BY id HAVING c > 1");
    if ($dupCheck && mysqli_num_rows($dupCheck) > 0) {
        $allRows = mysqli_query($con, "SELECT student, class, exam, subject, session FROM `exam_copy_collection`");
        $counter = 1;
        while ($r = mysqli_fetch_assoc($allRows)) {
            $student_esc = mysqli_real_escape_string($con, $r['student']);
            $class_esc   = mysqli_real_escape_string($con, $r['class']);
            $exam_esc    = mysqli_real_escape_string($con, $r['exam']);
            $sub_esc     = mysqli_real_escape_string($con, $r['subject']);
            $sess_esc    = mysqli_real_escape_string($con, $r['session']);
            mysqli_query($con, "UPDATE `exam_copy_collection` SET id = $counter WHERE student = '$student_esc' AND class = '$class_esc' AND exam = '$exam_esc' AND subject = '$sub_esc' AND session = '$sess_esc' LIMIT 1");
            $counter++;
        }
    }
    mysqli_query($con, "ALTER TABLE `exam_copy_collection` ADD PRIMARY KEY (`id`)");
}

// Ensure AUTO_INCREMENT
mysqli_query($con, "ALTER TABLE `exam_copy_collection` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");

// Add Index for (session, class, exam, subject)
$idxRes = mysqli_query($con, "SHOW KEYS FROM `exam_copy_collection` WHERE Key_name = 'idx_copy_class_exam'");
if (!$idxRes || mysqli_num_rows($idxRes) === 0) {
    mysqli_query($con, "CREATE INDEX `idx_copy_class_exam` ON `exam_copy_collection` (`session`, `class`(50), `exam`(50), `subject`(50))");
}

// Add Index for student
$idxStud = mysqli_query($con, "SHOW KEYS FROM `exam_copy_collection` WHERE Key_name = 'idx_copy_student'");
if (!$idxStud || mysqli_num_rows($idxStud) === 0) {
    mysqli_query($con, "CREATE INDEX `idx_copy_student` ON `exam_copy_collection` (`student`)");
}

echo "Migration for exam_copy_collection completed successfully.\n";
