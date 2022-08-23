<?php

// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = $ssn= $fname= $lname= $rank= $address= $country= $req= $dep= $cost= $vission=  $email= $phno = "";
$username_err = $password_err = $confirm_password_err = $ssn_err= $fmame_err= $lname_err= "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT jp_username FROM jobprovider WHERE jp_username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    
    // validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
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
    if(empty($_POST["ssn"])){
        $ssn_err = 'Please Enter Your SSN'; 
    } else{
        $ssn = trim($_POST["ssn"]);
    }
    if(empty($_POST["fname"])){
        $fname_err = 'Please Enter Your First Name'; 
    } else{
        $fname = trim($_POST["fname"]);
    }
    if(empty($_POST["lname"])){
        $lname_err = 'Please Enter Your Last Name';  
    } else{
        $lname = trim($_POST["lname"]);
	}
    if(empty($_POST["rank"])){
	$rank = NULL;     
    }
	else{
        $rank = trim($_POST["rank"]);
    }
    if(empty($_POST["address"])){
        $address = NULL;     
    } else{
        $address = trim($_POST["address"]);
    }
	if(empty($_POST["country"])){
        $country = NULL;     
    } else{
        $phone = trim($_POST["country"]);
    }  	
	if(empty($_POST["req"])){
        $req = NULL; 
    } else{
        $req = trim($_POST["req"]);
    }
	if(empty($_POST["dep"])){
        $dep = NULL; 
    } else{
        $dep = trim($_POST["dep"]);
    }
    if(empty($_POST["cost"])){
        $cost = NULL; 
    } else{
        $cost = trim($_POST["cost"]);
    }
    if(empty($_POST["vission"])){
        $vission = NULL;     
    } else{
        $vission = trim($_POST["vission"]);
    }
    if(empty($_POST["email"])){
        $email = NULL;     
    } else{
        $email = trim($_POST["email"]);
    }	
    if(empty($_POST["phone"])){
        $phno = NULL;     
    } else{
        $phno = trim($_POST["phone"]);
    }  
	
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($ssn_err) && empty($fname_err) && empty($lname_err) ){
        
        // Prepare an insert statement
        $sql = "INSERT INTO university (uni_username, password, uni_ssn, fname, lname, rank, Address, Country, req, dep, cost, vission, email, phno) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssissssssss", $param_username, $param_password, $param_ssn, $param_fname, $param_lname, $param_rank, 
			$param_address, $param_country, $param_req, $param_dep, $param_cost, $param_vission, $param_email,$param_phno);
            
            // Set parameters
            $param_username = 	$username;
            $param_password = 	password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
			$param_ssn      =	$ssn;
			$param_fname 	= 	$fname;
			$param_lname  	= 	$lname;
            $param_rank    	= 	$rank;
            $param_address  = 	$address;
			$param_country 	=   $country;
            $param_req 	=   $req;
			$param_dep 		= 	$dep;
			$param_cost 		= 	$cost;
            $param_vission    	= 	$vission;
            $param_email   	= 	$email;
			$param_phno 	=  	$phno;
			// Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login prank
                header("location: login.php");
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
    <title>University Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper {
        width: 500px;
        margin: 0 auto;padding: 20px;
    }
    </style>
</head>
<body>
    
    <div class="wrapper">
        <h2>Sign Up As University</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($ssn)) ? 'has-error' : ''; ?>">
                <label>SSN</label>
                <input type="text" name="ssn" class="form-control" value="<?php echo $ssn; ?>">
            </div>
            <div class="form-group <?php echo (!empty($fname)) ? 'has-error' : ''; ?>">
                <label>Full name</label>
                <input type="text" name="fname" class="form-control" value="<?php echo $fname; ?>">
            </div>
            <div class="form-group <?php echo (!empty($lname)) ? 'has-error' : ''; ?>">
                <label>University Type</label>
                <input type="text" name="lname" class="form-control" value="<?php echo $lname; ?>">
            </div>
            <div class="form-group ">
                <label>World Rank</label>
                <input type="number" name="rank" class="form-control" value="<?php echo $rank; ?>">
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" class="form-control" value="<?php echo $address; ?>">
            </div>
            <div class="form-group ">
                <label>Country</label>
                <input type="text" name="country" class="form-control" value="<?php echo $country; ?>">
            </div>
            <div class="form-group ">
                <label>Requirement</label>
                <textarea name="req" rows="5" cols="60"></textarea>
            </div>
            <div class="form-group ">
                <label>Depertments</label>
                <textarea name="dep" rows="5" cols="60"></textarea>
            </div>
            <div class="form-group ">
                <label>Expence</label>
                <textarea name="cost" rows="5" cols="60"></textarea>
            </div>
            <div class="form-group ">
                <label>vission</label>
                <textarea name="vission" rows="5" cols="60"></textarea>
            </div>
			<div class="form-group ">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" name="phone" class="form-control" value="<?php echo $phno; ?>">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
</body>
</html>