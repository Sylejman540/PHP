<?php
session_start();

// Initialize tasks if not already set
if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = [];
}

// Handle adding a new task
if (isset($_POST['addTask'])) {
    $taskName = trim($_POST['taskName']);
    if (!empty($taskName)) {
        $_SESSION['tasks'][] = [
            'name' => $taskName,
            'completed' => false
        ];
    }
    // Redirect to avoid resubmission on page refresh
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Handle deleting a task
if (isset($_GET['delete'])) {
    $indexToDelete = (int) $_GET['delete'];
    if (isset($_SESSION['tasks'][$indexToDelete])) {
        array_splice($_SESSION['tasks'], $indexToDelete, 1);
    }
    // Redirect back
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Handle toggling task completion
if (isset($_GET['complete'])) {
    $indexToComplete = (int) $_GET['complete'];
    if (isset($_SESSION['tasks'][$indexToComplete])) {
        $_SESSION['tasks'][$indexToComplete]['completed'] =
            !$_SESSION['tasks'][$indexToComplete]['completed'];
    }
    // Redirect back
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Calculate progress
$totalTasks = count($_SESSION['tasks']);
$completedTasks = 0;
foreach ($_SESSION['tasks'] as $task) {
    if ($task['completed']) {
        $completedTasks++;
    }
}
$progressPercent = $totalTasks > 0
    ? round(($completedTasks / $totalTasks) * 100)
    : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('images/blue-sky.jpg');
            background-size: cover;
            min-height: 100vh;
        }

        .task-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            max-width: 600px;
            margin: 50px auto;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        .task-item {
            padding: 10px;
            border: 1px solid #ddd;
            margin-bottom: 10px;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .task-item.completed {
            text-decoration: line-through;
            color: gray;
        }

        .progress-bar {
            background-color: skyblue;
            height: 20px;
            transition: width 0.5s;
        }

        .progress-bar.complete {
            background-color: limegreen;
        }

        .btn-task {
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="task-container">
            <h2 class="text-center">Task Manager</h2>

            <!-- Form to add tasks -->
            <form method="POST" action="">
                <div class="mb-4">
                    <input type="text" name="taskName" class="form-control" placeholder="Enter a new task">
                    <button type="submit" name="addTask" class="btn btn-primary w-100 btn-task mt-2">Add Task</button>
                </div>
            </form>

            <!-- Task list -->
            <div>
                <h4>Your Tasks</h4>
                <div id="taskList">
                    <?php if (!empty($_SESSION['tasks'])): ?>
                        <?php foreach ($_SESSION['tasks'] as $index => $task): ?>
                            <div class="task-item <?php echo $task['completed'] ? 'completed' : ''; ?>">
                                <span><?php echo htmlspecialchars($task['name']); ?></span>
                                <div>
                                    <!-- Toggle completion -->
                                    <a href="?complete=<?php echo $index; ?>"
                                       class="btn btn-sm btn-success btn-task">
                                        <?php echo $task['completed'] ? 'Undo' : 'Complete'; ?>
                                    </a>
                                    <!-- Delete task -->
                                    <a href="?delete=<?php echo $index; ?>"
                                       class="btn btn-sm btn-danger btn-task"
                                       onclick="return confirm('Are you sure you want to delete this task?');">
                                        Delete
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No tasks yet. Add some above!</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Progress bar -->
            <div class="mt-4">
                <h5>Progress</h5>
                <div class="progress">
                    <div id="progressBar"
                         class="progress-bar <?php echo ($progressPercent === 100 && $totalTasks > 0) ? 'complete' : ''; ?>"
                         style="width: <?php echo $progressPercent; ?>%;">
                    </div>
                </div>
                <p id="progressText" class="text-center mt-1">
                    <?php echo $progressPercent; ?>% Complete
                </p>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS (optional, for any Bootstrap components that need JS) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
