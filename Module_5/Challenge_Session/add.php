<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $sql = "INSERT INTO products (title, description, quantity, price) VALUES ('$title', '$description', $quantity, $price)";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Add New Product</h1>
    <form method="post" action="">
        <label>Title:</label>
        <input type="text" name="title" required><br>
        <label>Description:</label>
        <textarea name="description"></textarea><br>
        <label>Quantity:</label>
        <input type="number" name="quantity" required><br>
        <label>Price:</label>
        <input type="text" name="price" required><br>
        <input type="submit" value="Add Product">
    </form>
    <a href="index.php">Back to Product List</a>
</body>
</html>

<?php
$conn->close();
?>
