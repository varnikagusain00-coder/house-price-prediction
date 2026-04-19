<?php
session_start(); // Start PHP session for login management

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "house_price_prediction";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
