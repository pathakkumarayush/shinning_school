<?php
// school/qg/questions_bank.php
// Question Bank view: manages listing, filtering, and adding new questions.

if(!isset($_SESSION['uid'])) {
    header("Location:../index.php");
    exit;
}

$school_id = $_SESSION['uid'];
$current_session = $_SESSION['session'];

// AJAX handler to fetch dynamic dropdowns and list search results
if (isset($_GET['ajax']) && $_GET['ajax'] == '1') {
    header('Content-Type: application/json');
    $req_type = $_GET['fetch'] ?? '';

    if ($req_type == 'subjects' && isset($_GET['class_id']) && $_GET['class_id'] !== '') {
        $res = ['success' => true, 'data' => qg_get_subjects($con, intval($_GET['class_id']), $school_id, $current_session)];
        echo json_encode($res);
        exit;
    } elseif ($req_type == 'chapters' && isset($_GET['class_id']) && $_GET['class_id'] !== '' && isset($_GET['subject_id']) && $_GET['subject_id'] !== '') {
        $res = ['success' => true, 'data' => qg_get_chapters($con, intval($_GET['class_id']), intval($_GET['subject_id']), $current_session)];
        echo json_encode($res);
        exit;
    } elseif ($req_type == 'topics' && isset($_GET['chapter_id']) && $_GET['chapter_id'] !== '') {
        $res = ['success' => true, 'data' => qg_get_topics($con, intval($_GET['chapter_id']), $current_session)];
        echo json_encode($res);
        exit;
    } elseif (empty($req_type)) {
        // Return filtered questions bank results
        $filter_class = isset($_GET['f_class']) && $_GET['f_class'] !== '' ? intval($_GET['f_class']) : -1;
        $filter_subject = isset($_GET['f_subject']) && $_GET['f_subject'] !== '' ? intval($_GET['f_subject']) : -1;
        $filter_difficulty = trim($_GET['f_difficulty'] ?? '');
        $filter_type = trim($_GET['f_type'] ?? '');
        $filter_search = trim($_GET['f_search'] ?? '');

        $search_filters = [
            'class_id' => $filter_class,
            'subject_id' => $filter_subject,
            'difficulty' => $filter_difficulty,
            'question_type' => $filter_type,
            'search' => $filter_search
        ];
        $question_bank = qg_search_questions($con, $school_id, $search_filters, 100);
        echo json_encode($question_bank);
        exit;
    }
}

