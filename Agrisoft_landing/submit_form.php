<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agrisoft";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$category = $_POST['category'];
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$location = $_POST['location'];
$id = $_POST['ID'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$uniqueId = $_POST['farmerId'] ?? $_POST['landlordId'] ?? $_POST['assistantId'];

if ($password !== $repassword) {
    die("Passwords do not match.");
}

$sql = "INSERT INTO users (category, name, age, gender, email, contact, location, id, password, uniqueId) 
        VALUES ('$category', '$name', '$age', '$gender', '$email', '$contact', '$location', '$id', '$password', '$uniqueId')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
