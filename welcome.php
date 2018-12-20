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


if(isset($_POST['submit2'])){
        move_uploaded_file($_FILES['file']['tmp_name'],"images/profilePictures/".$_FILES['file']['name']);
        //$q = mysqli_query($con,"UPDATE users SET image = '".$_FILES['file']['name']."' WHERE id = '".$_SESSION['id']."'");

        $sql = "UPDATE users SET profilePicture = '".$_FILES['file']['name']."' WHERE id = '".$_SESSION['id']."'";
        if ($link->query($sql) === TRUE) {
            echo "Profile picture uploaded successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $link->error;
        }
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="css/reset.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,600i,700,700i,800" rel="stylesheet">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style type="text/css">
    .drop {
        display: inline-block;position: relative;
    }
    .profileImageContainer {
        display: inline-block;vertical-align: middle;
    }
    .profileImage {
        width: 200px;height: 200px;background-color: #FD809E;border-radius: 100%;margin: 0px 10px;cursor: pointer;
    }
    .profileImage p {
        font-size: 18px;text-align: center;color: #fff;font-weight: 600;padding-top: 78px;
    }
    .profileImage img {
        border-radius: 100px;width: 200px; height: 200px;
        }
    h1 {
        font-size: 34px;font-weight: 700;font-family: 'Open Sans', sans-serif;
    }
    h4 {
        font-size: 24px;font-weight: 400;font-family: 'Open Sans', sans-serif;
    }
    .weight {
        background-color: #eee;padding: 10px 20px;border: 1px solid #999;border-radius: 6px;
    }
    .addW, .addP {
        background-color: #2ecc71;padding: 10px 20px;border: 1px solid #999;border-radius: 6px;color: #fff;
    }
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
    <h4>--------------------------------</h4>
    <!-- <input type="submit" class="button" name="insert" value="insert"/> -->
    <form method="post" action="welcome.php" style="padding: 20px 0px;">
        <input class="weight" type="number" name="weight" placeholder="Enter new weight">
        <input class="addW" type="submit" name="submit" value="Add Weight">
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
            header("Refresh:0");
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
        echo "<p style=\"font-weight: bold;\">Your weight history for today only:</p>";
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
        echo "<br>";
        echo "<p style=\"font-weight: bold;\">All time weight history:</p>";
        while($row = $result->fetch_assoc()) {
            
            echo "<span style=\"font-weight: bold;\">weight: </span>" . $row["weight"] . "(kg) <span style=\"font-weight: bold;\">time updated:</span> " . $row["timee"] . "<br>";
        }
        echo "<br> Timezones are USA.";
    } else {
        echo "<p>You have no all time weight history.</p>";
    }
    

    ?>
<h4>--------------------------------</h4>


                 <?php

                    $sql = "SELECT profilePicture FROM users WHERE id = $id";
                    $result = $link->query($sql);
   
                        while($row = $result->fetch_assoc()){
                                echo $row['id'];
                                if($row['profilePicture'] == ""){
                                        echo "

                                        <div class=\"drop\"> 
                                        <div class=\"profileImageContainer\">
                                        <div class=\"profileImage\">
                                        <p id=\"nameLetter\">You got no profile image!</p>
                                        </div>
                                        </div>
                                        <div id=\"drop-content\" class=\"drop-content\" style=\"display: none;\">
                                        <span>Change Picture</span>
                                        <span>Remove Picture</span>
                                        </div>
                                        </div>

                                        ";
                                } else {

                                        echo "

                                        <div class=\"drop\"> 
                                        <div class=\"profileImageContainer\">
                                        <div class=\"profileImage\">
                                        <img src='images/profilePictures/".$row['profilePicture']."' alt='Profile Pic'>
                                        </div>
                                        </div>
                                        </div>

                                        ";
                                }
                                echo "<br>";
                        }
                            $link->close();
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="file" name="file">
                    <input class="addP" type="submit" name="submit2" value="Upload">
                </form>

    <p style="padding: 50px 0px;" >
        <a href="includes/logout.php" class="btn btn-danger">--- Sign Out of Your Account ---</a>
    </p>


</body>

</html>