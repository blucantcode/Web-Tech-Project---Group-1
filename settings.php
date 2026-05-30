<?php

$host = "localhost";
$user = "root";
$password = "";


//Im missing the DB file for this so cannot run my managelogin screen! Once I have DB all good :D -Lotus
// $database = "project2";

// $conn = mysqli_connect($host, $user, $password, $database);

// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }

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
//     die("Manage connection failed: " . mysqli_connect_error());
// }

// $database4 = "testoi"; //added a test db to be able to finish coding manage.php

// $connEOI = mysqli_connect($host, $user, $password, $database4);

// if (!$connEOI) {
//     die("Manage connection failed: " . mysqli_connect_error());
// }

?>