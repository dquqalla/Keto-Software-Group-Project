<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <style type="text/css">

    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <?php echo ($_SESSION["firstName"]); ?> <?php echo ($_SESSION["lastName"]); ?></h1>
        <h4>Your email is: <?php echo ($_SESSION["email"]); ?></h4>
        <h4>Your are: <?php echo ($_SESSION["gender"]); ?></h4>
        <h4>Birth year: <?php echo ($_SESSION["birthYear"]); ?></h4>
        <h4>Current weight: <?php echo ($_SESSION["cWeight"]); ?></h4>
        <h4>Height (ft): <?php echo ($_SESSION["heightFeet"]); ?></h4>
        <h4>Height (inch): <?php echo ($_SESSION["heightInch"]); ?></h4>
        <h4>Body fat: <?php echo ($_SESSION["bodyFat"]); ?></h4>
        <h4>Goal Weight: <?php echo ($_SESSION["gWeight"]); ?></h4>
        <h4>Activity Level: <?php echo ($_SESSION["activityLevel"]); ?></h4>
    </div>
    <p>
        <a href="includes/logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
</body>
</html>