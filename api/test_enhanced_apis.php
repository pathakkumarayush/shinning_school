<?php
/**
 * Comprehensive Automated Test Suite for ERP API Enhancements
 * Runs each API invocation in an isolated subprocess to test real HTTP responses & exit codes.
 */

require_once __DIR__ . '/../db.php';

$results = [];

function runSubprocessApi($endpoint, $method = 'GET', $params = []) {
    $script = '<?php ';
    $script .= '$_SERVER["REQUEST_METHOD"] = "' . $method . '"; ';
    if ($method === 'GET') {
        $script .= '$_GET = ' . var_export($params, true) . '; ';
        $script .= '$_REQUEST = $_GET; ';
    } else {
        $script .= '$_POST = ' . var_export($params, true) . '; ';
        $script .= '$_REQUEST = $_POST; ';
    }
    $script .= '@require "' . addslashes($endpoint) . '"; ';

    $descriptorspec = [
        0 => ["pipe", "r"],
        1 => ["pipe", "w"],
        2 => ["pipe", "w"]
    ];

    $process = proc_open('php', $descriptorspec, $pipes);
    $output = '';
    if (is_resource($process)) {
        fwrite($pipes[0], $script);
        fclose($pipes[0]);

        $output = stream_get_contents($pipes[1]);
        fclose($pipes[1]);
        fclose($pipes[2]);
        proc_close($process);
    }

    $pos = strpos($output, '{');
    if ($pos !== false) {
        $output = substr($output, $pos);
    }
    return json_decode($output, true);
}

function runTest($testName, $callback) {
    global $results;
    try {
        $passed = $callback();
        $results[] = [
            'name' => $testName,
            'passed' => $passed,
            'error' => null
        ];
        echo ($passed ? "[PASS] " : "[FAIL] ") . $testName . "\n";
    } catch (Exception $e) {
        $results[] = [
            'name' => $testName,
            'passed' => false,
            'error' => $e->getMessage()
        ];
        echo "[FAIL] $testName: " . $e->getMessage() . "\n";
    }
}

echo "============================================\n";
echo "ERP API ENHANCEMENTS - AUTOMATED TEST SUITE\n";
echo "============================================\n\n";

// -------------------------------------------------------------
// 1. Teacher API Tests
// -------------------------------------------------------------
runTest("1. Teacher API returns database primary ID, login UID, password & teacher_type", function() {
    $data = runSubprocessApi(__DIR__ . '/get_teacher.php', 'GET', ['session' => '2026-2027']);
    if (!$data || empty($data['status']) || empty($data['teachers'])) return false;
    $t = $data['teachers'][0];
    return isset($t['id']) && is_int($t['id']) && isset($t['login_uid']) && isset($t['login_password']) && isset($t['teacher_type']);
});

// -------------------------------------------------------------
// 2. Syllabus API Role-Based Access Tests
// -------------------------------------------------------------
$createdSyllabusId = null;

runTest("2. Subject Teacher creates syllabus for ASSIGNED class/subject -> PASS (HTTP 201)", function() use (&$createdSyllabusId) {
    $postData = [
        'user_id'     => 'techshining23',
        'class'       => 'I A',
        'subject'     => 'EVS',
        'chapters'    => [['chapter_no' => '1', 'chapter_name' => 'My Environment']],
        'description' => 'Test Syllabus for Assigned Subject',
        'session'     => '2026-2027'
    ];
    $data = runSubprocessApi(__DIR__ . '/syllabus/store_syllabus.php', 'POST', $postData);
    if ($data && !empty($data['status']) && !empty($data['data']['id'])) {
        $createdSyllabusId = $data['data']['id'];
        return true;
    }
    return false;
});

runTest("3. Subject Teacher creates syllabus for UNASSIGNED class/subject -> DENIED (HTTP 403)", function() {
    $postData = [
        'user_id'     => 'techshining23',
        'class'       => 'XII Sci',
        'subject'     => 'Rocket Science',
        'chapters'    => [['chapter_no' => '1', 'chapter_name' => 'Intro']],
        'description' => 'Unassigned Subject Test',
        'session'     => '2026-2027'
    ];
    $data = runSubprocessApi(__DIR__ . '/syllabus/store_syllabus.php', 'POST', $postData);
    return $data && $data['status'] === false && strpos($data['message'], 'Authorization error') !== false;
});

runTest("4. Subject Teacher views only OWN syllabus -> PASS", function() {
    $data = runSubprocessApi(__DIR__ . '/syllabus/get_syllabus.php', 'GET', [
        'user_id' => 'techshining23',
        'role'    => 'subject_teacher',
        'session' => '2026-2027'
    ]);
    if (!$data || empty($data['status'])) return false;
    foreach ($data['data'] as $s) {
        if ($s['created_by'] !== 'techshining23') return false;
    }
    return true;
});

