<?php

session_start();
 

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
else{
	$username = $_SESSION["username"];
	$type = $_SESSION["table"];
}


require_once "config.php";

$admission_title= $student_username = "";
$admissionsearch_err = $student_username_err = "";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 20px sans-serif; text-align: center; }
		.wrapper {
        width: 500px;
        margin: 0 auto;padding: 20px;
    }
    </style>
	<style>
.center {
  text-align: center;
  border: 3px solid green;
}
</style>
</head>
<body>

    <div class="page-header">
        <h1> CAREER OPPORTUNITIES </h1>
    </div>
	<div class="wrapper">
	
	<div class="topnav">
		<div class="center">
  <a class="active" href="welcomestudent.php">Home</a>&nbsp;&nbsp;
  <a href="http://localhost/career%20opportunities/student_profile.php">Profile</a>&nbsp;&nbsp;
  <a href="contactS.php">Contact</a>&nbsp;&nbsp;
  <a href="about.php">About</a>&nbsp;&nbsp;
</div>
</div>
<h2>
		Account type <b><?php echo htmlspecialchars($_SESSION["table"]); ?></b> <br>
		Username <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h2>
		<br><br>
		
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		
		<div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
              <label>Looking for University?</label>
			  
	<div class="wrapper">
              <input type="text" name="admission_title" class="form-control" value="<?php echo $admission_title; ?>">
		</div>

		<div class="form-group">
              <input type="submit" class="btn btn-primary" value="Search">
        </div>
		
		<p><a href="applyJob.php">Click Here</a> to apply for a admission </p>
		</form>
		<br><br><br>	
		
	</div>
	<div class="wrapper">

<?php if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	if(empty(trim($_POST["admission_title"]))){
        
        $query = "SELECT * FROM admission";
	}
	else{
		$admission_title=trim($_POST["admission_title"]);
        $query = "SELECT admission_title,admission_type,req_qlf,examd FROM admission WHERE admission_title like '%$admission_title%'";
	}
	    
		$result = $link->query($query);
		$result1=$link->query($query);;
		$num_results = $result->num_rows;
		echo "<p>Number of admission found: ".$num_results."</p>";


		//DISPLAY AS TABLE
		
	
		echo "<table border = '2'>";
		echo "<tr><td> University </td><td> Admission Details </td><td> Requirements </td><td> Exam Details</td></tr>";
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		$admission_title  = $row['admission_title'];
		$admission_type = $row['admission_type'];
		$qlf = $row['req_qlf'];
		$examd = $row['examd'];
		if(empty($qlf))
			$qlf = 'Null';
		if(empty($admission_type))
			$admission_type = 'Null';
		echo "<tr><td>".$admission_title."</td><td>".$admission_type."</td><td>".$qlf."</td><td>".$examd. "</td></tr>";
		}
		echo "</table>";
   
}



?>
<br>
		<p> <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a> </p>
	</form>
	</div>
</body>
</html>