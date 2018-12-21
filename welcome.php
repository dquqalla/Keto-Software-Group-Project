<?php
// Initialize the session
session_start();
require_once "includes/config.php";
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

if(isset($_POST['submit2'])){
    move_uploaded_file($_FILES['file']['tmp_name'],"images/profilePictures/".$_FILES['file']['name']);

    $sql = "UPDATE users SET profilePicture = '".$_FILES['file']['name']."' WHERE id = '".$_SESSION['id']."'";
	if ($link->query($sql) === TRUE) {
	    echo "Profile picture uploaded successfully.";
	} else {
	    echo "Error: " . $sql . "<br>" . $link->error;
	}
}

if(!empty($_POST["weight"])){
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
	//$link->close();
}

if(!empty($_POST['rName'] || $_POST['mCat'] || $_POST['cal'] || $_POST['car'] || $_POST['pro'] || $_POST['fat'])) {
	$ttn = $_POST["rName"];
	$ttm = $_POST["mCat"];
	$ttc = $_POST["cal"];
	$ttcr = $_POST["car"];
	$ttp = $_POST["pro"];
	$ttf = $_POST["fat"];
	$id = $_SESSION["id"];

	$sqlqw = "INSERT INTO userFood (userID,rName,mCat,calories,carbs,protein,fat) VALUES ($id, '$ttn', '$ttm', $ttc, $ttcr, $ttp, $ttf)";

	if ($link->query($sqlqw) === TRUE) {
		echo "New record created successfully";
		header("Refresh:0");
	} else {
		echo "Error: " . $sqlqw . "<br>" . $link->error;
	}

	//$link->close();
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
		font-size: 24px;font-weight: 700;font-family: 'Open Sans', sans-serif;padding-bottom: 10px;
	}
	h2 {
		font-size: 24px;font-weight: 700;font-family: 'Open Sans', sans-serif;padding-bottom: 10px;color:#ee5253;text-decoration: underline;padding-top:20px;
	}
	h4 {
		font-size: 15px;font-weight: 400;font-family: 'Open Sans', sans-serif; padding: 10px 0px;
	}
	h4 span {
		font-size: 15px;font-weight: 700;font-family: 'Open Sans', sans-serif; padding: 10px 0px;
	}
	.weight {
		background-color: #eee;padding: 10px 20px;border: 1px solid #999;border-radius: 4px;
	}
	.addW, .addP {
		background-color: #2ecc71;padding: 10px 20px;border: 1px solid #999;border-radius: 4px;color: #fff;
	}
	#foodTable {
		border-collapse: collapse;
		width: 500px;
	}

	#foodTable td, #customers th {
		border: 1px solid #ddd;
		padding: 8px;
	}

	#foodTable tr:nth-child(even){background-color: #f2f2f2;}

	#foodTable tr:hover {background-color: #ddd;}

	#foodTable th {
		padding-top: 12px;
		padding-bottom: 12px;
		text-align: left;
		background-color: #45aaf2;
		color: white;
		padding-left: 10px;
	}
	.hCon {
		/*border: 1px solid #000;*/
	}
	.pageCon {
		padding: 30px;
	}
	.foodForm input {
		display: block;
		margin: 10px 0px;
    	width: 300px;
	}
    </style>
</head>
<body>
	<div class="pageCon">
    <div class="page-header">
        <h1>Hi, <?php echo ($_SESSION["firstName"]); ?> <?php echo ($_SESSION["lastName"]); ?></h1>
        <div class="hCon">
        <h4><span>Email:</span> <?php echo ($_SESSION["email"]); ?></h4>
        <h4><span>Gender:</span> <?php echo ($_SESSION["gender"]); ?></h4>
        <h4><span>Birth Year:</span> <?php echo ($_SESSION["birthYear"]); ?></h4>
        <h4><span>Current Weight:</span> <?php echo ($_SESSION["cWeight"]); ?>kg</h4>
        <h4><span>Height (ft)</span> <?php echo ($_SESSION["heightFeet"]); ?></h4>
        <h4><span>Height (inch):</span> <?php echo ($_SESSION["heightInch"]); ?></h4>
        <h4><span>Body Fat Percentage:</span> <?php echo ($_SESSION["bodyFat"]); ?></h4>
        <h4><span>Goal Weight:</span> <?php echo ($_SESSION["gWeight"]); ?>kg</h4>
        <h4><span>Activity Level:</span> <?php echo ($_SESSION["activityLevel"]); ?></h4>
        </div>
    </div>

    <!-- <input type="submit" class="button" name="insert" value="insert"/> -->
    <h2>Add Weight</h2>
    <form method="post" action="welcome.php" style="padding: 20px 0px;">
   		<input class="weight" type="number" name="weight" placeholder="Enter New Weight" required>
   		<input class="addW" type="submit" name="submit" value="Add Weight">
	</form>

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

	<h2>Change Profile Picture</h2>

	<?php

	$sql = "SELECT profilePicture FROM users WHERE id = $id";
	$result = $link->query($sql);

	    while($row = $result->fetch_assoc()){
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
	    	//$link->close();
	?>
	<form action="" method="post" enctype="multipart/form-data">
	<input type="file" name="file">
	<input class="addP" type="submit" name="submit2" value="Upload">
	</form>

	<h2>Add Food</h2>
	<form method="post" action="welcome.php" class="foodForm" style="padding: 20px 0px;">
		<input class="weight" type="text" name="rName" placeholder="name of recipe" required>
		<input class="weight" type="text" name="mCat" placeholder="meal category" required>
		<input class="weight" type="text" name="cal" placeholder="calories" required>
		<input class="weight" type="text" name="car" placeholder="carbs" required>
		<input class="weight" type="text" name="pro" placeholder="protine" required>
		<input class="weight" type="text" name="fat" placeholder="fat" required>
		<input class="addW" type="submit" name="submit" value="Add Food" required>
	</form>

	<?php

	$id = $_SESSION["id"];

	$sql = "SELECT rName, mCat, calories, carbs, protein, fat, 'time' FROM userFood WHERE userID = $id";
	$result = $link->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    echo "<p style=\"font-weight: bold; padding-bottom: 14px;\">Your food history:</p>";
		echo "<table id=\"foodTable\">";
		echo "<tr><th>Name:</th><th>Category</th><th>Calories</th><th>Carbs</th><th>Protein</th><th>Fat</th></tr>";
	    while($row = $result->fetch_assoc()) {
	        echo "<tr>" . "<td>" . $row["rName"] . "</td><td>" . $row["mCat"] . "</td><td>" . $row["calories"] . "</td><td>" . $row["carbs"] . "</td><td>" . $row["protein"] . "</td><td>" . $row["fat"] . "</td></tr>";
	    }
	    echo "</table>";
	} else {
	    echo "<p>You haven't added any food.</p>";
	}
	//SELECT SUM(calories) FROM userFood WHERE userID = 5;


	$link->close();

	?>

	<p style="padding: 50px 0px;" >
        <a href="includes/logout.php" class="btn btn-danger">--- Sign Out of Your Account ---</a>
    </p>

</div>
</body>

</html>