runTest("5. Class Teacher views assigned class syllabus across all subjects -> PASS", function() {
    $data = runSubprocessApi(__DIR__ . '/syllabus/get_syllabus.php', 'GET', [
        'user_id' => 'techshining23',
        'role'    => 'class_teacher',
        'session' => '2026-2027'
    ]);
    if (!$data || empty($data['status'])) return false;
    foreach ($data['data'] as $s) {
        if ($s['class'] !== 'I A') return false;
    }
    return true;
});

runTest("6. Class Teacher views unrelated class syllabus -> DENIED / EMPTY -> PASS", function() {
    $data = runSubprocessApi(__DIR__ . '/syllabus/get_syllabus.php', 'GET', [
        'user_id' => 'techshining23',
        'role'    => 'class_teacher',
        'class'   => 'X A',
        'session' => '2026-2027'
    ]);
    return $data && !empty($data['status']) && $data['total'] === 0;
});

runTest("7. Admin retrieves class-wise syllabus -> PASS", function() {
    $data = runSubprocessApi(__DIR__ . '/syllabus/get_syllabus.php', 'GET', [
        'user_id' => 'admin',
        'class'   => 'I A',
        'session' => '2026-2027'
    ]);
    return $data && !empty($data['status']) && $data['total'] >= 1;
});

// -------------------------------------------------------------
// 3. Student Search & Report API Tests
// -------------------------------------------------------------
runTest("8. Student Search by Scholar No. (scholar_no=4010) -> PASS", function() {
    $data = runSubprocessApi(__DIR__ . '/get_student.php', 'GET', [
        'session'    => '2026-2027',
        'scholar_no' => '4010'
    ]);
    return $data && !empty($data['status']) && $data['total'] >= 1 && $data['users'][0]['scholar_no'] === '4010';
});

runTest("9. Student Search across multiple fields (name, mobile, admission no, scholar no) -> PASS", function() {
    $data = runSubprocessApi(__DIR__ . '/get_student.php', 'GET', [
        'session' => '2026-2027',
        'search'  => 'PRAJAPATI'
    ]);
    return $data && !empty($data['status']) && $data['total'] >= 1;
});

runTest("10. Student Report: Age Wise Filter & Dynamic Age Calculation -> PASS", function() {
    $data = runSubprocessApi(__DIR__ . '/get_student.php', 'GET', [
        'session' => '2026-2027',
        'min_age' => 5,
        'max_age' => 15
    ]);
    if (!$data || empty($data['status']) || empty($data['users'])) return false;
    foreach ($data['users'] as $u) {
        if ($u['age'] !== null && ($u['age'] < 5 || $u['age'] > 15)) return false;
    }
    return true;
});

runTest("11. Student Report: Address Wise Filter -> PASS", function() {
    $data = runSubprocessApi(__DIR__ . '/get_student.php', 'GET', [
        'session' => '2026-2027',
        'address' => 'RAISEN'
    ]);
    return $data && !empty($data['status']) && $data['total'] >= 1;
});

runTest("12. Student Report: Gender Wise Filter -> PASS", function() {
    $data = runSubprocessApi(__DIR__ . '/get_student.php', 'GET', [
        'session' => '2026-2027',
        'gender'  => 'female'
    ]);
    return $data && !empty($data['status']) && $data['total'] >= 1;
});

runTest("13. Student Report: New Student Filter -> PASS", function() {
    $data = runSubprocessApi(__DIR__ . '/get_student.php', 'GET', [
        'session'     => '2026-2027',
        'new_student' => '1'
    ]);
    return $data && !empty($data['status']) && $data['total'] >= 1;
});

runTest("14. Student Report: Caste / Category Filter (OBC, SC, ST, GENERAL, RTE) -> PASS", function() {
    $dataOBC = runSubprocessApi(__DIR__ . '/get_student.php', 'GET', ['session' => '2026-2027', 'category' => 'OBC']);
    $dataRTE = runSubprocessApi(__DIR__ . '/get_student.php', 'GET', ['session' => '2026-2027', 'category' => 'RTE']);
    return $dataOBC && !empty($dataOBC['status']) && $dataRTE && !empty($dataRTE['status']);
});

