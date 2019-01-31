<?php
// Initialize the session
session_start();
require_once "includes/config.php";
require_once "includes/main.php";
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
	<title>Daily Log</title>
	<style>
    #grid {
        overflow: hidden;
        padding: 0px 18px;
        animation-duration: 1.5s;
        animation-delay: 0.3s;
    }
    @media screen and (min-width: 1200px) {
       #grid[data-columns]::before {
            content: '2 .column.size-1of2';
        }
    }
    @media only screen and (max-width: 767px) {
       #grid[data-columns]::before {
            content: '1 .column.size-1of1';
        }
        .column {
            width: 100% !important;
        }
        .item:nth-child(1) {
            margin-top: 18px !important;
        }
        #grid {
            padding: 0px 14px;
        }
    }
    .item:nth-child(1), .item:nth-child(2) {
        margin-top: 4px;
    } 

    .column {
        float: left;
    }

    .size-1of2 {
        width: 50%;
    }
    .size-1of1 {
        width: 100%;
    }
    .column:nth-child(1) {
        width: 50%;
    }
    .column:nth-child(2) {
        width: 50%;
    }

    .item {
        position: relative;
        /*padding: 15px;*/
        padding: 0px;
        background: #fff;
        margin: 18px;
        border-radius: 6px;
        box-shadow: 2px 2px 2px 0px rgba(0,0,0,0.05);
        -moz-box-shadow: 2px 2px 2px 0px rgba(0,0,0,0.05);
        box-shadow: 2px 2px 2px 0px rgba(0,0,0,0.05);
        margin: 30px 18px;
    }
    .item p {
        color: #999;
    }
    .itemTitle {
        font-size: 16px;
        font-weight: 700;
        color: #535353 !important;
        padding-bottom: 2px;
        padding: 32px 36px 0px 36px;
    }
    .itemDescription {
        font-size: 14px;
        font-weight: 400;
        color: #999 !important;
        padding: 0px 36px 0px 36px;
    }
    .item:nth-child(1), .item:nth-child(2), .item:nth-child(3) {
        margin-top: 4px;
    }
	.columnHidden {
		display: none;
	}
	#chart-container9 {
        margin-right: 18px;
        padding: 32px 37px 20px 37px;
    }
    .weightTableOuter {
    	padding: 0px 69px 60px 69px;
    }
    #weightHistory {
    	border-collapse: collapse;
  		width: 65%;
  		font-family:'Open Sans',sans-serif;
  		font-size: 16px;
		margin: 0 auto;
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
	.wHistoryT {
		padding-bottom: 10px;
	}
	.wHistoryT p {
		color: #444;
		font-size: 16px;
		font-weight: 600;
		text-align: center;
		text-transform: uppercase;
		letter-spacing: 2px;
	}
	@media only screen and (max-width: 425px) {
		.weightTableOuter {
		    padding: 0px 0px 60px 0px;
		}
	}
	.addButtonContainer {
	    text-align: center !important;
	    /*padding-bottom: 30px !important;*/
	}
	.mealSummary {
		background-color: #f9f9f9;
		border-radius: 6px;
	}
	.mealHeadingsC {
		padding: 34px 37px 0px 37px;
	}
	.mealType {
		width:100%;
		margin: 10px 0px;
		padding: 0px 37px 0px 37px;
	}
	.mealType p {
		padding: 8px 12px;
		background-color: #444;
		color:#fff;
		font-size: 15px;
		letter-spacing: 1px;
		font-weight: 400;
		border-radius: 3px;
	}
	.mealTypeL {
		padding-bottom: 40px;
	}
	.pieChartContainer {
		width: 54%;
		float: left;
		margin-top: -12px;
	}
	.macroStats {
		width: 46%;
		float: left;
	}
	.macroStatsContainer {
		padding:2px 25px;
	}
	.macroStatsLeft {
		float:left;
	}
	.macroStatsLeft div {
		margin-bottom: -3px;
		margin-right: 8px;
		display:inline-block;
		width: 17px;
		height: 17px;
		background-color: green;
		border-radius: 4px;
	}
	.macroStatsLeft p {
		display: inline-block;
		font-size: 15px;
		color: #525252;
		font-weight: 400;
	}
	.macroStatsPercentage {
		float: right;
		font-size: 15px;
		color: #525252 !important;
		font-weight: 600;
	}
	.macroFatColour {
		background-color: #495C6F !important;
	}
	.macroProColour {
		background-color: #F46871 !important;
	}
	.macroCarbColour {
		background-color: #F3C76A !important;
	}
	.macroStatsInner {
	    width: 250px;
	    background-color: #eeeeee;
	    margin-bottom: 10px;
	    margin-top: 68px;
	    border-radius: 5px;
	    padding: 14px 0px;
	}
	.macroStatsRem {
		width: 250px;
	    background-color: #F46871;
	    margin-bottom: 10px;
	    border-radius: 5px;
	    padding: 14px 0px;
	    cursor: pointer;
	}
	.macroStatsRem p {
		text-align: center;
		color: #fff;
	}
	.macroStatsRem > p:nth-child(1) {
		font-size: 18px;
		font-weight: 600;
	}
	.macroStatsRem > p:nth-child(2) {
		font-size: 14px;
	}
	#chart-container10 svg {
		background-color: transparent !important;
	}
	@media only screen and (max-width: 1366px) {
		.pieChartContainer {
			width: 52%;
		}
		.macroStats {
			width: 48%;
		}
	}
	@media only screen and (max-width: 1300px) and (min-width: 768px) {
		.pieChartContainer {
		    width: 100%;
		    float: none;
		    margin-top: -20px;
		}
		.macroStats {
		    width: 100%;
		    float: none;
		    margin-top: -20px;
		}
		.macroStatsInner, .macroStatsRem {
			margin-top: 0;
			border-radius: 0px;
			width: 100%;
			margin-bottom: 0;
		}
	}
	@media only screen and (max-width: 645px) {
		.pieChartContainer {
		    width: 100%;
		    float: none;
		    margin-top: -20px;
		}
		.macroStats {
		    width: 100%;
		    float: none;
		    margin-top: -20px;
		}
		.macroStatsInner, .macroStatsRem {
			margin-top: 0;
			border-radius: 0px;
			width: 100%;
			margin-bottom: 0;
		}
	}
	@media only screen and (max-width: 366px) {
		.pieChartContainer {
			width: 112%;
			margin-left: -6%;
		}
		.raphael-group-131-plots text tspan:nth-child(2) {
			font-size: 22px !important;
			font-weight: 600 !important;
		}
		.raphael-group-131-plots text tspan {
			font-size: 16px !important;
		}
	}
	@media only screen and (max-width: 338px) {
		.pieChartContainer {
			width: 116%;
	    	margin-left: -8%;
		}
	}
	@media only screen and (max-width: 329px) {
		.pieChartContainer {
			width: 118%;
	    	margin-left: -9%;
		}
	}
	.targetHeadings {
		    padding: 24px 36px 0px 36px;
	}
	.targetsContainer {
		    padding: 24px 36px 32px 36px;
	}
	.targetHeadings p {
		font-size: 15px;
		font-weight: 400;
		color: #666;
	}
	.targetHeadings p:nth-child(2) {
		font-style: italic;
		color: #bbb;
	}
	.targetCircle {
		width: 80px;
		height: 80px;
		float: left;
		margin: 6px 10px;
		cursor: pointer;
	}
	.targetCircle2 {
		width: 80px;
		float: left;
		margin: 6px 10px;
		text-align: center;
	}
	.targetsFloat {
		float: left;
	}
	.targetCircle p {
		line-height: 80px;
    	text-align: center;
    	font-size: 22px;
    	font-weight: 700;
    	color: #888;
		border-radius: 100px;
		background-color: #EEEEEE;
		-webkit-transition: 0.6s ease;
		transition: 0.6s ease;
	}
	.targetCircle p:hover {
		background-color: #2ECC71;
		color: #fff;
	}
	.targetExplain {
		padding: 26px 36px 50px 36px;
	}
	.targetsOther {
		padding: 6px 36px 0px 36px;
	}
	.targetsOther p {
		color: #999;
		font-size: 14px;
		font-weight: 400;
		font-style: italic;
	}
	.targetExplain p {
		color: #bbb;
		font-size: 14px;
		font-weight: 300;
		text-decoration: underline;
		display: inline-block; /*Tooltip fix*/
	}
	#leanBodyMass {
		font-size: 14px;
		color: #999;
	}
	@media only screen and (max-width: 536px) {
		.targetsFloat {
			float: none;
			display: block;
			width: 100%;
		}
		.targetCircle {
			width: 42%;
		}
		.targetCircle2 {
		    width: 50%;
		    margin: 6px 0px;
		}
	}
	@media only screen and (max-width: 385px) {
		.targetCircle {
		    width: 41%;
		}
	}
	@media only screen and (max-width: 358px) {
		.targetCircle {
		    width: 40%;
		}
	}
	@media only screen and (max-width: 335px) {
		.targetCircle {
		    width: 39%;
		}
	}
	.prevWater {
	    text-align: center;
	    padding: 24px 0px 38px 0px;
	}
	.prevWater button {
		background-color: #fff;
		border: 2px solid #aaaaaa;
		padding: 10px;
		width: 180px;
		border-radius: 100px;
		color: #aaaaaa;
		font-size: 13px;
		font-weight: 600;
		cursor: pointer;
		text-transform: uppercase;
		letter-spacing: 1px;
	}
	#foodTable {
		border-collapse: collapse;
		width: 100%;
	}
	#foodTable td {
		border: 1px solid #ddd;
		padding: 8px;
	}
	#foodTable tr:nth-child(even){
		background-color: #f2f2f2;
	}
	#foodTable tr:hover {
		background-color: #ddd;
	}
	#foodTable th {
		padding-top: 12px;
		padding-bottom: 12px;
		text-align: left;
		background-color: #45aaf2;
		color: white;
		padding-left: 10px;
	}
	.tableWrapper {
		width: 100%;
    	/* margin: 10px 0px; */
    	padding: 0px 37px 0px 37px;
	}
	#mealHeadings {
		border-collapse: collapse;
		width: 100%;
	}
	#mealHeadings td {
		border: 1px solid #ddd;
		padding: 8px;
		background-color: #444;
		color: #fff;
		text-decoration: underline;
	}
	.rowName {
		width: 150px;
	}
	@media only screen and (max-width: 450px) {
		.mealHeadingsC {
		    padding: 34px 0px 0px 0px;
		}
		.mealType {
			padding: 0px;
			margin: 10px 0px 0px 0px;
		}
		.mealType p {
			border-radius: 0px;
		}
		.tableWrapper {
		    padding: 0px;
		}
		.rowName {
			width: 50px;
		}
	}
	.raphael-group-11-messageGroup text {
		font-size: 16px !important;
    	font-family: 'Open Sans', sans-serif !important;
	}
	.raphael-group-128-plots text tspan {
		font-size: 16px !important;
	    font-weight: 300 !important;
	}
	.raphael-group-128-plots text tspan:nth-child(2) {
	    font-size: 22px !important;
	    font-weight: 600 !important;
	}
	.raphael-group-128-plots text tspan:nth-child(2) {
	    font-size: 22px !important;
	    font-weight: 600 !important;
	}
	</style>
