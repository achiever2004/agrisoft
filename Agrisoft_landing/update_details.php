<?php

include './php/config.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$id = $_POST['id'];
$category = $_POST['category'];
$land_in_acres = $_POST['land_in_acres'];
$location = $_POST['location'];
$land_type = $_POST['land_type'];
$crop_planning = $_POST['crop_planning'];
$budget = $_POST['budget'];
$land_reports = $_POST['land_reports'];
$legal_agreements = $_POST['legal_agreements'];
$contract_details = $_POST['contract_details'];


if ($category == '1') {
    $sql = "UPDATE landlords SET land_in_acres='$land_in_acres', location='$location', land_type='$land_type', crop_planning='$crop_planning', budget='$budget', land_reports='$land_reports', legal_agreements='$legal_agreements', contract_details='$contract_details' WHERE id='$id'";
} elseif ($category == '2') {
    $sql = "UPDATE landlords SET land_in_acres='$land_in_acres', location='$location', land_type='$land_type', crop_planning='$crop_planning', budget='$budget', land_reports='$land_reports', legal_agreements='$legal_agreements', contract_details='$contract_details' WHERE id='$id'";
} elseif ($category == '3') {
    $sql = "UPDATE landlords SET land_in_acres='$land_in_acres', location='$location', land_type='$land_type', crop_planning='$crop_planning', budget='$budget', land_reports='$land_reports', legal_agreements='$legal_agreements', contract_details='$contract_details' WHERE id='$id'";
}

if ($conn->query($sql) === TRUE) {
    echo json_encode(array("success" => true));
} else {
    echo json_encode(array("success" => false, "error" => $conn->error));
}

$conn->close();
?>

