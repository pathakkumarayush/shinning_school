<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('Asia/Kolkata');
header('Content-Type: application/json');

require '../db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only POST method allowed']);
    exit;
}

$id = isset($_POST['id']) ? mysqli_real_escape_string($con, $_POST['id']) : '';
$date = isset($_POST['date']) ? mysqli_real_escape_string($con, $_POST['date']) : '';
$todate = isset($_POST['todate']) ? mysqli_real_escape_string($con, $_POST['todate']) : '';
$eventname = isset($_POST['eventname']) ? mysqli_real_escape_string($con, $_POST['eventname']) : '';
$session = isset($_POST['session']) ? mysqli_real_escape_string($con, $_POST['session']) : '';
$class = isset($_POST['class']) ? mysqli_real_escape_string($con, $_POST['class']) : '';

if (empty($date) || empty($eventname)) {
    echo json_encode(['status' => false, 'message' => 'Date and Event Name are required.']);
    exit;
}

$date_formatted = date("Y-m-d", strtotime($date));
$month = date("M", strtotime($date));

if ($id) {
    $query = "UPDATE event_calendar SET event_date='$date_formatted', title='$eventname' WHERE id='$id'";
    if (mysqli_query($con, $query)) {
        echo json_encode(['status' => true, 'message' => 'Event updated successfully.']);
    } else {
        echo json_encode(['status' => false, 'message' => mysqli_error($con)]);
    }
} else {
    if (empty($todate)) {
        $query = "INSERT INTO event_calendar(event_date, title, session, class, month1) VALUES ('$date_formatted', '$eventname', '$session', '$class', '$month')";
        if (mysqli_query($con, $query)) {
            echo json_encode(['status' => true, 'message' => 'Event added successfully.']);
        } else {
            echo json_encode(['status' => false, 'message' => mysqli_error($con)]);
        }
    } else {
        $dateto = date("Y-m-d", strtotime($todate));
        
        function getAllDatesBetweenTwoDates($strDateFrom, $strDateTo)
        {
            $aryRange = array();
            $iDateFrom = strtotime($strDateFrom);
            $iDateTo = strtotime($strDateTo);
            if ($iDateTo >= $iDateFrom) {
                while ($iDateFrom <= $iDateTo) {
                    array_push($aryRange, date('Y-m-d', $iDateFrom));
                    $iDateFrom = strtotime('+1 day', $iDateFrom);
                }
            }
            return $aryRange;
        }
        
        $dateArray = getAllDatesBetweenTwoDates($date_formatted, $dateto);
        $success = true;
        $err_msg = '';
        foreach($dateArray as $dat) {
            $query = "INSERT INTO event_calendar(event_date, title, session, class, month1) VALUES ('$dat', '$eventname', '$session', '$class', '$month')";
            if (!mysqli_query($con, $query)) {
                $success = false;
                $err_msg = mysqli_error($con);
            }
        }
        if ($success) {
            echo json_encode(['status' => true, 'message' => 'Events added successfully.']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Some events could not be added. ' . $err_msg]);
        }
    }
}
?>
