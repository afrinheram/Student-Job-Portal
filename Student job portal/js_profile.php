<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
else{
	$username = $_SESSION["username"];
	$type = $_SESSION["table"];
}

// Include config file
require_once "config.php";

$JT= $JS = "";
$jobsearch_err = $JS_err = "";
?>

<style>
.center {
  text-align: center;
  border: 3px solid green;
}
</style>
<div class="center">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 20px sans-serif; text-align: center; }
		.wrapper {
        width: 780px;
        margin: 0 auto;padding: 20px;
    }
    </style>
</head>
<body>
    <div class="page-header">
        
        <h1> CAREER OPPORTUNITIES </h1>
    </div>
	<div class="wrapper">
		<h2>
 
        <div class="wrapper">
        <div class="center">
		<div class="topnav">
  <a class="active" href="welcomeseeker.php">Home</a>&nbsp;&nbsp;
  
  <a href="contactjs.php">Contact</a>&nbsp;&nbsp;
  <a href="about.php">About</a>
</div>
</div>
  <br>
  <h2> Personal Information </h2> 
  </b> <br>
		User <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h2>  <br><br>  
        <style>
table, th, td {
  border: 5px solid black;
}
</style>  <?php

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$currentuser=$_SESSION["username"];
// Attempt select query execution
$sql = "SELECT * FROM jobseeker where js_username ='$currentuser' " ;
// Attempt select query execution

if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table border='5'>";
        
            echo "<tr>";
                
                echo "<th>&nbsp;First &nbsp;Name&nbsp;</th>";
                echo "<th>&nbsp;Last &nbsp;Name&nbsp;</th>";
                echo "<th>&nbsp;Email&nbsp;</th>";
                echo "<th>&nbsp;Age&nbsp;</th>";
                echo "<th>&nbsp;Skills &nbspNumber</th>";
                echo "<th>&nbsp;Qualification&nbsp;</th>";
                echo "<th>&nbsp;Experience&nbsp;</th>";
                echo "<th>&nbsp;Phone&nbsp;</th>";


            echo "</tr>";
         
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            
                
                echo "<td>" . $row['fname'] ."</td>";
                echo "<td>" . $row['lname'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['age'] . "</td>";
                echo "<td>" . $row['skills'] . "</td>";
                echo "<td>" . $row['qlf'] . "</td>";
                echo "<td>" . $row['exp'] . "</td>";
                echo "<td>" . $row['phno'] . "</td>";
            
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>

    
</body>
</html>
