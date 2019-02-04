<?php
// Initialize the session
session_start();
require_once "includes/config.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="robots" content="noarchive">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/reset.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,600i,700,700i,800" rel="stylesheet">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" /> -->
	<script src='js/superslide-std.min.js'></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/circliful/1.2.0/js/jquery.circliful.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/circliful/1.2.0/css/jquery.circliful.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.9.0/sweetalert2.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.9.0/sweetalert2.min.css">
	<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@7/dist/polyfill.min.js"></script>
	<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
	<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover-min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
	<link rel="stylesheet" href="css/slick-theme.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/log.css">
	<link rel="stylesheet" href="css/notyf.min.css">
	<script src="js/notyf.min.js"></script>
	<title>Daily Log</title>
</head>

<body>
<?php require_once "includes/main.php"; ?>
<?php include 'includes/graphQueries.php';?>
<?php
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
		//echo "<p><br>Total carbs today: " . $sum . " (<span id=\"carbPercentage\"></span>%)<br></p>";

		//Add the total protein for today for user and display it
		$sql3 = "SELECT SUM(protein) AS total_value FROM userFood WHERE userID = $id AND DATE(`time`) = '$currDate'";
		$result3 = $link->query($sql3);
		$row1 = mysqli_fetch_assoc($result3); 
		$sum1 = $row1['total_value'];
		//echo "<p>Total protein today: " . $sum1 . " (<span id=\"proPercentage\"></span>%)<br></p>";

		//Add the total fat for today for user and display it
		$sql4 = "SELECT SUM(fat) AS total_value FROM userFood WHERE userID = $id AND DATE(`time`) = '$currDate'";
		$result4 = $link->query($sql4);
		$row2 = mysqli_fetch_assoc($result4); 
		$sum2 = $row2['total_value'];
		//echo "<p>Total fats today: " . $sum2 . " (<span id=\"fatPercentage\"></span>%)<br></p>";

		//Add the total calories for today for user and display it
		$sql5 = "SELECT SUM(calories) AS total_value FROM userFood WHERE userID = $id AND DATE(`time`) = '$currDate'";
		$result5 = $link->query($sql5);
		$row3 = mysqli_fetch_assoc($result5); 
		$sum3 = $row3['total_value'];
		//echo "<p>Total calories today: " . $sum3 . "<br></p>";
	}
?>
<div id="menu">
	<div>
		<div class="mobileMenuProfile">
			<?php
				$sql = "SELECT profilePicture FROM users WHERE id = $id";
				$result = $link->query($sql);

			    while($row = $result->fetch_assoc()){
			        if($row['profilePicture'] == ""){
			        	if($_SESSION["gender"] == "Male"){
			                echo "
								<div class=\"profileImageContainer\">
								<div class=\"profileImage profileImageM\" onclick=\"addPicture()\">
								<p id=\"nameLetter\"></p>
								</div>
								</div>
			                ";
			            } else {
			            	echo "
								<div class=\"profileImageContainer\">
								<div class=\"profileImage\" onclick=\"addPicture()\">
								<p id=\"nameLetterM\"></p>
								</div>
								</div>
			                ";
			            }

			        } else {
							echo "
							<div class=\"profileImageContainer\">
							<div class=\"profileImage\" onclick=\"addPicture()\">
							<img src='images/profilePictures/".$row['profilePicture']."' alt='Profile Pic'>
							</div>
							</div>
			                ";
			        }
			    }
			?>
			<div class="menuProfileText">
				<p><?php echo ($_SESSION["firstName"]); ?> <?php echo ($_SESSION["lastName"]); ?></p>
				<p>Free Membership</p>
			</div>
		</div>
		<div class="borderBreak"></div>
		<div class="navlink"><a href="includes/logout.php">Logout</a></div>
		<div class="navlink">Settings</div>
		<div class="navlink">Account Upgrade</div>
		<div class="navlink">Getting Started Guide</div>
		<div class="navlink">FAQ</div>
	</div>
