<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mms";


try{
$conn = new mysqli($servername, $username, $password, $dbname);

}catch (PDOException $e) {
   echo "Error: ", $e->getMessage();
} 
?>
