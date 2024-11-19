<?php 



try{
    //  Connect to database
    $pdo = new PDO("mysql:host=localhost;dbname=test1", "root", "");



    $sql = "ALTER TABLE users ADD email VARCHAR(255)";


    $pdo -> exec($sql);

    echo "Column created successfully";
}
catch(PDOException $e){
    echo "Error creating column", $e -> getMessage();
}










?>