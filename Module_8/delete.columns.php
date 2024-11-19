<?php 


try{
        //  Connect to database
        $pdo = new PDO("mysql:host=localhost;dbname=test1", "root", "");

        $sql = "ALTER TABLE users DROP COLUMNS email";

        $pdo -> exec($sql);
        
        echo "Column dropped successfully";
    }
    catch(PDOException $e){
        echo  $e -> getMessage();
    }
    
    









?>