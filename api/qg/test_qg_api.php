<?php
// api/qg/test_qg_api.php
// Automated test script to verify all QG API endpoints

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../../db.php';

echo "<h2>Question Paper Generator API Test Suite</h2>";
echo "<pre>";

// 1. Create a temporary test token in the database
$test_token = 'test_token_' . bin2hex(random_bytes(8));
$test_uid = 'test_admin';
$created_at = date('Y-m-d H:i:s');

// Insert login entry if it doesn't exist
mysqli_query($con, "INSERT IGNORE INTO login (uid, pass, type, school) VALUES ('$test_uid', 'password', 'admin', 'shining')");
// Insert token
mysqli_query($con, "INSERT INTO user_tokens (type, uid, token, created_at) VALUES ('admin', '$test_uid', '$test_token', '$created_at')");

echo "✓ Created temporary test token: $test_token\n";

// Helper function to simulate API execution
function simulate_api($file, $method, $query_params = [], $payload = [], $token) {
    global $con;
    
    // Backup request environment
    $old_server = $_SERVER;
    $old_get = $_GET;
    $old_post = $_POST;
    $old_request = $_REQUEST;

    // Set request environment
    $_SERVER['REQUEST_METHOD'] = $method;
    $_SERVER['HTTP_AUTHORIZATION'] = "Bearer $token";
    $_GET = $query_params;
    $_POST = ($method === 'POST' && empty($payload)) ? $payload : [];
    $_REQUEST = array_merge($_GET, $_POST);
    
    // Simulate php://input payload if payload is present
    if (!empty($payload)) {
        // We override the global decoders or intercept it if needed.
        // Since we read php://input inside the files, we'll write a temporary local interceptor 
        // or mock the file_get_contents inside test by temporarily mocking it? 
        // Wait, inside php, file_get_contents("php://input") cannot be easily mocked unless we use stream wrappers.
        // But our APIs fall back to $_POST if json_decode is empty!
        // So we can simply pass the payload inside $_POST / $data!
        $_POST = $payload;
        $_REQUEST = array_merge($_REQUEST, $_POST);
    }

    // Run API file and capture output
    ob_start();
    try {
        include $file;
    } catch (Exception $e) {
        echo "Exception during simulation of $file: " . $e->getMessage() . "\n";
    }
    $output = ob_get_clean();

    // Restore request environment
    $_SERVER = $old_server;
    $_GET = $old_get;
    $_POST = $old_post;
    $_REQUEST = $old_request;

    return json_decode($output, true) ?? $output;
}

// Ensure the helper function exists
require_once __DIR__ . '/../../school/qg/db_helpers.php';

// Test 1: Get Metadata API
echo "\nTesting: get_metadata.php (GET)\n";
$metadata = simulate_api(__DIR__ . '/get_metadata.php', 'GET', ['session' => '2026-2027'], [], $test_token);
if (is_array($metadata) && isset($metadata['status']) && $metadata['status'] === true) {
    echo "✓ Success: Metadata API returned status true\n";
    echo "✓ Classes count: " . count($metadata['data']['classes'] ?? []) . "\n";
} else {
    echo "✗ Failed: Metadata API response: " . print_r($metadata, true) . "\n";
}

// Test 2: Create Question Paper API
echo "\nTesting: create.php (POST)\n";
$create_payload = [
    'session' => '2026-2027',
    'title' => 'Test Paper Created by API',
    'exam_name' => 'API Exam Unit 1',
    'class_id' => 0,
    'subject_id' => 1682,
    'duration_minutes' => 120,
    'max_marks' => 50,
    'instructions' => 'Read all questions carefully.',
    'watermark_text' => 'API TEST',
    'show_qr_code' => 1,
    'show_page_number' => 1,
    'questions' => [
        [
            'type' => 'mcq',
            'text' => 'What is the API test query answer?',
            'marks' => 2.0,
            'difficulty' => 'easy',
            'blooms_taxonomy' => 'remembering',
            'mcq_options' => ['Option A', 'Option B', 'Option C', 'Option D'],
            'mcq_correct' => 1
        ],
        [
            'type' => 'true_false',
            'text' => 'Is 10 greater than 5?',
            'marks' => 1.0,
            'difficulty' => 'easy',
            'blooms_taxonomy' => 'understanding',
            'tf_correct' => 1
        ],
        [
            'type' => 'match_columns',
            'text' => 'Match colors with objects.',
            'marks' => 4.0,
            'match_options' => [
                ['left' => 'Sky', 'right' => 'Blue'],
                ['left' => 'Grass', 'right' => 'Green'],
                ['left' => 'Sun', 'right' => 'Yellow'],
                ['left' => 'Apple', 'right' => 'Red']
            ]
        ]
    ]
];

$create_res = simulate_api(__DIR__ . '/create.php', 'POST', [], $create_payload, $test_token);
$paper_uuid = '';
if (is_array($create_res) && isset($create_res['status']) && $create_res['status'] === true) {
    $paper_uuid = $create_res['data']['uuid'] ?? '';
    echo "✓ Success: Paper created with UUID: $paper_uuid\n";
} else {
    echo "✗ Failed: Create Paper API response: " . print_r($create_res, true) . "\n";
}

