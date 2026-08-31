<?php
require_once __DIR__ . '/../db.php';

// Check if index already exists on student_scholar
$indexExists = false;
$indexRes = mysqli_query($con, "SHOW INDEX FROM `student` WHERE Key_name = 'idx_student_scholar'");
if ($indexRes && mysqli_num_rows($indexRes) > 0) {
    $indexExists = true;
}

if (!$indexExists) {
    $alterQuery = "ALTER TABLE `student` ADD INDEX `idx_student_scholar` (`student_scholar`)";
    if (mysqli_query($con, $alterQuery)) {
        echo "Index idx_student_scholar added successfully.\n";
    } else {
        echo "Failed to add index or index already exists: " . mysqli_error($con) . "\n";
    }
} else {
    echo "Index idx_student_scholar already exists.\n";
}

