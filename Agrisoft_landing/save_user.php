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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST['category'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $location = $_POST['location'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if ($category == '1') {
        // Insert into farmers table
        $sql = "INSERT INTO farmers (name, age, email, contact, location, password) VALUES ('$name', $age, '$email', '$contact', '$location', '$password')";
    } elseif ($category == '2') {
        // Insert into landlord table
        $landinacres = $_POST['landinacres'];
        $landtype = $_POST['landtype'];
        $crop_planning_doc = $_FILES['crop_planning_doc']['name'];
        $budget_details = $_POST['budget_details'];
        $land_reports_doc = $_FILES['land_reports_doc']['name'];
        $legal_agreements_doc = $_FILES['legal_agreements_doc']['name'];
        $contract_details_doc = $_FILES['contract_details_doc']['name'];

        move_uploaded_file($_FILES['crop_planning_doc']['tmp_name'], "uploads/" . $crop_planning_doc);
        move_uploaded_file($_FILES['land_reports_doc']['tmp_name'], "uploads/" . $land_reports_doc);
        move_uploaded_file($_FILES['legal_agreements_doc']['tmp_name'], "uploads/" . $legal_agreements_doc);
        move_uploaded_file($_FILES['contract_details_doc']['tmp_name'], "uploads/" . $contract_details_doc);

        $sql = "INSERT INTO landlord (name, age, email, contact, location, password, landinacres, landtype, crop_planning_doc, budget_details, land_reports_doc, legal_agreements_doc, contract_details_doc) VALUES ('$name', $age, '$email', '$contact', '$location', '$password', '$landinacres', '$landtype', '$crop_planning_doc', '$budget_details', '$land_reports_doc', '$legal_agreements_doc', '$contract_details_doc')";
    } elseif ($category == '3') {
        // Insert into assistant table
        $sql = "INSERT INTO assistant (name, age, email, contact, location, password) VALUES ('$name', $age, '$email', '$contact', '$location', '$password')";
    }

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
