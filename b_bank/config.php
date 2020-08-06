<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "healthcare";
// $dbname = "blood_bank";

//session_start(); 
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>