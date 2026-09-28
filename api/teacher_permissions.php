<?php
ini_set('display_errors', 0);
error_reporting(E_ALL);

header('Content-Type: application/json');
require_once __DIR__ . '/../db.php';

// Allow only GET method
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only GET method is allowed']);
    exit;
}

// Check for Authorization Header (Bearer Token)
$headers = function_exists('getallheaders') ? getallheaders() : [];
$authHeader = $headers['Authorization'] ?? ($headers['authorization'] ?? ($_SERVER['HTTP_AUTHORIZATION'] ?? ''));
$authTokenUser = null;

if ($authHeader && preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
    $token = mysqli_real_escape_string($con, $matches[1]);
    $tQuery = mysqli_query($con, "SELECT * FROM user_tokens WHERE token = '$token' LIMIT 1");
    if ($tQuery && mysqli_num_rows($tQuery) > 0) {
        $authTokenUser = mysqli_fetch_assoc($tQuery);
    }
}

// Determine target teacher_id
$reqTeacherId = isset($_GET['teacher_id']) ? trim($_GET['teacher_id']) : '';

if ($authTokenUser) {
    // Authenticated user present
    if ($authTokenUser['type'] === 'teacher') {
        $teacherIdCanonical = $authTokenUser['uid'];
        // If a teacher passes a different teacher_id, forbid cross-access
        if ($reqTeacherId !== '' && strtolower($reqTeacherId) !== strtolower($teacherIdCanonical)) {
            http_response_code(403);
            echo json_encode(['status' => false, 'message' => 'Forbidden: Teachers can only access their own permissions']);
            exit;
        }
    } else {
        // Admin or other role
        $teacherIdCanonical = $reqTeacherId !== '' ? $reqTeacherId : 'admin';
    }
} else {
    // Fallback if token not passed: require explicit teacher_id parameter
    if ($reqTeacherId === '') {
        http_response_code(400);
        echo json_encode(['status' => false, 'message' => 'Authorization token or teacher_id parameter is required']);
        exit;
    }
    $teacherIdCanonical = $reqTeacherId;
}

$teacherIdEsc = mysqli_real_escape_string($con, $teacherIdCanonical);

// Fetch teacher details
$tQuery = mysqli_query($con, "SELECT teacher_id, teacher_username, uid, teacher_name FROM teacher WHERE teacher_id = '$teacherIdEsc' OR teacher_username = '$teacherIdEsc' OR uid = '$teacherIdEsc' LIMIT 1");
$teacherData = ($tQuery && mysqli_num_rows($tQuery) > 0) ? mysqli_fetch_assoc($tQuery) : null;
$teacherName = $teacherData ? $teacherData['teacher_name'] : $teacherIdCanonical;
$tKey = $teacherData ? (!empty($teacherData['teacher_username']) ? $teacherData['teacher_username'] : (string)$teacherData['teacher_id']) : $teacherIdCanonical;

$candidateKeys = array_unique(array_filter([
    $teacherIdCanonical,
    $teacherData['teacher_username'] ?? '',
    $teacherData['uid'] ?? '',
    isset($teacherData['teacher_id']) ? (string)$teacherData['teacher_id'] : ''
]));
$escapedKeys = array_map(function($k) use ($con) { return mysqli_real_escape_string($con, $k); }, $candidateKeys);
$candidateInSql = "'" . implode("', '", $escapedKeys) . "'";

// Fetch all active modules
$mRes = mysqli_query($con, "SELECT module_key, module_name, sort_order FROM teacher_app_modules WHERE status = 1 ORDER BY sort_order ASC");
$permissions = [];

if ($mRes && mysqli_num_rows($mRes) > 0) {
    // Fetch saved permissions for teacher
    $pQuery = mysqli_query($con, "SELECT module_key, is_allowed FROM teacher_app_permissions WHERE teacher_id IN ($candidateInSql)");
    $savedMap = [];
    if ($pQuery) {
        while ($pRow = mysqli_fetch_assoc($pQuery)) {
            $savedMap[$pRow['module_key']] = (!empty($savedMap[$pRow['module_key']]) || (int)$pRow['is_allowed'] === 1);
        }
    }

    while ($m = mysqli_fetch_assoc($mRes)) {
        $k = $m['module_key'];
        // If teacher is admin, grant all true; else check saved map (default false)
        if ($teacherIdCanonical === 'admin') {
            $permissions[$k] = true;
        } else {
            $permissions[$k] = $savedMap[$k] ?? false;
        }
    }
}

http_response_code(200);
echo json_encode([
    'status'       => true,
    'teacher_id'   => $tKey,
    'teacher_name' => $teacherName,
    'permissions'  => $permissions
]);
