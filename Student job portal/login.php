<?php
// Initialize the session
session_start();
 

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 

require_once "config.php";
 
$username = $password = $table = "";
$username_err = $password_err = $table_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
 
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    

    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
	
	
    if(empty(trim($_POST["table"]))){
        $table_err = "Please Select your account type.";
    } else{
        $table = trim($_POST["table"]);
    }	
	
    
    if(empty($username_err) && empty($password_err) && empty($table_err)){
        
		if($table == 'admin'){
		  $sql = "SELECT  ad_username, password FROM $table WHERE ad_username = ?";
		}
		else if($table == 'jobseeker'){
		  $sql = "SELECT  js_username, password FROM $table WHERE js_username = ?";
		}
		else if($table == 'jobprovider'){
		  $sql = "SELECT  jp_username, password FROM $table WHERE jp_username = ?";
		}
        else if($table == 'student'){
            $sql = "SELECT  student_username, password FROM $table WHERE student_username = ?";
          }
          else if($table == 'university'){
            $sql = "SELECT  uni_username, password FROM $table WHERE uni_username = ?";
          }
          
        
          if($stmt = mysqli_prepare($link, $sql)){
           
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            
            $param_username = $username;
            
            
            if(mysqli_stmt_execute($stmt)){
                
                mysqli_stmt_store_result($stmt);
                
                // 
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    
                    mysqli_stmt_bind_result($stmt, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                           
                            session_start();
                            
                          
                            $_SESSION["loggedin"] = true;
                            $_SESSION["username"] = $username;                            
                            $_SESSION["table"]	= $table;
							
                       
                            if ($table == 'admin') {                                
                                header("location: welcomeadmin.php");
                            }
                            elseif($table == 'jobseeker'){
                                    header("location: welcomeseeker.php");           
                            }
                                else{
                                    if($table == 'jobprovider'){
                                        header("location: welcome.php");       
                                    }
                                    else{
                                        if($table == 'student'){
                                            header("location: welcomestudent.php");       
                                        }
                                        elseif($table == 'university'){
                                            header("location: university.php");       
                                        }       
                                }
                               
                            }
                            
                        }
                         else{
                           
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                   
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
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
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif;text-align: center; }
        .wrapper {
        width: 500px;
        margin: 0 auto;padding: 20px;
    }
    </style>
</head>
<body>

        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
      
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <div class="wrapper">
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <div class="wrapper">
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($gender)) ? 'has-error' : ''; ?>">
                <label>Login As</label> <br>
				  <input type="radio" name="table" <?php if (isset($table) && $table=="Admin") ;?> value="admin">Admin
				  <input type="radio" name="table" <?php if (isset($table) && $table=="JobSeeker") ;?> value="jobseeker">JobSeeker
				  <input type="radio" name="table" <?php if (isset($table) && $table=="JobProvider") ;?> value="jobprovider">JobProvider
                   <input type="radio" name="table" <?php if (isset($table) && $table=="student") ;?> value="student">Student
                   <input type="radio" name="table" <?php if (isset($table) && $table=="university") ;?> value="university">University
                <span class="help-block"><?php echo $table_err; ?></span>
            </div>
			<div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="start.php">Sign up now</a>.</p>
        </form>
    </div>    
</body>
</html>