</div>
<div id="mainContainer" class="mainContainer">
	<div class="header">
		<div class="headInner clearfix">
			<div class="logo">
				<a href="index.php"><img src="images/logoHolder.png" alt="Logo"></a>
			</div>

			<div class="right">
				<div class="rightInner clearfix">
					<div class="profileInfo">
						<?php
							$sql = "SELECT profilePicture FROM users WHERE id = $id";
							$result = $link->query($sql);

							    while($row = $result->fetch_assoc()){
							        if($row['profilePicture'] == ""){
							        	if($_SESSION["gender"] == "Male"){
							                echo "
												<div class=\"drop\"> 
												<div class=\"profileImageContainer\">
												<div class=\"profileImage profileImageM\" onclick=\"addPicture()\">
												<p id=\"nameLetterM\"></p>
												</div>
												</div>
												</div>
							                ";
							            } else {
							            	echo "
												<div class=\"drop\"> 
												<div class=\"profileImageContainer\">
												<div class=\"profileImage\" onclick=\"addPicture()\">
												<p id=\"nameLetter\"></p>
												</div>
												</div>
												</div>
							                ";
							            }

							        } else {
											echo "
											<div class=\"drop\"> 
											<div class=\"profileImageContainer\">
											<div class=\"profileImage\" onclick=\"addPicture()\">
											<img src='images/profilePictures/".$row['profilePicture']."' alt='Profile Pic'>
											</div>
											</div>
											</div>
							                ";
							        }
							    }
						?>
						<div class="profileText">
							<p id="name"><?php echo ($_SESSION["firstName"]); ?> <?php echo ($_SESSION["lastName"]); ?></p>
							<p>Free Membership</p>
						</div>
					</div>
					<div class="iconContainer">
						<div class="notifications tooltip" title="Notifications">
							<a href="#"><img src="images/icons/notificationIcon.png" alt="Notifications"></a>
						</div>
						<div class="settings tooltip" title="Settings">
							<a href="#"><img src="images/icons/settingsIcon.png" alt="Settings"></a>
						</div>
						<div class="logout tooltip" title="Logout">
							<a href="includes/logout.php"><img src="images/icons/logoutIcon.png" alt="Logout"></a>
						</div>
						<div class="menuTrigger" onclick="openMenu()">
							<a href="#"><img src="images/icons/menuIcon.png" alt="Menu"></a>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

	<div class="navigation clearfix">
		<div class="scrollContainer">
			<div class="scrolling-wrapper-flexbox">
				<a href="index.php">
					<div class="navItem" id="navItemO">
						<p class="navMainText">Dashboard</p>
						<p class="navSubText">Overview</p>
					</div>
				</a>
				<a href="log.php">
				<div class="navItem" id="navItemT">
					<p class="navMainText navActive">Daily Log</p>
					<p class="navSubText">Your Daily Tracking</p>
				</div>
				<div class="navBreadcrumbs"></div>
				</a>
				<a href="recipes.php">
				<div class="navItem" id="navItemTh">
					<p class="navMainText">Diet Planning</p>
					<p class="navSubText">Meal Inspiration</p>
				</div>
				</a>
				<a href="stats.php">
				<div class="navItem" id="navItemF">
					<p class="navMainText">Statistics</p>
					<p class="navSubText">A Detailed View</p>
				</div>
				</a>
				<a href="welcome.php">
					<div class="navItem">
						<p class="navMainText" style="color: red;">Development</p>
						<p class="navSubText">Dev Test Screen</p>
					</div>
				</a>
			</div>
		</div>

		<div class="addContainer clearfix">
			<div class="addButtons addWater tooltip" title="Quick Add" onclick="addWater()">
				<div class="addWaterI"></div>
				<p>Add Water</p>
			</div>
			<div class="addButtons addFood tooltip" title="Quick Add" onclick="addFood()">
				<div class="addFoodI"></div>
				<p>Add Food</p>
			</div>
			<div class="addButtons addWeight tooltip" title="Quick Add" onclick="addWeight()">
				<div class="addWeightI"></div>
				<p>Add Weight</p>
			</div>
		</div>
	</div>

	<div class="mainBody">
		<div class="titleCon clearfix">
			<div class="pageTitle">
				<p>Your daily tracking log - in detail.</p>
			</div>
			<div class="date">
				<p>Today: <span id="currentDate"></span></p>
			</div>
			<div class="titleLineBreak">
				<hr class="line">
			</div>
		</div>
	</div>

    <div class="clearfix" id="grid" data-columns>
        <div class="item weightGraph animated bounceIn">
            <p class="itemTitle">Today - Overview</p>
            <div class="clearfix">
            <div class="pieChartContainer">
					<div id="chart-container10">FusionCharts XT will load here!</div>
			</div>
			<div class="macroStats">
				<div class="macroStatsInner">
					<div class="macroStatsContainer clearfix">
						<div class="macroStatsLeft">
							<div class="macroFatColour"></div>
							<p>Fats</p>
						</div>
						<p class="macroStatsPercentage" id="fatPercentage">0%</p>
					</div>
					<div class="macroStatsContainer clearfix">
						<div class="macroStatsLeft">
							<div class="macroCarbColour"></div>
							<p>Net Carbs</p>
						</div>
						<p class="macroStatsPercentage" id="carbPercentage">0%</p>
					</div>
					<div class="macroStatsContainer clearfix">
						<div class="macroStatsLeft">
							<div class="macroProColour"></div>
							<p>Protein</p>
						</div>
						<p class="macroStatsPercentage" id="proPercentage">0%</p>
					</div>
				</div>

				<div class="macroStatsRem tooltip" id="macroStatsRem" title="You're doing great!">
					<p id="withinLimit">30/28 Net Carbs</p>
					<p id="withinLimitRemaining"></p>
				</div>
			</div>
			</div>
			<div class="mealSummary">
				<p class="itemTitle">Meal Summary - Today</p>
				<div class="mealHeadingsC">
					<table id="mealHeadings">
						<tr>
							<td class="rowName">Name</td>
							<td id="tableHeadingCal">Calories</td>
							<td id="tableHeadingCar">Carbs</td>
							<td id="tableHeadingPro">Protein</td>
							<td>Fat</td>
							<td width="25">x</td>
						</tr>
					</table>
				</div>
				<div class="mealType"><p>BREAKFAST</p></div>
				<div class="tableWrapper">
					<?php

					$id = $_SESSION["id"];
					$currDate = date("Y-m-d");

					$breakfastOnly = "SELECT foodID, rName, mCat, calories, carbs, protein, fat, 'time' FROM userFood WHERE mCat = 'Breakfast' AND userID = $id AND DATE(`time`) = '$currDate'";
					$breakfastOnlyResult = $link->query($breakfastOnly);

					if ($breakfastOnlyResult->num_rows > 0) {
					    // output data of each row
						echo "<table id=\"foodTable\">";
					    while($row = $breakfastOnlyResult->fetch_assoc()) {
					        echo "<tr>" . 
					        "<td style=\"display: none;\">" . $row["foodID"] . "</td>
					        <td class=\"rowName\">" . $row["rName"] . "</td>
					        <td>" . $row["calories"] . "</td>
					        <td>" . $row["carbs"] . "</td>
					        <td>" . $row["protein"] . "</td>
					        <td>" . $row["fat"] . "</td>
							<td width=\"25\"><a href=\"includes/delete.php?id=".$row['foodID']."\">x</a></td>
					        </tr>";
					    }
					    echo "</table>";
					} else {
						echo "<p style=\"font-size: 15px; color: #555; font-weight: 300; padding: 15px;\">You've not added any breakfast for today!</p>";
					}

					?>

				</div>
				<div class="mealType"><p>LUNCH</p></div>
				<div class="tableWrapper">
					<?php
						$id = $_SESSION["id"];
						$currDate = date("Y-m-d");
						$lunchOnly = "SELECT foodID, rName, mCat, calories, carbs, protein, fat, 'time' FROM userFood WHERE mCat = 'Lunch' AND userID = $id AND DATE(`time`) = '$currDate'";
						$lunchOnlyResult = $link->query($lunchOnly);

						if ($lunchOnlyResult->num_rows > 0) {
						    // output data of each row
							echo "<table id=\"foodTable\">";
						    while($row = $lunchOnlyResult->fetch_assoc()) {
						        echo "<tr>" . 
						        "<td style=\"display: none;\">" . $row["foodID"] . "</td>
						        <td class=\"rowName\">" . $row["rName"] . "</td>
						        <td>" . $row["calories"] . "</td>
						        <td>" . $row["carbs"] . "</td>
						        <td>" . $row["protein"] . "</td>
						        <td>" . $row["fat"] . "</td>
								<td width=\"25\"><a href=\"includes/delete.php?id=".$row['foodID']."\">x</a></td>
						        </tr>";
						    }
						    echo "</table>";
						} else {
							echo "<p style=\"font-size: 15px; color: #555; font-weight: 300; padding: 15px;\">You've not added any lunch for today!</p>";
						}
					?>
				</div>
				<div class="mealType"><p>DINNER</p></div>
				<div class="tableWrapper">
					<?php
						$id = $_SESSION["id"];
						$currDate = date("Y-m-d");
						$dinnerOnly = "SELECT foodID, rName, mCat, calories, carbs, protein, fat, 'time' FROM userFood WHERE mCat = 'Dinner' AND userID = $id AND DATE(`time`) = '$currDate'";
						$dinnerOnlyResult = $link->query($dinnerOnly);

						if ($dinnerOnlyResult->num_rows > 0) {
						    // output data of each row
							echo "<table id=\"foodTable\">";
						    while($row = $dinnerOnlyResult->fetch_assoc()) {
						        echo "<tr>" . 
						        "<td style=\"display: none;\">" . $row["foodID"] . "</td>
						        <td class=\"rowName\">" . $row["rName"] . "</td>
						        <td>" . $row["calories"] . "</td>
						        <td>" . $row["carbs"] . "</td>
						        <td>" . $row["protein"] . "</td>
						        <td>" . $row["fat"] . "</td>
								<td width=\"25\"><a href=\"includes/delete.php?id=".$row['foodID']."\">x</a></td>
						        </tr>";
						    }
						    echo "</table>";
						} else {
							echo "<p style=\"font-size: 15px; color: #555; font-weight: 300; padding: 15px;\">You've not added any dinner for today!</p>";
						}
					?>
				</div>
				<div class="mealType"><p>SNACKS</p></div>
				<div class="tableWrapper">
					<?php
					$id = $_SESSION["id"];
					$currDate = date("Y-m-d");
					$snacksOnly = "SELECT foodID, rName, mCat, calories, carbs, protein, fat, 'time' FROM userFood WHERE mCat = 'Snack' AND userID = $id AND DATE(`time`) = '$currDate'";
					$snacksOnlyResult = $link->query($snacksOnly);

					if ($snacksOnlyResult->num_rows > 0) {
					    // output data of each row
						echo "<table id=\"foodTable\">";
					    while($row = $snacksOnlyResult->fetch_assoc()) {
					        echo "<tr>" . 
					        "<td style=\"display: none;\">" . $row["foodID"] . "</td>
					        <td class=\"rowName\">" . $row["rName"] . "</td>
					        <td>" . $row["calories"] . "</td>
					        <td>" . $row["carbs"] . "</td>
					        <td>" . $row["protein"] . "</td>
					        <td>" . $row["fat"] . "</td>
							<td width=\"25\"><a href=\"includes/delete.php?id=".$row['foodID']."\">x</a></td>
					        </tr>";
					    }
					    echo "</table>";
					} else {
						echo "<p style=\"font-size: 15px; color: #555; font-weight: 300; padding: 15px;\">You've not added any snacks for today!</p>";
					}
					?>
				</div>
				<div class="mealTypeL"></div>

			</div>
        </div>
        <div class="item macrosGraph animated bounceIn">
            <p class="itemTitle">Your targets</p>
			<p class="itemDescription">Based on the information you’ve given us, we’ve worked out your daily macros.</p>
			<div class="targetHeadings">
				<p>Our recommendation - </p>
				<p>Based on your height, weight, age and current activity level.</p>
			</div>
			<div class="targetsContainer clearfix">
				<div class="targetsFloat">
					<div class="targets clearfix">
						<div class="targetCircle"><p id="calorieGoal">1000</p></div>
						<div class="targetCircle"><p id="fatsGoal">126</p></div>
					</div>
					<div class="targetsTitle clearfix">
						<div class="targetCircle2"><p>Calories</p></div>
						<div class="targetCircle2"><p>Fats (g)</p></div>
					</div>
				</div>
				<div class="targetsFloat">
					<div class="targets clearfix">
						<div class="targetCircle"><p id="carbsGoal">25</p></div>
						<div class="targetCircle"><p id="proGoal">70</p></div>
					</div>
					<div class="targetsTitle clearfix">
						<div class="targetCircle2"><p>Carbs (g)</p></div>
						<div class="targetCircle2"><p>Protein (g)</p></div>
					</div>
				</div>
			</div>
			<div class="targetsOther">
				<p>Lean body mass: <span id="leanBodyMass"></span></p>
				<p id="calFromC"></p>
				<p id="calFromF"></p>
				<p id="calFromP"></p>
			</div>
			<div class="targetExplain"><p class="tooltip" title="We've used the Mifflin St Jeor formula. 10 x weight(kg) + 6.25 x height(cm) – 5 x age(y) + 5.">How have we worked this out?</p></div>
        </div>
        <div class="item weightGraph animated bounceIn columnHidden"></div>
        <div class="item waterGraph animated bounceIn">
            <p class="itemTitle">Today - Water Intake Overview</p>
			<p class="itemDescription">You have <span>[ ]</span> met your target for today.</p>
			<div class="glassesContainer">
				<div class="gC">
					<p class="glassSText">You've drank</p>
					<div class="relCon">
						<?php
							$id = $_SESSION["id"];
							$currDate = date("Y-m-d");
							//Need this query to check if any results were returned (used in if statement)
							$water_total = "SELECT waterAmount FROM userWater WHERE userID = $id AND DATE(`time`) = '$currDate'";
							$water_t = $link->query($water_total);
							
							if($water_t->num_rows > 0) {
								$currDate = date("Y-m-d");
								//Main query to retrive water data
								$total_water2 = "SELECT SUM(waterAmount) AS total_water FROM userWater WHERE userID = $id AND DATE(`time`) = '$currDate'";
								$total_water_for_user = $link->query($total_water2);
								$tot_water = mysqli_fetch_assoc($total_water_for_user); 
								$sum_water = $tot_water['total_water'];
								if ($sum_water >= 8) {
									echo "<img src=\"images/greenGlass.png\" alt=\"Glasses Consumed\">";
									echo "<p class=\"numberOfGlasses\" id=\"numberOfGlasses\">" . $sum_water . "</p>";
								} else {
									echo "<img src=\"images/orangeGlass.png\" alt=\"Glasses Consumed\">";
									echo "<p class=\"numberOfGlasses\" id=\"numberOfGlasses\">" . $sum_water . "</p>";
								}

							} else {
								echo "<img src=\"images/redGlass.png\" alt=\"Glasses Consumed\">";
								echo "<p class=\"numberOfGlasses\" id=\"numberOfGlasses\">0</p>";
							}
						?>
					</div>
					<p class="glassSText">glasses today</p>
				</div>
				<div class="gC">
					<p class="glassSText">Your target is</p>
					<div class="relCon">
						<img src="images/greenGlass.png" alt="Water Goal">
						<p class="numberOfGlasses2" id="numberOfGlasses2">8</p>
					</div>
					<p class="glassSText">glasses in a day</p>
				</div>
			</div>
			<div class="addButtonContainer">
				<div class="buttonMar">
					<form method="post" action="">
						<input name="waterAddButton" type="submit" value="+" class="waterASButton waterAdd tooltip" title="Add a glass of water">
					</form>
				</div>
				<div class="buttonMar">
					<form method="post" action="">
						<input name="waterAddDButton" type="submit" value="-" class="waterASButton waterSub tooltip" title="Remove a glass of water">
					</form>
				</div>
			</div>
			<div class="prevWater">
				<form action="stats.php">
				<button type="submit" class="hvr-pop">View Previous Days</button>
				</form>
			</div>
        </div>
        <div class="item weightGraph animated bounceIn columnHidden"></div>
        <div class="item carbfatGraph animated bounceIn">
            <p class="itemTitle">Weight Progress</p>
            <p class="itemDescription">A detailed history of your weight.</p>
			<div class="" style="width:100%;">
                <div id="chart-container9">FusionCharts XT will load here!</div>
            </div>
            <div class="wHistoryT"><p>- Weight History -</p></div>
            <div class="weightTableOuter">
			<?php
			$id = $_SESSION["id"];
			
			//gets weight entries of all time
			$sql = "SELECT weight, timee FROM userWeight WHERE userID = $id ORDER BY timee DESC";
			$result = $link->query($sql);

			if ($result->num_rows > 0) {
			    // output data of each row
			    echo "<table id=\"weightHistory\"";
				echo "<tr>
				<th>Date</th>
				<th>Weight</th>
				</tr>";
			    while($row = $result->fetch_assoc()) {
			        echo "<tr>" . 
			        "<td>" . $row["timee"] . "</td>
			        <td>" . $row["weight"] . "(kg)</td>
			        </tr>";
			    }
			    echo "</table>";
			}

			$link->close(); //Close the connection

			?>
            </div>
        </div>
    </div>

