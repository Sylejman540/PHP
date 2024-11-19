<?php 


// // Setting, MySQL, database parameters


// // Connection in database using PDO
// try{
//     // Attemt to creat a PDO object and connecting to a MySQL database
//     // The connection string is contructed using the variables $host, $user and $pass


//     $conn = new PDO("mysql:host=$host; $user, $pass");

//     // If connection is successful
//     echo "Connected";
// }        catch(Exception $e){
//     echo "Not connected";
// }


// Setting, MySQL, database parameters


$host = 'localhost';
$user = 'root';
$pass = '';



// Connection in database using PDO
try{
    $conn = new PDO("mysql:host=$host", $user, $pass);
  
    $sql = "CREATE DATABASE testdb";

    $conn -> exec($sql);

    echo "Database is created!";
} catch(Exception $e){
    echo "Database not created,something went wrong";
}
?>





















<<<<<<< Updated upstream
?>
=======
?>
>>>>>>> Stashed changes
