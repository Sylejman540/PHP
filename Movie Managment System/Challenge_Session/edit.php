<?php

include 'config.php';

$id = $title = $description = $quantity = $price = "";
$errors = [];

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);
    
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        die("Product not found.");
    } else {
        $product = $result->fetch_assoc();
        $title = $product['title'];
        $description = $product['description'];
        $quantity = $product['quantity'];
        $price = $product['price'];
    }
} else {
    die("Invalid product ID.");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $quantity = intval($_POST['quantity']);
    $price = floatval($_POST['price']);

    if (empty($title)) {
        $errors[] = "Title is required.";
    }
    if ($quantity < 0) {
        $errors[] = "Quantity cannot be negative.";
    }
    if ($price < 0) {
        $errors[] = "Price cannot be negative.";
    }


    if (empty($errors)) {
        $update_stmt = $conn->prepare("UPDATE products SET title = ?, description = ?, quantity = ?, price = ? WHERE id = ?");
        $update_stmt->bind_param("ssidi", $title, $description, $quantity, $price, $id);

        if ($update_stmt->execute()) {
            header("Location: index.php");
            exit();
        } else {
            $errors[] = "Error updating product: " . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <style>
        .form-container {
            width: 500px;
            margin: 0 auto;
        }
        form {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 4px;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input[type="text"], textarea, input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-top: 4px;
            box-sizing: border-box;
        }
        .submit-btn {
            margin-top: 15px;
            padding: 10px 15px;
            background-color: #007bff;
            border: none;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
        }
        .submit-btn:hover {
            background-color: #0069d9;
        }
        .error {
            color: red;
            margin-top: 10px;
        }
        .back-link {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #0066cc;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Edit Product</h2>

        <?php if (!empty($errors)): ?>
            <div class="error">
                <ul>
                <?php foreach($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($title); ?>" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description"><?php echo htmlspecialchars($description); ?></textarea>

            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" value="<?php echo htmlspecialchars($quantity); ?>" min="0" required>

            <label for="price">Price ($):</label>
            <input type="number" step="0.01" id="price" name="price" value="<?php echo htmlspecialchars($price); ?>" min="0" required>

            <button type="submit" class="submit-btn">Update Product</button>
        </form>

        <a href="index.php" class="back-link">← Back to Product List</a>
    </div>

</body>
</html>
