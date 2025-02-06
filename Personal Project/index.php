<?php
// Database Connection
$host = "localhost";
$user = "root"; // Change this based on your MySQL setup
$password = ""; // Change this if your MySQL has a password
$database = "project_dashboard";


// Handle Add Project
if (isset($_POST['add_project'])) {
    $name = $_POST['name'];
    $manager = $_POST['manager'];
    $due_date = $_POST['due_date'];
    $status = $_POST['status'];
    $progress = $_POST['progress'];

    $query = "INSERT INTO projects (name, manager, due_date, status, progress) 
              VALUES ('$name', '$manager', '$due_date', '$status', '$progress')";
    $conn->query($query);
}

// Handle Delete Project
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM projects WHERE id=$id";
    $conn->query($query);
    header("Location: index.php");
}

// Handle Edit Project
if (isset($_POST['edit_project'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $manager = $_POST['manager'];
    $due_date = $_POST['due_date'];
    $status = $_POST['status'];
    $progress = $_POST['progress'];

    $query = "UPDATE projects SET 
              name='$name', manager='$manager', due_date='$due_date', 
              status='$status', progress='$progress' WHERE id=$id";
    $conn->query($query);
    header("Location: index.php");
}

// Fetch all projects from database
$projects = $conn->query("SELECT * FROM projects");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard with CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-4">
    <h2 class="text-center">Project Dashboard</h2>

    <!-- Add Project Form -->
    <div class="card p-3 mb-4">
        <h4>Add Project</h4>
        <form method="POST" action="">
            <div class="row">
                <div class="col-md-3">
                    <input type="text" name="name" class="form-control" placeholder="Project Name" required>
                </div>
                <div class="col-md-2">
                    <input type="text" name="manager" class="form-control" placeholder="Manager" required>
                </div>
                <div class="col-md-2">
                    <input type="date" name="due_date" class="form-control" required>
                </div>
                <div class="col-md-2">
                    <select name="status" class="form-control">
                        <option value="Completed">Completed</option>
                        <option value="On Track">On Track</option>
                        <option value="Delayed">Delayed</option>
                        <option value="At Risk">At Risk</option>
                    </select>
                </div>
                <div class="col-md-1">
                    <input type="number" name="progress" class="form-control" placeholder="%" min="0" max="100" required>
                </div>
                <div class="col-md-2">
                    <button type="submit" name="add_project" class="btn btn-success">Add</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Projects Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Project Name</th>
                <th>Project Manager</th>
                <th>Due Date</th>
                <th>Status</th>
                <th>Progress</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $projects->fetch_assoc()): ?>
            <tr>
                <td><?= $row['name'] ?></td>
                <td><?= $row['manager'] ?></td>
                <td><?= $row['due_date'] ?></td>
                <td><span class="badge bg-<?= $row['status'] == 'Completed' ? 'success' : ($row['status'] == 'On Track' ? 'primary' : ($row['status'] == 'Delayed' ? 'warning' : 'danger')) ?>">
                    <?= $row['status'] ?>
                </span></td>
                <td>
                    <div class="progress">
                        <div class="progress-bar bg-info" style="width: <?= $row['progress'] ?>%;"><?= $row['progress'] ?>%</div>
                    </div>
                </td>
                <td>
                    <a href="?delete=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $row['id'] ?>">Edit</button>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal<?= $row['id'] ?>" tabindex="-1">
                        <div class="modal-dialog">
                            <form method="POST" action="">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Project</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text" name="name" class="form-control mb-2" value="<?= $row['name'] ?>" required>
                                        <input type="text" name="manager" class="form-control mb-2" value="<?= $row['manager'] ?>" required>
                                        <input type="date" name="due_date" class="form-control mb-2" value="<?= $row['due_date'] ?>" required>
                                        <select name="status" class="form-control mb-2">
                                            <option value="Completed" <?= $row['status'] == 'Completed' ? 'selected' : '' ?>>Completed</option>
                                            <option value="On Track" <?= $row['status'] == 'On Track' ? 'selected' : '' ?>>On Track</option>
                                            <option value="Delayed" <?= $row['status'] == 'Delayed' ? 'selected' : '' ?>>Delayed</option>
                                            <option value="At Risk" <?= $row['status'] == 'At Risk' ? 'selected' : '' ?>>At Risk</option>
                                        </select>
                                        <input type="number" name="progress" class="form-control" value="<?= $row['progress'] ?>" min="0" max="100" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="edit_project" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
