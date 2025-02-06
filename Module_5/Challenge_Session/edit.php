<?php
include 'config.php';

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $sql = "UPDATE products SET title='$title', description='$description', quantity=$quantity, price=$price WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $sql = "SELECT * FROM products WHERE id=$id";
    $result = $conn->query($sql);
    $product = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Edit Product</h1>
    <form method="post" action="">
        <label>Title:</label>
        <input type="text" name="title" value="<?php echo $product['title']; ?>" required><br>
        <label>Description:</label>
        <textarea name="description"><?php echo $product['description']; ?></textarea><br>
        <label>Quantity:</label>
        <input type="number" name="quantity" value="<?php echo $product['quantity']; ?>" required><br>
        <label>Price:</label>
        <input type="text" name="price" value="<?php echo $product['price']; ?>" required><br>
        <input type="submit" value="Update Product">
    </form>
    <a href="index.php">Back to Product List</a>
</body>
</html>

<?php
$conn->close();
?>
