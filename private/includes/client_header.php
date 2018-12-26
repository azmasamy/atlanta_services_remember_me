<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="img/favicon.png" type="image/png">
  <title>Builder Construction Multi</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="vendors/linericon/style.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
  <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
  <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
  <link rel="stylesheet" href="vendors/animate-css/animate.css">
  <!-- main css -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/responsive.css">
</head>
<body>

  <!--================Header Menu Area =================-->
  <header class="header_area">

    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <a class="navbar-brand logo_h" href="index.php"><img src="img/logo.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto">
              <li class="<?php if($page == 'home') echo "nav-item"; else "nav-item active"; ?>"><a class="nav-link" href="index.php">Home</a></li>
              <li class="<?php if($page == 'about') echo "nav-item"; else "nav-item active"; ?>"><a class="nav-link" href="about-us.php">About</a></li>
              <li class="<?php if($page == 'service') echo "nav-item"; else "nav-item active"; ?>"><a class="nav-link" href="service.php">Services</a>
              <li class="<?php if($page == 'contact') echo "nav-item"; else "nav-item active"; ?>"><a class="nav-link" href="contact.php">Contact</a></li>
              <li class="<?php if($page == 'in') echo "nav-item"; else "nav-item active"; ?>"><a class="nav-link" href="sign_in.php">Sign in</a></li>
              <li class="<?php if($page == 'up') echo "nav-item"; else "nav-item active"; ?>"><a class="nav-link" href="sign_up.php">Sign up</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
