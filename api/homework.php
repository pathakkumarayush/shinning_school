<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require 'auth.php';
header('Content-Type: application/json');


session_start();

$response = ['status' => false];
$errors = [];

// ✅ Only allow POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only POST method allowed']);
    exit;
}

// ✅ Required field checks
$class = $_POST["class"] ?? '';
$homwork = $_POST["homework"] ?? '';
$datefrom = $_POST["datefrom"] ?? '';
$dateto = $_POST["dateto"] ?? '';
$assign_by = $session_uid ?? '';
$school = 'scottish';
$session =  $_POST["session"];

if (!$class) $errors[] = "Class is required.";
if (!$homwork) $errors[] = "Homework description is required.";
if (!$datefrom || !$dateto) $errors[] = "Date range is required.";
if (!$session) $errors[] = "Session is required.";
if (!$assign_by) $errors[] = "Session expired. Please login again.";

$image = '';

if (!empty($_FILES['image']['name'])) {
    $allowedTypes = ['jpg', 'jpeg', 'png', 'pdf'];
    $maxSize = 5 * 1024 * 1024;
    $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

    if (!in_array($ext, $allowedTypes)) {
        $errors[] = "Only JPG, JPEG, PNG, and PDF files are allowed.";
    }
    if ($_FILES['image']['size'] > $maxSize) {
        $errors[] = "File must be under 5MB.";
    }
    if ($_FILES['image']['error'] !== 0) {
        $errors[] = "Error uploading file.";
    }

    if (empty($errors)) {
        $uploadDir = "../school/uploads/homework/";
        if (!file_exists($uploadDir)) mkdir($uploadDir, 0777, true);

        $originalName = preg_replace("/[^a-zA-Z0-9.\-_]/", "_", basename($_FILES['image']['name']));
        $targetPath = $uploadDir . $originalName;
        $tempPath = $_FILES['image']['tmp_name'];

        if (in_array($ext, ['jpg', 'jpeg', 'png'])) {
            if (compressImage($tempPath, $targetPath, 60)) {
                $image = $originalName;
            } else {
                $errors[] = "Failed to compress image.";
            }
        } elseif ($ext === 'pdf') {
            if (move_uploaded_file($tempPath, $targetPath)) {
                if (compressPDF($targetPath, $targetPath)) {
                    $image = $originalName;
                } else {
                    $errors[] = "PDF compression failed.";
                }
            } else {
                $errors[] = "PDF upload failed.";
            }
        }
    }
}
if (!empty($datefrom)) {
    $datefrom = date("d-M-Y", strtotime(str_replace("/", "-", $datefrom)));
}
if (!empty($dateto)) {
    $dateto = date("d-M-Y", strtotime(str_replace("/", "-", $dateto)));
}

// ✅ If valid, insert into DB
if (empty($errors)) {
    $qry = "INSERT INTO homework(class_id, assign_by, homwork, school, datefrom, dateto, image, session)
            VALUES (
                '".mysqli_real_escape_string($con, $class)."',
                '".mysqli_real_escape_string($con, $assign_by)."',
                '".mysqli_real_escape_string($con, $homwork)."',
                '".mysqli_real_escape_string($con, $school)."',
                '".mysqli_real_escape_string($con, $datefrom)."',
                '".mysqli_real_escape_string($con, $dateto)."',
                '".mysqli_real_escape_string($con, $image)."',
                 '".mysqli_real_escape_string($con, $session)."'
            )";

    if (mysqli_query($con, $qry)) {
        http_response_code(200);


		  
        echo json_encode(['status' => true, 'message' => 'Homework submitted successfully']);
    } else {
        http_response_code(500);
        echo json_encode(['status' => false, 'message' => 'Database insert failed']);
    }
} else {
    http_response_code(400);
    echo json_encode(['status' => false, 'errors' => $errors]);
}

// ---------- Image Compression Function ----------
function compressImage($sourcePath, $destinationPath, $quality = 60) {
    $info = getimagesize($sourcePath);
    if ($info['mime'] == 'image/jpeg') {
        $image = imagecreatefromjpeg($sourcePath);
    } elseif ($info['mime'] == 'image/png') {
        $image = imagecreatefrompng($sourcePath);
        $white = imagecreatetruecolor(imagesx($image), imagesy($image));
        $bg = imagecolorallocate($white, 255, 255, 255);
        imagefill($white, 0, 0, $bg);
        imagecopy($white, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
        $image = $white;
    } else {
        return false;
    }
    return imagejpeg($image, $destinationPath, $quality);
}

// ---------- PDF Compression ----------
function compressPDF($source, $destination) {
    $cmd = "gs -sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -dPDFSETTINGS=/screen ".
           "-dNOPAUSE -dQUIET -dBATCH -sOutputFile=" . escapeshellarg($destination) . " " . escapeshellarg($source);
    exec($cmd, $output, $return);
    return ($return === 0);
}
?>
