<?php
session_start();
include("./php/config.php");

if (!isset($_SESSION['valid'])) {
    header("Location: login.php");
    exit;
}

$id = $_SESSION['id'];
$query = mysqli_query($con, "SELECT * FROM users WHERE id = $id");

if ($result = mysqli_fetch_assoc($query)) {
    $res_Uname = $result['name'];
    $res_Email = $result['email'];
    $res_Age = $result['age'];
    $res_id = $result['id'];
    $res_Category = $result['category'];
    $res_Contact = $result['contact'];
    $res_Location = $result['location'];
}

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $error = false;

    if ($res_Category == 1) {
        $LandlordEmail = mysqli_real_escape_string($con, $_POST['LandlordEmail']);
        $AssistantEmail = mysqli_real_escape_string($con, $_POST['AssistantEmail']);

        if (!emailExists($LandlordEmail, $con)) {
            $error = true;
            $errors[] = "Landlord email address is not yet registered.";
        }

        if (!emailExists($AssistantEmail, $con)) {
            $error = true;
            $errors[] = "Assistant email address is not yet registered.";
        }

        if (emailCollaborated($LandlordEmail, $AssistantEmail, $con)) {
            $error = true;
            $errors[] = "One of the emails is already collaborated with another. Please try other emails.";
        }

        if (!$error) {
            mysqli_query($con, "INSERT INTO colab (farmer, landlord, assistant) VALUES ('$res_Email','$LandlordEmail','$AssistantEmail')");
            header("Location: home.php");
            exit();
        }
    } elseif ($res_Category == 2) {
        $AssistantEmail = mysqli_real_escape_string($con, $_POST['AssistantEmail']);
        $FarmerEmail = mysqli_real_escape_string($con, $_POST['FarmerEmail']);

        if (!emailExists($FarmerEmail, $con)) {
            $error = true;
            $errors[] = "Farmer email address is not yet registered.";
        }

        if (!emailExists($AssistantEmail, $con)) {
            $error = true;
            $errors[] = "Assistant email address is not yet registered.";
        }

        if (emailCollaborated($FarmerEmail, $AssistantEmail, $con)) {
            $error = true;
            $errors[] = "One of the emails is already collaborated with another. Please try other emails.";
        }

        if (!$error) {
            mysqli_query($con, "INSERT INTO colab (farmer, landlord, assistant) VALUES ('$FarmerEmail','$res_Email','$AssistantEmail')");
            header("Location: home.php");
            exit();
        }
    } elseif ($res_Category == 3) {
        $LandlordEmail = mysqli_real_escape_string($con, $_POST['LandlordEmail']);
        $FarmerEmail = mysqli_real_escape_string($con, $_POST['FarmerEmail']);

        if (!emailExists($FarmerEmail, $con)) {
            $error = true;
            $errors[] = "Farmer email address is not yet registered.";
        }

        if (!emailExists($LandlordEmail, $con)) {
            $error = true;
            $errors[] = "Landlord email address is not yet registered.";
        }

        if (emailCollaborated($LandlordEmail, $FarmerEmail, $con)) {
            $error = true;
            $errors[] = "One of the emails is already collaborated with another. Please try other emails.";
        }

        if (!$error) {
            mysqli_query($con, "INSERT INTO colab (farmer, landlord, assistant) VALUES ('$FarmerEmail','$LandlordEmail','$res_Email')");
            header("Location: home.php");
            exit();
        }
    }
}

function emailExists($email, $con) {
    $query = mysqli_query($con, "SELECT * FROM users WHERE email = '$email'");
    return mysqli_num_rows($query) > 0;
}

function emailCollaborated($email1, $email2, $con) {
    $query = mysqli_query($con, "SELECT * FROM colab WHERE farmer = '$email1' OR landlord = '$email1' OR assistant = '$email1' 
                                OR farmer = '$email2' OR landlord = '$email2' OR assistant = '$email2'");
    return mysqli_num_rows($query) > 0;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collaborations</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./styles1.css">
    <script>
    $(document).ready(function() {
        $('#LandlordEmail').on('blur', function() {
            var email = $(this).val();
            if (email !== '') {
                $.ajax({
                    url: 'check_email.php',
                    type: 'POST',
                    data: { email: email },
                    success: function(response) {
                        if (response == 'exists') {
                            $('#landlord-email-error').text('');
                        } else {
                            $('#landlord-email-error').text('This email address is not yet registered.');
                        }
                    }
                });
            }
        });

        $('#AssistantEmail').on('blur', function() {
            var email = $(this).val();
            if (email !== '') {
                $.ajax({
                    url: 'check_email.php',
                    type: 'POST',
                    data: { email: email },
                    success: function(response) {
                        if (response == 'exists') {
                            $('#assistant-email-error').text('');
                        } else {
                            $('#assistant-email-error').text('This email address is not yet registered.');
                        }
                    }
                });
            }
        });
    });
    </script>
</head>
<body>
    <div class="container">
        <div class="d-flex flex-column box form-box">
            <header>Collaborations</header>
            <p>Welcome, <?php echo htmlspecialchars($res_Uname); ?>! Enter your partners' emails to collaborate with.</p>
            <?php if (!empty($errors)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php foreach ($errors as $error) {
                        echo "<p>$error</p>";
                    } ?>
                </div>
            <?php } ?>
            <form action="collaboration.php" method="post">
                <?php if ($res_Category == '1') { ?>
                    <div class="field input">
                        <label for="AssistantEmail">Assistant Email</label>
                        <input type="email" name="AssistantEmail" id="AssistantEmail" required>
                        <span id="assistant-email-error" style="color: red;"></span>
                    </div>
                    <div class="field input">
                        <label for="LandlordEmail">Landlord Email</label>
                        <input type="email" name="LandlordEmail" id="LandlordEmail" required>
                        <span id="landlord-email-error" style="color: red;"></span>
                    </div>
                <?php } elseif ($res_Category == '2') { ?>
                    <div class="field input">
                        <label for="FarmerEmail">Farmer Email</label>
                        <input type="email" name="FarmerEmail" id="FarmerEmail" required>
                        <span id="farmer-email-error" style="color: red;"></span>
                    </div>
                    <div class="field input">
                        <label for="AssistantEmail">Assistant Email</label>
                        <input type="email" name="AssistantEmail" id="AssistantEmail" required>
                        <span id="assistant-email-error" style="color: red;"></span>
                    </div>
                <?php } elseif ($res_Category == '3') { ?>
                    <div class="field input">
                        <label for="FarmerEmail">Farmer Email</label>
                        <input type="email" name="FarmerEmail" id="FarmerEmail" required>
                        <span id="farmer-email-error" style="color: red;"></span>
                    </div>
                    <div class="field input">
                        <label for="LandlordEmail">Landlord Email</label>
                        <input type="email" name="LandlordEmail" id="LandlordEmail" required>
                        <span id="landlord-email-error" style="color: red;"></span>
                    </div>
                <?php } ?>
                <div class="d-flex flex-row">
                    <div class="field links">
                        <button type="button" onclick="history.back()" class="btn btn-default">Go Back</button>
                    </div>
                    <div class="Rsubmit">
                        <input type="submit" class="btn btn-primary" name="submit" value="Collaborate">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
