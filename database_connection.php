<?php
$servername = "localhost";
$username = "root";
$password = "";
$database_name = "dizertatie";


// Create connection
$conn = new mysqli($servername, $username, $password, $database_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>