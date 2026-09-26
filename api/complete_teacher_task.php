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

if (empty($data['task_id'])) {
    http_response_code(422);
    echo json_encode([
        'status' => false,
        'message' => 'Missing required field: task_id'
    ]);
    exit;
}

$task_id = mysqli_real_escape_string($con, $data['task_id']);
$current_date = date('Y-m-d');

// Update the task
$query = "UPDATE tasks 
          SET completed_date = '$current_date', status = 'complete' 
          WHERE id = '$task_id'";

$result = mysqli_query($con, $query);

if ($result) {
    if (mysqli_affected_rows($con) > 0) {
		
				  // ✅ Now fetch the updated task details (including staff_id)
        $taskQuery = "SELECT staff_id FROM tasks WHERE id = '$task_id' LIMIT 1";
        $taskRes = mysqli_query($con, $taskQuery);
        $staff_id = null;

        if ($taskRes && mysqli_num_rows($taskRes) > 0) {
            $taskRow = mysqli_fetch_assoc($taskRes);
            $staff_id = $taskRow['staff_id'];
        }

        if ($staff_id) {
            // ✅ Fetch teacher details by staff_id
            $teacherQuery = "SELECT teacher_id, teacher_username, name, uid 
                             FROM teacher 
                             WHERE teacher_id = '" . mysqli_real_escape_string($con, $staff_id) . "' 
                             LIMIT 1";
            $teacherRes = mysqli_query($con, $teacherQuery);

            if ($teacherRes && mysqli_num_rows($teacherRes) > 0) {
                $teacher = mysqli_fetch_assoc($teacherRes);

                $user_ids = [];
                if (!empty($teacher['uid'])) {
                    $user_ids[] = $teacher['uid'];
                }

                // ✅ Notification message with teacher_username + name
                $data = [
                    'title' => "Tasks completed  by " . $teacher['teacher_name'],
                    'description' => 'completed on  ' . $current_date,
                    'type' => 'attendance',
                    'type_id' => 1,
                    'image' => null
                ];

                if (!empty($user_ids)) {
                    send_push_notif_to_device($con, $user_ids, $data);
                }
            }
        }
		
        echo json_encode([
            'status' => true,
            'message' => 'Task marked as complete successfully'
        ]);
    } else {
        echo json_encode([
            'status' => false,
            'message' => 'No task found with the provided ID or task already completed'
        ]);
    }
} else {
    http_response_code(500);
    echo json_encode([
        'status' => false,
        'message' => 'Database error: ' . mysqli_error($con)
    ]);
}
