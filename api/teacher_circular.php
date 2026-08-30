<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require 'auth.php';

session_start();

header('Content-Type: application/json');

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
$type_ids = $_POST['type_ids'] ?? null;
$imageFile = $_FILES['image'] ?? null;

// Validate inputs
$errors = [];

if (empty($request['message'])) $errors[] = "Message is required.";
if (empty($request['date'])) $errors[] = "Date is required.";
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

    // Handle image upload
    if ($imageFile && $imageFile['error'] === UPLOAD_ERR_OK) {
        $uploadedPath = uploadImage('../school/uploads/circular', $imageFile);
        if ($uploadedPath) {
            $imagePath = $uploadedPath;
        }
    }

    $userId = $request['admin_id'];
    $type = 'teacher';
    $circularType = 'teacher';
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
	
      if (!empty($type_ids) && is_array($type_ids)) {
				// Escape and prepare teacher_id list
				$ids = array_map(function($id) use ($con) {
					return "'" . mysqli_real_escape_string($con, $id) . "'";
				}, $type_ids);
				$idsList = implode(",", $ids);

				// ✅ Fetch all teachers in one query
				$teacherQuery = "SELECT * FROM teacher 
								 WHERE teacher_id IN ($idsList)";
				$teacherRes = mysqli_query($con, $teacherQuery);

				$user_ids = [];
				$teacher_usernames = [];

				if ($teacherRes && mysqli_num_rows($teacherRes) > 0) {
					while ($teacher = mysqli_fetch_assoc($teacherRes)) {
						if (!empty($teacher['uid'])) {
							$user_ids[] = $teacher['uid'];
						}

					}
				}

                // ✅ Notification message with teacher_username + name
                $data = [
                    'title' => "Admin Add Circular",
                    'description' => 'check circular',
                    'type' => 'attendance',
                    'type_id' => 1,
                    'image' => null
                ];

                if (!empty($user_ids)) {
                    send_push_notif_to_device($con, $user_ids, $data);
                }
            }
        

    respond([
        'success' => true,
        'message' => 'Teacher circular saved successfully.',
    ]);
} catch (Exception $e) {
    $con->rollback();
    respond([
        'success' => false,
        'message' => 'Failed to save teacher circular.',
        'error' => $e->getMessage() // Remove in production
    ], 500);
}