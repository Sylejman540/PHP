<?php

include 'config.php';


$title = $description = $quantity = $price = "";
$errors = [];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input
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
        $stmt = $conn->prepare("INSERT INTO products (title, description, quantity, price) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssii", $title, $description, $quantity, $price);

        if ($stmt->execute()) {
            header("Location: index.php");
            exit();
        } else {
            $errors[] = "Error adding product: " . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Product</title>
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
            background-color: #28a745;
            border: none;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
        }
        .submit-btn:hover {
            background-color: #218838;
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
        <h2>Add New Product</h2>

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

            <button type="submit" class="submit-btn">Add Product</button>
        </form>

        <a href="index.php" class="back-link">← Back to Product List</a>
    </div>

</body>
</html>
