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
	<link rel="stylesheet" href="css/dashboard-styles.css">
	<link rel="stylesheet" href="css/notyf.min.css">
	<script src="js/notyf.min.js"></script>
	<title>Dashboard</title>
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
						<p class="navMainText navActive">Dashboard</p>
						<p class="navSubText">Overview</p>
					</div>
					<div class="navBreadcrumbs"></div>
				</a>
				<a href="log.php">
				<div class="navItem" id="navItemT">
					<p class="navMainText">Daily Log</p>
					<p class="navSubText">Your Daily Tracking</p>
				</div>
				</a>
				<a href="#">
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
				<p>Welcome back to your dashboard, <span><?php echo ($_SESSION["firstName"]); ?></span>.</p>
			</div>
			<div class="date">
				<p>Today: <span id="currentDate"></span></p>
			</div>
			<div class="titleLineBreak">
				<hr class="line">
			</div>
		</div>
   <div class="clearfix" id="grid" data-columns>
            <div class="item overviewCon animated bounceIn">            
				<p class="itemTitle">Overview</p>
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
				<p class="itemDescription">You’re <span id="percentage">[ ]</span>% of the way to completing your goals!</p>
				<div class="percentageContainer">
					<div id="test-circle2"></div>
					<svg style="width:0;height:0;position:absolute;" aria-hidden="true" focusable="false">
						<linearGradient id="circle-gradient" x2="1" y2="1">
							<stop offset="0%" stop-color="#25AE9A" />
							<stop offset="100%" stop-color="#2F85AD" />
						</linearGradient>
					</svg>
				</div>

				<div class="statInfo">
					<div class="yWeight">
						<p>Your Weight: <span class="tooltip" title="Value not available yet"><?php echo ($_SESSION["cWeight"]); ?>kg</span></p>
					</div>
					<div class="gWeight">
						<p>Goal Weight: <span class="tooltip" title="Value not available yet"><?php echo ($_SESSION["gWeight"]); ?>kg</span></p>
					</div>
					<div class="cGoal">
						<p>Calorie Goal: <span class="tooltip" title="Daily calorie goal" id="calories">NaN</span></p>
					</div>
					<div class="cGoal ghostContainer">
						<p>Calorie Goal: <span id="calories">NaN</span></p>
					</div>
				</div>

				<div class="editButtonContainer">
					<button type="button" class="hvr-pop" onclick="swalEditWeight()">EDIT</button>
				</div>

            </div>  

            <div class="item waterCon animated bounceIn"> 
				<p class="itemTitle">Water Intake Today</p>
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
						<form method="post" action="index.php">
							<input name="waterAddButton" type="submit" value="+" class="waterASButton waterAdd tooltip" title="Add a glass of water">
						</form>
					</div>
					<div class="buttonMar">
						<form method="post" action="index.php">
							<input name="waterAddDButton" type="submit" value="-" class="waterASButton waterSub tooltip" title="Remove a glass of water">
						</form>
					</div>
				</div>
            </div>   

            <div class="item lwSummaryCon animated bounceIn"> 
				<p class="itemTitle">Last Week Summary</p>
				<p class="itemDescription">Below is a summary of your carbohydrate vs fat intake for the past week.</p>
				<!-- <div style="height: 310px; display: flex; justify-content: center; align-items: center;">
					<p style="font-size: 22px; font-weight: 700; text-align: center; color: #dcdcdc;">Sorry there isn't enough data yet.</p>
				</div> -->
				<div style="width:100%;">
					<div id="chart-container">FusionCharts XT will load here!</div>
				</div>
				<div class="statInfo statInfoTarget">
					<div class="tCarbs">
						<p>Target Carbs: <span class="tooltip" title="Value not available yet" id="targetCarbs">NaN</span></p>
					</div>
					<div class="tFats">
						<p>Target Fat: <span class="tooltip" title="Value not available yet" id="targeFats">NaN</span></p>
					</div>
				</div>
            </div> 

			<div class="item tipOfTheDayCon animated bounceIn">
				
				<div class="clearfix">
				<div class="tipImage"></div>
				<div class="marginTotd">
					<div>
					<?php
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
					<p class="itemTitle tipOfTheDayTitle">Tip of the day</p>
					<p class="itemDescription tipOfTheDayDesc">A growing number of studies have found that being in ketosis may be beneficial for some types of athletic performance, including endurance exercise. <a href="https://www.everydayhealth.com/diet-nutrition/ketogenic-diet/what-are-benefits-risks-keto-diet/"><span class="tipOfTheDayMore">Find out more here.</span></a></p>
					</div>
				</div>
				</div>
			</div>   

            <div class="item wellCon animated bounceIn"> 
				<p class="itemTitle"><span class="wellNumber" id="wellNumber">0</span>Things You’re Doing Well</p>
				<div class="wellListCon">
					<ul class="wellList" id="wellList">

					</ul>
				</div>
				<p class="itemTitle"><span class="improvementNumber" id="improvementNumber">0</span>Things To Improve</p>
				<div class="notWellListCon">
					<ul class="notWellList" id="improveList">

					</ul>
				</div>
            </div>  

			<div class="item macrosCon animated bounceIn">
				<div style="padding: 32px 37px 0px 37px;">
					<p class="itemTitle">Macros</p>
					<p class="itemDescription">Below is a pie chart of your macros for today.</p>
				</div>
			<!-- <div style="height: 310px; display: flex; justify-content: center; align-items: center;">
				<p style="font-size: 22px; font-weight: 700; text-align: center; color: #dcdcdc;">Sorry there isn't enough data yet.</p>
			</div> -->
				<div class="pieChartContainer">
					<div id="chart-container2">FusionCharts XT will load here!</div>
				</div>
				<div class="macroStats">
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
				<div class="detailButtonContainer">
					<form action="log.php"><button type="submit" class="hvr-pop">Detailed View</button></form>
				</div>
			</div>  

            <div class="item recipeCon animated bounceIn"> 
				<p class="itemTitle">Recipe Ideas & Inspiration</p>
				<p class="itemDescription">Hand picked by us, just for you.</p>
				<div class="slick">
					<div>
						<div class="slickExtraP">
							<div class="recipeContainer">
								<div class="recipeContainerItem">
									<img src="images/recipes/1.jpg" alt="Recipe">
								</div>
							</div>
							<div class="recipeTitle">
								<p class="recipeTitleP"><span>Featured Recipe</span><br>Simple grilled chicken with almond courgetti salad</p>
							</div>
						</div>
					</div>

					<div>
						<div class="slickExtraP">
							<div class="recipeContainer">
								<div class="recipeContainerItem">
									<img src="images/recipes/2.jpg" alt="Recipe">
								</div>
							</div>
							<div class="recipeTitle" style="background-color: #673AB7;">
								<p class="recipeTitleP"><span>New Recipe</span><br>Lemon roasted mackerel fillets with apple tzatziki</p>
							</div>
						</div>
					</div>

					<div>
						<div class="slickExtraP">
							<div class="recipeContainer">
								<div class="recipeContainerItem">
									<img src="images/recipes/3.png" alt="Recipe">
								</div>
							</div>
							<div class="recipeTitle" style="background-color: #4CAF50;">
								<p class="recipeTitleP"><span>New Recipe</span><br>Rainbow soba salad with ginger and miso dressing</p>
							</div>
						</div>
					</div>
				</div>
				<div class="detailRecButtonContainer">
					<button type="button" class="hvr-pop">Detailed Recipe</button>
				</div>
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

	 document.getElementById("percentage").innerHTML = achievementPercentageRounded;


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
 	
 	document.getElementById("calories").innerHTML = Math.round(calorieGoal);
 	//document.getElementById("leanBodyMass").innerHTML = "Lean body mass is: " + Math.round(leanBodyMass);

 	var caloriesFromFat = calorieGoal - (Math.round(rProteinIntake) * 4) - (Math.round(carbsGoal) * 4);

	//document.getElementById("rProteinIntake").innerHTML = "Recommended protein intake: " + Math.round(rProteinIntake) + "g";
	document.getElementById("targetCarbs").innerHTML = Math.round(carbsGoal) + "g";
	document.getElementById("targeFats").innerHTML = Math.round(caloriesFromFat/9) + "g";

	//document.getElementById("calFromP").innerHTML = "Calories from protein: " + Math.round(rProteinIntake) * 4;
	//document.getElementById("calFromC").innerHTML = "Calories from Carbs: " + Math.round(carbsGoal) * 4;
	//document.getElementById("calFromF").innerHTML = "Calories from fat: " + Math.round(caloriesFromFat);

	if (!(anyFoodAddedToday == "")) {
		if(totalCarb < carbsGoal) {
			// document.getElementById("withinLimit").innerHTML = "You're within your carb goal.";
			// document.getElementById("withinLimit").style.backgroundColor = "#2ECC71";
			// document.getElementById("withinLimit").style.color = "#ffffff";
		} else {
			// document.getElementById("withinLimit").innerHTML = "You've exceeded your carb intake limit.";
			// document.getElementById("withinLimit").style.backgroundColor = "#F25661";
			// document.getElementById("withinLimit").style.color = "#ffffff";
		}
	} else {
		// document.getElementById("withinLimit").innerHTML = "You're within your carb goal.";
		// document.getElementById("withinLimit").style.backgroundColor = "#2ECC71";
		// document.getElementById("withinLimit").style.color = "#ffffff";
	}

	if (!(anyFoodAddedToday == "")) {
		var carbsRemaining = carbsGoal - totalCarb;
		if (carbsRemaining < 0) {
			// document.getElementById("withinLimitRemaining").innerHTML = "0g remaining";
			// document.getElementById("withinLimitRemaining").style.backgroundColor = "#F25661";
			// document.getElementById("withinLimitRemaining").style.color = "#ffffff";
		} else {
			// document.getElementById("withinLimitRemaining").innerHTML = carbsRemaining + "g remaining";
			// document.getElementById("withinLimitRemaining").style.backgroundColor = "#2ECC71";
			// document.getElementById("withinLimitRemaining").style.color = "#ffffff";
		}
	} else {
		// document.getElementById("withinLimitRemaining").innerHTML = carbsGoal + "g remaining";
		// document.getElementById("withinLimitRemaining").style.backgroundColor = "#2ECC71";
		// document.getElementById("withinLimitRemaining").style.color = "#ffffff";
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


	//var count = $("#wellList li").size();
	var wcount = $('#wellList > li').length;
	document.getElementById("wellNumber").innerHTML =  wcount;
	var icount = $('#improveList > li').length;
	document.getElementById("improvementNumber").innerHTML =  icount;

//Function controls the recipe tile carousel
$('.slick').slick({
	dots: true,
	speed: 1000,
	fade: true,
	arrows: false,
	autoplay: true,
 	autoplaySpeed: 6000,
	lazyLoad: 'ondemand',
	cssEase: 'linear'
});

//Controls the overview tile animation
$("#test-circle2").circliful({
	animationStep: 3,
	foregroundBorderWidth: 2,
	backgroundBorderWidth: 6,
	backgroundColor: "#fff",
	fillColor: '#27A59E',
	fontColor: '#fff',
	foregroundColor: '#27A59E',
	percent: achievementPercentageRounded-1,
	// replacePercentageByText: 'test',
	percentageY: 108,
	progressColor: { 50: '#23B396', 50: '#28AB9E', 70: '#2A9EA3', 90: '#2C8FA9', 100: '#2E88AC'}
});

var svgCircle = document.getElementsByClassName('circliful')[0];
svgCircle.setAttribute("viewBox", "0 0 194 170");
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
<script type="text/javascript">
    FusionCharts.ready(function(){
    var fusioncharts1 = new FusionCharts({
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
			"animationDuration": "3",
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
    fusioncharts1.render();
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
<script src="js/salvattore.min.js"></script>
<script type="text/javascript" src="js/tooltipster.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/tooltipster.css">
</html>