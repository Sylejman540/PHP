<<<<<<< Updated upstream
<?php 

$server = "localhost";
$username = "root";
$password = "";
$dbname = "new_db";


try{
    $connect = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);

    // echo "Connected!!";
} 
catch(Exception $e){
    echo "Something went wrong!!!";
}






















=======
<?php 

$server = "localhost";
$username = "root";
$password = "";
$dbname = "new_db";


try{
    $connect = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);

    // echo "Connected!!";
} 
catch(Exception $e){
    echo "Something went wrong!!!";
}






















>>>>>>> Stashed changes
?>