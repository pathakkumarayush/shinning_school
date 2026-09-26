<?php
header('Content-Type: application/json');
require '../db.php';

$input = json_decode(file_get_contents("php://input"), true);
if (!$input) {
    $input = $_POST;
}

$id = isset($input['id']) ? (int)$input['id'] : 0;
$name = isset($input['name']) ? trim($input['name']) : '';
$mob = isset($input['mob']) ? trim($input['mob']) : '';
$city = isset($input['city']) ? trim($input['city']) : '';
$address = isset($input['address']) ? trim($input['address']) : '';

if ($name === '') {
    echo json_encode(['status' => false, 'message' => 'name is required']);
    exit;
}

$name_esc = mysqli_real_escape_string($con, $name);
$mob_esc = mysqli_real_escape_string($con, $mob);
$city_esc = mysqli_real_escape_string($con, $city);
$address_esc = mysqli_real_escape_string($con, $address);

if ($id > 0) {
    $updateQuery = "UPDATE vender 
                    SET name = '$name_esc', mob = '$mob_esc', city = '$city_esc', address = '$address_esc' 
                    WHERE id = '$id'";
    if (mysqli_query($con, $updateQuery)) {
        echo json_encode(['status' => true, 'message' => 'Vender updated successfully']);
    } else {
        echo json_encode(['status' => false, 'message' => 'Failed to update vender']);
    }
} else {
    $insertQuery = "INSERT INTO vender (name, mob, city, address) 
                    VALUES ('$name_esc', '$mob_esc', '$city_esc', '$address_esc')";
    if (mysqli_query($con, $insertQuery)) {
        echo json_encode(['status' => true, 'message' => 'Vender added successfully', 'data' => ['id' => mysqli_insert_id($con)]]);
    } else {
        echo json_encode(['status' => false, 'message' => 'Failed to add vender']);
    }
}
?>