</div>

<div class="mobileMenuBall">
	<i class="first"><img src="images/icons/weightIconWhite.png" width="40px" alt="Weight" onclick="addWeight()"></i>
	<i class="second"><img src="images/icons/foodIconWhite.png" width="40px" alt="Food" onclick="addFood()"></i>
	<i class="third"><img src="images/icons/waterIconWhite.png" width="34px" alt="Water" onclick="addWater()"></i>
	<svg version="1.1" id="Ebene_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve"> <polygon fill="#FFFFFF" points="30,14.5 15.5,14.5 15.5,0 14.5,0 14.5,14.5 0,14.5 0,15.5 14.5,15.5 14.5,30 15.5,30 15.5,15.5 
	30,15.5 "/></svg>
</div>	

</body>
<script src="js/globalScripts.js"></script>
<script type="text/javascript" src="js/tooltipster.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/tooltipster.css">
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
		document.getElementById("carbPercentage").innerHTML = Math.round((totalCarb/totalNutritionForToday)*100) +"%";
		document.getElementById("fatPercentage").innerHTML = Math.round((totalFats/totalNutritionForToday)*100) +"%";
		document.getElementById("proPercentage").innerHTML = Math.round((totalPro/totalNutritionForToday)*100) +"%";
	}

	 //Percetange diff between first weight and current weight
	weightDiff = Math.round(((latestWeight/oldestWeight)-1)*100);

	//CANNOT BE USED UNTIL TRELLO BUG IS FIXED
	 achievementPercentage = ((latestWeight - oldestWeight) * 100) / (goalWeight - oldestWeight);
	 achievementPercentageRounded = Math.round(achievementPercentage * 10) / 10;
	 //document.getElementById("percentageToGoal").innerHTML = "That is a " + weightDiff + "% difference vs when you started.";

	 //document.getElementById("percentage").innerHTML = achievementPercentageRounded;


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
 	
 	document.getElementById("calorieGoal").innerHTML = Math.round(calorieGoal);
 	document.getElementById("leanBodyMass").innerHTML = Math.round(leanBodyMass);

 	var caloriesFromFat = calorieGoal - (Math.round(rProteinIntake) * 4) - (Math.round(carbsGoal) * 4);

	document.getElementById("proGoal").innerHTML = Math.round(rProteinIntake);
	document.getElementById("carbsGoal").innerHTML = Math.round(carbsGoal);
	document.getElementById("fatsGoal").innerHTML = Math.round(caloriesFromFat/9);

	document.getElementById("calFromP").innerHTML = "Calories from protein: " + Math.round(rProteinIntake) * 4 + " (kcal)";
	document.getElementById("calFromC").innerHTML = "Calories from carbs: " + Math.round(carbsGoal) * 4 + " (kcal)";
	document.getElementById("calFromF").innerHTML = "Calories from fat: " + Math.round(caloriesFromFat) + " (kcal)";

	if (!(anyFoodAddedToday == "")) {
		var carbsRemaining = carbsGoal - totalCarb;
		document.getElementById("withinLimit").innerHTML = totalCarb + "/" + carbsGoal + " Net Carbs";
	}

	if (!(anyFoodAddedToday == "")) {
		var carbsRemaining = carbsGoal - totalCarb;
		if (carbsRemaining < 0) {
			document.getElementById("withinLimitRemaining").innerHTML = "0g remaining";
			document.getElementById("macroStatsRem").style.backgroundColor = "#F46871";
			document.getElementById("macroStatsRem").style.color = "#ffffff";
			$('#macroStatsRem').tooltipster({
				content: 'You\'ve exceeded your limit!'
			});
		} else {
			document.getElementById("withinLimitRemaining").innerHTML = carbsRemaining + "g remaining";
			document.getElementById("macroStatsRem").style.backgroundColor = "#2ECC71";
			document.getElementById("macroStatsRem").style.color = "#ffffff";
		}
	} else {
		document.getElementById("withinLimitRemaining").innerHTML = carbsGoal + "g remaining";
		document.getElementById("macroStatsRem").style.backgroundColor = "#2ECC71";
		document.getElementById("macroStatsRem").style.color = "#ffffff";
	}
