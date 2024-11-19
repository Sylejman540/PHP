<?php 

try{    $pdo = new PDO("mysql:host=localhost;dbname=test1", "root", "");


    // Table alqeration SQL

    $sql = "DROP TABLE users";


    $pdo -> exec($sql);

    echo "Table deleted successfully";
}
catch(PDOException $e){
   $e -> getMessage();
}





?>