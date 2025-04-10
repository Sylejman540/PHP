<?php 
  
  include_once('config.php');

  $id = $_GET['id'];

  $sql = "SELECT * FROM users WHERE  id =:id";


  $selectUsers = $conn->prepare($sql);

  $selectUsers -> bindParam(':id', $id);

  $selectUsers->execute();

  $user_data = $selectUsers->fetch();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="
    https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css
    " rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 	 <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
  	<link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
	<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
	<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
	<link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
	<link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
	<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
	<meta name="theme-color" content="#7952b3">
    <title>Dashboard</title>
</head>
<body>
    <header class="navabar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-nd-3 col-lg-2 me-0 px-3" href=""><?php echo "Welcome to dashboard" .$_Session['username'];?></a>
        <button class="nav-bar-toggler position-absolute d-md-none collapsed" type="button">
            <span class="navbar-toggle-icon"></span>
        </button>
        <input type="text" placeholder="Search" aria-label="Search" class="form-control form-control-dark w-50">
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a href="logout.php" class="nav-link px-3">Sign out</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="dashboard.php" class="nav-link active" aria-current="page">
                            <span data-feather="home">
                                Dashboard
                            </span>
                        </a>
                    </li>
                <ul>
            </div>
        </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"> 
        <h1 class="h2">Dashboard </h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            </div>    

                <button type="button" class="btn btn-sm btn-outline-seconday dropdown-toggle">
                    <span data-feather="calendar"></span>
                    This week
                </button>
        </div>
    </div>

            <h2>Edit user's details</h2>
        <div class="table-responsive">
            <form action="editUsers.php" method="POST">

                <div class="form-floating">
                    <input type="number" class="form-control" id="floatingInput" placeholder="id" name="id" value="<?php echo $user_data['id']?>">
                    <label for="floatingInput">ID</label>
                </div>    
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Name" name="Name" value="<?php echo $user_data['Name']?>">
                    <label for="floatingInput">Name</label>
                </div> 
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Surname" name="Surname" value="<?php echo $user_data['Surname']?>">
                    <label for="floatingInput">Surname</label>
                </div> 
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="Username" value="<?php echo $user_data['Username']?>">
                    <label for="floatingInput">Username</label>
                </div> 
                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInput" placeholder="Email" name="Email" value="<?php echo $user_data['Email']?>">
                    <label for="floatingInput">Email</label>
                </div>
                <br>
                <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Change</button>
            </form>
        </div>
    </main>
    </div>
    </div>   
</body>
<script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

      <script src="
https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js
" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="
https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js
" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script> 
</html>