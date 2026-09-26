<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (!headers_sent()) {
    header('Content-Type: application/json');
}

require __DIR__ . '/../../db.php';
global $con;

// Validate request method
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only POST method is allowed']);
    exit;
}

// Read input (support JSON & Form-Data)
$rawInput = file_get_contents('php://input');
$input = json_decode($rawInput, true);
if (!$input) {
    $input = $_POST;
}

$id = isset($input['id']) ? trim($input['id']) : (isset($input['syllabus_id']) ? trim($input['syllabus_id']) : '');

if ($id === '' || !is_numeric($id)) {
    http_response_code(400);
    echo json_encode(['status' => false, 'message' => 'Valid syllabus ID is required']);
    exit;
}

$id_esc = (int)$id;

// Check existing syllabus
$checkQ = mysqli_query($con, "SELECT * FROM `syllabus` WHERE id = '$id_esc' AND status = 1 LIMIT 1");
if (!$checkQ || mysqli_num_rows($checkQ) === 0) {
    http_response_code(404);
    echo json_encode(['status' => false, 'message' => 'Syllabus record not found']);
    exit;
}
$existing = mysqli_fetch_assoc($checkQ);

require_once __DIR__ . '/syllabus_auth_helper.php';
$auth = resolveSyllabusUser($con, $input);
if (!$auth['is_admin']) {
    if (empty($auth['uid'])) {
        http_response_code(401);
        echo json_encode(['status' => false, 'message' => 'User identification (user_id / created_by / token) is required']);
        exit;
    }
    if (trim($existing['created_by']) !== trim($auth['uid'])) {
        http_response_code(403);
        echo json_encode(['status' => false, 'message' => 'Authorization error: You can only update your own syllabus']);
        exit;
    }
}

// Build update fields
$updateFields = [];

if (isset($input['class']) && trim($input['class']) !== '') {
    $class_esc = mysqli_real_escape_string($con, trim($input['class']));
    $updateFields[] = "`class` = '$class_esc'";
}

if (isset($input['subject']) && trim($input['subject']) !== '') {
    $subject_esc = mysqli_real_escape_string($con, trim($input['subject']));
    $updateFields[] = "`subject` = '$subject_esc'";
}

if (isset($input['description']) || isset($input['discription'])) {
    $desc = isset($input['description']) ? trim($input['description']) : trim($input['discription']);
    $desc_esc = mysqli_real_escape_string($con, $desc);
    $updateFields[] = "`description` = '$desc_esc'";
}

if (isset($input['remark'])) {
    $remark_esc = mysqli_real_escape_string($con, trim($input['remark']));
    $updateFields[] = "`remark` = '$remark_esc'";
}

if (isset($input['session']) && trim($input['session']) !== '') {
    $session_esc = mysqli_real_escape_string($con, trim($input['session']));
    $updateFields[] = "`session` = '$session_esc'";
}

if (isset($input['user_id']) || isset($input['created_by'])) {
    $user_id = isset($input['user_id']) ? trim($input['user_id']) : trim($input['created_by']);
    $user_id_esc = mysqli_real_escape_string($con, $user_id);
    $updateFields[] = "`created_by` = '$user_id_esc'";
}

// Process chapters if provided
$rawChapters = $input['chapters'] ?? null;
$chapterList = [];
if (!empty($rawChapters)) {
    if (is_string($rawChapters)) {
        $decoded = json_decode($rawChapters, true);
        if (is_array($decoded)) {
            $rawChapters = $decoded;
        }
    }

    if (is_array($rawChapters)) {
        foreach ($rawChapters as $idx => $chap) {
            if (is_array($chap)) {
                $cNo   = isset($chap['chapter_no']) ? trim($chap['chapter_no']) : (string)($idx + 1);
                $cName = isset($chap['chapter_name']) ? trim($chap['chapter_name']) : (isset($chap['name']) ? trim($chap['name']) : '');
                if ($cName !== '' || $cNo !== '') {
                    $chapterList[] = [
                        'chapter_no'   => $cNo,
                        'chapter_name' => $cName
                    ];
                }
            } elseif (is_string($chap) && trim($chap) !== '') {
                $chapterList[] = [
                    'chapter_no'   => (string)($idx + 1),
                    'chapter_name' => trim($chap)
                ];
            }
        }
    }
} elseif (isset($input['chapter_no']) && isset($input['chapter_name'])) {
    $cNos   = (array)$input['chapter_no'];
    $cNames = (array)$input['chapter_name'];
    foreach ($cNames as $idx => $name) {
        $nameTrim = trim($name);
        $noTrim   = isset($cNos[$idx]) ? trim($cNos[$idx]) : (string)($idx + 1);
        if ($nameTrim !== '' || $noTrim !== '') {
            $chapterList[] = [
                'chapter_no'   => $noTrim,
                'chapter_name' => $nameTrim
            ];
        }
    }
}

if (!empty($chapterList)) {
    $chapters_json = mysqli_real_escape_string($con, json_encode($chapterList, JSON_UNESCAPED_UNICODE));
    $updateFields[] = "`chapters` = '$chapters_json'";
}

if (empty($updateFields)) {
    http_response_code(400);
    echo json_encode(['status' => false, 'message' => 'No fields provided to update']);
    exit;
}

$setClause = implode(', ', $updateFields);
$updateQuery = "UPDATE `syllabus` SET $setClause WHERE id = '$id_esc'";

if (mysqli_query($con, $updateQuery)) {
    // Fetch updated record
    $fetchQ = mysqli_query($con, "SELECT * FROM `syllabus` WHERE id = '$id_esc'");
    $updatedRow = mysqli_fetch_assoc($fetchQ);
    $updatedRow['chapters'] = json_decode($updatedRow['chapters'] ?? '[]', true);

    http_response_code(200);
    echo json_encode([
        'status'  => true,
        'message' => 'Syllabus updated successfully',
        'data'    => $updatedRow
    ]);
} else {
    http_response_code(500);
    echo json_encode([
        'status'  => false,
        'message' => 'Database error: ' . mysqli_error($con)
    ]);
}
?>
