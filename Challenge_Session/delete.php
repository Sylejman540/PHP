<?php

include 'config.php';


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        die("Error deleting product: " . $conn->error);
    }
} else {
    die("Invalid product ID.");
}

$conn->close();
?>
