<?php
// school/qg/seed_mock_questions.php
// Standalone script to populate mock questions in the qg_ tables

session_start();
require_once(__DIR__ . "/../../db.php");
require_once(__DIR__ . "/db_helpers.php");

// Restrict to admin execution or CLI environment
if (php_sapi_name() !== 'cli') {
    if (!isset($_SESSION['uid']) || $_SESSION['userid'] !== 'shining') {
        die("Access denied. Admin credentials required.");
    }
    $school_id = $_SESSION['uid'];
    $current_session = $_SESSION['session'];
} else {
    $school_id = 'shining';
    $current_session = '2026-2027';
    $_SESSION['userid'] = 'shining';
}

// Check if questions already exist
$check = mysqli_query($con, "SELECT COUNT(*) as cnt FROM qg_questions WHERE school='{$school_id}'");
$check_row = mysqli_fetch_assoc($check);
if ($check_row['cnt'] > 0) {
    die("Database already seeded with " . $check_row['cnt'] . " questions.");
}

echo "Starting seeding...<br/>";

// Target: Class: I A (class_id = 0), Subject: Mathematics (subj_id = 1682)
$class_id = 0;
$subject_id = 1682;
$creator = $_SESSION['userid'];

$mock_questions = [
    [
        'text' => 'What is 5 + 3?',
        'type' => 'mcq',
        'difficulty' => 'easy',
        'marks' => 1.0,
        'blooms' => 'remembering',
        'outcome' => 'Addition principles',
        'explanation' => 'Simple math addition.',
        'hints' => 'Count on your fingers.',
        'details' => [
            'type' => 'mcq',
            'options' => [
                ['letter' => 'A', 'text' => '7', 'is_correct' => 0],
                ['letter' => 'B', 'text' => '8', 'is_correct' => 1],
                ['letter' => 'C', 'text' => '9', 'is_correct' => 0],
                ['letter' => 'D', 'text' => '10', 'is_correct' => 0],
            ]
        ]
    ],
    [
        'text' => 'Select correct multiple-choice options showing properties of prime numbers.',
        'type' => 'mcq',
        'difficulty' => 'medium',
        'marks' => 2.0,
        'blooms' => 'understanding',
        'outcome' => 'Number classifications',
        'explanation' => 'Primes have exactly two positive divisors.',
        'hints' => 'Look at divisors.',
        'details' => [
            'type' => 'mcq',
            'options' => [
                ['letter' => 'A', 'text' => 'They are divisible only by 1 and themselves.', 'is_correct' => 1],
                ['letter' => 'B', 'text' => '2 is the only even prime number.', 'is_correct' => 1],
                ['letter' => 'C', 'text' => 'All prime numbers are odd.', 'is_correct' => 0],
                ['letter' => 'D', 'text' => '1 is a prime number.', 'is_correct' => 0],
            ]
        ]
    ],
    [
        'text' => 'True or False: The number 0 is an even integer.',
        'type' => 'true_false',
        'difficulty' => 'easy',
        'marks' => 1.0,
        'blooms' => 'remembering',
        'outcome' => 'Even-odd properties',
        'explanation' => '0 is divisible by 2, hence even.',
        'hints' => 'Does it divide by 2?',
        'details' => [
            'type' => 'true_false',
            'is_correct_true' => 1
        ]
    ],
    [
        'text' => 'Match the shape to the correct number of sides.',
        'type' => 'match_columns',
        'difficulty' => 'easy',
        'marks' => 4.0,
        'blooms' => 'remembering',
        'outcome' => 'Geometry shapes',
        'explanation' => 'Identify shapes.',
        'hints' => 'Recall polygon structures.',
        'details' => [
            'type' => 'match_columns',
            'pairs' => [
                ['left' => 'Triangle', 'right' => '3 sides'],
                ['left' => 'Square', 'right' => '4 sides'],
                ['left' => 'Pentagon', 'right' => '5 sides'],
                ['left' => 'Hexagon', 'right' => '6 sides'],
            ]
        ]
    ],
    [
        'text' => 'Fill in the blanks: In the equation y = mx + c, the letter m represents the _____ and c represents the _____.',
        'type' => 'fill_blanks',
        'difficulty' => 'medium',
        'marks' => 2.0,
        'blooms' => 'understanding',
        'outcome' => 'Linear algebra equations',
        'explanation' => 'Slope and Y-intercept formula structures.',
        'hints' => 'Recall straight line equations.',
        'details' => [
            'type' => 'fill_blanks',
            'blanks' => [
                ['index' => 0, 'answers' => 'slope,gradient', 'case' => 0],
                ['index' => 1, 'answers' => 'y-intercept,intercept', 'case' => 0],
            ]
        ]
    ],
    [
        'text' => 'What is the sum of angles in a triangle in degrees?',
        'type' => 'one_word',
        'difficulty' => 'easy',
        'marks' => 1.0,
        'blooms' => 'remembering',
        'outcome' => 'Angle sum property',
        'explanation' => 'Total internal angle is 180 degrees.',
        'hints' => 'A straight line value.',
        'details' => [
            'type' => 'text',
            'answer_key' => '180',
            'keywords' => '180,degrees',
            'model' => 'The sum of all internal angles in any Euclidean triangle is exactly 180 degrees.'
        ]
    ],
    [
        'text' => 'Define a prime number.',
        'type' => 'very_short',
        'difficulty' => 'medium',
        'marks' => 2.0,
        'blooms' => 'understanding',
        'outcome' => 'Primes definition',
        'explanation' => 'Divisibility rules.',
        'hints' => 'Divisors count.',
        'details' => [
            'type' => 'text',
            'answer_key' => '',
            'keywords' => 'divisors,one,itself,greater than 1',
            'model' => 'A prime number is a natural number greater than 1 that has no positive divisors other than 1 and itself.'
        ]
    ],
    [
        'text' => 'Explain the Pythagoras Theorem and state its equation.',
        'type' => 'short',
        'difficulty' => 'medium',
        'marks' => 3.0,
        'blooms' => 'applying',
        'outcome' => 'Right angled triangle theorem',
        'explanation' => 'Relations of hypotenuse to adjacent and opposite sides.',
        'hints' => 'Right-angled triangles rules.',
        'details' => [
            'type' => 'text',
            'answer_key' => 'a^2 + b^2 = c^2',
            'keywords' => 'hypotenuse,squares,sum,right angled',
            'model' => 'In a right-angled triangle, the square of the hypotenuse is equal to the sum of the squares of the other two sides. Formula: a^2 + b^2 = c^2.'
        ]
    ],
    [
        'text' => 'Describe how calculus is used to find maximum and minimum values of functions.',
        'type' => 'long',
        'difficulty' => 'hard',
        'marks' => 5.0,
        'blooms' => 'analyzing',
        'outcome' => 'Calculus optimization',
        'explanation' => 'Using first and second derivatives to locate minima and maxima.',
        'hints' => 'Stationary points.',
        'details' => [
            'type' => 'text',
            'answer_key' => '',
            'keywords' => 'derivative,zero,critical points,second derivative test',
            'model' => 'To find optimization values: 1) Differentiate function to find f\'(x). 2) Equate f\'(x) = 0 to get critical points. 3) Find f\'\'(x) to test sign. Positive is minimum, negative is maximum.'
        ]
    ]
];

