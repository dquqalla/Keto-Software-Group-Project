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
    <link rel="stylesheet" href="css/stats-styles.css">
    <link rel="stylesheet" href="css/notyf.min.css">
    <script src="js/notyf.min.js"></script>
    <title>Statistics</title>
</head>

<body>
<?php require_once "includes/main.php"; ?>
<?php include 'includes/graphQueries.php';?>
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
                <a href="#">
                <div class="navItem" id="navItemTh">
                    <p class="navMainText">Diet Planning</p>
                    <p class="navSubText">Meal Inspiration</p>
                </div>
                </a>
                <a href="stats.php">
                <div class="navItem" id="navItemF">
                    <p class="navMainText navActive">Statistics</p>
                    <p class="navSubText">A Detailed View</p>
                </div>
                <div class="navBreadcrumbs"></div>
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
                <p>A history of your tracking data.</p>
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
            <p class="itemTitle">Your weight overtime</p>
            <div class="" style="width:100%;">
                <div id="chart-container4">FusionCharts XT will load here!</div>
            </div>
        </div>
        <div class="item macrosGraph animated bounceIn">
            <p class="itemTitle">Your macros overtime</p>
            <div class="" style="width:100%;">
                <div id="chart-container5">FusionCharts XT will load here!</div>
            </div>
        </div>
        <div class="item waterGraph animated bounceIn">
            <p class="itemTitle">Water consumption overtime</p>
            <div class="" style="width:100%;">
                <div id="chart-container3">FusionCharts XT will load here!</div>
            </div>
        </div>
        <div class="item carbfatGraph animated bounceIn">
            <p class="itemTitle">Carbs vs fats</p>
            <div class="" style="width:100%;">
                <div id="chart-container">FusionCharts XT will load here!</div>
                <div id="chart-container-mobile">FusionCharts XT will load here!</div>
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
            "caption": "Average [] fats, [] carbs",
            "subCaption": "Over the past 10 days",
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
            "captionFont": "Open Sans, sans-serif",
            "subcaptionFont": "Open Sans, sans-serif",
            "captionFontBold": "0",
            "subcaptionFontSize": "14",
            "captionFontSize": "16",
            "numVDivLines": "13",
            "plotHighlightEffect": "fadeout|color=#000, alpha=15",
            "legendIconScale": "1.5",
            "plotToolText": "Day: $label <br> $seriesname: $dataValue <br>"
        },
    "categories": [{
            "category": [{
                "label": "<?php $yesterday = date("d/m", mktime(0, 0, 0, date("m") , date("d")-10)); echo $yesterday; ?>"
            }, {
                "label": "<?php $yesterday = date("d/m", mktime(0, 0, 0, date("m") , date("d")-9)); echo $yesterday; ?>"
            }, {
                "label": "<?php $yesterday = date("d/m", mktime(0, 0, 0, date("m") , date("d")-8)); echo $yesterday; ?>"
            }, {
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
                "value": "<?php if(isset($fatFrom10DaysAgoTotal)) {echo($fatFrom10DaysAgoTotal);} ?>"
            }, {
                "value": "<?php if(isset($fatFrom9DaysAgoTotal)) {echo($fatFrom9DaysAgoTotal);} ?>"
            }, {
                "value": "<?php if(isset($fatFrom8DaysAgoTotal)) {echo($fatFrom8DaysAgoTotal);} ?>"
            }, {
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
                "value": "<?php if(isset($carbsFrom10DaysAgoTotal)) {echo($carbsFrom10DaysAgoTotal);} ?>"
            }, {
                "value": "<?php if(isset($carbsFrom9DaysAgoTotal)) {echo($carbsFrom9DaysAgoTotal);} ?>"
            }, {
                "value": "<?php if(isset($carbsFrom8DaysAgoTotal)) {echo($carbsFrom8DaysAgoTotal);} ?>"
            }, {
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

FusionCharts.ready(function(){
    var fusionchartsmobile = new FusionCharts({
    type: 'mscolumn2d',
    renderAt: 'chart-container-mobile',
    width: '100%',
    height: '400',
    dataFormat: 'json',
    dataSource: {
        "chart": {
            "theme": "fusion",
            "caption": "Average [] fats, [] carbs",
            "subCaption": "Over the past 7 days",
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
            "captionFont": "Open Sans, sans-serif",
            "subcaptionFont": "Open Sans, sans-serif",
            "captionFontBold": "0",
            "subcaptionFontSize": "14",
            "captionFontSize": "16",
            "numVDivLines": "13",
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
    fusionchartsmobile.render();
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
<script src="js/salvattore.min.js"></script>
<script type="text/javascript" src="js/tooltipster.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/tooltipster.css">
</html>