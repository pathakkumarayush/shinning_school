<?php
/**
 * Automated Test Suite for Copy Collection Module (CRUD + Copy View Report)
 */

require_once __DIR__ . '/../../db.php';

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

echo "========================================================\n";
echo "COPY COLLECTION MODULE (CRUD + REPORT) - TEST SUITE\n";
echo "========================================================\n\n";

// Sample test parameters
$testClass   = 'I A';
$testExam    = 'TEST AUTOMATION EXAM';
$testSubject = 'Mathematics';
$testSession = '2026-2027';

// 1. Bulk Store Copy Collection
runTest("1. Bulk store copy collection (attendance map) -> PASS (HTTP 201)", function() use ($testClass, $testExam, $testSubject, $testSession) {
    $postData = [
        'class'      => $testClass,
        'exam'       => $testExam,
        'subject'    => $testSubject,
        'session'    => $testSession,
        'attendance' => [
            '1706' => 'absent',
            '1561' => 'absent',
            '1447' => 'present'
        ]
    ];
    $data = runSubprocessApi(__DIR__ . '/store_copy_collection.php', 'POST', $postData);
    return $data && !empty($data['status']) && $data['data']['absent_count'] === 2;
});

// 2. Single Student Copy Collection Store
runTest("2. Single student copy collection store with remark -> PASS", function() use ($testClass, $testExam, $testSubject, $testSession) {
    $postData = [
        'class'      => $testClass,
        'exam'       => $testExam,
        'subject'    => $testSubject,
        'session'    => $testSession,
        'student_id' => '1524',
        'status'     => 'absent',
        'rmk'        => 'Medical Leave'
    ];
    $data = runSubprocessApi(__DIR__ . '/store_copy_collection.php', 'POST', $postData);
    return $data && !empty($data['status']) && $data['data']['absent_count'] === 1;
});

// 3. Get / List Copy Collection
$fetchedRecordId = null;
runTest("3. Get copy collection list for exam/class/subject -> PASS", function() use ($testClass, $testExam, $testSubject, $testSession, &$fetchedRecordId) {
    $data = runSubprocessApi(__DIR__ . '/get_copy_collection.php', 'GET', [
        'class'   => $testClass,
        'exam'    => $testExam,
        'subject' => $testSubject,
        'session' => $testSession
    ]);
    if ($data && !empty($data['status']) && $data['total'] >= 3) {
        $fetchedRecordId = $data['data'][0]['id'];
        return true;
    }
    return false;
});

// 4. Update Copy Collection Record
runTest("4. Update copy collection record remark and status -> PASS", function() use (&$fetchedRecordId) {
    if (!$fetchedRecordId) return false;
    $postData = [
        'id'     => (string)$fetchedRecordId,
        'status' => 'absent',
        'rmk'    => 'Updated Remark Testing'
    ];
    $data = runSubprocessApi(__DIR__ . '/update_copy_collection.php', 'POST', $postData);
    return $data && !empty($data['status']);
});

// 5. Update student status to Present (copy collected)
runTest("5. Update student status to Present via composite key -> PASS", function() use ($testClass, $testExam, $testSubject, $testSession) {
    $postData = [
        'class'      => $testClass,
        'exam'       => $testExam,
        'subject'    => $testSubject,
        'session'    => $testSession,
        'student_id' => '1524',
        'status'     => 'present'
    ];
    $data = runSubprocessApi(__DIR__ . '/update_copy_collection.php', 'POST', $postData);
    return $data && !empty($data['status']);
});

// 6. Copy View Report Generation & Math Validation
runTest("6. Copy View Report generation with accurate metrics -> PASS", function() use ($testClass, $testExam, $testSubject, $testSession) {
    $data = runSubprocessApi(__DIR__ . '/copy_view_report.php', 'GET', [
        'class'   => $testClass,
        'exam'    => $testExam,
        'subject' => $testSubject,
        'session' => $testSession
    ]);
    if (!$data || empty($data['status']) || empty($data['data']['summary'])) return false;

    $summary = $data['data']['summary'];
    $students = $data['data']['students'];

    $totalStudents = $summary['total_students'];
    $totalCollected = $summary['total_collected_copies'];
    $totalAbsent = $summary['total_absent_copies'];

    // Check sum consistency
    $isSumConsistent = ($totalCollected + $totalAbsent === $totalStudents);
    $hasStudentsList = is_array($students) && count($students) === $totalStudents;

    return $isSumConsistent && $hasStudentsList && isset($data['data']['exam_info']);
});

// 7. Route Aliases Verification (create.php, list.php, report.php)
runTest("7. Verify Route Aliases (create, list, report forwarders) -> PASS", function() use ($testClass, $testExam, $testSubject, $testSession) {
    $rep = runSubprocessApi(__DIR__ . '/report.php', 'GET', [
        'class'   => $testClass,
        'exam'    => $testExam,
        'subject' => $testSubject,
        'session' => $testSession
    ]);
    $lst = runSubprocessApi(__DIR__ . '/list.php', 'GET', [
        'class'   => $testClass,
        'exam'    => $testExam,
        'subject' => $testSubject,
        'session' => $testSession
    ]);
    return $rep && !empty($rep['status']) && $lst && !empty($lst['status']);
});

// 8. Delete copy collection record by ID
runTest("8. Delete copy collection record by ID -> PASS", function() use ($testClass, $testExam, $testSubject, $testSession) {
    // Insert a specific record to delete by ID
    $postData = [
        'class'      => $testClass,
        'exam'       => $testExam,
        'subject'    => $testSubject,
        'session'    => $testSession,
        'student_id' => '99999',
        'status'     => 'absent'
    ];
    runSubprocessApi(__DIR__ . '/store_copy_collection.php', 'POST', $postData);
    $data = runSubprocessApi(__DIR__ . '/get_copy_collection.php', 'GET', [
        'class'      => $testClass,
        'exam'       => $testExam,
        'subject'    => $testSubject,
        'session'    => $testSession,
        'student_id' => '99999'
    ]);
    if (!$data || empty($data['data'][0]['id'])) return false;
    $targetId = $data['data'][0]['id'];

    $del = runSubprocessApi(__DIR__ . '/delete_copy_collection.php', 'POST', ['id' => (string)$targetId]);
    return $del && !empty($del['status']);
});

// 9. Bulk clear test copy collection records
runTest("9. Bulk clear test copy collection records -> PASS", function() use ($testClass, $testExam, $testSubject, $testSession) {
    $data = runSubprocessApi(__DIR__ . '/delete_copy_collection.php', 'POST', [
        'class'   => $testClass,
        'exam'    => $testExam,
        'subject' => $testSubject,
        'session' => $testSession
    ]);
    return $data && !empty($data['status']);
});

// Clean up any remaining test data
mysqli_query($con, "DELETE FROM `exam_copy_collection` WHERE exam = '$testExam'");

echo "\n========================================================\n";
$passedCount = count(array_filter($results, function($r) { return $r['passed']; }));
echo "TEST RESULTS: $passedCount / " . count($results) . " tests PASSED.\n";
echo "========================================================\n";
