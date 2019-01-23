<?php

// Include config file
require_once "includes/config.php";
session_start(); 

// Define variables and initialize with empty values
$lastName = $firstName = $email = $gender = $birthYear = $cWeight = $heightFeet = $heightInch = $bodyFat = $gWeight = $activityLevel = $password = $confirm_password = "";
$email_err = $password_err = $confirm_password_err = $general_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter a email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email is already taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 4){
        $password_err = "Password must have atleast 4 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

     if((empty(trim($_POST["password"]))) || (empty(trim($_POST["firstName"]))) || (empty(trim($_POST["lastName"]))) || (empty(trim($_POST["email"]))) || (empty(trim($_POST["gender"]))) || (empty(trim($_POST["birthYear"]))) || (empty(trim($_POST["cWeight"]))) || (empty(trim($_POST["heightFeet"]))) || (empty(trim($_POST["heightInch"]))) || (empty(trim($_POST["bodyFat"]))) || (empty(trim($_POST["gWeight"]))) || (empty(trim($_POST["activityLevel"])))) {
        $general_err = "Please fill in all the fields.";
     }
    
    // Check input errors before inserting in database
    if(empty($email_err) && empty($password_err) && empty($confirm_password_err) && empty($general_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (email, firstName, lastName, password, gender, birthYear, cWeight, heightFeet, heightInch, bodyFat, gWeight, activityLevel) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){

 
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssssss", $param_email, $param_firstName, $param_lastName, $param_password, $param_gender, $param_birthYear, $param_cWeight, $param_heightFeet, $param_heightInch, $param_bodyFat, $param_gWeight, $param_activityLevel);
                
            $param_firstName = trim($_POST["firstName"]);
            $param_lastName = trim($_POST["lastName"]);
            $param_gender = trim($_POST["gender"]);
            $param_birthYear = trim($_POST["birthYear"]);
            $param_cWeight = trim($_POST["cWeight"]);
            $param_heightFeet = trim($_POST["heightFeet"]);
            $param_heightInch = trim($_POST["heightInch"]);
            $param_bodyFat = trim($_POST["bodyFat"]);
            $param_gWeight = trim($_POST["gWeight"]);
            $param_activityLevel = trim($_POST["activityLevel"]);
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: register_success.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
	<link rel="stylesheet" href="css/notyf.min.css">
	<script src="js/notyf.min.js"></script>
	<title>Register</title>
	<style>
	/*DO NOT PUT THIS CSS WITH THE DASHBOARD CSS OR YOU WILL GET COLLISIONS AND MESS UP THE DASHBOARD*/
	::placeholder {
		color: #cccccc;
		opacity: 1; /* Firefox */
	}
	:-ms-input-placeholder { /* Internet Explorer 10-11 */
		color: #cccccc;
	}
	::-ms-input-placeholder { /* Microsoft Edge */
		color: #cccccc;
	}
	html, body {
		height: 100%;
		width: 100%;
		margin: 0;
	}
	body {
		display: flex;
		background-image: url("images/bg.png"), linear-gradient(90deg, #3682A7, #22B396);
		background-image: url("images/bg.png"), -webkit-linear-gradient(90deg, #3682A7, #22B396);
		background-image: url("images/bg.png"), -o-linear-gradient(90deg, #3682A7, #22B396);
		background-image: url("images/bg.png"), linear-gradient(90deg, #3682A7, #22B396);
	}	
	select {
	    -webkit-appearance: none;
	    -moz-appearance: none;
	    text-indent: 1px;
	    text-overflow: '';
	}
	.mainContainerL {
		margin: auto;
	}
	.oCon {
	  /*  background: red;*/
		width: 442px;
	}
	.imageCon {
		text-align: center;
		padding-bottom: 34px;
	}
	.loginFormCon form input, .loginFormCon form select {
		padding: 16px 20px;
		width: 211px;
		margin: 9px 0px;
				-webkit-border-radius: 4px;
		-moz-border-radius: 4px;
		border-radius: 4px;
	}
	.signInText {
		background-color: transparent;
		text-align: center;
		/*padding: 34px;*/
		-webkit-border-top-left-radius: 7px;
		-webkit-border-top-right-radius: 7px;
		-moz-border-radius-topleft: 7px;
		-moz-border-radius-topright: 7px;
		border-top-left-radius: 7px;
		border-top-right-radius: 7px;
	}
	.signInText p {
		font-size: 23px;
		font-weight: 600;
		/*text-transform: uppercase;*/
		color: #fff;
		/*letter-spacing: 2px;*/
	}
	.loginFormCon {
		text-align: center;
		background-color: transparent;
		-webkit-border-bottom-right-radius: 7px;
		-webkit-border-bottom-left-radius: 7px;
		-moz-border-radius-bottomright: 7px;
		-moz-border-radius-bottomleft: 7px;
		border-bottom-right-radius: 7px;
		border-bottom-left-radius: 7px;
		padding-top: 10px;
	}
	.signIn {
		font-size: 15px;
		color: #fff;
		font-weight: 400;
		padding: 20px 0px 60px 0px;
	}
	.subText p, .subText span {
		font-size: 16px !important;
		color: #fff !important;
		font-weight: 400 !important;
		text-decoration: none !important;
		padding: 0px 0px 20px 0px;
	}
	.email-input {
		width: 100% !important;
	}
	.loginFormCon form span {
		font-size: 15px;
		color: #999;
		font-weight: 400;
		text-decoration: underline;
	}
	.nextbtn {
		background-color: #86C559;
		color: #fff;
		font-size: 16px;
		font-weight: 600;
		-webkit-border-radius: 4px;
		-moz-border-radius: 4px;
		border-radius: 4px;
		border-radius: 100px !important;
		 width: 145px !important;
		padding: 14px 18px !important;
		cursor: pointer;
		webkit-transition:all .3s ease-in;
		-moz-transition:all .3s ease-in;
		-o-transition:all .3s ease-in;
		-ms-transition:all .3s ease-in;
		transition:all .3s ease-in;
		webkit-transition:all .3s ease-out;
		-moz-transition:all .3s ease-out;
		-o-transition:all .3s ease-out;
		-ms-transition:all .3s ease-out;
		transition:all .3s ease-out;
		outline: 0;
	}
	.nextbtn:hover {
		background-color:#78b150;
	}
	.regbtn {
		background-color: #86C559;
		color: #fff;
		font-size: 16px;
		font-weight: 600;
		-webkit-border-radius: 4px;
		-moz-border-radius: 4px;
		border-radius: 4px;
    	border-radius: 4px; !important;
		 width: 100% !important;
		padding: 14px 18px !important;
		cursor: pointer;
		webkit-transition:all .3s ease-in;
		-moz-transition:all .3s ease-in;
		-o-transition:all .3s ease-in;
		-ms-transition:all .3s ease-in;
		transition:all .3s ease-in;
		webkit-transition:all .3s ease-out;
		-moz-transition:all .3s ease-out;
		-o-transition:all .3s ease-out;
		-ms-transition:all .3s ease-out;
		transition:all .3s ease-out;
		outline: 0;
	}

	.help-block {
		font-size: 15px !important;
		color: #F3C76A !important;
		font-weight: 600 !important;
		text-decoration: underline !important;
	}
	.errorMessages {
		padding-top: 22px;
		padding-bottom: 22px;
	}
	.empty {
		height: 80px;
	}
	.form-group-float {
		float: left;
	}
	@media only screen and (max-width: 442px) {
		.mainContainerL {
			width: 90%;
		}
		.oCon {
			width: 100%;
		}
		.imageCon {
			padding-top: 45px;
		}
		.signInText p {
		    font-size: 23px;
		}
		.imageCon img {
			width: 150px;
		}
		.form-group-float {
			width: 50%;
		}
		.loginFormCon form input, .loginFormCon form select {
		    width: 100%;
		}
		.form-group-left {
		    padding-right: 5px;
		}
		.form-group-right {
		    padding-left: 5px;
		}
		.notyf {
		    position: fixed;
		    bottom: 0;
		    right: 0;
		    left: 0; 
		    width: 100%;
		    color: #fff;
		    z-index: 1;
		    padding: 20px;
		}
	}
	.clearfix::after{
	    content:"";
	    clear:both;
	    display:table;
	}
	.form-group-left {
		padding-right: 10px;
	}
	.form-group-right {
		padding-left: 10px;
	}
	.form-group-next {
		text-align: right;
		padding-top: 10px;
	}
	select,select option:disabled {
		background-color: #fff !important;
		color: #000;
	}
	select option{
		color: #000;
	}
	select:invalid {
		color: #ccc !important;
	}
	.regMessage {
    	padding: 20px 0px 10px 0px;
	}
	.regMessage p {
		color: #fff;
    	font-weight: 400;
    	font-size: 14px;
    	font-family:'Open Sans',sans-serif;
	}
</style>
</head>

<body>
<div id="mainContainerL" class="mainContainerL animated zoomIn">
	<div class="con">
		<div class="imageCon">
			<img src="images/logoHolder.png" alt="">
		</div>
		<div class="oCon">
			<div class="signInText">
				<p>Sign up for Ketogenetics</p>
			</div>
			<div class="loginFormCon">
				<form name="registerForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" autocomplete="off">
					<div class="errorMessages">
			            <p class="help-block" style="color: red;"><?php echo $general_err; ?></p>
			            <p class="help-block" style="color: red;"><?php echo $email_err; ?></p>
			            <p class="help-block" style="color: red;"><?php echo $password_err; ?></p>
			            <p class="help-block" style="color: red;"><?php echo $confirm_password_err; ?></p>
					</div>
					<div class="stageOne">
						<div class="clearfix">
						<div class="form-group form-group-float form-group-left <?php echo (!empty($general_err)) ? 'has-error' : ''; ?>">
							<input id="firstname-input" type="text" name="firstName" class="form-control" value="<?php echo $firstName; ?>" placeholder="First Name" required>
						</div>
						<div class="form-group form-group-float form-group-right <?php echo (!empty($general_err)) ? 'has-error' : ''; ?>">
							<input id="lastname-input" type="text" name="lastName" class="form-control" value="<?php echo $lastName; ?>" placeholder="Last Name" required>
						</div>
						</div>
						<div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
							<input id="email-input" class="email-input" type="email" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="Email" required>
						</div>  
						<div class="clearfix">  
						<div class="form-group form-group-float form-group-left <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
							<input id="pwd-input" type="password" name="password" class="form-control" placeholder="Password" value="<?php echo $password; ?>" required>
						</div>
						<div class="form-group form-group-float form-group-right <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
							<input id="pwdconfirm-input" type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" value="<?php echo $confirm_password; ?>" required>
						</div>
						</div>
						<div class="form-group form-group-next">
							<button type="button" class="nextbtn">Next</button>
						</div>
						<p class="signIn">Already have an account? <span><a href="login.php" style="color: #fff">Sign In</a></span></p>
					</div>
					<div class="stageTwo" id="stageTwo" style="display: none;">
						<div class="subText">
							<p>You're almost there <span id="nameWelcome"></span>! We just need to know a little more about you.</p>
						</div>
						<div class="clearfix">
							<div class="form-group form-group-float form-group-left <?php echo (!empty($general_err)) ? 'has-error' : ''; ?>">
								<select class="form-control " name="gender" value="<?php echo $gender; ?>" required>
				                    <option value="" disabled selected>Gender</option>
				                    <option value="Male">Male</option>
				                    <option value="Female">Female</option>
				                </select>
							</div>
							<div class="form-group form-group-float form-group-right <?php echo (!empty($general_err)) ? 'has-error' : ''; ?>">
								<select id="birthYear" name="birthYear" value="<?php echo $birthYear; ?>" required>
									<option disabled selected value>Birth Year</option>
								</select>
							</div>
						</div>
						<div class="clearfix">
							<div class="form-group form-group-float form-group-left <?php echo (!empty($general_err)) ? 'has-error' : ''; ?>">
								<input step="0.5" type="number" name="cWeight" class="form-control" value="<?php echo $cWeight; ?>" placeholder="Current Weight" required>
							</div>
							<div class="form-group form-group-float form-group-right <?php echo (!empty($general_err)) ? 'has-error' : ''; ?>">
								<input step="0.5" type="number" name="gWeight" class="form-control" value="<?php echo $gWeight; ?>" placeholder="Goal Weight" required>
							</div>
						</div>
						<div class="clearfix">
							<div class="form-group form-group-float form-group-left <?php echo (!empty($general_err)) ? 'has-error' : ''; ?>">
								<input type="number" name="heightFeet" class="form-control" value="<?php echo $heightFeet; ?>" placeholder="Height (ft)" required>
							</div>
							<div class="form-group form-group-float form-group-right <?php echo (!empty($general_err)) ? 'has-error' : ''; ?>">
								<input step="0.1" type="number" name="heightInch" class="form-control" value="<?php echo $heightInch; ?>" placeholder="Height (inch)" required>
							</div>
						</div>
						<div class="clearfix">
							<div class="form-group form-group-float form-group-left <?php echo (!empty($general_err)) ? 'has-error' : ''; ?>">
								<select name="activityLevel" value="<?php echo $activityLevel; ?>" required>
				                    <option disabled selected value>Activity Level</option>
				                    <option value="Sedentary">Sedentary</option>
				                    <option value="Lightly Active">Lightly Active</option>
				                    <option value="Active">Active</option>
				                    <option value="Very Active">Very Active</option>
				                </select>
							</div>
							<div class="form-group form-group-float form-group-right <?php echo (!empty($general_err)) ? 'has-error' : ''; ?>">
								<input step="0.1" type="number" name="bodyFat" class="form-control" value="<?php echo $bodyFat; ?>" placeholder="Body Fat Percentage" required>
							</div>
						</div>
						<div class="regMessage">
							<p>We will automatically calculate your macro goals.</p>
						</div>
						<div class="form-group form-group-next">
							<input type="submit" class="regbtn" value="Complete Registration"></button>
						</div>
					</div>
				</form>
			</div>
		</div>

		<div class="empty"></div>
	</div>

</div>

</body>
<script>
$(function(){
	for (i = new Date().getFullYear(); i > 1900; i--){
		$('#birthYear').append($('<option />').val(i).html(i));
	}
});

$(".nextbtn").click(function () {

	var a=document.forms["registerForm"]["firstname-input"].value;
	var b=document.forms["registerForm"]["lastname-input"].value;
	var c=document.forms["registerForm"]["email-input"].value;
	var d=document.forms["registerForm"]["pwd-input"].value;
	var e=document.forms["registerForm"]["pwdconfirm-input"].value;
	if (a==null || a=="",b==null || b=="",c==null || c=="",d==null || d=="",e==null || e=="") {
		var notyf = new Notyf({
		  delay:3000
		})
		notyf.alert('You must fill out the fields before moving forward.');
		return false;
	} else {

		var email = $('input[name=email]').val();

		if( /(.+)@(.+){2,}\.(.+){2,}/.test(email) ){
			if (!(d===e)) {
				var notyf = new Notyf({
				  delay:3000
				})
				notyf.alert('Your passwords must match!');
				return false;
			} else {
				$("#nameWelcome").text(document.getElementById('firstname-input').value);
				$('.stageOne').fadeOut(1);
				$('.stageTwo').fadeIn(1000);
			}
		} else {
		  	var notyf = new Notyf({
			  delay:3000
			})
			notyf.alert('Your email address is not in the right format.');
			return false;
		}

	}

})
</script>
</html>