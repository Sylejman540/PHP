<?php 

$host = 'localhost';
$dbname = 'config';
$username = 'root';
$password = '';


try{
    $pdo = new PDO("mysqlp:host=$host;dbname=$dbname, $username, $password");
    // $pdo -> setAttribute(PDO:ATTR_ERRMODE, PDO:ERRMODE_EXCEPTION);

}catch(PDOEXCEPTION $e){
    echo "Database connection failed: ". $e->getMessage();
}


?>