<?php
// Initialize the session
session_start();
require_once "includes/config.php";
require_once "includes/main.php";
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="css/reset.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,600i,700,700i,800" rel="stylesheet">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    	<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
	<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
    <style type="text/css">
    /* Hide HTML5 Up and Down arrows. */
	input[type="number"]::-webkit-outer-spin-button, input[type="number"]::-webkit-inner-spin-button {
	    -webkit-appearance: none;
	    margin: 0;
	}
	 
	input[type="number"] {
	    -moz-appearance: textfield;
	}
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
		background-color: #eee;padding: 10px 20px;border: 1px solid #ddd;border-radius: 3px;
	}
	.addW, .addP {
		background-color: #2ecc71;padding: 10px 20px;border: 1px solid #2ecc71;border-radius: 3px;color: #fff;
	}
	#foodTable {
		border-collapse: collapse;
		width: 500px;
	}
	#foodTable td {
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
	.foodForm input, .foodForm select {
		display: block;
		margin: 10px 0px;
    	width: 300px;
    	font-weight: 400;
	}
	.foodForm select {
		color: #888;
	}
	.raphael-group-11-messageGroup text {
		font-family: 'Open Sans', sans-serif !important;
    	font-size: 20px !important;
	}
	g[class$='creditgroup'] {
		display:none !important;
	}
	.raphael-group-167-plots text tspan:nth-child(2) {
		font-size: 22px !important;
		font-weight: 600 !important;
	}
	.raphael-group-167-plots text tspan {
		font-size: 15px !important;
		font-weight: 300 !important;
	}
	.removePicture {
		padding: 10px 30px;
    	background-color: #2ecc71;
    	color: #fff;
	}
	#weightHistory {
    	border-collapse: collapse;
  		font-family:'Open Sans',sans-serif;
  		font-size: 16px;
    }
    #weightHistory th {
	  text-align: left;
	  background-color: #4b7bec;
	  color: white;
	  font-weight: 600;
	}
	#weightHistory td {
		font-weight: 500;
		color: #444;
	}
	#weightHistory td, #weightHistory th {
	  border: 1px solid #ddd;
	  padding: 10px 13px;
	}
    </style>
