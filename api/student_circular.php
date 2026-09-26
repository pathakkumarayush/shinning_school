<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require 'auth.php';
header('Content-Type: application/json');

session_start();

// Validate method
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only POST method allowed']);
    exit;
}

// Function to return JSON response
function respond($data, $code = 200) {
    http_response_code($code);
    echo json_encode($data);
    exit;
}

// Upload image function
function uploadImage($folder, $file) {
    $targetDir = __DIR__ . '/' . $folder . '/';
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    $fileName = uniqid() . '_' . basename($file['name']);
    $targetFile = $targetDir . $fileName;

    if (move_uploaded_file($file['tmp_name'], $targetFile)) {
        return $fileName;
    }
    return null;
}

// Get data from POST
$request = $_POST; 
$type_ids =  $_POST['type_ids'] ?? null;
$imageFile = $_FILES['image'] ?? null;

// Validate inputs
$errors = [];

if (empty($request['message'])) $errors[] = "Message is required.";
if (empty($request['date'])) $errors[] = "Date is required.";
if (empty($request['circular_type']) || !in_array($request['circular_type'], ['class', 'student'])) {
    $errors[] = "Circular type must be 'class' or 'student'.";
}
if (empty($request['session_id'])) $errors[] = "Session ID is required.";
if (empty($request['admin_id'])) $errors[] = "Admin ID is required.";
if (!is_array($type_ids) || empty($type_ids)) $errors[] = "Type IDs must be an array and not empty.";

if ($errors) {
    respond(['success' => false, 'errors' => $errors], 400);
}

try {
    $con->begin_transaction();

    $isUpdate = !empty($request['circular_id']);
    $imagePath = null;

    if ($isUpdate) {
        $stmt = $con->prepare("SELECT * FROM circulars WHERE id = ?");
        $stmt->bind_param("i", $request['circular_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $circular = $result->fetch_assoc();
        $imagePath = $circular['image'] ?? null;
    }

    // Handle image
    if ($imageFile && $imageFile['error'] === UPLOAD_ERR_OK) {
        $uploadedPath = uploadImage('../school/uploads/circular', $imageFile);
        if ($uploadedPath) {
            $imagePath = $uploadedPath;
        }
    }

    $userId = $request['admin_id'];
    $type = 'student';
    $circularType = $request['circular_type'];
    $jsonTypeIds = json_encode($type_ids);
    $message = $request['message'];
    $date = $request['date'];
    $session = $request['session_id'];

    if ($isUpdate) {
        $circularId = $request['circular_id'];
        $stmt = $con->prepare("UPDATE circulars SET user_id = ?, type = ?, circular_type = ?, type_id = ?, message = ?, image = ?, date = ?, session = ? WHERE id = ?");
        $stmt->bind_param("ssssssssi", $userId, $type, $circularType, $jsonTypeIds, $message, $imagePath, $date, $session, $circularId);
    } else {
        $stmt = $con->prepare("INSERT INTO circulars (user_id, type, circular_type, type_id, message, image, date, session) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $userId, $type, $circularType, $jsonTypeIds, $message, $imagePath, $date, $session);
    }

    $stmt->execute();
    $con->commit();
	
	$user_ids = [];

		if ($circularType == 'class') {
			// type_ids is an array of class IDs
			$classIds = implode("','", array_map('mysqli_real_escape_string', array_fill(0, count($type_ids), $con), $type_ids));
			$query = "SELECT uid FROM student WHERE student_session = '" . mysqli_real_escape_string($con, $session) . "' 
					  AND student_class IN ('$classIds')";
			$result = mysqli_query($con, $query);

			if ($result && mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
					if (!empty($row['uid'])) {
						$user_ids[] = $row['uid'];
					}
				}
			}

		} elseif ($circularType == 'student') {
			// type_ids is an array of student IDs
			$studentIds = implode("','", array_map('mysqli_real_escape_string', array_fill(0, count($type_ids), $con), $type_ids));
			$query = "SELECT uid FROM student WHERE student_session = '" . mysqli_real_escape_string($con, $session) . "' 
					  AND student_id IN ('$studentIds')";
			$result = mysqli_query($con, $query);

			if ($result && mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
					if (!empty($row['uid'])) {
						$user_ids[] = $row['uid'];
					}
				}
			}
		}

		// ✅ Only send notification if we found some uids
		if (!empty($user_ids)) {
			$data = [
				'title'       => "Admin Add New Circular ",
				'description' => 'check your circular ',
				'type'        => 'circular',
				'type_id'     => 1,
				'image'       => null
			];
			send_push_notif_to_device($con, $user_ids, $data);
		}

    respond([
        'success' => true,
        'message' => 'Circular saved successfully.',
    ]);
} catch (Exception $e) {
    $con->rollback();
    respond([
        'success' => false,
        'message' => 'Failed to save circular.',
        'error' => $e->getMessage() // Hide in production
    ], 500);
}

