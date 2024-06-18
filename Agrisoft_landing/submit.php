<?php

include './php/config.php';

function uploadFile($file, $directory) {
    $target_file = $directory . basename($file["name"]);
    if (move_uploaded_file($file["tmp_name"], $target_file)) {
        return $target_file;
    } else {
        return null;
    }
}

// Get form data
$category = $_POST['category'];
$name = $_POST['name'];
$age = $_POST['age'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$location = $_POST['location'];
$password = $_POST['password'];
$land_in_acres = $_POST['land_in_acres'];
$land_location = $_POST['land_location'];
$land_type = $_POST['land_type'];
$crop_planning = uploadFile($_FILES['crop_planning'], "uploads/crop_planning/");
$budget = $_POST['budget'];
$land_reports = uploadFile($_FILES['land_reports'], "uploads/land_reports/");
$legal_agreements = uploadFile($_FILES['legal_agreements'], "uploads/legal_agreements/");
$contract_details = uploadFile($_FILES['contract_details'], "uploads/contract_details/");

$farmer_id = $_POST['farmer_id'] ?? null;
$landlord_id = $_POST['landlord_id'] ?? null;
$assistant_id = $_POST['assistant_id'] ?? null;

// Insert data into the respective table
if ($category == '1') {
    $sql = "INSERT INTO farmers (farmerid, landlordid, assistantid, category, name, age, email, contact, location, password, land_in_acres, land_location, land_type, crop_planning, budget, land_reports, legal_agreements, contract_details) 
            VALUES ('$farmer_id', '$landlord_id', '$assistant_id', '$category', '$name', '$age', '$email', '$contact', '$location', '$password', '$land_in_acres', '$land_location', '$land_type', '$crop_planning', '$budget', '$land_reports', '$legal_agreements', '$contract_details')";
} elseif ($category == '2') {
    $sql = "INSERT INTO landlords (landlordid, farmerid, assistantid, category, name, age, email, contact, location, password, land_in_acres, land_location, land_type, crop_planning, budget, land_reports, legal_agreements, contract_details) 
            VALUES ('$landlord_id', '$farmer_id', '$assistant_id', '$category', '$name', '$age', '$email', '$contact', '$location', '$password', '$land_in_acres', '$land_location', '$land_type', '$crop_planning', '$budget', '$land_reports', '$legal_agreements', '$contract_details')";
} elseif ($category == '3') {
    $sql = "INSERT INTO assistants (assistantid, farmerid, landlordid, category, name, age, email, contact, location, password, land_in_acres, land_location, land_type, crop_planning, budget, land_reports, legal_agreements, contract_details) 
            VALUES ('$assistant_id', '$farmer_id', '$landlord_id', '$category', '$name', '$age', '$email', '$contact', '$location', '$password', '$land_in_acres', '$land_location', '$land_type', '$crop_planning', '$budget', '$land_reports', '$legal_agreements', '$contract_details')";
}

if (mysqli_query($con, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

mysqli_close($con);
?>


