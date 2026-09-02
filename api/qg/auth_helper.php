<?php
// api/qg/auth_helper.php
// Reusable Token Authentication routine for Question Paper Generator APIs

function qg_authenticate($con, $allow_query_token = true) {
    $token = '';
    $headers = function_exists('getallheaders') ? getallheaders() : [];
    
    // Check Authorization header in various casings
    $authHeader = $headers['Authorization'] ?? $headers['authorization'] ?? '';
    if (empty($authHeader) && isset($_SERVER['HTTP_AUTHORIZATION'])) {
        $authHeader = $_SERVER['HTTP_AUTHORIZATION'];
    } elseif (empty($authHeader) && isset($_SERVER['REDIRECT_HTTP_AUTHORIZATION'])) {
        $authHeader = $_SERVER['REDIRECT_HTTP_AUTHORIZATION'];
    }

    if (!empty($authHeader) && preg_match('/Bearer\s(\S+)/i', $authHeader, $matches)) {
        $token = trim($matches[1]);
    } elseif ($allow_query_token && isset($_GET['token']) && !empty(trim($_GET['token']))) {
        $token = trim($_GET['token']);
    } elseif ($allow_query_token && isset($_POST['token']) && !empty(trim($_POST['token']))) {
        $token = trim($_POST['token']);
    }

    if (empty($token)) {
        http_response_code(401);
        header('Content-Type: application/json');
        echo json_encode([
            'status' => false,
            'message' => 'Authorization token is required (Bearer token in Authorization header)'
        ]);
        exit;
    }

    $token_esc = mysqli_real_escape_string($con, $token);
    $auth_q = mysqli_query($con, "SELECT * FROM user_tokens WHERE token = '$token_esc' LIMIT 1");
    if (!$auth_q || mysqli_num_rows($auth_q) === 0) {
        http_response_code(401);
        header('Content-Type: application/json');
        echo json_encode([
            'status' => false,
            'message' => 'Invalid or expired token'
        ]);
        exit;
    }

    $auth_user = mysqli_fetch_assoc($auth_q);
    $session_uid = $auth_user['uid'];
    $session_type = strtolower($auth_user['type'] ?? 'teacher');
    $is_admin = ($session_type === 'admin' || strtolower($session_uid) === 'admin' || strtolower($session_uid) === 'shining');

    return [
        'uid' => $session_uid,
        'type' => $session_type,
        'is_admin' => $is_admin,
        'token' => $token
    ];
}
