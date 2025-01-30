<?php
include 'config.php';

$movie_name = $description = $release_year = $rating = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $movie_name   = trim($_POST['movie_name']);
    $description  = trim($_POST['description']);
    $release_year = intval($_POST['release_year']);
    $rating       = floatval($_POST['rating']);

    if (empty($movie_name)) {
        $errors[] = "Movie name is required.";
    }
    if ($release_year < 0) {
        $errors[] = "Release year cannot be negative.";
    }
    if ($rating < 0) {
        $errors[] = "Rating cannot be negative.";
    }

    if (empty($errors)) {
        $stmt = $conn->prepare("INSERT INTO movies (movie_name, description, release_year, rating) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssii", $movie_name, $description, $release_year, $rating);

        if ($stmt->execute()) {
            header("Location: index.php");
            exit();
        } else {
            $errors[] = "Error adding movie: " . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Movie</title>
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
        <h2>Add New Movie</h2>

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
            <label for="movie_name">Movie Name:</label>
            <input type="text" id="movie_name" name="movie_name" value="<?php echo htmlspecialchars($movie_name); ?>" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description"><?php echo htmlspecialchars($description); ?></textarea>

            <label for="release_year">Release Year:</label>
            <input type="number" id="release_year" name="release_year" value="<?php echo htmlspecialchars($release_year); ?>" min="0" required>

            <label for="rating">Rating:</label>
            <input type="number" step="0.1" id="rating" name="rating" value="<?php echo htmlspecialchars($rating); ?>" min="0" required>

            <button type="submit" class="submit-btn">Add Movie</button>
        </form>

        <a href="index.php" class="back-link">← Back to Movie List</a>
    </div>

</body>
</html>
