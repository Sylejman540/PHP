<?php
// edit.php
require 'config.php';

if (!isset($_GET['id']) || !filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];
$errors = [];

// Fetch existing movie data
$stmt = $conn->prepare("SELECT * FROM movies WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$movie = $result->fetch_assoc();

if (!$movie) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize form data
    $title = trim($_POST['title']);
    $director = trim($_POST['director']);
    $year = trim($_POST['year']);
    $genre = trim($_POST['genre']);

    // Validate data
    if (empty($title)) {
        $errors[] = 'Title is required.';
    }
    if (empty($director)) {
        $errors[] = 'Director is required.';
    }
    if (empty($year) || !filter_var($year, FILTER_VALIDATE_INT)) {
        $errors[] = 'Valid year is required.';
    }
    if (empty($genre)) {
        $errors[] = 'Genre is required.';
    }

    // If no errors, update the database
    if (empty($errors)) {
        $update_stmt = $conn->prepare("UPDATE movies SET title = ?, director = ?, year = ?, genre = ? WHERE id = ?");
        $update_stmt->bind_param("ssisi", $title, $director, $year, $genre, $id);

        if ($update_stmt->execute()) {
            header('Location: index.php');
            exit;
        } else {
            $errors[] = 'Failed to update movie. Please try again.';
        }

        $update_stmt->close();
    }
} else {
    // Populate form with existing data
    $title = $movie['title'];
    $director = $movie['director'];
    $year = $movie['year'];
    $genre = $movie['genre'];
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Movie</title>
    <style>
        /* Reuse styles from add.php */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }
        form {
            width: 50%;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .error {
            color: red;
            margin-bottom: 15px;
        }
        .submit-button {
            padding: 10px 15px;
            background-color: #ffc107;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .submit-button:hover {
            background-color: #e0a800;
        }
        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
        }
        .back-link a {
            text-decoration: none;
            color: #0066cc;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Edit Movie</h2>

<form method="POST" action="">
    <?php if (!empty($errors)): ?>
        <div class="error">
            <?php foreach ($errors as $error): ?>
                <div><?php echo htmlspecialchars($error); ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <label for="title">Title:</label>
    <input type="text" name="title" id="title" value="<?php echo isset($title) ? htmlspecialchars($title) : ''; ?>">

    <label for="director">Director:</label>
    <input type="text" name="director" id="director" value="<?php echo isset($director) ? htmlspecialchars($director) : ''; ?>">

    <label for="year">Year:</label>
    <input type="number" name="year" id="year" value="<?php echo isset($year) ? htmlspecialchars($year) : ''; ?>">

    <label for="genre">Genre:</label>
    <input type="text" name="genre" id="genre" value="<?php echo isset($genre) ? htmlspecialchars($genre) : ''; ?>">

    <button type="submit" class="submit-button">Update Movie</button>
</form>

<div class="back-link">
    <a href="index.php">← Back to Movie List</a>
</div>

</body>
</html>
