<?php

session_start();

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$UNI = $_SESSION["username"];
$admission_title = $qlf = $admission_type = $examd= "";
$admission_title_err = $examd_err = "";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["admission_title"]))){
        $admission_title_err = "Please Enter Job Title";     
    } else{
        $admission_title = trim($_POST["admission_title"]);
    }
    if(empty(trim($_POST["examd"]))){
        $examd_err = "Please Enter examd Name";     
    } else{
        $examd = trim($_POST["examd"]);
    }
    if(empty(trim($_POST["qlf"]))){
        $qlf = Null;     
    } else{
        $qlf = trim($_POST["qlf"]);
    }
    if(empty(trim($_POST["admission_type"]))){
        $admission_type = Null;     
    } else{
        $admission_type = trim($_POST["admission_type"]);
    }    	
    // Check input errors before inserting in database
    if(empty($admission_title_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO admission (admission_title, req_qlf,admission_type, examd, jp) VALUES (?, ?, ?, ?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_admission_title, $param_qlf, $param_admission_type, $param_examd, $param_UNI);
            
            // Set parameters
             $param_admission_title  = $admission_title;
             $param_qlf = $qlf; // Creates a password hash
             $param_admission_type = $admission_type;
			 $param_UNI  = $UNI;
			 $param_examd =$examd;
			
            //echo "   admission_title  ".$param_admission_title;
            //echo "qlf ".$param_qlf; // Creates a password hash
            //echo "admission_type ".$param_admission_type;
			//echo $param_UNI;
			echo "copm ".$param_examd;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: university.php");
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
    <title>job Post Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
    
        body{ font: 20px sans-serif; }
        .wrapper {
        width: 500px;
        margin: 0 auto;padding: 15px;
    }
    .center {
  text-align: center;
  border: 3px solid green;
}
   
    </style>
     <div class="wrapper">
    <div class="page-header">
        <h1> CAREER OPPORTUNITIES </h1>
    </div>
</head>
<body>
    <div class="wrapper">
    <div class="wrapper">
	<div class="topnav">
		<div class="center">
  <a class="active" href="university.php">Home</a>&nbsp;&nbsp;
  <a href="contact.php">Contact</a>&nbsp;&nbsp;
  <a href="about.php">About</a>&nbsp;&nbsp;
</div>
        <h2>Post Admission Notice</h2>
        <p>Please fill this form to post a Notice.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($admission_title_err)) ? 'has-error' : ''; ?>">
                <label>University Name</label>
                <input type="text" name="admission_title" class="form-control" value="<?php echo $admission_title; ?>">
                <span class="help-block"><?php echo $admission_title_err; ?></span>
            </div>    
			<div class="form-group ">
                <label>Requiremets</label>
                <textarea name="qlf" rows="5" cols="60"></textarea>
            </div>
            <div class="form-group ">
                <label>Admission Details</label>
                <textarea name="admission_type" rows="5" cols="60"></textarea>
            </div>
			<div class="form-group <?php echo (!empty($examd_err)) ? 'has-error' : ''; ?>">
                <label>Exam Details</label>
                <textarea name="examd" rows="5" cols="60"></textarea>>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="post">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p> <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a> </p>
        </form>
    </div>    
</body>
</html>