<?php
session_start();
include("./php/config.php");

if (!isset($_SESSION['valid'])) {
    header("Location: login.php");
    exit;
}

$id = $_SESSION['id'];
$query = mysqli_query($con, "SELECT * FROM users WHERE id=$id");

if ($result = mysqli_fetch_assoc($query)) {
    $res_Uname = $result['name'];
    $res_Email = $result['email'];
    $res_Age = $result['age'];
    $res_id = $result['id'];
    $res_Category = $result['category'];
    $res_Contact = $result['contact'];
    $res_Location = $result['location'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {    
    if ($res_Category == 1) {
        $LandlordEmail = $_POST['LandlordEmail'];
        $AssistantEmail = $_POST['AssistantEmail'];
        mysqli_query($con, "INSERT INTO colab VALUES ('$res_Email','$LandlordEmail','$AssistantEmail')");
    } elseif ($res_Category == 2) {
        $AssistantEmail = $_POST['AssistantEmail'];
        $FarmerEmail = $_POST['FarmerEmail'];
        mysqli_query($con, "INSERT INTO colab VALUES ('$FarmerEmail','$res_Email','$AssistantEmail')");
    } else {
        $LandlordEmail = $_POST['LandlordEmail'];
        $FarmerEmail = $_POST['FarmerEmail'];
        mysqli_query($con, "INSERT INTO colab VALUES ('$FarmerEmail','$LandlordEmail','$res_Email')");
    }

    header("Location: home.php");
    
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collaborations</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./styles1.css">
</head>
<body>
    <div class="container">
        <div class="d-flex flex-column box form-box">
            <header>Collaborations</header>
            <p>Welcome, <?php echo htmlspecialchars($res_Uname); ?>! Enter your partners' emails to collaborate with.</p>
            <form action="collaboration.php" method="post">
                <?php if ($res_Category == '1') { ?>
                    <div class="field input">
                        <label for="AssistantEmail">Assistant Email</label>
                        <input type="email" name="AssistantEmail" id="AssistantEmail" required>
                    </div>
                    <div class="field input">
                        <label for="LandlordEmail">Landlord Email</label>
                        <input type="email" name="LandlordEmail" id="LandlordEmail" required>
                    </div>
                <?php } elseif ($res_Category == '2') { ?>
                    <div class="field input">
                        <label for="FarmerEmail">Farmer Email</label>
                        <input type="email" name="FarmerEmail" id="FarmerEmail" required>
                    </div>
                    <div class="field input">
                        <label for="AssistantEmail">Assistant Email</label>
                        <input type="email" name="AssistantEmail" id="AssistantEmail" required>
                    </div>
                <?php } elseif ($res_Category == '3') { ?>
                    <div class="field input">
                        <label for="FarmerEmail">Farmer Email</label>
                        <input type="email" name="FarmerEmail" id="FarmerEmail" required>
                    </div>
                    <div class="field input">
                        <label for="LandlordEmail">Landlord Email</label>
                        <input type="email" name="LandlordEmail" id="LandlordEmail" required>
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
