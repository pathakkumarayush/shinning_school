<?php
/**
 * Syllabus Role & Authorization Helper
 */

function resolveSyllabusUser($con, $inputOrGet) {
    $authHeader = '';
    if (function_exists('getallheaders')) {
        $headers = getallheaders();
        $authHeader = $headers['Authorization'] ?? $headers['authorization'] ?? '';
    }
    
    $token = '';
    if (!empty($authHeader) && preg_match('/Bearer\s(\S+)/', $authHeader, $m)) {
        $token = $m[1];
    } elseif (!empty($inputOrGet['token'])) {
        $token = trim($inputOrGet['token']);
    }
    
    if (!empty($token)) {
        $token_esc = mysqli_real_escape_string($con, $token);
        $tq = mysqli_query($con, "SELECT * FROM user_tokens WHERE token = '$token_esc' LIMIT 1");
        if ($tq && mysqli_num_rows($tq) > 0) {
            $trow = mysqli_fetch_assoc($tq);
            $uid = $trow['uid'];
            $type = $trow['type'];
            $lq = mysqli_query($con, "SELECT * FROM login WHERE uid = '$uid' LIMIT 1");
            $lrow = ($lq && mysqli_num_rows($lq) > 0) ? mysqli_fetch_assoc($lq) : [];
            $teacher_type = (int)($lrow['teacher_type'] ?? ($type === 'admin' ? 1 : 3));
            return [
                'uid' => $uid,
                'type' => $type,
                'teacher_type' => $teacher_type,
                'is_admin' => ($type === 'admin' || strtolower($uid) === 'admin' || $teacher_type === 1)
            ];
        }
    }
    
    $rawUser = $inputOrGet['user_id'] ?? $inputOrGet['created_by'] ?? $inputOrGet['teacher_id'] ?? $inputOrGet['teacher'] ?? '';
    $rawUser = trim($rawUser);
    
    if ($rawUser === '') {
        return [
            'uid' => '',
            'type' => 'guest',
            'teacher_type' => 0,
            'is_admin' => false
        ];
    }
    
    if (strtolower($rawUser) === 'admin') {
        return [
            'uid' => 'admin',
            'type' => 'admin',
            'teacher_type' => 1,
            'is_admin' => true
        ];
    }
    
    $user_esc = mysqli_real_escape_string($con, $rawUser);
    if (is_numeric($rawUser)) {
        $tq = mysqli_query($con, "SELECT teacher_username FROM teacher WHERE id = '$user_esc' OR teacher_id = '$user_esc' LIMIT 1");
        if ($tq && mysqli_num_rows($tq) > 0) {
            $trow = mysqli_fetch_assoc($tq);
            $rawUser = $trow['teacher_username'];
            $user_esc = mysqli_real_escape_string($con, $rawUser);
        }
    }
    
    $lq = mysqli_query($con, "SELECT * FROM login WHERE uid = '$user_esc' LIMIT 1");
    if ($lq && mysqli_num_rows($lq) > 0) {
        $lrow = mysqli_fetch_assoc($lq);
        $type = $lrow['type'];
        $teacher_type = (int)$lrow['teacher_type'];
        $is_admin = ($type === 'admin' || strtolower($rawUser) === 'admin' || $teacher_type === 1);
        return [
            'uid' => $rawUser,
            'type' => $type,
            'teacher_type' => $teacher_type,
            'is_admin' => $is_admin
        ];
    }
    
    return [
        'uid' => $rawUser,
        'type' => 'teacher',
        'teacher_type' => 3,
        'is_admin' => false
    ];
}

function isTeacherAssignedToSubject($con, $teacher_uid, $class, $subject, $session = '') {
    $t_esc = mysqli_real_escape_string($con, trim($teacher_uid));
    $c_esc = mysqli_real_escape_string($con, trim($class));
    $s_esc = mysqli_real_escape_string($con, trim($subject));
    
    $sess_clause = "";
    if ($session !== '') {
        $sess_esc = mysqli_real_escape_string($con, trim($session));
        $sess_clause = " AND (teacher_session = '$sess_esc' OR teacher_session = '')";
    }
    
    $query = "SELECT id FROM class_teacher_sub 
              WHERE (teacher = '$t_esc' OR teacher = CONCAT('$t_esc', ' ') OR TRIM(teacher) = '$t_esc')
                AND LOWER(TRIM(class)) = LOWER(TRIM('$c_esc')) 
                AND LOWER(TRIM(sub)) = LOWER(TRIM('$s_esc'))
                $sess_clause
              LIMIT 1";
              
    $res = mysqli_query($con, $query);
    return ($res && mysqli_num_rows($res) > 0);
}

function getClassTeacherAssignedClasses($con, $teacher_uid, $session = '') {
    $t_esc = mysqli_real_escape_string($con, trim($teacher_uid));
    $sess_clause = "";
    if ($session !== '') {
        $sess_esc = mysqli_real_escape_string($con, trim($session));
        $sess_clause = " AND (teacher_session = '$sess_esc' OR teacher_session = '')";
    }
    
    $query = "SELECT DISTINCT class FROM class_teacher 
              WHERE (teacher = '$t_esc' OR teacher = CONCAT('$t_esc', ' ') OR TRIM(teacher) = '$t_esc')
                $sess_clause";
                
    $res = mysqli_query($con, $query);
    $classes = [];
    if ($res) {
        while ($r = mysqli_fetch_assoc($res)) {
            if (!empty($r['class'])) {
                $classes[] = trim($r['class']);
            }
        }
    }
    return $classes;
}
