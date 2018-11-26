<?php
$servername = "localhost";
$username = "username";
$password = "password";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    ?><script>console.log("Error connecting to database: " . $conn->connect_error);</script><?php
    die("Connection failed: " . $conn->connect_error);
} 

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS beta_sig_iota";
if ($conn->query($sql) !== TRUE) {
    ?><script>console.log("Error creating database: " . $conn->error);</script><?php
}
?><script>console.log("Database Up and Running.")</script><?php

$conn->close();
?>
