<?php

include './php/config.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$category = $_POST['category'];
$name = $_POST['name'];
$age = $_POST['age'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$location = $_POST['location'];


if ($category == '1') {
    $sql = "INSERT INTO farmers (category, name, age, email, contact, location) VALUES ('$category', '$name', '$age', '$email', '$contact', '$location')";
} elseif ($category == '2') {
    $sql = "INSERT INTO landlords (category, name, age, email, contact, location) VALUES ('$category', '$name', '$age', '$email', '$contact', '$location')";
} elseif ($category == '3') {
    $sql = "INSERT INTO assistants (category, name, age, email, contact, location) VALUES ('$category', '$name', '$age', '$email', '$contact', '$location')";
}

if ($conn->query($sql) === TRUE) {
    $user_id = $conn->insert_id; // Get the ID of the inserted record
    echo json_encode(array("success" => true, "user_id" => $user_id));
} else {
    echo json_encode(array("success" => false, "error" => $conn->error));
}

$conn->close();
?>
