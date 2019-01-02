<?php
// Initialize the session
session_start();
require_once "includes/config.php";
 
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

		$addWeightOnLogin = "INSERT INTO userWeight (userID,weight) VALUES ($id, $cWeight)";
		$link->query($addWeightOnLogin);

		$updateLogin = "UPDATE users SET firstLogin=1 WHERE id=$id";
		$link->query($updateLogin);
	}
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

if(isset($_POST["weight"])){
	$tt = $_POST["weight"];
	$id = $_SESSION["id"];

	$sql = "INSERT INTO userWeight (userID,weight) VALUES ($id, $tt)";

	if ($link->query($sql) === TRUE) {
		//echo "New record created successfully";
		$_SESSION["cWeight"] = $tt;
		$sql2 = "UPDATE users SET cWeight=$tt WHERE id=$id";

		if ($link->query($sql2) === TRUE) {
			//echo "Record updated successfully";
			header("Refresh:0");
		} else {
			echo "Error updating record: " . $link->error;
		}
	} else {
		echo "Error: " . $sql . "<br>" . $link->error;
	}
	//$link->close();
}

if(isset($_POST['rName'], $_POST['mCat'], $_POST['cal'], $_POST['car'], $_POST['pro'], $_POST['fat'])) {
	$ttn = $_POST["rName"];
	$ttm = $_POST["mCat"];
	$ttc = $_POST["cal"];
	$ttcr = $_POST["car"];
	$ttp = $_POST["pro"];
	$ttf = $_POST["fat"];
	$id = $_SESSION["id"];

	$sqlqw = "INSERT INTO userFood (userID,rName,mCat,calories,carbs,protein,fat) VALUES ($id, '$ttn', '$ttm', $ttc, $ttcr, $ttp, $ttf)";

	if ($link->query($sqlqw) === TRUE) {
		//echo "New record created successfully";
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
    	<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
	<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
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
	    echo "<p style=\"font-weight: bold;\">All time weight history:</p>";
	    while($row = $result->fetch_assoc()) {
	        echo "<span style=\"font-weight: bold;\">weight: </span>" . $row["weight"] . "(kg) <span style=\"font-weight: bold;\">time updated:</span> " . $row["timee"] . "<br>";
	    }
	    echo "<br> Timezones are USA.";
	} else {
	    echo "<p>You have no all time weight history.</p>";
	}
	
	?>

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
		<input class="weight" type="number" name="cal" placeholder="calories" required>
		<input class="weight" type="number" name="car" placeholder="carbs" required>
		<input class="weight" type="number" name="pro" placeholder="protine" required>
		<input class="weight" type="number" name="fat" placeholder="fat" required>
		<input class="addW" type="submit" name="submit" value="Add Food" required>
	</form>

	<?php

	$id = $_SESSION["id"];

	$sql = "SELECT rName, mCat, calories, carbs, protein, fat, 'time' FROM userFood WHERE userID = $id AND DATE(`time`) = CURDATE()";
	$result = $link->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    echo "<p style=\"font-weight: bold; padding-bottom: 14px;\">Your food history for today:</p>";
		echo "<table id=\"foodTable\">";
		echo "<tr><th>Name:</th><th>Category</th><th>Calories</th><th>Carbs</th><th>Protein</th><th>Fat</th></tr>";
	    while($row = $result->fetch_assoc()) {
	        echo "<tr>" . "<td>" . $row["rName"] . "</td><td>" . $row["mCat"] . "</td><td>" . $row["calories"] . "</td><td>" . $row["carbs"] . "</td><td>" . $row["protein"] . "</td><td>" . $row["fat"] . "</td></tr>";
	    }
	    echo "</table>";
	} else {
	    echo "<p style=\"font-weight:700;\">------ You haven't added any food. ------</p><br>";
	}

	if ($result->num_rows > 0) {
	//Add the total carbs for today for user and display it
	$sql2 = "SELECT SUM(carbs) AS total_value FROM userFood WHERE userID = $id AND DATE(`time`) = CURDATE()";
	$result2 = $link->query($sql2);
	$row = mysqli_fetch_assoc($result2); 
	$sum = $row['total_value'];
	echo "Total carbs today: " . $sum . " (<span id=\"carbPercentage\"></span>%)<br>";

	//Add the total protein for today for user and display it
	$sql3 = "SELECT SUM(protein) AS total_value FROM userFood WHERE userID = $id AND DATE(`time`) = CURDATE()";
	$result3 = $link->query($sql3);
	$row1 = mysqli_fetch_assoc($result3); 
	$sum1 = $row1['total_value'];
	echo "Total protein today: " . $sum1 . " (<span id=\"proPercentage\"></span>%)<br>";

	//Add the total fat for today for user and display it
	$sql4 = "SELECT SUM(fat) AS total_value FROM userFood WHERE userID = $id AND DATE(`time`) = CURDATE()";
	$result4 = $link->query($sql4);
	$row2 = mysqli_fetch_assoc($result4); 
	$sum2 = $row2['total_value'];
	echo "Total fats today: " . $sum2 . " (<span id=\"fatPercentage\"></span>%)<br>";

	//Add the total calories for today for user and display it
	$sql5 = "SELECT SUM(calories) AS total_value FROM userFood WHERE userID = $id AND DATE(`time`) = CURDATE()";
	$result5 = $link->query($sql5);
	$row3 = mysqli_fetch_assoc($result5); 
	$sum3 = $row3['total_value'];
	echo "Total calories today: " . $sum3 . "<br>";
	}


	//$link->close();

	?>
	<p id="calories"></p>
	<p id="leanBodyMass"></p>
	<p id="rProteinIntake"></p>
	<p id="rCarbIntake"></p>
	<p id="rFatIntake"></p>
	<p id="calFromP"></p>
	<p id="calFromC"></p>
	<p id="calFromF"></p>

<!-- 	<p id="caloriesfromfats"></p>
	<p id="caloriesfromcarbs"></p>
	<p id="caloriesfromprotien"></p> -->
	<?php include 'includes/graphQueries.php';?>

	<?php
		$link->close();
	?>
	
	<div style="width:400px; padding-top: 30px;">
		<p style="font-style: italic;">Last week summary chart:</p>
		<div id="chart-container">FusionCharts XT will load here!</div>
	</div>
	<div class="pieChartContainer" style="width:400px;">
		<p style="font-style: italic;">Macros chart for today:</p>
		<div id="chart-container2">FusionCharts XT will load here!</div>
	</div>

	<p style="padding: 50px 0px;" >
        <a href="includes/logout.php" class="btn btn-danger">--- Sign Out of Your Account ---</a>
    </p>
<script>
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
</script>
</div>
</body>

</html>