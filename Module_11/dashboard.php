<?php 
 
include  'db.php';



$sql  = "SELECT * FROM users";
$stmt = $pdo -> prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
</head>

    <style>
            /* CSS */
    </style>

<body>
        <h2>Users Dashboard</h2>
    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Actions</th>
            <tr>
        <tbody>
            <!--  -->
</tbody>
<thead>
</table>
</body>
</html>