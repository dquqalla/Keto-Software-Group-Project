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
    	<link rel="stylesheet" href="css/notyf.min.css">
	<script src="js/notyf.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


    <style>
    	/*Page specific styles*/
		#grid {
		    overflow: hidden;
		    padding: 0px 18px;
		    animation-duration: 1.5s;
		    animation-delay: 0.3s;
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
		/*@media screen and (min-width: 767px) and (max-width: 1000px) {
		   #grid[data-columns]::before {
		        content: '1 .column.size-1of1';
		    }
		    .column {
		        width: 50% !important;
		    }
		}*/
		@media screen and (min-width: 767px) and (max-width: 1300px) {
		   #grid[data-columns]::before {
		        content: '2 .column.size-1of2';
		    }
		    .column {
		        width: 50% !important;
		    }
		}
		@media screen and (min-width: 1300px) and (max-width: 1500px) {
		   #grid[data-columns]::before {
		        content: '3 .column.size-1of3';
		    }
		    .column {
		        width: 33.333% !important;
		    }
		}
		@media screen and (min-width: 1500px) {
		   #grid[data-columns]::before {
		        content: '4 .column.size-1of4';
		    }
		}
.item:nth-child(1), .item:nth-child(2) {
margin-top: 4px;
} 
.column {
float: left;
}
.size-1of5 {
    width: 25%;
}
.size-2of5 {
	width: 25%;
}
.size-3of5 {
	width: 25%;
}
.size-4of5 {
	width: 25%;
}

