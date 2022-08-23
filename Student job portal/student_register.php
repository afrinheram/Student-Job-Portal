<?php
require_once "config.php";
$username = $password = $confirm_password = $ssn= $fname= $lname= $age= $address= $groups= $registration_number= $results= $interest= $board=  $email= $phno = "";
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
   
        mysqli_stmt_close($stmt);
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
   
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
    if(empty($_POST["age"])){
	$age = NULL;     
    }
	else{
        $age = trim($_POST["age"]);
    }
    if(empty($_POST["address"])){
        $address = NULL;     
    } else{
        $address = trim($_POST["address"]);
    }
	if(empty($_POST["groups"])){
        $groups = NULL;     
    } else{
        $phone = trim($_POST["groups"]);
    }  	
	if(empty($_POST["registration_number"])){
        $registration_number = NULL; 
    } else{
        $registration_number = trim($_POST["registration_number"]);
    }
	if(empty($_POST["results"])){
        $results = NULL; 
    } else{
        $results = trim($_POST["results"]);
    }
    if(empty($_POST["interest"])){
        $interest = NULL; 
    } else{
        $interest = trim($_POST["interest"]);
    }
    if(empty($_POST["board"])){
        $board = NULL;     
    } else{
        $board = trim($_POST["board"]);
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
	
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($ssn_err) && empty($fname_err) && empty($lname_err) ){
    
        $sql = "INSERT INTO student(student_username, password, student_ssn, fname, lname, age, Address, groups, registration_number, results, interest, board, email, phno) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
           
            mysqli_stmt_bind_param($stmt, "sssssissssssss", $param_username, $param_password, $param_ssn, $param_fname, $param_lname, $param_age, 
			$param_address, $param_groups, $param_registration_number, $param_results, $param_interest, $param_board, $param_email,$param_phno);
            
            $param_username = 	$username;
            $param_password = 	password_hash($password, PASSWORD_DEFAULT);
			$param_ssn      =	$ssn;
			$param_fname 	= 	$fname;
			$param_lname  	= 	$lname;
            $param_age    	= 	$age;
            $param_address  = 	$address;
			$param_groups 	=   $groups;
            $param_registration_number 	=   $registration_number;
			$param_results 		= 	$results;
			$param_interest 		= 	$interest;
            $param_board    	= 	$board;
            $param_email   	= 	$email;
			$param_phno 	=  	$phno;
		
            if(mysqli_stmt_execute($stmt)){
            
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
     
        mysqli_stmt_close($stmt);
    }
 
    mysqli_close($link);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Sign Up</title>
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
        <h2>Sign Up As Student</h2>
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
                <label>First name</label>
                <input type="text" name="fname" class="form-control" value="<?php echo $fname; ?>">
            </div>
            <div class="form-group <?php echo (!empty($lname)) ? 'has-error' : ''; ?>">
                <label>Last name</label>
                <input type="text" name="lname" class="form-control" value="<?php echo $lname; ?>">
            </div>
            <div class="form-group ">
                <label>Age</label>
                <input type="number" name="age" class="form-control" value="<?php echo $age; ?>">
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" class="form-control" value="<?php echo $address; ?>">
            </div>
            <div class="form-group ">
                <label>group</label>
                <input type="text" name="groups" class="form-control" value="<?php echo $groups; ?>">
            </div>
            <div class="form-group ">
                <label>registration_number</label>
                <textarea name="registration_number" rows="5" cols="60"></textarea>
            </div>
            <div class="form-group ">
                <label>Results</label>
                <textarea name="results" rows="5" cols="60"></textarea>
            </div>
            <div class="form-group ">
                <label>interest</label>
                <textarea name="interest" rows="5" cols="60"></textarea>
            </div>
            <div class="form-group ">
                <label>Exam board</label>
                <textarea name="board" rows="5" cols="60"></textarea>
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