// POST handler to store new question
$msg_success = '';
$msg_error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_question'])) {
    $q_text = trim($_POST['question_text'] ?? '');
    $q_type = trim($_POST['question_type'] ?? '');
    $class_id = isset($_POST['class_id']) && $_POST['class_id'] !== '' ? intval($_POST['class_id']) : -1;
    $subject_id = isset($_POST['subject_id']) && $_POST['subject_id'] !== '' ? intval($_POST['subject_id']) : -1;
    $chapter_id = !empty($_POST['chapter_id']) ? intval($_POST['chapter_id']) : null;
    $topic_id = !empty($_POST['topic_id']) ? intval($_POST['topic_id']) : null;
    $difficulty = trim($_POST['difficulty'] ?? 'medium');
    $marks = floatval($_POST['marks'] ?? 1.0);
    $blooms = trim($_POST['blooms_taxonomy'] ?? '');
    $outcome = trim($_POST['learning_outcome'] ?? '');
    $explanation = trim($_POST['explanation'] ?? '');
    $hints = trim($_POST['hints'] ?? '');

    if (empty($q_text)) {
        $msg_error = "Question text cannot be empty.";
    } elseif ($class_id < 0 || $subject_id < 0) {
        $msg_error = "Please select valid Class and Subject.";
    } else {
        mysqli_begin_transaction($con);
        try {
            $uuid = qg_uuidv4();
            $stmt = mysqli_prepare($con, "INSERT INTO qg_questions(uuid, question_text, question_type, class_id, subject_id, chapter_id, topic_id, academic_year, difficulty, marks, blooms_taxonomy, learning_outcome, explanation, hints, created_by, school) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmt, "sssiisissdssssss", $uuid, $q_text, $q_type, $class_id, $subject_id, $chapter_id, $topic_id, $current_session, $difficulty, $marks, $blooms, $outcome, $explanation, $hints, $_SESSION['userid'], $school_id);
            mysqli_stmt_execute($stmt);
            $q_id = mysqli_insert_id($con);
            mysqli_stmt_close($stmt);

            // Handle Type-Specific details
            if ($q_type === 'mcq') {
                $options_text = $_POST['mcq_options'] ?? [];
                $corrects = $_POST['mcq_correct'] ?? [];
                $letters = ['A', 'B', 'C', 'D', 'E', 'F'];
                
                foreach ($options_text as $idx => $opt_text) {
                    $opt_text = trim($opt_text);
                    if (empty($opt_text)) continue;
                    $is_correct = in_array(strval($idx), $corrects) ? 1 : 0;
                    $letter = $letters[$idx] ?? 'A';

                    $stmt_opt = mysqli_prepare($con, "INSERT INTO qg_mcq_options(question_id, option_letter, option_text, is_correct) VALUES(?, ?, ?, ?)");
                    mysqli_stmt_bind_param($stmt_opt, "issi", $q_id, $letter, $opt_text, $is_correct);
                    mysqli_stmt_execute($stmt_opt);
                    mysqli_stmt_close($stmt_opt);
                }
            } elseif ($q_type === 'true_false') {
                $tf_correct = intval($_POST['tf_correct'] ?? 1);
                $stmt_tf = mysqli_prepare($con, "INSERT INTO qg_true_false(question_id, is_correct_true) VALUES(?, ?)");
                mysqli_stmt_bind_param($stmt_tf, "ii", $q_id, $tf_correct);
                mysqli_stmt_execute($stmt_tf);
                mysqli_stmt_close($stmt_tf);
            } elseif ($q_type === 'match_columns') {
                $left_cols = $_POST['match_left'] ?? [];
                $right_cols = $_POST['match_right'] ?? [];
                foreach ($left_cols as $idx => $left_val) {
                    $left_val = trim($left_val);
                    $right_val = trim($right_cols[$idx] ?? '');
                    if (empty($left_val) && empty($right_val)) continue;

                    $stmt_m = mysqli_prepare($con, "INSERT INTO qg_match_options(question_id, left_content, right_content, sort_order) VALUES(?, ?, ?, ?)");
                    mysqli_stmt_bind_param($stmt_m, "issi", $q_id, $left_val, $right_val, $idx);
                    mysqli_stmt_execute($stmt_m);
                    mysqli_stmt_close($stmt_m);
                }
            } elseif ($q_type === 'fill_blanks') {
                $blank_answers = $_POST['blank_answers'] ?? [];
                $case_sensitive = intval($_POST['blank_case'] ?? 0);
                
                foreach ($blank_answers as $idx => $ans_str) {
                    $ans_arr = array_filter(array_map('trim', explode(',', $ans_str)));
                    if (empty($ans_arr)) continue;
                    $ans_json = json_encode(array_values($ans_arr));

                    $stmt_b = mysqli_prepare($con, "INSERT INTO qg_blanks(question_id, blank_index, accepted_answers, case_sensitive) VALUES(?, ?, ?, ?)");
                    mysqli_stmt_bind_param($stmt_b, "iisi", $q_id, $idx, $ans_json, $case_sensitive);
                    mysqli_stmt_execute($stmt_b);
                    mysqli_stmt_close($stmt_b);
                }
            } else {
                $ans_key = trim($_POST['text_answer_key'] ?? '');
                $keywords = trim($_POST['text_keywords'] ?? '');
                $model_ans = trim($_POST['text_model_answer'] ?? '');

                $keywords_json = null;
                if (!empty($keywords)) {
                    $keywords_json = json_encode(array_filter(array_map('trim', explode(',', $keywords))));
                }

                $stmt_txt = mysqli_prepare($con, "INSERT INTO qg_text_answers(question_id, answer_key, expected_keywords, model_answer) VALUES(?, ?, ?, ?)");
                mysqli_stmt_bind_param($stmt_txt, "isss", $q_id, $ans_key, $keywords_json, $model_ans);
                mysqli_stmt_execute($stmt_txt);
                mysqli_stmt_close($stmt_txt);
            }

            qg_log_audit($con, $_SESSION['userid'], $school_id, 'create', 'Question', $q_id);
            mysqli_commit($con);
            $msg_success = "Question successfully added to bank.";
        } catch (Exception $e) {
            mysqli_rollback($con);
            $msg_error = "Error: " . $e->getMessage();
        }
    }
}

