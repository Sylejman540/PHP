<<<<<<< Updated upstream
<?php 


// With this file we include the database connection
include_once("config.php");

// isset() function determine if a variable is declared and is diffrent from NULL
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    $sql = "INSERT INTO users(name, username, email) VALUES( :name, :username, :email)";


    $sqlQuery = $connect -> prepare($sql);

    $sql->bindParam(':name',$name);
    $sqlQuery->bindParam('username', $username);
    $sqlQuery->bindParam('email',$email);

    $sqlQuery->execute();

    echo"This user was added successfully!!";


}







=======
<?php 


// With this file we include the database connection
include_once("config.php");

// isset() function determine if a variable is declared and is diffrent from NULL
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    $sql = "INSERT INTO users(name, username, email) VALUES( :name, :username, :email)";


    $sqlQuery = $connect -> prepare($sql);

    $sql->bindParam(':name',$name);
    $sqlQuery->bindParam('username', $username);
    $sqlQuery->bindParam('email',$email);

    $sqlQuery->execute();

    echo"This user was added successfully!!";


}







>>>>>>> Stashed changes
?>