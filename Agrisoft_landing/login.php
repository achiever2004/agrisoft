<?php
include("./php/config.php");

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $result = mysqli_query($con, "SELECT * FROM users WHERE email = '$email'") or die("Select error");
    $row = mysqli_fetch_assoc($result);

    if (is_array($row) && !empty($row)) {
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['valid'] = $row['email'];
            $_SESSION['username'] = $row['name'];
            $_SESSION['age'] = $row['age'];
            $_SESSION['id'] = $row['id'];
            header("Location: home.php");
        } else {
            echo "<div class='message'><p>Invalid Password</p></div><br>";
            echo "<a href='login.php'><button class='btn'>Go Back</button></a>";
        }
    } else {
        echo "<div class='message'><p>No user found with that email</p></div><br>";
        echo "<a href='login.php'><button class='btn'>Go Back</button></a>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page - AGRISØFT</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./styles1.css">
</head>
<body>
    <div class="container">
        <div class="d-flex flex-column box form-box">
            <header>Login</header>
            <form action="login.php" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="d-flex flex-row">
                    <div class="field links">
                        <button type="button" onclick="history.back()" class="btn btn-default">Go Back</button>
                    </div>
                    <div class="Rsubmit">
                        <input type="submit" class="btn" name="submit" value="Login">
                    </div>
                </div>
                <div class="links">
                    Don't have an account? <a href="./registration.php">Register Now</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
