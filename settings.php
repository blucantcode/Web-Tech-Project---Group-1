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
    die("Connection failed: " . mysqli_connect_error());
}

?>