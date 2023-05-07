<?php include "conn.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>InvestUp | Home</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Variables CSS Files. Uncomment your preferred color scheme -->
  <link href="assets/css/variables.css" rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top" data-scrollto-offset="0">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center scrollto me-auto me-lg-0">

        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>Invest<span>Up</span></h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>

          <li class="dropdown"><a href="index.php"><span>Home</span> </a>

          </li>

          <li><a class="nav-link scrollto" href="index.html#about">About us</a></li>
          <li class="dropdown"><a href="#"><span>Startup</span> <i
                class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="start-up.php" class="active">Edtech</a></li>
              <li><a href="start-up.php">Fintech</a></li>
              <li><a href="start-up.php">Healtech</a></li>
              <li><a href="start-up.php">Agtech</a></li>
              <li><a href="start-up.php">Cleantech</a></li>
              <li><a href="start-up.php">Foodtech</a></li>
            </ul>
          </li>
          <li><a href="http://localhost/investup/admin/">My Profile</a></li>

          <li><a class="nav-link scrollto" href="index.html#footer">Contact</a></li>

        </ul>
        

      </nav><!-- .navbar -->



      <?php if (isset($_SESSION["user_email"])) { ?>
        <a class="btn-getstarted scrollto" href="logout.php"> Logout </a>
        <?php
      } else { ?>
        <a class="btn-getstarted scrollto" href="signup.php">Sign In</a>
        <?php
      } ?>

    </div>
  </header><!-- End Header -->