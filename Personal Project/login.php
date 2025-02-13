<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom Styles -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('images/blue-sky.jpg'); 
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .login-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        input{
            width: 100%;
        }
        
        .form-control {
            border-radius: 8px;
        }
        
        .btn-custom {
            border-radius: 30px;
            background-color: skyblue;
            color: white;
            font-weight: bold;
        }

        .btn-custom:hover {
            background-color: deepskyblue;
        }
        
        .text-center a {
            text-decoration: none;
            font-weight: bold;
        }

        .error {
            color: red;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="login-container">
<form action="dashboard.php" method="POST">
    <h2 class="text-center">Login</h2>

    <?php if (isset($_SESSION["error"])): ?>
        <p class="error"><?php echo $_SESSION["error"]; unset($_SESSION["error"]); ?></p>
    <?php endif; ?>
    <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="name" name="name" class="form-control" id="name" required placeholder="Enter your name">
        </div>
            
            
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" required placeholder="Enter your email">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" required placeholder="Enter your password">
        </div>

        <button type="submit" class="btn btn-custom w-100">Login</button>

    <p class="text-center mt-3">Dont have an account? <a href="signup.php">Sign Up</a></p>
</div>
</form>
<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
