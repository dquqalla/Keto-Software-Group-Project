<?php
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

//This function check if they are logging in for the first time
//If they are then it is essential we add their start weight to the user weight table
//This function will only ever run once
$id = $_SESSION["id"];
$firstLoginCheck = "SELECT firstLogin FROM users WHERE id=$id";
$firstLoginResult = $link->query($firstLoginCheck);

if($firstLoginResult->num_rows > 0) {

	$firstLoginAns = $firstLoginResult->fetch_assoc();

	$firstLogin = $firstLoginAns["firstLogin"];

	if ($firstLogin == 0) {
		$cWeight = $_SESSION["cWeight"];
		$id = $_SESSION["id"];

		$addWeightOnLogin = "INSERT INTO userWeight (userID,weight,timee) VALUES ($id, $cWeight, now() + INTERVAL 7 HOUR)";
		$link->query($addWeightOnLogin);

		$updateLogin = "UPDATE users SET firstLogin=1 WHERE id=$id";
		$link->query($updateLogin);
	}
}

//This function deals with updating the profile picture
if(isset($_POST['submit2'])){
    move_uploaded_file($_FILES['file']['tmp_name'],"images/profilePictures/".$_FILES['file']['name']);

    $sql = "UPDATE users SET profilePicture = '".$_FILES['file']['name']."' WHERE id = '".$_SESSION['id']."'";
	if ($link->query($sql) === TRUE) {
	    //echo "Profile picture uploaded successfully.";
	} else {
	    echo "Error: " . $sql . "<br>" . $link->error;
	}
}

if(isset($_POST["removePicture"])){
	$id = $_SESSION["id"];
	$sql = "UPDATE users SET profilePicture = '' WHERE id=$id";
	$link->query($sql) === TRUE;
}

//This function deals with updating/adding weight
if(isset($_POST["weight"])){
	$tt = $_POST["weight"];
	$id = $_SESSION["id"];

	$sql = "INSERT INTO userWeight (userID,weight,timee) VALUES ($id, $tt, now() + INTERVAL 7 HOUR)";

	if ($link->query($sql) === TRUE) { //Run the query to add to userWeight table
		//echo "New record created successfully";
		$_SESSION["cWeight"] = $tt;
		$sql2 = "UPDATE users SET cWeight=$tt WHERE id=$id"; //Update user table to make new weight their current weight

		if ($link->query($sql2) === TRUE) { //Run the query to update the user table
			//echo "Record updated successfully";
			header("Refresh:0"); //Refresh the page
		} else {
			echo "Error updating record: " . $link->error;
		}
	} else {
		echo "Error: " . $sql . "<br>" . $link->error;
	}
	//$link->close();
}

//This function deals with adding food
if(isset($_POST['rName'], $_POST['mCat'], $_POST['cal'], $_POST['car'], $_POST['pro'], $_POST['fat'])) {
	$ttn = $_POST["rName"];
	$ttm = $_POST["mCat"];
	$ttc = $_POST["cal"];
	$ttcr = $_POST["car"];
	$ttp = $_POST["pro"];
	$ttf = $_POST["fat"];
	$id = $_SESSION["id"];

	$sqlqw = "INSERT INTO userFood (userID,rName,mCat,calories,carbs,protein,fat,`time`) VALUES ($id, '$ttn', '$ttm', $ttc, $ttcr, $ttp, $ttf, now() + INTERVAL 7 HOUR)";

	if ($link->query($sqlqw) === TRUE) {
		header("Refresh:0");
	} else {
		echo "Error: " . $sqlqw . "<br>" . $link->error;
	}
	//$link->close();
} 

//This function deals with adding water via inputbox/sweetAlert
if(isset($_POST["water"])){
	$waterA = $_POST["water"];
	$id = $_SESSION["id"];

	//We are using a for loop so we can remove water too!
	for ($x = 1; $x <= $waterA; $x++) {
		$sqlWater = "INSERT INTO userWater (userID,waterAmount,`time`) VALUES ($id, 1, now() + INTERVAL 7 HOUR)";

		if ($link->query($sqlWater) === TRUE) {
		} else {
			echo "Error: " . $sqlWater . "<br>" . $link->error;
		}
	}
}

//This function deals with adding water via the add button
if(isset($_POST["waterAddButton"])){
	$id = $_SESSION["id"];

	$sqlWater = "INSERT INTO userWater (userID,waterAmount,`time`) VALUES ($id, 1, now() + INTERVAL 7 HOUR)";

	if ($link->query($sqlWater) === TRUE) {
	} else {
		echo "Error: " . $sqlWater . "<br>" . $link->error;
	}
}

//This function deals with deleting water via the delete button
if(isset($_POST["waterAddDButton"])){
	$id = $_SESSION["id"];
	$currDate = date("Y-m-d");

	$water_total = "SELECT waterAmount FROM userWater WHERE userID = $id AND DATE(`time`) = '$currDate'";
	$water_t = $link->query($water_total);
	
	if(!($water_t->num_rows == 0)) {
		$sqlWater = "DELETE FROM userWater WHERE userID=$id ORDER BY `time` DESC LIMIT 1";

		if ($link->query($sqlWater) === TRUE) {
		} else {
			echo "Error: " . $sqlWater . "<br>" . $link->error;
		}
	}
}

if(isset($_POST["editGoalW"])){
	$id = $_SESSION["id"];
	$updatedGoalWeight = $_POST["editGoalW"];

	$sql = "UPDATE users SET gWeight=$updatedGoalWeight WHERE id=$id";

	if ($link->query($sql) === TRUE) {
		$_SESSION["gWeight"] = $updatedGoalWeight; //Cheeky way to update session variable on the sly
	} else {
		echo "Error: " . $sql . "<br>" . $link->error;
	}
}
?>