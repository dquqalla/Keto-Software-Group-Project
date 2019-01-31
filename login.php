<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}

// Include config file
require_once "includes/config.php";
 
// Define variables and initialize with empty values
$email = $password = "";
// $username = $password = $email = "";
$email_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter email.";
    } else{
        $email = trim($_POST["email"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, firstName, lastName, email, gender, birthYear, cWeight, heightFeet, heightInch, bodyFat, gWeight, activityLevel, password FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = $email;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $firstName, $lastName, $email, $gender, $birthYear, $cWeight, $heightFeet, $heightInch, $bodyFat, $gWeight, $activityLevel, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            if(!isset($_SESSION)) { 
                            	session_start();
      						}                      
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["firstName"] = $firstName;   
                            $_SESSION["email"] = $email;      
                            $_SESSION["gender"] = $gender;  
                            $_SESSION["birthYear"] = $birthYear; 
                            $_SESSION["cWeight"] = $cWeight; 
                            $_SESSION["heightFeet"] = $heightFeet; 
                            $_SESSION["heightInch"] = $heightInch; 
                            $_SESSION["bodyFat"] = $bodyFat; 
                            $_SESSION["gWeight"] = $gWeight;
                            $_SESSION["activityLevel"] = $activityLevel; 
                            $_SESSION["lastName"] = $lastName;                    
                            
                            // Redirect user to welcome page
                            header("location: index.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $email_err = "No account found with that email.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
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
	<title>Login</title>
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
	.mainContainerL {
		margin: auto;
	}
	.oCon {
		width: 428px;
	}
	.imageCon {
		text-align: center;
		padding-bottom: 34px;
	}
	.loginFormCon form input {
		padding: 16px 20px;
		width: 350px;
		margin: 9px 0px;
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
	.loginFormCon form p {
		font-size: 15px;
		color: #fff;
		font-weight: 400;
		padding: 20px 0px 60px 0px;
	}
	.loginFormCon form span {
		font-size: 15px;
		color: #999;
		font-weight: 400;
		text-decoration: underline;
	}
	.loginbtn {
		background-color: #86C559;
		color: #fff;
		font-size: 16px;
		font-weight: 600;
		-webkit-border-radius: 4px;
		-moz-border-radius: 4px;
		border-radius: 4px;
	}
	.loginFormCon form input {
		-webkit-border-radius: 4px;
		-moz-border-radius: 4px;
		border-radius: 4px;
	}
	.help-block {
		font-size: 15px !important;
		color: #F3C76A !important;
		font-weight: 600 !important;
		text-decoration: underline !important;
	}
	.errorMessages {
		padding-top: 22px;
	}
	.empy {
		height: 80px;
	}
	@media only screen and (max-width: 440px) {
		.mainContainerL {
			width: 90%;
		}
		.loginFormCon form input {
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
				<p>Sign into Ketogenetics</p>
			</div>
			<div class="loginFormCon">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
					<div class="errorMessages">
						<span class="help-block"><?php echo $email_err; ?></span>
        				<span class="help-block"><?php echo $password_err; ?></span>
					</div>
					<div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
						<input type="text" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="Email">
					</div>    
					<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
						<input type="password" name="password" class="form-control" placeholder="Password">
					</div>
					<div class="form-group">
						<input type="submit" class="loginbtn" value="Login">
					</div>
					<p>Don't have an account? <span><a href="register.php" style="color: #fff">Sign Up</a></span></p>
				</form>
			</div>
		</div>

		<div class="empy"></div>
	</div>

</div>

</body>

</html>