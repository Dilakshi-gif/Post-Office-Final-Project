<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
//session_start();

// Check if the user is not logged in; if so, redirect to the login page

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<title>Sri Lanka POST OFFICE</title>
  <!--<style>
    h1{
      color: red;
    }
 </style>-->
  </head>
  <body>
  	<nav class="navbar navbar-expand-md" style=" border-bottom: 2px solid gray;">
  		<a href="" class="navbar-brand fs-3 ms-3 text-white fs-5"> <img src="logo.png" width' alt=""></a>
  	<button class="navbar-toggler me-3 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#btn">
  		<i class='bx bx-menu bx-md '></i>
  	</button>
  	<div class="collapse navbar-collapse ul-bg" id="btn">
  		<ul class="navbar-nav ms-auto">
  			<li class="nav-item">
  				<a href="index.php" class="nav-link mx-1  fs-5">Home</a>
  			</li>
  			<li class="nav-item">
  				<a href="about.php" class="nav-link mx-1  fs-5">About</a>
  			</li>
  			<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mx-1  fs-5" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Services
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="telemail.php">TELEMAIL SERVICE-LOCAL</a></li>
            <li><a class="dropdown-item" href="moneyOrder.php">Money Order</a></li>
            <li><a class="dropdown-item" href="bank.php">Banking</a></li>
            <li><a class="dropdown-item" href="MyProfile.php">My Profile</a></li>
            <!--<li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>-->
          </ul>
        </li>
  			<!--<li class="nav-item">
  				<a href="#" class="nav-link mx-1 text-white fs-5">Question</a>
  			</li>-->
  			<li class="nav-item">
  				<a href="contact.php" class="nav-link mx-1  fs-5">Contact</a>
  			</li>
  			
  		</ul>
  	</div>
    <!--<div class="form-group">-->
    <?php if (isset($_SESSION['id'])): ?>
      <a class="nav-link mx-1  fs-5" href="logout.php">logout</a>
      <?php endif; ?>

      <?php if (!isset($_SESSION['id'])): ?>
      <a class="nav-link mx-1  fs-5" href="login.php">login</a>
      <?php endif; ?>
      
    </div>

 </nav>

 
