<?php
session_start();
include("./php/config.php");

if (isset($_POST['submit'])) {
    $category = mysqli_real_escape_string($con, $_POST['category']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $reenter_password = mysqli_real_escape_string($con, $_POST['reenter_password']);

    if ($password !== $reenter_password) {
        echo "<script>alert('Passwords do not match.');</script>";
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $result = mysqli_query($con, "SELECT * FROM users WHERE email = '$email'");
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Email already exists.');</script>";
    } else {
        $query = "INSERT INTO users (category, name, age, email, contact, location, password) VALUES ('$category', '$name', '$age', '$email', '$contact', '$location', '$hashed_password')";
        if (mysqli_query($con, $query)) {
            $owner_name = $name;

            if ($category == '2') {
                $land_area = mysqli_real_escape_string($con, $_POST['land_area']);
                $land_location = mysqli_real_escape_string($con, $_POST['land_location']);
                $land_type = mysqli_real_escape_string($con, $_POST['land_type']);
                $budget = mysqli_real_escape_string($con, $_POST['budget']);

                $crop_planning = "";
                if (isset($_FILES['crop_planning']) && $_FILES['crop_planning']['error'] == UPLOAD_ERR_OK) {
                    $crop_planning = 'uploads/' . basename($_FILES['crop_planning']['name']);
                    move_uploaded_file($_FILES['crop_planning']['tmp_name'], $crop_planning);
                }

                $land_reports = "";
                if (isset($_FILES['land_reports']) && $_FILES['land_reports']['error'] == UPLOAD_ERR_OK) {
                    $land_reports = 'uploads/' . basename($_FILES['land_reports']['name']);
                    move_uploaded_file($_FILES['land_reports']['tmp_name'], $land_reports);
                }

                $land_query = "INSERT INTO landdetails (owner_name, land_area, location, land_type, crop_planning, budget, land_reports) 
                               VALUES ('$owner_name', '$land_area', '$land_location', '$land_type', '$crop_planning', '$budget', '$land_reports')";
                if (mysqli_query($con, $land_query)) {
                    echo "<script>alert('Registration successful!'); window.location.href='login.php';</script>";
                    exit();
                } else {
                    echo "Error: " . mysqli_error($con);
                }
            } else {
                echo "<script>alert('Registration successful!'); window.location.href='login.php';</script>";
                exit();
            }
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script defer src="script.js"></script>
    <link rel="stylesheet" href="./styles1.css">
    <style>
        .landlord-details {
            display: none;
        }
    </style>
    <script>
        function toggleLandlordFields() {
            var category = document.getElementById("category").value;
            var landlordFields = document.querySelector(".landlord-details");
            landlordFields.style.display = category == "2" ? "block" : "none";
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="d-flex flex-column box form-box">
            <header>Registration</header>
            <form id="registrationForm" enctype="multipart/form-data" method="post">
                <label for="category">Category</label>
                <div class="input-group mb-3">
                    <select class="custom-select" id="category" name="category" onchange="toggleLandlordFields()">
                        <option value="1">Farmer</option>
                        <option value="2">Landlord</option>
                        <option value="3">Assistant</option>
                    </select>
                </div>
                <div>
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control gap_placeholder" required />
                </div>
                <div>
                    <label for="age">Age</label>
                    <input type="number" id="age" name="age" class="form-control gap_placeholder" required />
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control gap_placeholder" required />
                </div>
                <div>
                    <label for="contact">Contact</label>
                    <input type="text" id="contact" name="contact" class="form-control gap_placeholder" required />
                </div>
                <div>
                    <label for="location">Location</label>
                    <input type="text" id="location" name="location" class="form-control gap_placeholder" required />
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="field input">
                    <label for="reenter-password">Reenter Password</label>
                    <input type="password" name="reenter_password" id="reenter_password" required>
                </div>
                <div class="landlord-details">
                    <header>Land Details</header>
                    <div>
                        <label for="land_area">Land in Acres</label>
                        <input type="number" name="land_area" id="land_area" class="form-control gap_placeholder" />
                    </div>
                    <div>
                        <label for="land_location">Land Location</label>
                        <input type="text" name="land_location" id="land_location" class="form-control gap_placeholder" />
                    </div>
                    <div>
                        <label for="land_type">Land Type</label>
                        <div class="input-group mb-3 option">
                            <select class="custom-select" id="land_type" name="land_type">
                                <option value="Dry">Dry</option>
                                <option value="Wet">Wet</option>
                                <option value="Both">Both</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="crop_planning">Crop Planning</label>
                        <input type="file" name="crop_planning" id="crop_planning" class="form-control gap_placeholder" />
                    </div>
                    <div>
                        <label for="budget">Budget</label>
                        <input type="number" name="budget" id="budget" class="form-control gap_placeholder" />
                    </div>
                    <div>
                        <label for="land_reports">Land Reports</label>
                        <input type="file" name="land_reports" id="land_reports" class="form-control gap_placeholder" />
                    </div>
                </div>
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Register">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