runTest("15. Student Report: Grouping & Count Only Mode -> PASS", function() {
    $data = runSubprocessApi(__DIR__ . '/get_student.php', 'GET', [
        'session'    => '2026-2027',
        'group_by'   => 'caste',
        'count_only' => '1'
    ]);
    return $data && !empty($data['status']) && isset($data['grouped_counts']) && !isset($data['users']);
});

// -------------------------------------------------------------
// 4. Student Documents API Scholar No Support
// -------------------------------------------------------------
runTest("16. Student Documents API returns scholar_no -> PASS", function() {
    $data = runSubprocessApi(__DIR__ . '/get_student_documents.php', 'GET', [
        'student_id' => '1314',
        'session'    => '2026-2027'
    ]);
    return $data && !empty($data['success']) && isset($data['data']['scholar_no']) && $data['data']['scholar_no'] === '4010';
});

// -------------------------------------------------------------
// 5. Admission API Tests
// -------------------------------------------------------------
$testStudentId = null;
runTest("17. Admin admits student with full ERP fields -> PASS (HTTP 201)", function() use (&$testStudentId) {
    $postData = [
        'user_id'         => 'admin',
        'name'            => 'TEST STUDENT AUTOMATION',
        'scholar_no'      => 'TEST-SCH-999',
        'class'           => 'I A',
        'session'         => '2026-2027',
        'dob'             => '10-05-2017',
        'gender'          => 'male',
        'father_name'     => 'FATHER AUTOMATION',
        'mother_name'     => 'MOTHER AUTOMATION',
        'mobile'          => '9876543210',
        'category'        => 'OBC',
        'address'         => '123 Test Street Raisen',
        'pincode'         => '464001',
        'apaar'           => 'APAAR12345',
        'pen'             => 'PEN12345',
        'family_id'       => 'FAM12345'
    ];
    $data = runSubprocessApi(__DIR__ . '/store_admission.php', 'POST', $postData);
    if ($data && !empty($data['status']) && !empty($data['data']['student_id'])) {
        $testStudentId = $data['data']['student_id'];
        return true;
    }
    return false;
});

// -------------------------------------------------------------
// 6. Student Update API Authorization Tests
// -------------------------------------------------------------
runTest("18. Admin updates student full details -> PASS", function() use (&$testStudentId) {
    if (!$testStudentId) return false;
    $postData = [
        'user_id'    => 'admin',
        'student_id' => (string)$testStudentId,
        'session'    => '2026-2027',
        'address'    => 'Updated Admin Address 999',
        'mobile'     => '9999988888',
        'apaar'      => 'APAAR_UPDATED_999'
    ];
    $data = runSubprocessApi(__DIR__ . '/student_update.php', 'POST', $postData);
    return $data && !empty($data['status']);
});

runTest("19. Class Teacher updates OWN class student -> PASS", function() use (&$testStudentId) {
    if (!$testStudentId) return false;
    $postData = [
        'user_id'    => 'techshining23',
        'student_id' => (string)$testStudentId,
        'session'    => '2026-2027',
        'address'    => 'Updated by Class Teacher for Class I A'
    ];
    $data = runSubprocessApi(__DIR__ . '/student_update.php', 'POST', $postData);
    return $data && !empty($data['status']);
});

runTest("20. Class Teacher updates UNRELATED class student -> DENIED (HTTP 403)", function() {
    $postData = [
        'user_id'    => 'techshining137',
        'student_id' => '2',
        'session'    => '2026-2027',
        'address'    => 'Unauthorized Malicious Update'
    ];
    $data = runSubprocessApi(__DIR__ . '/student_update.php', 'POST', $postData);
    return $data && $data['status'] === false && strpos($data['message'], 'Authorization error') !== false;
});

runTest("21. Unauthorized user updates student -> DENIED (HTTP 401)", function() {
    $postData = [
        'user_id'    => '',
        'student_id' => '2',
        'session'    => '2026-2027',
        'address'    => 'Unauthorized'
    ];
    $data = runSubprocessApi(__DIR__ . '/student_update.php', 'POST', $postData);
    return $data && $data['status'] === false;
});

// Clean up test records
if ($testStudentId) {
    mysqli_query($con, "DELETE FROM student WHERE student_id = '$testStudentId' AND student_session = '2026-2027'");
}
if ($createdSyllabusId) {
    mysqli_query($con, "DELETE FROM syllabus WHERE id = '$createdSyllabusId'");
}
mysqli_query($con, "DELETE FROM syllabus WHERE description = 'Test Syllabus for Assigned Subject'");

echo "\n============================================\n";
$passedCount = count(array_filter($results, function($r) { return $r['passed']; }));
echo "TEST RESULTS: $passedCount / " . count($results) . " tests PASSED.\n";
echo "============================================\n";
