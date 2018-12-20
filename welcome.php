<?php
// Initialize the session
session_start();
require_once "includes/config.php";
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// $sql = "INSERT INTO userWeight (userID,weight) VALUES ('5','99')";
// if ($link->query($sql) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $link->error;
// }

// $link->close();

// $id = $_SESSION["id"];

// $sql = "SELECT weight, timee FROM userWeight WHERE userID = $id";
// $result = $link->query($sql);

// if ($result->num_rows > 0) {
//     // output data of each row
//     while($row = $result->fetch_assoc()) {
//         echo "weight: " . $row["weight"] . " " . $row["timee"] . "<br>";
//     }
// } else {
//     echo "0 results";
// }
// $link->close();
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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

    <!-- <input type="submit" class="button" name="insert" value="insert"/> -->
    <form method="post" action="welcome.php">
        <input type="number" name="weight" placeholder="Enter new weight">
        <input type="submit" name="submit" value="Add Weight">
    </form>
    <?php
      if(isset($_POST["weight"])){
        $tt = $_POST["weight"];
        $id = $_SESSION["id"];

       
    $sql = "INSERT INTO userWeight (userID,weight) VALUES ($id, $tt)";
    if ($link->query($sql) === TRUE) {
        echo "New record created successfully";
        $_SESSION["cWeight"] = $tt;
        $sql2 = "UPDATE users SET cWeight=$tt WHERE id=$id";
        

    if ($link->query($sql2) === TRUE) {
        echo "Record updated successfully";
        header("Refresh:0"); //refresh so weight changes can be seen
    } else {
        echo "Error updating record: " . $link->error;
    }
     
    } else {
        echo "Error: " . $sql . "<br>" . $link->error;
    }

    $link->close();
      } 


    ?>

    <?php
    $id = $_SESSION["id"];

    //gets weight entries for only TODAY - good for the add food function 
    $sql = "SELECT weight, timee FROM userWeight WHERE userID = $id AND DATE(`timee`) = CURDATE()";
    $result = $link->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        echo "<p>Your weight history for today only:</p>";
        while($row = $result->fetch_assoc()) {
            
            echo "<span style=\"font-weight: bold;\">weight: </span>" . $row["weight"] . "(kg) <span style=\"font-weight: bold;\">time updated:</span> " . $row["timee"] . "<br>";
        }
    } else {
        echo "<p>You have no weight history for today.</p>";
    }


    //gets weight entries of all time
    $sql = "SELECT weight, timee FROM userWeight WHERE userID = $id";
    $result = $link->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        echo "<p>All time weight history:</p>";
        while($row = $result->fetch_assoc()) {
            
            echo "<span style=\"font-weight: bold;\">weight: </span>" . $row["weight"] . "(kg) <span style=\"font-weight: bold;\">time updated:</span> " . $row["timee"] . "<br>";
        }
        echo "<br> Timezones are USA.";
    } else {
        echo "<p>You have no all time weight history.</p>";
    }
    $link->close();

    ?>




    <p>
        <a href="includes/logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>


</body>

</html>