</head>

<body>
<?php include 'includes/graphQueries.php';?>
<?php
	$sql = "SELECT rName, mCat, calories, carbs, protein, fat, 'time' FROM userFood WHERE userID = $id AND DATE(`time`) = CURDATE()";
	$result = $link->query($sql);

	if ($result->num_rows > 0) {
		//Add the total carbs for today for user and display it
		$sql2 = "SELECT SUM(carbs) AS total_value FROM userFood WHERE userID = $id AND DATE(`time`) = CURDATE()";
		$result2 = $link->query($sql2);
		$row = mysqli_fetch_assoc($result2); 
		$sum = $row['total_value'];
		//echo "<p><br>Total carbs today: " . $sum . " (<span id=\"carbPercentage\"></span>%)<br></p>";

		//Add the total protein for today for user and display it
		$sql3 = "SELECT SUM(protein) AS total_value FROM userFood WHERE userID = $id AND DATE(`time`) = CURDATE()";
		$result3 = $link->query($sql3);
		$row1 = mysqli_fetch_assoc($result3); 
		$sum1 = $row1['total_value'];
		//echo "<p>Total protein today: " . $sum1 . " (<span id=\"proPercentage\"></span>%)<br></p>";

		//Add the total fat for today for user and display it
		$sql4 = "SELECT SUM(fat) AS total_value FROM userFood WHERE userID = $id AND DATE(`time`) = CURDATE()";
		$result4 = $link->query($sql4);
		$row2 = mysqli_fetch_assoc($result4); 
		$sum2 = $row2['total_value'];
		//echo "<p>Total fats today: " . $sum2 . " (<span id=\"fatPercentage\"></span>%)<br></p>";

		//Add the total calories for today for user and display it
		$sql5 = "SELECT SUM(calories) AS total_value FROM userFood WHERE userID = $id AND DATE(`time`) = CURDATE()";
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

					$breakfastOnly = "SELECT foodID, rName, mCat, calories, carbs, protein, fat, 'time' FROM userFood WHERE mCat = 'Breakfast' AND userID = $id AND DATE(`time`) = CURDATE()";
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
						$lunchOnly = "SELECT foodID, rName, mCat, calories, carbs, protein, fat, 'time' FROM userFood WHERE mCat = 'Lunch' AND userID = $id AND DATE(`time`) = CURDATE()";
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
						$dinnerOnly = "SELECT foodID, rName, mCat, calories, carbs, protein, fat, 'time' FROM userFood WHERE mCat = 'Dinner' AND userID = $id AND DATE(`time`) = CURDATE()";
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
					$snacksOnly = "SELECT foodID, rName, mCat, calories, carbs, protein, fat, 'time' FROM userFood WHERE mCat = 'Snack' AND userID = $id AND DATE(`time`) = CURDATE()";
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

							//Need this query to check if any results were returned (used in if statement)
							$water_total = "SELECT waterAmount FROM userWater WHERE userID = $id AND DATE(`time`) = CURDATE()";
							$water_t = $link->query($water_total);
							
							if($water_t->num_rows > 0) {
								//Main query to retrive water data
								$total_water2 = "SELECT SUM(waterAmount) AS total_water FROM userWater WHERE userID = $id AND DATE(`time`) = CURDATE()";
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