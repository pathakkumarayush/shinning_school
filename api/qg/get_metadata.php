<?php
// api/qg/get_metadata.php
// Fetch ERP options, paper settings, and updated supported question types

ini_set('display_errors', 0);
header('Content-Type: application/json');
require_once __DIR__ . '/../../db.php';
require_once __DIR__ . '/../../school/qg/db_helpers.php';

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only GET method is allowed']);
    exit;
}

$session = isset($_GET['session']) ? trim($_GET['session']) : '2026-2027';
$school_id = 'shining';

$class_id = isset($_GET['class_id']) && $_GET['class_id'] !== '' ? intval($_GET['class_id']) : -1;
$subject_id = isset($_GET['subject_id']) && $_GET['subject_id'] !== '' ? intval($_GET['subject_id']) : -1;
$chapter_id = isset($_GET['chapter_id']) && $_GET['chapter_id'] !== '' ? intval($_GET['chapter_id']) : -1;

try {
    $data = [];
    
    // Fetch classes list
    $data['classes'] = qg_get_classes($con, $school_id, $session);
    
    // Fetch subjects if class_id is selected
    if ($class_id >= 0) {
        $data['subjects'] = qg_get_subjects($con, $class_id, $school_id, $session);
    } else {
        $data['subjects'] = [];
    }
    
    // Fetch chapters if class_id and subject_id are selected
    if ($class_id >= 0 && $subject_id >= 0) {
        $data['chapters'] = qg_get_chapters($con, $class_id, $subject_id, $session);
    } else {
        $data['chapters'] = [];
    }
    
    // Fetch topics if chapter_id is selected
    if ($chapter_id >= 0) {
        $data['topics'] = qg_get_topics($con, $chapter_id, $session);
    } else {
        $data['topics'] = [];
    }

    // Supported 7 question types
    $data['question_types'] = [
        ['id' => 'mcq', 'name' => 'MCQ (Multiple Choice Questions)'],
        ['id' => 'fill_blank', 'name' => 'Fill in the Blanks'],
        ['id' => 'true_false', 'name' => 'True & False'],
        ['id' => 'matching', 'name' => 'Matching (Column A & Column B)'],
        ['id' => 'one_word', 'name' => 'Answer in One Word or Sentence'],
        ['id' => 'image_question', 'name' => 'Image Question'],
        ['id' => 'other', 'name' => 'Other']
    ];

    // Default Paper Settings
    $data['paper_settings'] = qg_get_paper_settings($con, $school_id);

    // Active Teachers List
    $data['teachers'] = qg_get_teachers_list($con, $school_id, $session);

    http_response_code(200);
    echo json_encode([
        'status' => true,
        'message' => 'Metadata options fetched successfully',
        'data' => $data
    ]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'status' => false,
        'message' => 'Failed to fetch metadata',
        'error_detail' => $e->getMessage()
    ]);
}
?>