</script>
<script>
if ($(window).width() < 450) {
	document.getElementById("tableHeadingCal").innerHTML = "Cal";
	document.getElementById("tableHeadingPro").innerHTML = "Pro";
	document.getElementById("tableHeadingCar").innerHTML = "Carb";
}
</script>
<script>
	FusionCharts.ready(function(){
var chart4 = new FusionCharts({
    type: 'line',
    renderAt: 'chart-container9',
    width: '100%',
    height: '400',
    dataFormat: 'json',
    dataSource: {
        "chart": {
            "theme": "fusion",
            "xAxisName": "Date",
            "yAxisName": "Weight (kg)",
            "captionFont": "Open Sans, sans-serif",
            "subcaptionFont": "Open Sans, sans-serif",
            "captionFontColor": "#666666",
            "captionFontBold": "0",
            "captionFontSize": "16",
            "numDivLines": "5",
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

var totalCarb = "<?php if(isset($sum)) {echo($sum);} ?>";
var totalFats = "<?php if(isset($sum2)) {echo($sum2);} ?>";
var totalPro = "<?php if(isset($sum1)) {echo($sum1);} ?>";
var totalCal = "<?php if(isset($sum3)) {echo($sum3);} ?>";

FusionCharts.ready(function() {
var fusioncharts2 = new FusionCharts({
type: 'doughnut2d',
renderAt: 'chart-container10',
width: '100%',
height: '340',
dataFormat: 'json',
dataSource: {
  "chart": {
    "startingAngle": "310",
    "showLegend": "1",
    "defaultCenterLabel": "Total<br>2200<br>Calories",
    "centerLabel": "$label: $value(g)",
    "centerLabelBold": "0",
    "centerLabelColor": "#AAAAAA",
    "centerLabelFontSize": "18",
    "showTooltip": "0",
    "decimals": "0",
    "enableSmartLabels": "0",
    "showLabels": "0",
    "animationDuration": "3",
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
<script>
//Adjusts the display of the water tile depending on how many glasses are consumed
$(document).ready(function() {
	var str = document.getElementById("numberOfGlasses").innerHTML;
	var strLength = str.length;
	if(strLength > 1) {
		document.getElementById("numberOfGlasses").style.left = "36%";
	}

	var str2 = document.getElementById("numberOfGlasses2").innerHTML;
	var strLength2 = str2.length;
	if(strLength2 > 1) {
		document.getElementById("numberOfGlasses2").style.left = "36%";
	}
});
</script>
<script src="js/salvattore.min.js"></script>
</html>