// Retrieve filters
$classes = qg_get_classes($con, $school_id, $current_session);
$filter_class = isset($_GET['f_class']) && $_GET['f_class'] !== '' ? intval($_GET['f_class']) : -1;
$filter_subject = isset($_GET['f_subject']) && $_GET['f_subject'] !== '' ? intval($_GET['f_subject']) : -1;
$filter_difficulty = trim($_GET['f_difficulty'] ?? '');
$filter_type = trim($_GET['f_type'] ?? '');
$filter_search = trim($_GET['f_search'] ?? '');

$subjects = $filter_class >= 0 ? qg_get_subjects($con, $filter_class, $school_id, $current_session) : [];

$search_filters = [
    'class_id' => $filter_class,
    'subject_id' => $filter_subject,
    'difficulty' => $filter_difficulty,
    'question_type' => $filter_type,
    'search' => $filter_search
];
$question_bank = qg_search_questions($con, $school_id, $search_filters, 100);
$sub_action = $_GET['sub_action'] ?? '';
?>

<style>
.enquiry{ width:100%; height:45px;background-color:#FFFFFF; margin-top:10px; border:4px #006633 solid;}
.col_4{ width:100%; height:auto; margin-left:2px; background-color:#FFFFFF;float:left; margin-top:10px;-webkit-box-shadow: 0 0 10px rgba(0,0,0, .65);
-moz-box-shadow: 0 0 10px rgba(0,0,0, .65);
box-shadow: 0 0 10px rgba(0,0,0, .65); padding: 20px; box-sizing: border-box;}
.form-style-2-heading{
    font-weight: bold;
    font-style: normal;
    border-bottom: 2px solid #ddd;
    margin-bottom: 20px;
    font-size: 15px;
    padding:10px;
}
input[type="text"], input[type="number"] {
    padding: 5px;
    border: solid 5px #c9c9c9;
    box-shadow: inset 0 0 0 1px #707070;
    transition: box-shadow 0.3s, border 0.3s;
    height: 30px;
    width: 250px;
}
.select {
    padding: 5px;
    border: solid 5px #c9c9c9;
    box-shadow: inset 0 0 0 1px #707070;
    transition: box-shadow 0.3s, border 0.3s;
    height: 40px;
    width: 260px;
}
textarea{
    padding: 5px;
    border: solid 5px #c9c9c9;
    box-shadow: inset 0 0 0 1px #707070;
    transition: box-shadow 0.3s, border 0.3s;
    height: 80px;
    width: 500px;
}
input[type="text"]:focus, input[type="number"]:focus, textarea:focus {
  border: solid 5px #339933;
  background-color:#eaeaea;
}
input[type=submit], .qg-btn-legacy {
    border: none;
    background: #FF8500;
    color: #fff !important;
    box-shadow: 1px 1px 4px #DADADA;
    border-radius: 3px;
	padding: 10px;
	font-weight: bold;
    text-decoration: none;
    cursor: pointer;
}
input[type=submit]:hover, .qg-btn-legacy:hover {
    background: #EA7B00;
}
.table{ width:100%; margin-top:10px;}
</style>

<div class="full_div">
<br clear="all" />
<div class="left_sect">
    <img src="images/Student Detail/home.png" />
    <?php if($sub_action=='add'): ?>
        <a href="?pageid=qg_index&action=questions_bank"><img src="images/buttonGoBack.png" style="float:right; width:150px; height:60px;"/></a>
    <?php else: ?>
        <a href="?pageid=qg_index"><img src="images/buttonGoBack.png" style="float:right; width:150px; height:60px;"/></a>
    <?php endif; ?>
</div>
<div class="shell">
<div class="shell_main">
<div class="enquiry">
    <img src="std.png" style="float:left; width:35px; height:40px; margin-left:5px; margin-top:2px;"/>
    <center><h2 style="text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Question Bank Panel</h2></center>
</div>

<div class="col_4">
    <div style="display:flex; justify-content:space-between; margin-bottom:15px">
        <span>&nbsp;</span>
        <?php if($sub_action !== 'add'): ?>
            <a href="?pageid=qg_index&action=questions_bank&sub_action=add" class="qg-btn-legacy">+ Add New Question</a>
        <?php endif; ?>
    </div>

    <?php if(!empty($msg_success)): ?>
        <div style="color: #4F8A10; background-color: #FFD9FF; padding: 10px; margin-bottom: 10px; font-weight: bold; border-radius: 4px;"><?php echo $msg_success; ?></div>
    <?php endif; ?>
    <?php if(!empty($msg_error)): ?>
        <div style="color: #D8000C; background: #FFD9FF; padding: 10px; margin-bottom: 10px; font-weight: bold; border-radius: 4px;"><?php echo $msg_error; ?></div>
    <?php endif; ?>

    <?php if ($sub_action == 'add'): ?>
        <form method="post" action="?pageid=qg_index&action=questions_bank">
            <table cellspacing="10" style="width:100%">
                <tr>
                    <td style="font-weight:bold; width:200px">Class: *</td>
                    <td>
                        <select name="class_id" id="q_class" class="select" required onchange="fetchSubjects(this.value)">
                            <option value="">-- Select Class --</option>
                            <?php foreach($classes as $c): ?>
                                <option value="<?php echo $c['class_id']; ?>"><?php echo $c['class'] . ' (' . $c['class_section'] . ')'; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="font-weight:bold">Subject: *</td>
                    <td>
                        <select name="subject_id" id="q_subject" class="select" required onchange="fetchChapters(this.value)">
                            <option value="">-- Select Subject --</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="font-weight:bold">Chapter:</td>
                    <td>
                        <select name="chapter_id" id="q_chapter" class="select" onchange="fetchTopics(this.value)">
                            <option value="">-- Select Chapter --</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="font-weight:bold">Topic:</td>
                    <td>
                        <select name="topic_id" id="q_topic" class="select">
                            <option value="">-- Select Topic --</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="font-weight:bold">Difficulty: *</td>
                    <td>
                        <select name="difficulty" class="select" required>
                            <option value="easy">Easy</option>
                            <option value="medium" selected>Medium</option>
                            <option value="hard">Hard</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="font-weight:bold">Default Marks: *</td>
                    <td><input type="number" step="0.5" name="marks" required value="1.0" /></td>
                </tr>
                <tr>
                    <td style="font-weight:bold">Blooms Category:</td>
                    <td>
                        <select name="blooms_taxonomy" class="select">
                            <option value="">-- Select --</option>
                            <option value="remembering">Remembering</option>
                            <option value="understanding">Understanding</option>
                            <option value="applying">Applying</option>
                            <option value="analyzing">Analyzing</option>
                            <option value="evaluating">Evaluating</option>
                            <option value="creating">Creating</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="font-weight:bold">Question Text: *</td>
                    <td><textarea name="question_text" required placeholder="Type the question content here..."></textarea></td>
                </tr>
                <tr>
                    <td style="font-weight:bold">Learning Outcome:</td>
                    <td><input type="text" name="learning_outcome" placeholder="e.g. Outcome 2.3" /></td>
                </tr>
                <tr>
                    <td style="font-weight:bold">Question Type: *</td>
                    <td>
                        <select name="question_type" id="q_type" class="select" required onchange="toggleTypeFields(this.value)">
                            <option value="mcq">Multiple Choice Questions (MCQ)</option>
                            <option value="fill_blanks">Fill in the Blanks</option>
                            <option value="match_columns">Match the Columns</option>
                            <option value="true_false">True / False</option>
                            <option value="one_word">One Word Answer</option>
                            <option value="very_short">Very Short Answer</option>
                            <option value="short">Short Answer</option>
                            <option value="long">Long Answer</option>
                            <option value="very_long">Very Long Answer</option>
                        </select>
                    </td>
                </tr>
            </table>

            <!-- MCQ configurations -->
            <div id="cfg_mcq" style="background:#eaeaea; padding:15px; border-radius:4px; margin-bottom:15px">
                <strong>Configure MCQ Options:</strong><br/><br/>
                <table cellspacing="5">
                    <tr>
                        <td><input type="checkbox" name="mcq_correct[]" value="0"> Option A:</td>
                        <td><input type="text" name="mcq_options[]" placeholder="Description A" /></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="mcq_correct[]" value="1"> Option B:</td>
                        <td><input type="text" name="mcq_options[]" placeholder="Description B" /></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="mcq_correct[]" value="2"> Option C:</td>
                        <td><input type="text" name="mcq_options[]" placeholder="Description C" /></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="mcq_correct[]" value="3"> Option D:</td>
                        <td><input type="text" name="mcq_options[]" placeholder="Description D" /></td>
                    </tr>
                </table>
            </div>

            <!-- True/False configurations -->
            <div id="cfg_tf" style="display:none; background:#eaeaea; padding:15px; border-radius:4px; margin-bottom:15px">
                <strong>Select Correct Option:</strong><br/>
                <label style="margin-right:20px"><input type="radio" name="tf_correct" value="1" checked> True</label>
                <label><input type="radio" name="tf_correct" value="0"> False</label>
            </div>

            <!-- Match options -->
            <div id="cfg_match" style="display:none; background:#eaeaea; padding:15px; border-radius:4px; margin-bottom:15px">
                <strong>Configure Columns Matches (Left Column A & Correct Right Column B):</strong><br/><br/>
                <table cellspacing="5">
                    <?php for($z=1; $z<=4; $z++): ?>
                        <tr>
                            <td>Item <?php echo $z; ?>:</td>
                            <td><input type="text" name="match_left[]" placeholder="Column A value" /></td>
                            <td>Matches:</td>
                            <td><input type="text" name="match_right[]" placeholder="Column B value" /></td>
                        </tr>
                    <?php endfor; ?>
                </table>
            </div>

            <!-- Fill blanks -->
            <div id="cfg_blanks" style="display:none; background:#eaeaea; padding:15px; border-radius:4px; margin-bottom:15px">
                <strong>Configure Blanks:</strong><br/>
                <label>Blank 1 answers (comma separated):</label>
                <input type="text" name="blank_answers[]" style="width:400px" placeholder="photosynthesis, plant breath" /><br/><br/>
                <label>Blank 2 answers (optional):</label>
                <input type="text" name="blank_answers[]" style="width:400px" /><br/><br/>
                <label><input type="checkbox" name="blank_case" value="1"> Case Sensitive Answers</label>
            </div>

            <!-- Written Answers -->
            <div id="cfg_written" style="display:none; background:#eaeaea; padding:15px; border-radius:4px; margin-bottom:15px">
                <strong>Written Answers Expected Key details:</strong><br/><br/>
                <table cellspacing="5">
                    <tr>
                        <td>Answer Key:</td>
                        <td><input type="text" name="text_answer_key" style="width:300px" /></td>
                    </tr>
                    <tr>
                        <td>Keywords (comma-separated):</td>
                        <td><input type="text" name="text_keywords" style="width:300px" /></td>
                    </tr>
                    <tr>
                        <td>Model Answer:</td>
                        <td><textarea name="text_model_answer" style="height:60px"></textarea></td>
                    </tr>
                </table>
            </div>

            <table cellspacing="10">
                <tr>
                    <td style="font-weight:bold; width:200px">Hints:</td>
                    <td><input type="text" name="hints" style="width:350px" /></td>
                </tr>
                <tr>
                    <td style="font-weight:bold">Explanation:</td>
                    <td><input type="text" name="explanation" style="width:350px" /></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <input type="submit" name="save_question" value="Save Question" />
                        <a href="?pageid=qg_index&action=questions_bank" class="qg-btn-legacy" style="background:#6c757d; margin-left:10px">Cancel</a>
                    </td>
                </tr>
            </table>
        </form>
    <?php else: ?>
        <!-- Search filter bank -->
        <form method="get" action="" style="background:#eaeaea; padding:15px; border-radius:5px; margin-bottom:20px">
            <input type="hidden" name="pageid" value="qg_index" />
            <input type="hidden" name="action" value="questions_bank" />
            <table style="width:100%">
                <tr>
                    <td>Class:</td>
                    <td>
                        <select name="f_class" class="select" onchange="this.form.submit()">
                            <option value="">-- All --</option>
                            <?php foreach($classes as $c): ?>
                                <option value="<?php echo $c['class_id']; ?>" <?php echo $filter_class == $c['class_id'] ? 'selected' : ''; ?>><?php echo $c['class'] . ' (' . $c['class_section'] . ')'; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td>Subject:</td>
                    <td>
                        <select name="f_subject" class="select" onchange="this.form.submit()">
                            <option value="">-- All --</option>
                            <?php foreach($subjects as $s): ?>
                                <option value="<?php echo $s['subject_id']; ?>" <?php echo $filter_subject == $s['subject_id'] ? 'selected' : ''; ?>><?php echo $s['subject_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td>Difficulty:</td>
                    <td>
                        <select name="f_difficulty" class="select" onchange="this.form.submit()">
                            <option value="">-- All --</option>
                            <option value="easy" <?php echo $filter_difficulty == 'easy' ? 'selected' : ''; ?>>Easy</option>
                            <option value="medium" <?php echo $filter_difficulty == 'medium' ? 'selected' : ''; ?>>Medium</option>
                            <option value="hard" <?php echo $filter_difficulty == 'hard' ? 'selected' : ''; ?>>Hard</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Type:</td>
                    <td>
                        <select name="f_type" class="select" onchange="this.form.submit()">
                            <option value="">-- All --</option>
                            <option value="mcq" <?php echo $filter_type == 'mcq' ? 'selected' : ''; ?>>MCQ</option>
                            <option value="fill_blanks" <?php echo $filter_type == 'fill_blanks' ? 'selected' : ''; ?>>Fill blanks</option>
                            <option value="match_columns" <?php echo $filter_type == 'match_columns' ? 'selected' : ''; ?>>Match columns</option>
                            <option value="true_false" <?php echo $filter_type == 'true_false' ? 'selected' : ''; ?>>True/False</option>
                        </select>
                    </td>
                    <td>Search:</td>
                    <td><input type="text" name="f_search" style="padding: 5px; border: solid 5px #c9c9c9; height:20px; width:200px" value="<?php echo htmlspecialchars($filter_search); ?>" placeholder="Search keyword..." /></td>
                    <td>&nbsp;</td>
                    <td><input type="submit" value="Filter" /></td>
                </tr>
            </table>
        </form>

        <div class="form-style-2-heading">Questions In Bank</div>
        <table class="table table-bordered" style="font-size:12px">
            <thead style="background-color:#009933; color:#FFFFFF">
                <tr>
                    <th>No.</th>
                    <th>Question Content</th>
                    <th>Type</th>
                    <th>Difficulty</th>
                    <th>Marks</th>
                    <th>Bloom Taxonomy</th>
                </tr>
            </thead>
            <tbody>
                <?php if(empty($question_bank)): ?>
                    <tr>
                        <td colspan="6" style="text-align:center; padding:15px">No questions registered in Question Bank matching criteria.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach($question_bank as $idx => $q): ?>
                        <tr>
                            <td><?php echo $idx + 1; ?></td>
                            <td><strong><?php echo htmlspecialchars(substr($q['question_text'], 0, 100)); ?><?php echo strlen($q['question_text']) > 100 ? '...' : ''; ?></strong></td>
                            <td><?php echo strtoupper($q['question_type']); ?></td>
                            <td><?php echo strtoupper($q['difficulty']); ?></td>
                            <td><?php echo $q['marks']; ?></td>
                            <td><?php echo ucfirst($q['blooms_taxonomy'] ?? 'N/A'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

<script type="text/javascript">
function fetchSubjects(classId) {
    if (!classId) return;
    $.getJSON('?pageid=qg_index&action=questions_bank&ajax=1&fetch=subjects&class_id=' + classId, function(res) {
        var $el = $('#q_subject');
        $el.empty().append('<option value="">-- Select Subject --</option>');
        if (res.success) {
            $.each(res.data, function(idx, item) {
                $el.append('<option value="' + item.subject_id + '">' + item.subject_name + '</option>');
            });
        }
    });
}

function fetchChapters(subjectId) {
    var classId = $('#q_class').val();
    if (!classId || !subjectId) return;
    $.getJSON('?pageid=qg_index&action=questions_bank&ajax=1&fetch=chapters&class_id=' + classId + '&subject_id=' + subjectId, function(res) {
        var $el = $('#q_chapter');
        $el.empty().append('<option value="">-- Select Chapter --</option>');
        if (res.success) {
            $.each(res.data, function(idx, item) {
                $el.append('<option value="' + item.id + '">' + item.cname + '</option>');
            });
        }
    });
}

function fetchTopics(chapterId) {
    if (!chapterId) return;
    $.getJSON('?pageid=qg_index&action=questions_bank&ajax=1&fetch=topics&chapter_id=' + chapterId, function(res) {
        var $el = $('#q_topic');
        $el.empty().append('<option value="">-- Select Topic --</option>');
        if (res.success) {
            $.each(res.data, function(idx, item) {
                $el.append('<option value="' + item.id + '">' + item.topic + '</option>');
            });
        }
    });
}

function toggleTypeFields(type) {
    $('#cfg_mcq').hide();
    $('#cfg_tf').hide();
    $('#cfg_match').hide();
    $('#cfg_blanks').hide();
    $('#cfg_written').hide();

    if (type === 'mcq') {
        $('#cfg_mcq').show();
    } else if (type === 'true_false') {
        $('#cfg_tf').show();
    } else if (type === 'match_columns') {
        $('#cfg_match').show();
    } else if (type === 'fill_blanks') {
        $('#cfg_blanks').show();
    } else {
        $('#cfg_written').show();
    }
}

$(document).ready(function() {
    toggleTypeFields($('#q_type').val() || 'mcq');
});
</script>
