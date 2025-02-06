8<?php 
include 'db.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];


    $sql = "DELETE FROM users WHERE id = :id";


    $stmt = $pdo->prepare($sql);
    $stmt ->bindParam(':id', $id, PDO::PARAM_INT);


    if($stmt->execute()){
        echo "User deleted successfully";
    }else{
        echo "Error deleting the user";
    }
}
?>