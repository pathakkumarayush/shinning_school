<?php
/**
 * Local Verification and Testing Script
 */

ini_set('display_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/../db.php';
require __DIR__ . '/upload_helper.php';
require __DIR__ . '/student_repository.php';

echo "=== STARTING VERIFICATION ===\n\n";

// 1. Check if database is connected
if ($con) {
    echo "✓ Database connected successfully.\n";
} else {
    echo "✗ Database connection failed.\n";
    exit;
}

// 2. Find a real student from the database
$res = mysqli_query($con, "SELECT student_id, student_session, student_class, student_name FROM student WHERE status = 0 LIMIT 1");
if ($res && mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
    $testId = $row['student_id'];
    $testSession = $row['student_session'];
    $testClass = $row['student_class'];
    $testName = $row['student_name'];
    echo "✓ Found test student: '$testName' (ID: $testId, Session: $testSession, Class: $testClass).\n";
} else {
    echo "✗ No test students found in 'student' table.\n";
    exit;
}

// 3. Test StudentRepository
$repo = new StudentRepository($con);
$student = $repo->findByIdAndSession($testId, $testSession);
if ($student && $student['student_id'] == $testId) {
    echo "✓ StudentRepository::findByIdAndSession works.\n";
} else {
    echo "✗ StudentRepository::findByIdAndSession failed.\n";
}

$classStudents = $repo->findByClassAndSession($testClass, $testSession);
if (!empty($classStudents)) {
    echo "✓ StudentRepository::findByClassAndSession works (Found " . count($classStudents) . " students).\n";
} else {
    echo "✗ StudentRepository::findByClassAndSession failed.\n";
}

// 4. Test UploadHelper
echo "\nTesting UploadHelper and Compression:\n";

// Check if GD extension is loaded in PHP environment
$gdEnabled = extension_loaded('gd');
echo "  GD Library: " . ($gdEnabled ? "ENABLED" : "DISABLED") . "\n";

// Create a dummy large image to test compression
$testDir = dirname(__DIR__) . '/school/document/';
if (!is_dir($testDir)) {
    mkdir($testDir, 0777, true);
}

$largeDummyPath = $testDir . 'large_dummy_test.jpg';
$compressedDummyPath = $testDir . 'compressed_dummy_test.jpg';

// Create a 2000x2000 image filled with solid color to simulate a large image (GD must be enabled to do this)
if ($gdEnabled) {
    $img = imagecreatetruecolor(2000, 2000);
    $color = imagecolorallocate($img, 255, 100, 100);
    imagefill($img, 0, 0, $color);
    
    // Save image with very high quality (creating a file of about 250KB - 500KB)
    imagejpeg($img, $largeDummyPath, 100);
    imagedestroy($img);
    
    $origSize = filesize($largeDummyPath);
    echo "  Created large dummy image: " . round($origSize / 1024, 2) . " KB\n";

    // Run compression
    try {
        $result = UploadHelper::compressImage($largeDummyPath, $compressedDummyPath, 100);
        if ($result && file_exists($compressedDummyPath)) {
            $compSize = filesize($compressedDummyPath);
            echo "  ✓ Compression complete.\n";
            echo "  ✓ Compressed image size: " . round($compSize / 1024, 2) . " KB (Target: < 100 KB)\n";
            
            // Clean up test images
            unlink($largeDummyPath);
            unlink($compressedDummyPath);
        } else {
            echo "  ✗ Compression algorithm failed.\n";
        }
    } catch (Exception $e) {
        echo "  ✗ Compression exception: " . $e->getMessage() . "\n";
    }
} else {
    echo "  ! Skipping GD image compression test because GD library is not enabled in CLI PHP.\n";
}

// 5. Test original filename extractor
$stored = $testId . "adhmy_aadhar_card.png";
$extracted = UploadHelper::getOriginalFilename($stored, $testId, "adh");
if ($extracted === "my_aadhar_card.png") {
    echo "✓ Original filename extractor works perfectly.\n";
} else {
    echo "✗ Original filename extractor failed (returned: '$extracted').\n";
}

echo "\n=== VERIFICATION COMPLETE ===\n";
