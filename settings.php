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
$connProject = mysqli_connect($host, $user, $password, $database);
// Check if the connection failed
if (!$connProject) {
    // Stop the program and display an error message
    die("Connection failed: " . mysqli_connect_error());
}

//Manage.php
$database2 = "manage";
$connManage = mysqli_connect($host, $user, $password, $database2);
if (!$connManage) {
    die("Manage connection failed: " . mysqli_connect_error());
}

// //jobspage.php
// $database3 = "jobstable_db";
// $connJobs = mysqli_connect($host, $user, $password, $database3);
// if (!$connJobs) {
//     die("Jobs connection failed: " . mysqli_connect_error());
// }

//Apply.php 
$database4 = "apply";
$conn = mysqli_connect($host, $user, $password, $database4);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>