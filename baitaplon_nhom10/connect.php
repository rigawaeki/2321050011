<?php
$servername = "localhost";
$username = "root";
$password = "";
//$port = "3306"; (optional)
$database = "quan_ly_khach_san";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    //echo "Connected successfully";
?>