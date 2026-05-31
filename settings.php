<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>


<?php

// Store the database server name
$host = "localhost";

// Store the mysql username
$user = "root";

// Store the MySQL password - no password
$password = "";




// storing the name of the DB 
$database = "project2";

// Create a connection to the MySQL database
$conn = mysqli_connect($host, $user, $password, $database);

// Check if the connection failed
if (!$conn) {
    // Stop the program and display an error message
    die("Project DB connection failed: " . mysqli_connect_error());
}




// Im missing the DB file for this so cannot run my managelogin screen!
//$database2 = "manage";

// Create connection for manage DB
//$connManage = mysqli_connect($host, $user, $password, $database2);

// Check connection
//if (!$connManage) {
//    die("Manage connection failed: " . mysqli_connect_error());
//}




 jobspage.php
$database3 = "jobstable_db";

 Create connection for jobs DB
$connJobs = mysqli_connect($host, $user, $password, $database3);

 Check connection
if (!$connJobs) {
   die("Jobs connection failed: " . mysqli_connect_error());
}

?>