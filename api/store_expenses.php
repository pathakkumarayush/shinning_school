<?php
header('Content-Type: application/json');
require '../db.php';

$input = json_decode(file_get_contents("php://input"), true);
if (!$input) {
    $input = $_POST;
}

$id = isset($input['id']) ? (int)$input['id'] : 0;
$name = isset($input['name']) ? trim($input['name']) : ''; // Header
$vname = isset($input['vname']) ? trim($input['vname']) : ''; // Vendor
$ptype = isset($input['ptype']) ? trim($input['ptype']) : '';
$cno = isset($input['cno']) ? trim($input['cno']) : '';
$bname = isset($input['bname']) ? trim($input['bname']) : '';
$amt = isset($input['amt']) ? trim($input['amt']) : '';
$date = isset($input['date']) ? trim($input['date']) : '';
$rmk = isset($input['rmk']) ? trim($input['rmk']) : '';

if ($name === '' || $vname === '' || $amt === '' || $date === '') {
    echo json_encode(['status' => false, 'message' => 'name (header), vname (vendor), amt, and date are required']);
    exit;
}

$name_esc = mysqli_real_escape_string($con, $name);
$vname_esc = mysqli_real_escape_string($con, $vname);
$ptype_esc = mysqli_real_escape_string($con, $ptype);
$cno_esc = mysqli_real_escape_string($con, $cno);
$bname_esc = mysqli_real_escape_string($con, $bname);
$amt_esc = mysqli_real_escape_string($con, $amt);
$date_esc = mysqli_real_escape_string($con, $date);
$rmk_esc = mysqli_real_escape_string($con, $rmk);

date_default_timezone_set('Asia/Kolkata');
$dos = date('Y-m-d'); // Current system date for date of submission

if ($id > 0) {
    $updateQuery = "UPDATE expenses 
                    SET name = '$name_esc', vname = '$vname_esc', ptype = '$ptype_esc', 
                        cno = '$cno_esc', bname = '$bname_esc', amt = '$amt_esc', 
                        date = '$date_esc', rmk = '$rmk_esc' 
                    WHERE id = '$id'";
    if (mysqli_query($con, $updateQuery)) {
        echo json_encode(['status' => true, 'message' => 'Expense updated successfully']);
    } else {
        echo json_encode(['status' => false, 'message' => 'Failed to update expense']);
    }
} else {
    $insertQuery = "INSERT INTO expenses (name, vname, ptype, cno, bname, amt, dos, date, rmk) 
                    VALUES ('$name_esc', '$vname_esc', '$ptype_esc', '$cno_esc', '$bname_esc', '$amt_esc', '$dos', '$date_esc', '$rmk_esc')";
    if (mysqli_query($con, $insertQuery)) {
        echo json_encode(['status' => true, 'message' => 'Expense added successfully', 'data' => ['id' => mysqli_insert_id($con)]]);
    } else {
        echo json_encode(['status' => false, 'message' => 'Failed to add expense']);
    }
}
?>