if (!empty($paper_uuid)) {
    // Test 3: List Question Papers
    echo "\nTesting: list.php (GET)\n";
    $list_res = simulate_api(__DIR__ . '/list.php', 'GET', ['session' => '2026-2027'], [], $test_token);
    if (is_array($list_res) && isset($list_res['status']) && $list_res['status'] === true) {
        $found = false;
        foreach ($list_res['data'] as $p) {
            if ($p['uuid'] === $paper_uuid) {
                $found = true;
                break;
            }
        }
        echo ($found ? "✓ Success: Created paper found in list\n" : "✗ Failed: Created paper not found in list\n");
    } else {
        echo "✗ Failed: List API response: " . print_r($list_res, true) . "\n";
    }

    // Test 4: Get Detailed Paper Details
    echo "\nTesting: get.php (GET)\n";
    $get_res = simulate_api(__DIR__ . '/get.php', 'GET', ['uuid' => $paper_uuid], [], $test_token);
    if (is_array($get_res) && isset($get_res['status']) && $get_res['status'] === true) {
        echo "✓ Success: Retrieved detailed paper structure\n";
        echo "✓ Title: " . $get_res['data']['title'] . "\n";
        echo "✓ Sections count: " . count($get_res['data']['sections'] ?? []) . "\n";
    } else {
        echo "✗ Failed: Get API response: " . print_r($get_res, true) . "\n";
    }

    // Test 5: Publish Question Paper
    echo "\nTesting: publish.php (POST)\n";
    $publish_res = simulate_api(__DIR__ . '/publish.php', 'POST', [], ['uuid' => $paper_uuid], $test_token);
    if (is_array($publish_res) && isset($publish_res['status']) && $publish_res['status'] === true) {
        echo "✓ Success: Published question paper\n";
    } else {
        echo "✗ Failed: Publish API response: " . print_r($publish_res, true) . "\n";
    }

    // Test 6: Duplicate Question Paper
    echo "\nTesting: duplicate.php (POST)\n";
    $dup_res = simulate_api(__DIR__ . '/duplicate.php', 'POST', [], ['uuid' => $paper_uuid], $test_token);
    $dup_uuid = '';
    if (is_array($dup_res) && isset($dup_res['status']) && $dup_res['status'] === true) {
        $dup_uuid = $dup_res['data']['uuid'] ?? '';
        echo "✓ Success: Duplicated paper. New UUID: $dup_uuid\n";
    } else {
        echo "✗ Failed: Duplicate API response: " . print_r($dup_res, true) . "\n";
    }

    // Test 7: Update Question Paper
    echo "\nTesting: update.php (POST)\n";
    $update_payload = $create_payload;
    $update_payload['uuid'] = $paper_uuid;
    $update_payload['title'] = 'Updated Title by API Test';
    $update_res = simulate_api(__DIR__ . '/update.php', 'POST', [], $update_payload, $test_token);
    if (is_array($update_res) && isset($update_res['status']) && $update_res['status'] === true) {
        echo "✓ Success: Updated paper title\n";
    } else {
        echo "✗ Failed: Update API response: " . print_r($update_res, true) . "\n";
    }

    // Clean up duplicated paper
    if (!empty($dup_uuid)) {
        mysqli_query($con, "DELETE FROM qg_paper_questions WHERE section_id IN (SELECT id FROM qg_paper_sections WHERE paper_id = (SELECT id FROM qg_papers WHERE uuid = '$dup_uuid'))");
        mysqli_query($con, "DELETE FROM qg_paper_sections WHERE paper_id = (SELECT id FROM qg_papers WHERE uuid = '$dup_uuid')");
        mysqli_query($con, "DELETE FROM qg_papers WHERE uuid = '$dup_uuid'");
        echo "✓ Cleaned up duplicated paper row.\n";
    }

    // Clean up created paper
    mysqli_query($con, "DELETE FROM qg_paper_questions WHERE section_id IN (SELECT id FROM qg_paper_sections WHERE paper_id = (SELECT id FROM qg_papers WHERE uuid = '$paper_uuid'))");
    mysqli_query($con, "DELETE FROM qg_paper_sections WHERE paper_id = (SELECT id FROM qg_papers WHERE uuid = '$paper_uuid')");
    mysqli_query($con, "DELETE FROM qg_papers WHERE uuid = '$paper_uuid'");
    echo "✓ Cleaned up test paper row.\n";
}

// 3. Clean up the temporary test token
mysqli_query($con, "DELETE FROM user_tokens WHERE token = '$test_token'");
mysqli_query($con, "DELETE FROM login WHERE uid = '$test_uid'");
echo "\n✓ Cleaned up temporary test token and login.\n";
echo "\nTesting Completed successfully!\n";
echo "</pre>";
