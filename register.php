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


     if((empty(trim($_POST["gender"]))) || (empty(trim($_POST["birthYear"]))) || (empty(trim($_POST["cWeight"]))) || (empty(trim($_POST["heightFeet"]))) || (empty(trim($_POST["heightInch"]))) || (empty(trim($_POST["bodyFat"]))) || (empty(trim($_POST["gWeight"]))) || (empty(trim($_POST["activityLevel"])))) {
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style type="text/css">

    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <div>
            <p class="help-block" style="color: red;"><?php echo $general_err; ?></p>
            <p class="help-block" style="color: red;"><?php echo $email_err; ?></p>
            <p class="help-block" style="color: red;"><?php echo $password_err; ?></p>
            <p class="help-block" style="color: red;"><?php echo $confirm_password_err; ?></p>
        </div>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" autocomplete="off">
            <div class="form-group <?php echo (!empty($general_err)) ? 'has-error' : ''; ?>">
                <label>First Name</label>
                <input type="text" name="firstName" class="form-control" placeholder="First Name" value="<?php echo $firstName; ?>" autocomplete="off" required>
            </div>

            <div class="form-group <?php echo (!empty($general_err)) ? 'has-error' : ''; ?>">
                <label>Last Name</label>
                <input type="text" name="lastName" class="form-control" placeholder="Last Name" value="<?php echo $lastName; ?>" autocomplete="off" required>
            </div>

            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $email; ?>" autocomplete="nope" required>
            </div>

            <div class="form-group <?php echo (!empty($general_err)) ? 'has-error' : ''; ?> ">
                <label>Gender</label>
                <select name="gender" value="<?php echo $gender; ?>">
                    <option disabled selected value>Select</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>

            <div class="form-group <?php echo (!empty($general_err)) ? 'has-error' : ''; ?> ">
                <label>Year of Birth</label>
                <select id="birthYear" name="birthYear" value="<?php echo $birthYear; ?>">
                    <option disabled selected value>Select</option>
                </select>
            </div>

            <div class="form-group <?php echo (!empty($general_err)) ? 'has-error' : ''; ?> ">
                <label>Current Weight</label>
                <input type="number" step="0.5" name="cWeight" class="form-control" placeholder="(kilograms)" value="<?php echo $cWeight; ?>" autocomplete="off" required>
            </div>

            <div class="form-group <?php echo (!empty($general_err)) ? 'has-error' : ''; ?> ">
                <label>Height</label>
                <input type="number" name="heightFeet" class="form-control" placeholder="Feet" value="<?php echo $heightFeet; ?>" autocomplete="off" required>
            </div>

            <div class="form-group <?php echo (!empty($general_err)) ? 'has-error' : ''; ?> ">
                <input type="number" step="0.1" name="heightInch" class="form-control" placeholder="Inches" value="<?php echo $heightInch; ?>" autocomplete="off" required>
            </div>

            <div class="form-group <?php echo (!empty($general_err)) ? 'has-error' : ''; ?> ">
                <label>Goal Weight</label>
                <input type="number" step="0.5" name="gWeight" class="form-control" placeholder="(kilograms)" value="<?php echo $gWeight; ?>" autocomplete="off" required>
            </div>

            <div class="form-group <?php echo (!empty($general_err)) ? 'has-error' : ''; ?> ">
                <label>Activity Level</label>
                <select name="activityLevel" value="<?php echo $activityLevel; ?>">
                    <option disabled selected value>Select</option>
                    <option value="Sedentary">Sedentary</option>
                    <option value="Lightly Active">Lightly Active</option>
                    <option value="Active">Active</option>
                    <option value="Very Active">Very Active</option>
                </select>
            </div>

            <div class="form-group <?php echo (!empty($general_err)) ? 'has-error' : ''; ?> ">
                <label>Body Fat Percentage</label>
                <input type="number" step="0.1" name="bodyFat" class="form-control" placeholder="Enter" value="<?php echo $bodyFat; ?>" autocomplete="off" required>
            </div>

            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo $password; ?>" autocomplete="off" required>
            </div>

            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" value="<?php echo $confirm_password; ?>" autocomplete="off" required>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>

            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
</body>
<script>
$(function() {
for (i = new Date().getFullYear(); i > 1900; i--){
    $('#birthYear').append($('<option />').val(i).html(i));
}
});
</script>
</html>