</head>
<body>
	<div style="background-color: #444; padding: 20px; text-align: center;"><p style="text-align: center; font-weight: 300; font-size: 16px; color: #fff;">This is a development test screen and is not coded properly. Bad coding practices and shortcuts have been used.</p></div>
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

    <form method="post" action="welcome.php" style="padding: 20px 0px;">
   		<input class="weight" type="number" name="editGoalW" placeholder="Edit Goal Weight" required>
   		<input class="addW" type="submit" name="updateWeight" value="Update">
	</form>

    <!-- <input type="submit" class="button" name="insert" value="insert"/> -->
    <h2>Add Weight</h2>
    <p id="percentageToGoal"></p>
    <form method="post" action="welcome.php" style="padding: 20px 0px;">
   		<input class="weight" type="number" name="weight" placeholder="Enter New Weight" required>
   		<input class="addW" type="submit" name="submit" value="Add Weight">
	</form>

	<?php
	$id = $_SESSION["id"];
	
	//gets weight entries of all time
	$sql = "SELECT weight, timee FROM userWeight WHERE userID = $id ORDER BY timee DESC";
	$result = $link->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    echo "<br>";
	    echo "<p style=\"font-weight: bold; padding: 10px 0px;\">All time weight history:</p>";
	    echo "<table id=\"weightHistory\"";
		echo "<tr>
		<th>Weight</th>
		<th>Date</th>
		</tr>";
	    while($row = $result->fetch_assoc()) {
	        echo "<tr>" . 
	        "<td>" . $row["weight"] . "(kg)</td>
	        <td>" . $row["timee"] . "</td>
	        </tr>";
	    }
	    echo "</table>";
	}

	?>

	<div class="pieChartContainer" style="width:500px;">
		<p style="font-style: italic;">Weight chart:</p>
		<div id="chart-container4">FusionCharts XT will load here!</div>
	</div>

	<?php
	//This section of code gets the start weight for the user
	$id = $_SESSION["id"];

	//gets weight entries for only TODAY - good for the add food function 
	$sql = "SELECT weight FROM userWeight WHERE userID = $id ORDER BY timee ASC LIMIT 1";
	$result = $link->query($sql);

	if ($result->num_rows > 0) {
	    $row = $result->fetch_assoc();
	    $oldestWeight = $row["weight"];
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
	?>
	
	<form action="" method="post" enctype="multipart/form-data">
	<input type="file" name="file">
	<input class="addP" type="submit" name="submit2" value="Upload">
	</form>
	<form action="" method="post">
	<input type="submit" class="removePicture" name="removePicture" value="Remove Profile Picture">
	</form>

	<h2>Add Food</h2>
	<form method="post" action="welcome.php" class="foodForm" style="padding: 20px 0px;">
		<input class="weight" type="text" name="rName" placeholder="Name of recipe" required>
		<select class="weight" type="text" name="mCat" required>
			<option value="" disabled selected>Meal category, e.g Lunch</option>
			<option value="Breakfast">Breakfast</option>
			<option value="Lunch">Lunch</option>
			<option value="Dinner">Dinner</option>
			<option value="Snack">Snack</option>
		</select>
		<input class="weight" type="number" name="cal" placeholder="Calories" required>
		<input class="weight" type="number" name="car" placeholder="Carbs" required>
		<input class="weight" type="number" name="pro" placeholder="Protein" required>
		<input class="weight" type="number" name="fat" placeholder="Fat" required>
		<input class="addW" type="submit" name="submit" value="Add Food" required>
	</form>

	<p style="font-weight: bold; padding-bottom: 14px;">Your food history for today:</p>
	<table style="width: 500px;">
		<tr>
			<td width="0" style="display: none;">ID</td>
			<td width="150">Name</td>
			<td width="80">Calories</td>
			<td width="80">Carbs</td>
			<td width="80">Protein</td>
			<td width="80">Fat</td>
			<td style="opacity: 0;">Remove?</td>
		</tr>
	</table>

	<?php

	$id = $_SESSION["id"];
	$currDate = date("Y-m-d");
	$breakfastOnly = "SELECT foodID, rName, mCat, calories, carbs, protein, fat, 'time' FROM userFood WHERE mCat = 'Breakfast' AND userID = $id AND DATE(`time`) = '$currDate'";
	$breakfastOnlyResult = $link->query($breakfastOnly);

	echo "<div style=\"width:500px; margin: 10px 0px;\"><p style=\"padding: 6px 10px; background-color: #444; color:#fff;\">BREAKFAST</p></div>";

	if ($breakfastOnlyResult->num_rows > 0) {
	    // output data of each row
		echo "<table id=\"foodTable\">";
	    while($row = $breakfastOnlyResult->fetch_assoc()) {
	        echo "<tr>" . 
	        "<td width=\"0\" style=\"display: none;\">" . $row["foodID"] . "</td>
	        <td width=\"150\">" . $row["rName"] . "</td>
	        <td width=\"80\">" . $row["calories"] . "</td>
	        <td width=\"80\">" . $row["carbs"] . "</td>
	        <td width=\"80\">" . $row["protein"] . "</td>
	        <td width=\"80\">" . $row["fat"] . "</td>
			<td><a href=\"includes/delete.php?id=".$row['foodID']."\">Delete</a></td>
	        </tr>";
	    }
	    echo "</table>";
	} else {
		echo "<p style=\"font-style: italic;\">You've not added any breakfast!</p>";
	}

	$currDate = date("Y-m-d");
	$lunchOnly = "SELECT foodID, rName, mCat, calories, carbs, protein, fat, 'time' FROM userFood WHERE mCat = 'Lunch' AND userID = $id AND DATE(`time`) = '$currDate'";
	$lunchOnlyResult = $link->query($lunchOnly);

	echo "<div style=\"width:500px; margin: 10px 0px;\"><p style=\"padding: 6px 10px; background-color: #444; color:#fff;\">LUNCH</p></div>";

	if ($lunchOnlyResult->num_rows > 0) {
	    // output data of each row
		echo "<table id=\"foodTable\">";
	    while($row = $lunchOnlyResult->fetch_assoc()) {
	        echo "<tr>" . 
	        "<td width=\"0\" style=\"display: none;\">" . $row["foodID"] . "</td>
	        <td width=\"150\">" . $row["rName"] . "</td>
	        <td width=\"80\">" . $row["calories"] . "</td>
	        <td width=\"80\">" . $row["carbs"] . "</td>
	        <td width=\"80\">" . $row["protein"] . "</td>
	        <td width=\"80\">" . $row["fat"] . "</td>
			<td><a href=\"includes/delete.php?id=".$row['foodID']."\">Delete</a></td>
	        </tr>";
	    }
	    echo "</table>";
	} else {
		echo "<p style=\"font-style: italic;\">You've not added any lunch!</p>";
	}

	$currDate = date("Y-m-d");
	$dinnerOnly = "SELECT foodID, rName, mCat, calories, carbs, protein, fat, 'time' FROM userFood WHERE mCat = 'Dinner' AND userID = $id AND DATE(`time`) = '$currDate'";
	$dinnerOnlyResult = $link->query($dinnerOnly);

	echo "<div style=\"width:500px; margin: 10px 0px;\"><p style=\"padding: 6px 10px; background-color: #444; color:#fff;\">DINNER</p></div>";

	if ($dinnerOnlyResult->num_rows > 0) {
	    // output data of each row
		echo "<table id=\"foodTable\">";
	    while($row = $dinnerOnlyResult->fetch_assoc()) {
	        echo "<tr>" . 
	        "<td width=\"0\" style=\"display: none;\">" . $row["foodID"] . "</td>
	        <td width=\"150\">" . $row["rName"] . "</td>
	        <td width=\"80\">" . $row["calories"] . "</td>
	        <td width=\"80\">" . $row["carbs"] . "</td>
	        <td width=\"80\">" . $row["protein"] . "</td>
	        <td width=\"80\">" . $row["fat"] . "</td>
			<td><a href=\"includes/delete.php?id=".$row['foodID']."\">Delete</a></td>
	        </tr>";
	    }
	    echo "</table>";
	} else {
		echo "<p style=\"font-style: italic;\">You've not added any dinner!</p>";
	}

	$currDate = date("Y-m-d");
	$snacksOnly = "SELECT foodID, rName, mCat, calories, carbs, protein, fat, 'time' FROM userFood WHERE mCat = 'Snack' AND userID = $id AND DATE(`time`) = '$currDate'";
	$snacksOnlyResult = $link->query($snacksOnly);

	echo "<div style=\"width:500px; margin: 10px 0px;\"><p style=\"padding: 6px 10px; background-color: #444; color:#fff;\">SNACKS</p></div>";

	if ($snacksOnlyResult->num_rows > 0) {
	    // output data of each row
		echo "<table id=\"foodTable\">";
	    while($row = $snacksOnlyResult->fetch_assoc()) {
	        echo "<tr>" . 
	        "<td width=\"0\" style=\"display: none;\">" . $row["foodID"] . "</td>
	        <td width=\"150\">" . $row["rName"] . "</td>
	        <td width=\"80\">" . $row["calories"] . "</td>
	        <td width=\"80\">" . $row["carbs"] . "</td>
	        <td width=\"80\">" . $row["protein"] . "</td>
	        <td width=\"80\">" . $row["fat"] . "</td>
			<td><a href=\"includes/delete.php?id=".$row['foodID']."\">Delete</a></td>
	        </tr>";
	    }
	    echo "</table>";
	} else {
		echo "<p style=\"font-style: italic;\">You've not added any snacks!</p>";
	}

	$currDate = date("Y-m-d");

	$sql = "SELECT rName, mCat, calories, carbs, protein, fat, 'time' FROM userFood WHERE userID = $id AND DATE(`time`) = '$currDate'";
	$result = $link->query($sql);

	if ($result->num_rows > 0) {
		$currDate = date("Y-m-d");
		//Add the total carbs for today for user and display it
		$sql2 = "SELECT SUM(carbs) AS total_value FROM userFood WHERE userID = $id AND DATE(`time`) = '$currDate'";
		$result2 = $link->query($sql2);
		$row = mysqli_fetch_assoc($result2); 
		$sum = $row['total_value'];
		echo "<p><br>Total carbs today: " . $sum . " (<span id=\"carbPercentage\"></span>%)<br></p>";

		//Add the total protein for today for user and display it
		$sql3 = "SELECT SUM(protein) AS total_value FROM userFood WHERE userID = $id AND DATE(`time`) = '$currDate'";
		$result3 = $link->query($sql3);
		$row1 = mysqli_fetch_assoc($result3); 
		$sum1 = $row1['total_value'];
		echo "<p>Total protein today: " . $sum1 . " (<span id=\"proPercentage\"></span>%)<br></p>";

		//Add the total fat for today for user and display it
		$sql4 = "SELECT SUM(fat) AS total_value FROM userFood WHERE userID = $id AND DATE(`time`) = '$currDate'";
		$result4 = $link->query($sql4);
		$row2 = mysqli_fetch_assoc($result4); 
		$sum2 = $row2['total_value'];
		echo "<p>Total fats today: " . $sum2 . " (<span id=\"fatPercentage\"></span>%)<br></p>";

		//Add the total calories for today for user and display it
		$sql5 = "SELECT SUM(calories) AS total_value FROM userFood WHERE userID = $id AND DATE(`time`) = '$currDate'";
		$result5 = $link->query($sql5);
		$row3 = mysqli_fetch_assoc($result5); 
		$sum3 = $row3['total_value'];
		echo "<p>Total calories today: " . $sum3 . "<br></p>";
	}

	?>

	<p id="calories" style="padding-top: 10px;"></p>
	<p id="leanBodyMass"></p>
	<p id="rProteinIntake"></p>
	<p id="rCarbIntake"></p>
	<p id="rFatIntake"></p>
	<p id="calFromP"></p>
	<p id="calFromC"></p>
	<p id="calFromF"></p>
	<p id="withinLimit" style="display: inline-block;"></p>
	<p id="withinLimitRemaining" style="display: inline-block;"></p>

	<?php include 'includes/graphQueries.php';?>
	
	<div class="pieChartContainer" style="width:500px;">
		<p style="font-style: italic; padding-top: 20px;">Macros chart for today:</p>
		<div id="chart-container2">FusionCharts XT will load here!</div>
	</div>
	<div style="width:500px; padding-top: 30px;">
		<p style="font-style: italic;">Last week summary chart:</p>
		<div id="chart-container">FusionCharts XT will load here!</div>
	</div>
	<div class="pieChartContainer" style="width:500px;">
		<p style="font-style: italic;">Macros overtime chart:</p>
		<div id="chart-container5">FusionCharts XT will load here!</div>
	</div>

	<h2>Add Water</h2>
    <form method="post" action="welcome.php" style="padding: 20px 0px;">
   		<input class="weight" type="number" name="water" placeholder="How many glasses?" required>
   		<input class="addW" type="submit" name="submit" value="Add Water">
	</form>
	<p>We recommend 2000 - 2500ml of water a day. This is roughly 8 - 10 glasses.</p>

	<?php
	$id = $_SESSION["id"];
	$currDate = date("Y-m-d");
	//Need this query to check if any results were returned (used in if statement)
	$water_total = "SELECT waterAmount FROM userWater WHERE userID = $id AND DATE(`time`) = '$currDate'";
	$water_t = $link->query($water_total);
	
	if($water_t->num_rows > 0) {
		//Main query to retrive water data
		$currDate = date("Y-m-d");
		$total_water2 = "SELECT SUM(waterAmount) AS total_water FROM userWater WHERE userID = $id AND DATE(`time`) = '$currDate'";
		$total_water_for_user = $link->query($total_water2);
		$tot_water = mysqli_fetch_assoc($total_water_for_user); 
		$sum_water = $tot_water['total_water'];
		echo "<p style=\"font-weight:600;\">Total glasses of water today: " . $sum_water . "</p>";
	} else {
		echo "<p style=\"font-weight:600;\">You've not added any water today</p>";
	}


	$recentSignUp = "SELECT * FROM users WHERE id = $id AND created_at <= (CURDATE() - INTERVAL 5 DAY)";
	$recentSignUpQ = $link->query($recentSignUp);
	if ($recentSignUpQ->num_rows > 0) {
	  	$newlySigned = false;
    } else {
        $newlySigned = true;
    }

    $wasWeightUpdated = "SELECT * FROM userWeight WHERE userID = $id AND timee >= (CURDATE() - INTERVAL 7 DAY)";
	$wasWeightUpdatedQ = $link->query($wasWeightUpdated);
	if ($wasWeightUpdatedQ->num_rows > 0) {
	  	$weightUpdated = false;
    } else {
        $weightUpdated = true;
    }

	$link->close(); //Close the connection
	?>

	<div class="buttonMar" style="float: left; margin: 2px;">
		<form method="post" action="welcome.php">
			<input name="waterAddButton" style="width: 40px; height: 40px; background-color: #2ECC71; color:#fff;" type="submit" value="+" class="waterASButton waterAdd tooltip" title="Add a glass of water">
		</form>
	</div>
	<div class="buttonMar" style="float: left; margin: 2px;">
		<form method="post" action="welcome.php">
			<input name="waterAddDButton" style="width: 40px; height: 40px; background-color: #F25661; color:#fff;" type="submit" value="-" class="waterASButton waterSub tooltip" title="Remove a glass of water">
		</form>
	</div>

	<br><br>
	<div class="pieChartContainer" style="width:500px;">
		<div id="chart-container3">FusionCharts XT will load here!</div>
	</div>

	<h2>Tips</h2>
	<h4 style="font-weight: 700;">Things you're doing well</h4>
	<ul class="wellList" id="wellList">
	</ul>
	<h4 style="font-weight: 700;">Things to improve</h4>
	<ul class="improveList" id="improveList">
	</ul>

	<p style="padding: 50px 0px;" >
        <a href="includes/logout.php" class="btn btn-danger">--- Sign Out of Your Account ---</a>
    </p>

<script>
	function addToWList(sentence) {
	  var node = document.createElement("li");
	  var textnode = document.createTextNode(sentence);
	  node.appendChild(textnode);
	  document.getElementById("wellList").appendChild(node);
	}

	function addToIList(sentence) {
	  var node = document.createElement("li");
	  var textnode = document.createTextNode(sentence);
	  node.appendChild(textnode);
	  document.getElementById("improveList").appendChild(node);
	}

	//first weight signed up with
	 var oldestWeight = "<?php if(isset($oldestWeight)) {echo($oldestWeight);} ?>";
	 console.log("First weight added to database: " + oldestWeight);

	 //current weight
	 var latestWeight = "<?php echo($_SESSION["cWeight"]); ?>";
	 console.log("Latest weight: " + latestWeight);

	 //goal weight 
	 var goalWeight = "<?php echo($_SESSION["gWeight"]); ?>";

	 var anyFoodAddedToday = "<?php if(isset($sum)) {echo($sum);} ?>";

	if (!(anyFoodAddedToday == "")) {
		var totalCarb = "<?php if(isset($sum)) {echo($sum);} ?>";
		var totalFats = "<?php if(isset($sum2)) {echo($sum2);} ?>";
		var totalPro = "<?php if(isset($sum1)) {echo($sum1);} ?>";
		console.log("Total carbs " + totalCarb); 
		console.log("Total fats " + totalFats); 
		console.log("Total protein " + totalPro);
		var totalNutritionForToday = parseInt(totalCarb) + parseInt(totalFats) + parseInt(totalPro);
		console.log("Total total nutrition for today: " + totalNutritionForToday);
		document.getElementById("carbPercentage").innerHTML = Math.round((totalCarb/totalNutritionForToday)*100);
		document.getElementById("fatPercentage").innerHTML = Math.round((totalFats/totalNutritionForToday)*100);
		document.getElementById("proPercentage").innerHTML = Math.round((totalPro/totalNutritionForToday)*100);
	}

	 //Percetange diff between first weight and current weight
	weightDiff = Math.round(((latestWeight/oldestWeight)-1)*100);

	//CANNOT BE USED UNTIL TRELLO BUG IS FIXED
	 achievementPercentage = ((latestWeight - oldestWeight) * 100) / (goalWeight - oldestWeight);
	 achievementPercentageRounded = Math.round(achievementPercentage * 10) / 10;
	 //document.getElementById("percentageToGoal").innerHTML = "That is a " + weightDiff + "% difference vs when you started.";

	 document.getElementById("percentageToGoal").innerHTML = "You are " +achievementPercentageRounded + "% of your way to your goal.";


	 var gender = "<?php echo($_SESSION["gender"]); ?>";
	 var heightFeet = "<?php echo($_SESSION["heightFeet"]); ?>";
	 var heightInch = "<?php echo($_SESSION["heightInch"]); ?>";
	 var birthYear = "<?php echo($_SESSION["birthYear"]); ?>";
	 var currentYear = (new Date()).getFullYear();
	 var age = currentYear - birthYear;
	 var activityLevel = "<?php echo($_SESSION["activityLevel"]); ?>";
	 //var weightInPounds = latestWeight*2.205;
	 var totalHeight = (heightFeet/1) + (heightInch/10);
	 var heightInInches = totalHeight*12;
	 var heightInCM = heightInInches*2.54;
	 var carbsGoal = 20;
	 var leanBodyMass = 0.407*latestWeight + 0.267*heightInCM- 19.2;
	 var rProteinIntake = 1.8*leanBodyMass;

	 //Currently using Mifflin St Jeor Equation
	 if (gender == "Male") {
	 	console.log("This account is male");
	 	//This is the base TDEE
	 	var calorieGoal = (10 * (latestWeight)) + (6.25 * (heightInCM)) - (5 * age) + 5;
	 } else {
	 	console.log("This account is female");
	 	//This is the base TDEE
	 	var calorieGoal = 10 * (latestWeight) + 6.25 * (heightInCM) - 5 * age - 161;

	 }


	if (activityLevel.trim() === "Sedentary") {
		//Add 10% for Sedentary to Base Metabolic Rate
 		calorieGoal = (calorieGoal / 10) + calorieGoal;
 		console.log("Sedentary");
	} else if (activityLevel.trim() === "Lightly Active") {
		//Lightly active
 		calorieGoal = (calorieGoal / 4.2) + calorieGoal;
 		console.log("Lightly Active");
	} else if (activityLevel.trim() === "Active") {
		//Active
 		calorieGoal = (calorieGoal / 2.6) + calorieGoal;
 		console.log("Active");
	} else {
 		//Very Active
 		calorieGoal = (calorieGoal / 1.65) + calorieGoal;
 		console.log("Very Active");
	}
 	
 	document.getElementById("calories").innerHTML = "Your calorie goal is: " + Math.round(calorieGoal);
 	document.getElementById("leanBodyMass").innerHTML = "Lean body mass is: " + Math.round(leanBodyMass);

 	var caloriesFromFat = calorieGoal - (Math.round(rProteinIntake) * 4) - (Math.round(carbsGoal) * 4);

	document.getElementById("rProteinIntake").innerHTML = "Recommended protein intake: " + Math.round(rProteinIntake) + "g";
	document.getElementById("rCarbIntake").innerHTML = "Recommended carb intake: " + Math.round(carbsGoal) + "g";
	document.getElementById("rFatIntake").innerHTML = "Recommended fat intake: " + Math.round(caloriesFromFat/9) + "g";

	document.getElementById("calFromP").innerHTML = "Calories from protein: " + Math.round(rProteinIntake) * 4;
	document.getElementById("calFromC").innerHTML = "Calories from Carbs: " + Math.round(carbsGoal) * 4;
	document.getElementById("calFromF").innerHTML = "Calories from fat: " + Math.round(caloriesFromFat);

	if (!(anyFoodAddedToday == "")) {
		if(totalCarb < carbsGoal) {
			document.getElementById("withinLimit").innerHTML = "You're within your carb goal.";
			document.getElementById("withinLimit").style.backgroundColor = "#2ECC71";
			document.getElementById("withinLimit").style.color = "#ffffff";
		} else {
			document.getElementById("withinLimit").innerHTML = "You've exceeded your carb intake limit.";
			document.getElementById("withinLimit").style.backgroundColor = "#F25661";
			document.getElementById("withinLimit").style.color = "#ffffff";
		}
	} else {
		document.getElementById("withinLimit").innerHTML = "You're within your carb goal.";
		document.getElementById("withinLimit").style.backgroundColor = "#2ECC71";
		document.getElementById("withinLimit").style.color = "#ffffff";
	}

	if (!(anyFoodAddedToday == "")) {
		var carbsRemaining = carbsGoal - totalCarb;
		if (carbsRemaining < 0) {
			document.getElementById("withinLimitRemaining").innerHTML = "0g remaining";
			document.getElementById("withinLimitRemaining").style.backgroundColor = "#F25661";
			document.getElementById("withinLimitRemaining").style.color = "#ffffff";
		} else {
			document.getElementById("withinLimitRemaining").innerHTML = carbsRemaining + "g remaining";
			document.getElementById("withinLimitRemaining").style.backgroundColor = "#2ECC71";
			document.getElementById("withinLimitRemaining").style.color = "#ffffff";
		}
	} else {
		document.getElementById("withinLimitRemaining").innerHTML = carbsGoal + "g remaining";
		document.getElementById("withinLimitRemaining").style.backgroundColor = "#2ECC71";
		document.getElementById("withinLimitRemaining").style.color = "#ffffff";
	}


	newlySigned = "<?php if(isset($newlySigned)) {echo($newlySigned);} ?>";

    if (newlySigned == true) {
		addToIList("We've noticed you've signed up recently - hooray. You can run our introductory tutorial here to get familiar with Ketogenetics.");
		addToWList("Since you're new here, our systems will need a little time to learn about you. Meanwhile, keep using the app as normal =)");
	}

	weightUpdated = "<?php if(isset($weightUpdated)) {echo($weightUpdated);} ?>";

    if (weightUpdated == false) {
		addToWList("Nice! You've updated your weight for this week.");
	} else {
		addToIList("Try and update your weight every week so we can build a better picture of how you're doing.")
	}


	waterYesterday = "<?php if(isset($waterFrom1DaysAgoTotal)) {echo($waterFrom1DaysAgoTotal);} ?>";

	console.log(waterYesterday);

	if(newlySigned == false && waterYesterday < 8) {
		addToIList("You didn't hit your water target yesterday - be sure to drink more water today!");
	}

	if(achievementPercentageRounded > 50) {
		addToWList("You're doing great! We see that you're above half-way to your goal - keep going!");
	}









    FusionCharts.ready(function(){
    var fusioncharts = new FusionCharts({
    type: 'mscolumn2d',
    renderAt: 'chart-container',
    width: '100%',
    height: '400',
    dataFormat: 'json',
    dataSource: {
        "chart": {
            "theme": "fusion",
            "caption": " ",
            "xAxisname": "Date",
            "yAxisName": "Grams (g)",
            "plotFillAlpha": "80",
            "divLineIsDashed": "1",
            "divLineDashLen": "1",
            "divLineGapLen": "1",
             "palettecolors":"F25661,F2C158",
             "animationDuration": "3",
            "captionFont": "Open Sans, sans-serif",
            "subcaptionFont": "Open Sans, sans-serif",
            "subcaptionFontSize": "14",
            "captionFontSize": "16",
			"adjustDiv": "0",
			"numDivLines": "5",
			"divLineColor": "#6699cc",
			"numVDivLines": "4",
			"plotHighlightEffect": "fadeout|color=#000, alpha=15",
			"legendIconScale": "1.5",
			"plotToolText": "Day: $label <br> $seriesname: $dataValue <br>"
        },
        "categories": [{
            "category": [{
            	"label": "<?php $yesterday = date("d/m", mktime(0, 0, 0, date("m") , date("d")-7)); echo $yesterday; ?>"
            }, {
            	"label": "<?php $yesterday = date("d/m", mktime(0, 0, 0, date("m") , date("d")-6)); echo $yesterday; ?>"
            }, {
                "label": "<?php $yesterday = date("d/m", mktime(0, 0, 0, date("m") , date("d")-5)); echo $yesterday; ?>"
            }, {
                "label": "<?php $yesterday = date("d/m", mktime(0, 0, 0, date("m") , date("d")-4)); echo $yesterday; ?>"
            }, {
                "label": "<?php $yesterday = date("d/m", mktime(0, 0, 0, date("m") , date("d")-3)); echo $yesterday; ?>"
            }, {
            	"label": "<?php $yesterday = date("d/m", mktime(0, 0, 0, date("m") , date("d")-2)); echo $yesterday; ?>"
            }, {
                "label": "<?php $yesterday = date("d/m", mktime(0, 0, 0, date("m") , date("d")-1)); echo $yesterday; ?>"
            }]
        }],
        "dataset": [{
            "seriesname": "Fat",
            "data": [{
            	"value": "<?php if(isset($fatFrom7DaysAgoTotal)) {echo($fatFrom7DaysAgoTotal);} ?>"
            }, {
            	"value": "<?php if(isset($fatFrom6DaysAgoTotal)) {echo($fatFrom6DaysAgoTotal);} ?>"
            }, {
                "value": "<?php if(isset($fatFrom5DaysAgoTotal)) {echo($fatFrom5DaysAgoTotal);} ?>"
            }, {
                "value": "<?php if(isset($fatFrom4DaysAgoTotal)) {echo($fatFrom4DaysAgoTotal);} ?>"
            }, {
            	"value": "<?php if(isset($fatFrom3DaysAgoTotal)) {echo($fatFrom3DaysAgoTotal);} ?>"
            }, {
                "value": "<?php if(isset($fatFrom2DaysAgoTotal)) {echo($fatFrom2DaysAgoTotal);} ?>"
            }, {
                "value": "<?php if(isset($fatFrom1DaysAgoTotal)) {echo($fatFrom1DaysAgoTotal);} ?>"

            }]
        }, {
            "seriesname": "Carbs",
            "data": [{
            	"value": "<?php if(isset($carbsFrom7DaysAgoTotal)) {echo($carbsFrom7DaysAgoTotal);} ?>"
            }, {
            	"value": "<?php if(isset($carbsFrom6DaysAgoTotal)) {echo($carbsFrom6DaysAgoTotal);} ?>"
            }, {
                "value": "<?php if(isset($carbsFrom5DaysAgoTotal)) {echo($carbsFrom5DaysAgoTotal);} ?>"
            }, {
            	"value": "<?php if(isset($carbsFrom4DaysAgoTotal)) {echo($carbsFrom4DaysAgoTotal);} ?>"
            }, {
                "value": "<?php if(isset($carbsFrom3DaysAgoTotal)) {echo($carbsFrom3DaysAgoTotal);} ?>"
            }, {
                "value": "<?php if(isset($carbsFrom2DaysAgoTotal)) {echo($carbsFrom2DaysAgoTotal);} ?>"
            }, {
                "value": "<?php if(isset($carbsFrom1DaysAgoTotal)) {echo($carbsFrom1DaysAgoTotal);} ?>"
            }]
        }],
    }
});
    fusioncharts.render();
});

var totalCarb = "<?php if(isset($sum)) {echo($sum);} ?>";
var totalFats = "<?php if(isset($sum2)) {echo($sum2);} ?>";
var totalPro = "<?php if(isset($sum1)) {echo($sum1);} ?>";
var totalCal = "<?php if(isset($sum3)) {echo($sum3);} ?>";

FusionCharts.ready(function() {
  var fusioncharts2 = new FusionCharts({
    type: 'doughnut2d',
    renderAt: 'chart-container2',
    width: '100%',
    height: '340',
    dataFormat: 'json',
    dataSource: {
      "chart": {
        "startingAngle": "310",
        "showLegend": "1",
        "defaultCenterLabel": "Total<br>"+Math.round(totalCal)+"<br>Calories",
        "centerLabel": "$label: $value(g)",
        "centerLabelBold": "0",
        "centerLabelColor": "#AAAAAA",
        "centerLabelFontSize": "18",
        "showTooltip": "0",
        "decimals": "0",
        "enableSmartLabels": "0",
        "showLabels": "0",
        "showValues": "0",
        "animationDuration": "3",
        "doughnutRadius": "80",
        "plotFillAlpha": "90",
        "showLegend": "0",
        "bgColor": "#DDDDDD",
        "bgAlpha": "0",
        "theme": "fusion"
      },
      "data": [{
          "label": "Fat",
          "value": Math.round(totalFats),
          "color": "#34495E"
        },
        {
          "label": "Carbs",
          "value": Math.round(totalCarb),
          "color": "#F2C158"
        },
        {
          "label": "Protein",
          "value": Math.round(totalPro),
          "color": "#F25661"
        }
      ]
    }
  });
  fusioncharts2.render();
});

FusionCharts.ready(function(){
var chart3 = new FusionCharts({
type: 'area2d',
renderAt: 'chart-container3',
width: '100%',
height: '400',
dataFormat: 'json',
dataSource: {
    "chart": {
        "theme": "fusion",
        "caption": "Average [] glasses",
        "subCaption": "Over the past 7 days",
        "xAxisName": "Date",
        "yAxisName": "Glasses",
        "animationDuration": "3",
        "paletteColors": "#F2C158",
        "xAxisNameFontColor": "#999999",
        "yAxisNameFontColor": "#999999",
        "labelFontColor": "#999999",
        "captionFontColor": "#666666",
        "baseFontColor": "#999999",
        "captionFontSize": "16",
        "subCaptionFontSize": "14",
        "captionFontBold": "0",
        "captionFont": "Open Sans, sans-serif",
        "subcaptionFont": "Open Sans, sans-serif"
    },
    "data": [{
        "label": "<?php $yesterday = date("d/m", mktime(0, 0, 0, date("m") , date("d")-7)); echo $yesterday; ?>",
        "value": "<?php if(isset($waterFrom7DaysAgoTotal)) {echo($waterFrom7DaysAgoTotal);} ?>"
    }, {
        "label": "<?php $yesterday = date("d/m", mktime(0, 0, 0, date("m") , date("d")-6)); echo $yesterday; ?>",
        "value": "<?php if(isset($waterFrom6DaysAgoTotal)) {echo($waterFrom6DaysAgoTotal);} ?>"
    }, {
        "label": "<?php $yesterday = date("d/m", mktime(0, 0, 0, date("m") , date("d")-5)); echo $yesterday; ?>",
        "value": "<?php if(isset($waterFrom5DaysAgoTotal)) {echo($waterFrom5DaysAgoTotal);} ?>"
    }, {
        "label": "<?php $yesterday = date("d/m", mktime(0, 0, 0, date("m") , date("d")-4)); echo $yesterday; ?>",
        "value": "<?php if(isset($waterFrom4DaysAgoTotal)) {echo($waterFrom4DaysAgoTotal);} ?>"
    }, {
        "label": "<?php $yesterday = date("d/m", mktime(0, 0, 0, date("m") , date("d")-3)); echo $yesterday; ?>",
        "value": "<?php if(isset($waterFrom3DaysAgoTotal)) {echo($waterFrom3DaysAgoTotal);} ?>"
    }, {
        "label": "<?php $yesterday = date("d/m", mktime(0, 0, 0, date("m") , date("d")-2)); echo $yesterday; ?>",
        "value": "<?php if(isset($waterFrom2DaysAgoTotal)) {echo($waterFrom2DaysAgoTotal);} ?>"
    }, {
        "label": "<?php $yesterday = date("d/m", mktime(0, 0, 0, date("m") , date("d")-1)); echo $yesterday; ?>",
        "value": "<?php if(isset($waterFrom1DaysAgoTotal)) {echo($waterFrom1DaysAgoTotal);} ?>"
    }]
}
});
	chart3.render();
});

FusionCharts.ready(function(){
var chart4 = new FusionCharts({
    type: 'line',
    renderAt: 'chart-container4',
    width: '100%',
    height: '400',
    dataFormat: 'json',
    dataSource: {
        "chart": {
            "theme": "fusion",
            "caption": "Weight history",
            "xAxisName": "Date",
            "yAxisName": "Weight (kg)",
            "captionFont": "Open Sans, sans-serif",
            "subcaptionFont": "Open Sans, sans-serif",
            "captionFontColor": "#666666",
            "captionFontBold": "0",
            "captionFontSize": "16",
            "palettecolors":"#4b7bec",
            "lineThickness": "5"
        },

        "data": [{
        		"label": "<?php if(isset($seventhLastTime)) {$seventhLastTimeR = strtotime($seventhLastTime); echo date('d/m', $seventhLastTimeR);} ?>",
                "value": "<?php if(isset($seventhLastWeight)) {echo($seventhLastWeight);} ?>"
            },
            {
            	"label": "<?php if(isset($sixthLastTime)) {$sixthLastTimeR = strtotime($sixthLastTime); echo date('d/m', $sixthLastTimeR);} ?>",
                "value": "<?php if(isset($sixthLastWeight)) {echo($sixthLastWeight);} ?>"
            },
            {
            	"label": "<?php if(isset($fifthLastTime)) {$fifthLastTimeR = strtotime($fifthLastTime); echo date('d/m', $fifthLastTimeR);} ?>",
                "value": "<?php if(isset($fifthLastWeight)) {echo($fifthLastWeight);} ?>"
            },
            {
                "label": "<?php if(isset($fourthLastTime)) {$fourthLastTimeR = strtotime($fourthLastTime); echo date('d/m', $fourthLastTimeR);} ?>",
                "value": "<?php if(isset($fourthLastWeight)) {echo($fourthLastWeight);} ?>"
            },
            {
                "label": "<?php if(isset($thirdLastTime)) {$thirdLastTimeR = strtotime($thirdLastTime); echo date('d/m', $thirdLastTimeR);} ?>",
                "value": "<?php if(isset($thirdLastWeight)) {echo($thirdLastWeight);} ?>"
            },
            {
                "label": "<?php if(isset($secondLastTime)) {$secondLastTimeR = strtotime($secondLastTime); echo date('d/m', $secondLastTimeR);} ?>",
                "value": "<?php if(isset($secondLastWeight)) {echo($secondLastWeight);} ?>"
            },
            {
                "label": "<?php if(isset($firstLastTime)) {$firstLastTimeR = strtotime($firstLastTime); echo date('d/m', $firstLastTimeR);} ?>",
                "value": "<?php if(isset($firstLastWeight)) {echo($firstLastWeight);} ?>"
            }
        ]
    }
});
	chart4.render();
});

FusionCharts.ready(function(){
	var chartObj = new FusionCharts({
    type: 'msline',
    renderAt: 'chart-container5',
    width: '100%',
    height: '400',
    dataFormat: 'json',
    dataSource: {
        "chart": {
            "theme": "fusion",
            "xAxisName": "Date",
            "yAxisName": "Grams",
            "captionFont": "Open Sans, sans-serif",
            "subcaptionFont": "Open Sans, sans-serif",
            "captionFontColor": "#666666",
            "captionFontBold": "0",
            "captionFontSize": "16",
            "lineThickness": "5",
            "xAxisName": "Day"
        },
        "categories": [{
			"category": [{
            	"label": "<?php $yesterday = date("d/m", mktime(0, 0, 0, date("m") , date("d")-7)); echo $yesterday; ?>"
            }, {
            	"label": "<?php $yesterday = date("d/m", mktime(0, 0, 0, date("m") , date("d")-6)); echo $yesterday; ?>"
            }, {
                "label": "<?php $yesterday = date("d/m", mktime(0, 0, 0, date("m") , date("d")-5)); echo $yesterday; ?>"
            }, {
                "label": "<?php $yesterday = date("d/m", mktime(0, 0, 0, date("m") , date("d")-4)); echo $yesterday; ?>"
            }, {
                "label": "<?php $yesterday = date("d/m", mktime(0, 0, 0, date("m") , date("d")-3)); echo $yesterday; ?>"
            }, {
            	"label": "<?php $yesterday = date("d/m", mktime(0, 0, 0, date("m") , date("d")-2)); echo $yesterday; ?>"
            }, {
                "label": "<?php $yesterday = date("d/m", mktime(0, 0, 0, date("m") , date("d")-1)); echo $yesterday; ?>"
            }]
        }],
        "dataset": [{
            "seriesname": "Fat",
            "data": [{
            	"value": "<?php if(isset($fatFrom7DaysAgoTotal)) {echo($fatFrom7DaysAgoTotal);} ?>"
            }, {
            	"value": "<?php if(isset($fatFrom6DaysAgoTotal)) {echo($fatFrom6DaysAgoTotal);} ?>"
            }, {
                "value": "<?php if(isset($fatFrom5DaysAgoTotal)) {echo($fatFrom5DaysAgoTotal);} ?>"
            }, {
                "value": "<?php if(isset($fatFrom4DaysAgoTotal)) {echo($fatFrom4DaysAgoTotal);} ?>"
            }, {
            	"value": "<?php if(isset($fatFrom3DaysAgoTotal)) {echo($fatFrom3DaysAgoTotal);} ?>"
            }, {
                "value": "<?php if(isset($fatFrom2DaysAgoTotal)) {echo($fatFrom2DaysAgoTotal);} ?>"
            }, {
                "value": "<?php if(isset($fatFrom1DaysAgoTotal)) {echo($fatFrom1DaysAgoTotal);} ?>"

            }]
        }, {
            "seriesname": "Protein",
            "data": [{
            	"value": "<?php if(isset($proFrom7DaysAgoTotal)) {echo($proFrom7DaysAgoTotal);} ?>"
            }, {
            	"value": "<?php if(isset($proFrom6DaysAgoTotal)) {echo($proFrom6DaysAgoTotal);} ?>"
            }, {
                "value": "<?php if(isset($proFrom5DaysAgoTotal)) {echo($proFrom5DaysAgoTotal);} ?>"
            }, {
            	"value": "<?php if(isset($proFrom4DaysAgoTotal)) {echo($proFrom4DaysAgoTotal);} ?>"
            }, {
                "value": "<?php if(isset($proFrom3DaysAgoTotal)) {echo($proFrom3DaysAgoTotal);} ?>"
            }, {
                "value": "<?php if(isset($proFrom2DaysAgoTotal)) {echo($proFrom2DaysAgoTotal);} ?>"
            }, {
                "value": "<?php if(isset($proFrom1DaysAgoTotal)) {echo($proFrom1DaysAgoTotal);} ?>"
            }]
        }, {
            "seriesname": "Carbs",
            "data": [{
            	"value": "<?php if(isset($carbsFrom7DaysAgoTotal)) {echo($carbsFrom7DaysAgoTotal);} ?>"
            }, {
            	"value": "<?php if(isset($carbsFrom6DaysAgoTotal)) {echo($carbsFrom6DaysAgoTotal);} ?>"
            }, {
                "value": "<?php if(isset($carbsFrom5DaysAgoTotal)) {echo($carbsFrom5DaysAgoTotal);} ?>"
            }, {
            	"value": "<?php if(isset($carbsFrom4DaysAgoTotal)) {echo($carbsFrom4DaysAgoTotal);} ?>"
            }, {
                "value": "<?php if(isset($carbsFrom3DaysAgoTotal)) {echo($carbsFrom3DaysAgoTotal);} ?>"
            }, {
                "value": "<?php if(isset($carbsFrom2DaysAgoTotal)) {echo($carbsFrom2DaysAgoTotal);} ?>"
            }, {
                "value": "<?php if(isset($carbsFrom1DaysAgoTotal)) {echo($carbsFrom1DaysAgoTotal);} ?>"
            }]
        }],

    }
});
	chartObj.render();

});
</script>
</div>
</body>

</html>