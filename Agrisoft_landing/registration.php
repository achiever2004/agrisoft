<?php
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

    // Check if passwords match
    if ($password !== $reenter_password) {
        echo "Passwords do not match.";
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check for unique email
    $result = mysqli_query($con, "SELECT * FROM users WHERE email = '$email'");
    if (mysqli_num_rows($result) > 0) {
        echo "Email already exists.";
    } else {
        // Insert the user into the database
        $query = "INSERT INTO users (category, name, age, email, contact, location, password) VALUES ('$category', '$name', '$age', '$email', '$contact', '$location', '$hashed_password')";
        if (mysqli_query($con, $query)) {
            header("Location: login.php");
            exit();
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
    <link rel="stylesheet" href="./styles1.css">
</head>
<body>
    <div class="container">
        <div class="d-flex flex-column box form-box">
            <header>Registration</header>
            <form id="registrationForm" action="registration.php" method="post">
                <label for="category">Category</label>
                <div class="input-group mb-3">
                    <select class="custom-select" id="category" name="category">
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
                    <label for="reenter_password">Reenter Password</label>
                    <input type="password" name="reenter_password" id="reenter_password" required>
                </div>
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Register">
                </div> 
                <div class="links">
                    Already have an account? <a href="./login.php">Login Now</a>
                </div>                               
            </form>
        </div>
    </div>
</body>
</html>