foreach ($mock_questions as $mq) {
    mysqli_begin_transaction($con);
    try {
        $uuid = qg_uuidv4();
        $stmt = mysqli_prepare($con, "INSERT INTO qg_questions(uuid, question_text, question_type, class_id, subject_id, academic_year, difficulty, marks, blooms_taxonomy, learning_outcome, explanation, hints, created_by, school) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sssiissdssssss", $uuid, $mq['text'], $mq['type'], $class_id, $subject_id, $current_session, $mq['difficulty'], $mq['marks'], $mq['blooms'], $mq['outcome'], $mq['explanation'], $mq['hints'], $creator, $school_id);
        mysqli_stmt_execute($stmt);
        $q_id = mysqli_insert_id($con);
        mysqli_stmt_close($stmt);

        // Seed details
        $det = $mq['details'];
        if ($det['type'] === 'mcq') {
            foreach ($det['options'] as $idx => $o) {
                $stmt_o = mysqli_prepare($con, "INSERT INTO qg_mcq_options(question_id, option_letter, option_text, is_correct) VALUES(?, ?, ?, ?)");
                mysqli_stmt_bind_param($stmt_o, "issi", $q_id, $o['letter'], $o['text'], $o['is_correct']);
                mysqli_stmt_execute($stmt_o);
                mysqli_stmt_close($stmt_o);
            }
        } elseif ($det['type'] === 'true_false') {
            $stmt_tf = mysqli_prepare($con, "INSERT INTO qg_true_false(question_id, is_correct_true) VALUES(?, ?)");
            mysqli_stmt_bind_param($stmt_tf, "ii", $q_id, $det['is_correct_true']);
            mysqli_stmt_execute($stmt_tf);
            mysqli_stmt_close($stmt_tf);
        } elseif ($det['type'] === 'match_columns') {
            foreach ($det['pairs'] as $idx => $p) {
                $stmt_m = mysqli_prepare($con, "INSERT INTO qg_match_options(question_id, left_content, right_content, sort_order) VALUES(?, ?, ?, ?)");
                mysqli_stmt_bind_param($stmt_m, "issi", $q_id, $p['left'], $p['right'], $idx);
                mysqli_stmt_execute($stmt_m);
                mysqli_stmt_close($stmt_m);
            }
        } elseif ($det['type'] === 'fill_blanks') {
            foreach ($det['blanks'] as $b) {
                $ans_json = json_encode(explode(',', $b['answers']));
                $stmt_b = mysqli_prepare($con, "INSERT INTO qg_blanks(question_id, blank_index, accepted_answers, case_sensitive) VALUES(?, ?, ?, ?)");
                mysqli_stmt_bind_param($stmt_b, "iisi", $q_id, $b['index'], $ans_json, $b['case']);
                mysqli_stmt_execute($stmt_b);
                mysqli_stmt_close($stmt_b);
            }
        } elseif ($det['type'] === 'text') {
            $keywords_json = json_encode(explode(',', $det['keywords']));
            $stmt_txt = mysqli_prepare($con, "INSERT INTO qg_text_answers(question_id, answer_key, expected_keywords, model_answer) VALUES(?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmt_txt, "isss", $q_id, $det['answer_key'], $keywords_json, $det['model']);
            mysqli_stmt_execute($stmt_txt);
            mysqli_stmt_close($stmt_txt);
        }

        mysqli_commit($con);
        echo "Linked mock question: " . htmlspecialchars($mq['text']) . "<br/>";
    } catch (Exception $e) {
        mysqli_rollback($con);
        echo "Error seeding mock question: " . $e->getMessage() . "<br/>";
    }
}

echo "Seeding completed successfully!";
?>
