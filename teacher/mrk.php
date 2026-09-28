<?php
session_start();
require_once("../db.php");
?>
<!DOCTYPE html> 
<html> 
<head> 
    <title>Teacher Mark Summary</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="jquery.table2excel.js"></script>
    <script src="jquery.printThis.js"></script>
    <script type="text/javascript">
        $(document).ready(function(e) {
            $('button#print_btn').on('click', function(e) {
                $('#div_to_print').printThis({title: ''});
            }); 
            $("#excel").click(function(){
                var file_name = ($("#cls").val() || 'Class') + '__' + ($("#exm").val() || 'Exam') + '__' + ($("#ses").val() || 'Session');
                $("#tbl_exm").table2excel({
                    name: "Worksheet Name",
                    filename: "Exam-Marks(" + file_name + ")",
                    fileext: ".xls"
                });
            });
        });
    </script>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f6f9; margin: 20px; }
        .inp { width:40px; height:10px; }
        #div_to_print { font-size:14px; }
        td { height:25px; padding: 4px 6px; }
        th { background-color: #006633; color: #FFFFFF; padding: 6px; }
        .po { width:50px !important; }
        .filter-card { background: #fff; padding: 15px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); margin-bottom: 20px; }
        .select { padding: 6px 12px; height: 36px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px; }
        .btn-submit { background: #006633; color: #fff; border: none; padding: 8px 16px; border-radius: 4px; cursor: pointer; font-weight: bold; }
        .btn-submit:hover { background: #004d26; }
    </style>
</head> 
<body> 

<div class="filter-card">
    <form method="get" action="">
        <input type="hidden" name="pageid" value="mrk">
        <label><strong>Class:</strong></label>
        <select name="class" class="select" required>
            <option value="">Select Class</option>
            <?php
            $clRes = mysqli_query($con, "SELECT DISTINCT class FROM class ORDER BY class_id ASC");
            while ($cRow = mysqli_fetch_array($clRes)) {
                $sel = (isset($_GET['class']) && $_GET['class'] == $cRow['class']) ? 'selected="selected"' : '';
                echo "<option value='{$cRow['class']}' $sel>{$cRow['class']}</option>";
            }
            ?>
        </select>

        &nbsp;&nbsp;
        <label><strong>Exam:</strong></label>
        <select name="ex" class="select" required>
            <option value="">Select Exam</option>
            <?php
            $exRes = mysqli_query($con, "SELECT DISTINCT examination_name FROM examination ORDER BY examination_id ASC");
            while ($eRow = mysqli_fetch_array($exRes)) {
                $sel = (isset($_GET['ex']) && $_GET['ex'] == $eRow['examination_name']) ? 'selected="selected"' : '';
                echo "<option value='{$eRow['examination_name']}' $sel>{$eRow['examination_name']}</option>";
            }
            ?>
        </select>

        &nbsp;&nbsp;
        <label><strong>Session:</strong></label>
        <select name="ses" class="select" required>
            <?php
            $currSes = $_SESSION['session'] ?? '2026-2027';
            $sesRes = mysqli_query($con, "SELECT DISTINCT session FROM exam ORDER BY session DESC");
            if (mysqli_num_rows($sesRes) > 0) {
                while ($sRow = mysqli_fetch_array($sesRes)) {
                    $sel = (isset($_GET['ses']) ? $_GET['ses'] == $sRow['session'] : $currSes == $sRow['session']) ? 'selected="selected"' : '';
                    echo "<option value='{$sRow['session']}' $sel>{$sRow['session']}</option>";
                }
            } else {
                echo "<option value='$currSes'>$currSes</option>";
            }
            ?>
        </select>

        &nbsp;&nbsp;
        <button type="submit" class="btn-submit">Show Mark Summary</button>
        <?php if (!empty($_GET['class']) && !empty($_GET['ex'])): ?>
            &nbsp;&nbsp;
            <button type="button" id="print_btn" class="btn-submit" style="background:#005580;">Print</button>
            <button type="button" id="excel" class="btn-submit" style="background:#28a745;">Export Excel</button>
        <?php endif; ?>
    </form>
</div>

<?php
if (!empty($_GET['class']) && !empty($_GET['ex'])) {
    $selClass = mysqli_real_escape_string($con, $_GET['class']);
    $selExam = mysqli_real_escape_string($con, $_GET['ex']);
    $selSes = mysqli_real_escape_string($con, $_GET['ses'] ?? $_SESSION['session']);

    $rest = mysqli_query($con, "SELECT * FROM exam WHERE class = '$selClass' AND examination = '$selExam' AND session = '$selSes'");
    $subjects = [];
    $totalMaxSum = 0;
    while ($r = mysqli_fetch_array($rest)) {
        $subjects[] = $r['subject'];
        $totalMaxSum += floatval($r['marks']);
    }
?>
    <div id="div_to_print" style="background-color:#FFFFFF; padding: 15px; box-shadow: 0 0 10px rgba(0,0,0,0.15); overflow-x: auto;">
        <input type="hidden" id="cls" value="<?php echo htmlspecialchars($selClass); ?>">
        <input type="hidden" id="exm" value="<?php echo htmlspecialchars($selExam); ?>">
        <input type="hidden" id="ses" value="<?php echo htmlspecialchars($selSes); ?>">
        
        <table border="1" id="tbl_exm" style="font-size:13px; width:100%; border-collapse: collapse;" cellpadding="4" cellspacing="0">
            <thead>
                <tr>
                    <th colspan="<?php echo count($subjects) + 9; ?>" style="background: #004d26; text-align: center; font-size: 16px;">
                        Shining Public Hr. Sec. School Raisen (M.P.)<br>
                        <span style="font-size: 13px; font-weight: normal;">Class: <?php echo htmlspecialchars($selClass); ?> | Exam: <?php echo htmlspecialchars($selExam); ?> | Session: <?php echo htmlspecialchars($selSes); ?></span>
                    </th>
                </tr>
                <tr>
                    <th style="width:35px;">No.</th>
                    <th style="width:70px;">Adm No</th>
                    <th style="width:70px;">Roll No</th>
                    <th style="width:140px;">Student Name</th>
                    <th style="width:130px;">Father Name</th>
                    <th style="width:90px;">Contact</th>
                    <?php
                    foreach ($subjects as $sub) {
                        echo "<th class='po'>$sub</th>";
                    }
                    ?>
                    <th style="width:60px;">Total<br>[<span style="color:#FFD700;"><?php echo $totalMaxSum; ?></span>]</th>
                    <th style="width:50px;">Per.%</th>
                    <th style="width:50px;">Div.</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stQuery = mysqli_query($con, "SELECT * FROM student WHERE student_class = '$selClass' AND student_session = '$selSes' AND status = 0 ORDER BY student_name ASC");
                $i = 1;
                while ($st = mysqli_fetch_array($stQuery)) {
                    $stId = $st['student_id'];
                    $stUid = $st['uid'];
                    $stObtainTotal = 0;
                    $hasFail = false;

                    echo "<tr>";
                    echo "<td align='center'>$i</td>";
                    echo "<td>" . ($st['student_scholar'] ?? '') . "</td>";
                    echo "<td>" . ($st['student_rollno'] ?? '') . "</td>";
                    echo "<td><strong>" . ($st['student_name'] ?? '') . "</strong></td>";
                    echo "<td>" . ($st['student_fname'] ?? '') . "</td>";
                    echo "<td>" . ($st['student_contactno'] ?? '') . "</td>";

                    foreach ($subjects as $sub) {
                        $mQuery = mysqli_query($con, "SELECT obtainmarks FROM marks WHERE (student = '$stId' OR student = '$stUid') AND class = '$selClass' AND ses = '$selSes' AND exam = '$selExam' AND subject = '" . mysqli_real_escape_string($con, $sub) . "' LIMIT 1");
                        $mRow = mysqli_fetch_array($mQuery);
                        $obtain = $mRow ? $mRow['obtainmarks'] : '-';

                        if (strcasecmp((string)$obtain, 'ab') === 0 || strcasecmp((string)$obtain, 'a') === 0) {
                            $hasFail = true;
                            echo "<td align='center' style='color:red;'>$obtain</td>";
                        } elseif (is_numeric($obtain)) {
                            $stObtainTotal += floatval($obtain);
                            echo "<td align='center'>$obtain</td>";
                        } else {
                            echo "<td align='center'>-</td>";
                        }
                    }

                    $per = $totalMaxSum > 0 ? round(($stObtainTotal / $totalMaxSum) * 100, 2) : 0;
                    if ($per >= 80) $div = 'Honors';
                    elseif ($per >= 60) $div = '1st';
                    elseif ($per >= 45) $div = '2nd';
                    elseif ($per >= 33) $div = '3rd';
                    else $div = 'Fail';

                    echo "<td align='center'><strong>$stObtainTotal</strong></td>";
                    echo "<td align='center'>{$per}%</td>";
                    echo "<td align='center'>$div</td>";
                    echo "</tr>";
                    $i++;
                }
                ?>
            </tbody>
        </table>
    </div>
<?php
}
?>

</body>
</html>
