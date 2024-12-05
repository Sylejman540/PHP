<?php 


$host = 'localhost';
$dbname = 'user_managment';
$username = 'root';
$password = '';


try{
 $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);


//  Set PDO error mode to exception 


$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// echo "Connected";

     if($_SERVER["REQUEST_METHOD"] == "POST"){
        $user = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['password'];

        if(empty($user) || empty($email) || empty($pass)){
            echo "All the fields are required!!";
            exit;
        }
        // Hash dhe password
        $hashed_password = password_hash($pass, PASSWORD_BCRYPT);

        // Prepare the SQL  statement
        $sql = "INSERT INTO users(username, email, password) VALUES(:username, :email, :password)";
        $stmt = $pdo ->prepare($sql);

        //  Bind parameters
        $stmt->bindParam(':username', $user, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashed_password, PDO::PARAM_STR);


     // Execute the statement
     if($stmt -> execute ()){
        echo "Sign up succefully! You can now log in";
     }else{
        echo "Something went wrong.Please try again.";
     }

     }

} catch(PDOException $e){
    echo "Error:" .$e ->getMessage();
}





?>