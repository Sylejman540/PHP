<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "product_management1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