.size-1of2 {
    width: 50%;
}
.size-1of1 {
    width: 100%;
}
.column:nth-child(1) {
	width: 25%;
}
.column:nth-child(2) {
	width: 25%;
}
.column:nth-child(3) {
	width: 25%;
}
.column:nth-child(4) {
	width: 25%;
}

		.item {
		    position: relative;
		    /*padding: 15px;*/
		    padding: 0px;
		    /*background: #fff;*/
		    margin: 18px;
		    

		    margin: 30px 18px;
		}
		.boxShad {
					    box-shadow: 2px 2px 2px 0px rgba(0,0,0,0.05);
		    -moz-box-shadow: 2px 2px 2px 0px rgba(0,0,0,0.05);
		    box-shadow: 2px 2px 2px 0px rgba(0,0,0,0.05);
-webkit-border-bottom-right-radius: 10px;
-webkit-border-bottom-left-radius: 10px;
-moz-border-radius-bottomright: 10px;
-moz-border-radius-bottomleft: 10px;
border-bottom-right-radius: 10px;
border-bottom-left-radius: 10px;
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
		.weightGraph > .itemTitle:before {
		    content: "";
		    display: block;
		    background: url("../images/icons/graphIcon1.png") no-repeat;
		    width: 19px;
		    height: 15px;
		    float: left;
		    margin: 3px 10px 0px 0px;
		}
		.macrosGraph > .itemTitle:before {
		    content: "";
		    display: block;
		    background: url("../images/icons/graphIcon2.png") no-repeat;
		    width: 16px;
		    height: 16px;
		    float: left;
		    margin: 3px 10px 0px 0px;
		}
		.itemDescription {
		    font-size: 14px;
		    font-weight: 400;
		    color: #999 !important;
		}
		.item:nth-child(1), .item:nth-child(2), .item:nth-child(3) {
		    margin-top: 4px;
		}
		.pageTitle {
    		min-width: 115px !important;
		}
		.recipesImage {

			width: 100%; 
			height: 200px; 
			background-size: cover; 
			cursor: pointer;
    	}
    	.recipeStats {
    		background-color: #fff; 
    		-webkit-border-bottom-right-radius: 10px;
    		-webkit-border-bottom-left-radius: 10px;
    		-moz-border-radius-bottomright: 10px;
    		-moz-border-radius-bottomleft: 10px;
    		border-bottom-right-radius: 10px;
    		border-bottom-left-radius: 10px;
    		padding: 10px 11px;
    		text-align: right;
    	}
    	.recipeDetail {
    		padding: 8px 11px;
    		background-color: #27AC9D;
    		color: #fff;
    		font-size: 13px;
    		border-radius: 200px;
    		margin: 5px 2px;
    	}
    	.recipeStats i {
			margin-right: 6px;
			font-size: 13px;
    	}
		.recipeTitle {
			font-size: 19px;
			padding: 13px 0px;
			color: #555 !important;
			font-weight: 600;
		}
		.recipeServing {
			background-color: #FBB03B;
		}
		.recipeCarbs {
			background-color: #E74C3C;
		}
		.recipeFats {
			background-color: #34495E;
		}
		.favourite {
			background-color: #ddd;
			cursor: pointer;
		}
		.favourite i {
			font-size: 15px;
			color: #fff;
			margin-right: 0px !important;
		}
		.recipeLink:link {
		  color: #555;
		}

		/* visited link */
		.recipeLink:visited {
		  color: #555;
		}

		/* mouse over link */
		.recipeLink:hover {
		  color: #555;
		}

		/* selected link */
		.recipeLink:active {
		  color: #555;
		}
		.favouritesBtn {
            position: absolute;
            right: 0;
            margin-right: 40px;
            padding: 10px 17px;
            border-radius: 200px;
            background-color: #FCCB7E;
            color: #fff;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .favouritesBtn i {
        	font-size: 16px;
        }
        .favouritesBtnContainer {
            position: relative !important;
            height: 39px;
            overflow: hidden;
        }
        @media only screen and (max-width: 450px) {
            .favouritesBtn {
                margin-right: 32px;
            }
        }
    </style>
    <title>Recipes</title>
</head>

<body>
<?php require_once "includes/main.php"; ?>
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
                    <p class="navMainText">Daily Log</p>
                    <p class="navSubText">Your Daily Tracking</p>
                </div>
                </a>
                <a href="recipes.php">
                <div class="navItem" id="navItemTh">
                    <p class="navMainText navActive">Diet Planning</p>
                    <p class="navSubText">Meal Inspiration</p>
                </div>
                <div class="navBreadcrumbs"></div>
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
                <p>Food & Meal Inspiration</p>
            </div>
            <div class="date">
                <p>Today: <span id="currentDate"></span></p>
            </div>
            <div class="titleLineBreak">
                <hr class="line">
            </div>
        </div>
    </div>

	<div class="favouritesBtnContainer">
        <a href="favourites.php"><button class="favouritesBtn tooltip" title="Your favourite recipes"><i class="fas fa-star"></i></button></a>
    </div>


    <div class="clearfix" id="grid" data-columns>
    <?php 

	$getRecipe = "SELECT id, title, image, duration, serving, carbs, fats, cuisine, meal_type, contains_fish, contains_chicken, contains_meat, url, date_added FROM recipe";
	$getRecipeResult = $link->query($getRecipe);

	if ($getRecipeResult->num_rows > 0) {
	    while($row = $getRecipeResult->fetch_assoc()) {
	$userID = $_SESSION["id"];
	$recipeID = $row["id"];

	        echo "
			<div class=\"item weightGraph animated bounceIn\">
			<div style=\"display: none;\">" . $row["id"] . "</div>
            <a class=\"recipeLink\" href=".$row["url"]."><p class=\"recipeTitle\">".$row["title"]."</p></a>
            <div class=\"boxShad\">
	            <a class=\"recipeLink\" href=".$row["url"]."><div class=\"recipesImage\" style=\"background-image: url(".$row["image"].");\"></div></a>
				<div>
					<div class=\"recipeStats\">
			";

			$favTest = "SELECT * FROM userFavourites WHERE userID = $userID AND recipeID = $recipeID";
			$favTestResult = $link->query($favTest);

			if ($favTestResult->num_rows > 0) {
			echo "
			<a href=\"includes/addfavourite.php?id=".$row['id']."\"><button type=\"button\" class=\"recipeDetail favourite tooltip\" title=\"Add to favourites\" style=\"background-color: #FCCB7E;\"><i class=\"fas fa-star\"></i></button></a>
			"; } else {
			echo "
				<a href=\"includes/addfavourite.php?id=".$row['id']."\"><button type=\"button\" class=\"recipeDetail favourite tooltip\" title=\"Add to favourites\"><i class=\"fas fa-star\"></i></button></a>
			";
			}
			echo "
						<button class=\"recipeDetail recipeTime\"><i class=\"far fa-clock\"></i>".$row["duration"]." min</button>
						<button class=\"recipeDetail recipeServing\"><i class=\"far fa-user\"></i>".$row["serving"]."</button>
						<button class=\"recipeDetail recipeCarbs\"><i class=\"far fa-question-circle\"></i>".$row["carbs"]."g carb</button>
						<button class=\"recipeDetail recipeFats\"><i class=\"far fa-question-circle\"></i>".$row["fats"]."g fat</button>
					</div>
				</div>
			</div>
        </div>

	        ";
	    }
	} else {
		echo "<p style=\"font-size: 26px; color: #555; font-weight: 300; padding: 24px;\">Oh no! We've encountered a problem - No recipes found in database.</p>";
	}


    ?>

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
<script type="text/javascript" src="js/tooltipster.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/tooltipster.css">
</html>