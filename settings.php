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
    <link rel="stylesheet" href="css/settings.css">
    <title>Settings</title>
</head>

<body>
<?php require_once "includes/main.php"; ?>
<?php include 'includes/graphQueries.php';?>
<?php
if(isset($_POST["deletea"])){
    $id = $_SESSION["id"];
    $sql = "DELETE FROM users WHERE id=$id";
    $link->query($sql);

    session_destroy();
    header("location: login.php");
    exit;
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
		<div class="navlink"><a href="settings.php">Settings</a></div>
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
                            <a href="settings.php"><img src="images/icons/settingsIcon.png" alt="Settings"></a>
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
                    <p class="navMainText">Daily Log</p>
                    <p class="navSubText">Your Daily Tracking</p>
                </div>
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
                <p>User settings</p>
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
        <div id="settings" class="item weightGraph animated bounceIn">
            <div class="table">
                <p id="heading">BASICS</p>
                <div class="row clearfix">
                  <div class="column">
                    <p class="colp">Photo</p>
                  </div>
                  <div class="column2">
				<?php
					$sql = "SELECT profilePicture FROM users WHERE id = $id";
					$result = $link->query($sql);

					    while($row = $result->fetch_assoc()){
					        if($row['profilePicture'] == ""){
					        	if($_SESSION["gender"] == "Male"){
					                echo "
										<div class=\"profileImageContainer\">
										<div class=\"profileImage profileImageM\" onclick=\"addPicture()\">
										<p id=\"nameLetterC\"></p>
										</div>
										</div>
					                ";
					            } else {
					            	echo "
										<div class=\"profileImageContainer\">
										<div class=\"profileImage\" onclick=\"addPicture()\">
										<p id=\"nameLetterC\"></p>
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
                    <p id="edit" onclick="addPicture()">edit</p>
                  </div>
                </div>

                <div class="row clearfix">
                  <div class="column">
                    <p class="colp">Name</p>
                  </div>
                  <div class="column2">
                    <p class="emailaddress"><?php echo ($_SESSION["firstName"]); ?> <?php echo ($_SESSION["lastName"]); ?></p>
                  </div>
                </div>

                <div class="row clearfix">
                  <div class="column">
                    <p class="colp">Email</p>
                  </div>
                  <div class="column2" id="useremail">
                    <p id="emailaddress"><?php echo ($_SESSION["email"]); ?></p>
                  </div>
                </div>
            </div>
            
            <div class="table">
                <p id="heading">ADVANCED</p>
                <div class="row">
                  <div class="column">
                    <p class="colp">Start Weight</p>
                  </div>
                  <div class="column2">
      				<?php
						$id = $_SESSION["id"];
						
						//gets weight entries of all time
						$sql = "SELECT weight, timee FROM userWeight WHERE userID = $id ORDER BY timee ASC LIMIT 1";
						$result = $link->query($sql);

						if ($result->num_rows > 0) {

						    while($row = $result->fetch_assoc()) {
						        echo "<p class=\"userName\">".$row["weight"]."kg</p>";
						    }
						}

						$link->close(); //Close the connection

					?>
                  	
                    <!-- <p id="edit" class="tooltip" title="Feature not available.">edit</p> -->
                  </div>
                </div>

                <div class="row">
                  <div class="column">
                    <p class="colp">Weight Goal</p>
                  </div>
                  <div class="column2">
                  	<p class="userName"><?php echo ($_SESSION["gWeight"]); ?>kg</p>
                    <p id="edit" onclick="swalEditWeight()">edit</p>
                  </div>
                </div>

                <div class="row">
                  <div class="column">
                    <p class="colp">Calorie Budget</p>
                  </div>
                  <div class="column2">
                  	<p class="userName" id="calories"></p>
                    <p id="edit" class="tooltip" title="Feature not available yet.">edit</p>
                  </div>
                </div>
            </div>
            
            <div class="table">
                <p id="heading">MISC</p>
                <div class="row">
                  <div class="column">
                    <p class="colp">Delete Account</p>
                  </div>
                  <div class="column2" id="del">
                    <p class="userName" id="acctDel">If you delete your account, your data will be gone forever.</p>
            
                        <input type="button" id="delete" value="Delete" name="delete" onclick="deleteAccount()">
            
                  </div>
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
<script src="js/salvattore.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
	if ($('#nameLetter').length > 0) {
	//Controls the profile picture header
	var firstLetterOfName = document.getElementById("name").innerHTML;
	document.getElementById("nameLetter").innerHTML = firstLetterOfName.charAt(0);
	document.getElementById("nameLetterM").innerHTML = firstLetterOfName.charAt(0);
	document.getElementById("nameLetterC").innerHTML = firstLetterOfName.charAt(0);
	}
});

if ($(window).width() < 850) {
	document.getElementById("acctDel").style.display = "none";
}
if ($(window).width() < 500) {
	var emailaddress = document.getElementById("emailaddress").innerHTML;
	String.prototype.trunc = String.prototype.trunc ||
	function(n){
	  return (this.length > n) ? this.substr(0, n-1) + '..' : this;
	};
	var emailaddress = document.getElementById("emailaddress").innerHTML = emailaddress.trunc(14);
}

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

	// document.getElementById("percentage").innerHTML = achievementPercentageRounded;


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
</script>
<script type="text/javascript" src="js/tooltipster.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/tooltipster.css">
</html>