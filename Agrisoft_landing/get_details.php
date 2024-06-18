<?php

include './php/config.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the ID and category from the POST request
$id = $_POST['id'];
$category = $_POST['category'];

$sql = "";
if ($category == '1') {
    $sql = "SELECT * FROM landlords WHERE landlordid = '$id'";
} else if ($category == '2') {
    $sql = "SELECT * FROM landlords WHERE farmerid = '$id'";
} else if ($category == '3') {
    $sql = "SELECT * FROM landlords WHERE assistantid = '$id'";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode(array("success" => true, "data" => $row));
} else {
    echo json_encode(array("success" => false, "error" => "No records found"));
}

$conn->close();
?>

