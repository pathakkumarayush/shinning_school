<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'auth.php';
header('Content-Type: application/json');


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only POST method is allowed']);
    exit;
}

$data = $_POST;

$required = ['admin_id', 'staff_id', 'title', 'start_date', 'end_date', 'session'];
$missing = [];

foreach ($required as $field) {
    if (empty($data[$field])) {
        $missing[] = $field;
    }
}

if (!empty($missing)) {
    http_response_code(422);
    echo json_encode([
        'status' => false,
        'message' => 'Missing required fields: ' . implode(', ', $missing)
    ]);
    exit;
}

// Escape inputs
$admin_id       = mysqli_real_escape_string($con, $data['admin_id']);
$staff_id       = mysqli_real_escape_string($con, $data['staff_id']);
$title          = mysqli_real_escape_string($con, $data['title']);
$description    = mysqli_real_escape_string($con, $data['description'] ?? '');
$start_date     = mysqli_real_escape_string($con, $data['start_date']);
$end_date       = mysqli_real_escape_string($con, $data['end_date']);
$completed_date = isset($data['completed_date']) ? "'" . mysqli_real_escape_string($con, $data['completed_date']) . "'" : "NULL";
$session        = mysqli_real_escape_string($con, $data['session']);
$status         = isset($data['status']) ? mysqli_real_escape_string($con, $data['status']) : 'pending';
$created_at     = date('Y-m-d H:i:s');

// Check if task_id is present
if (!empty($data['task_id'])) {
    $task_id = mysqli_real_escape_string($con, $data['task_id']);

    $query = "UPDATE tasks SET 
        admin_id = '$admin_id',
        staff_id = '$staff_id',
        title = '$title',
        description = '$description',
        start_date = '$start_date',
        end_date = '$end_date',
        completed_date = $completed_date,
        session = '$session',
        status = '$status'
        WHERE id = '$task_id'";

    $result = mysqli_query($con, $query);

    if ($result) {
		
        echo json_encode([
            'status' => true,
            'message' => 'Task updated successfully'
        ]);
    } else {
        http_response_code(500);
        echo json_encode([
            'status' => false,
            'message' => 'Database error: ' . mysqli_error($con)
        ]);
    }

} else {
    $query = "INSERT INTO tasks 
        (admin_id, staff_id, title, description, start_date, end_date, completed_date, created_at, session, status)
        VALUES (
            '$admin_id', '$staff_id', '$title', '$description', 
            '$start_date', '$end_date', $completed_date, 
            '$created_at', '$session', '$status'
        )";

    $result = mysqli_query($con, $query);

    if ($result) {
		$query = "SELECT * FROM teacher WHERE teacher_id = '".$staff_id."'";
		$result = mysqli_query($con, $query);

		if ($result || mysqli_num_rows($result) > 0) {
			$user_ids= [];
			while ($row = mysqli_fetch_assoc($result)) {
				if (!empty($row['teacher_username'])) {   // ✅ make sure uid exists
					$user_ids[] = $row['teacher_username'];
				}
			}
			$data = [
				 'title' => "Admin assigned task",
				 'description' =>  $title ,
				'type' => 'task',
				'type_id' => 1,
				'image' => null
         	];
		   send_push_notif_to_device($con,$user_ids, $data);
		}
		 
		
		
        http_response_code(201);
        echo json_encode([
            'status' => true,
            'message' => 'Task created successfully'
        ]);
    } else {
        http_response_code(500);
        echo json_encode([
            'status' => false,
            'message' => 'Database error: ' . mysqli_error($con)
        ]);
    }
}
