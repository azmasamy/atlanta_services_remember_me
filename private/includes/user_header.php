
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="<?php echo WWW_ROOT; ?>/img/favicon.png" type="image/png">
  <title>Builder Construction Multi</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo WWW_ROOT; ?>/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo WWW_ROOT; ?>/vendors/linericon/style.css">
  <link rel="stylesheet" href="<?php echo WWW_ROOT; ?>/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo WWW_ROOT; ?>/vendors/owl-carousel/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo WWW_ROOT; ?>/vendors/lightbox/simpleLightbox.css">
  <link rel="stylesheet" href="<?php echo WWW_ROOT; ?>/vendors/nice-select/css/nice-select.css">
  <link rel="stylesheet" href="<?php echo WWW_ROOT; ?>/vendors/animate-css/animate.css">
  <!-- main css -->
  <link rel="stylesheet" href="<?php echo WWW_ROOT; ?>/css/style.css">
  <link rel="stylesheet" href="<?php echo WWW_ROOT; ?>/css/responsive.css">
</head>
<body>

  <!--================Header Menu Area =================-->
  <header class="header_area">

    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <a class="navbar-brand logo_h" href="<?php echo WWW_ROOT; ?>/index.php"><img src="<?php echo WWW_ROOT; ?>/img/logo.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto">
              <li class="<?php if($page == 'home') echo "nav-item active"; else echo "nav-item"; ?>"><a class="nav-link" href="<?php echo WWW_ROOT; ?>/index.php">Home</a></li>
              <li class="<?php if($page == 'about') echo "nav-item active"; else echo "nav-item"; ?>"><a class="nav-link" href="<?php echo WWW_ROOT; ?>/about_us.php">About</a></li>
              <li class="<?php if($page == 'service') echo "nav-item active"; else echo "nav-item"; ?>"><a class="nav-link" href="<?php echo WWW_ROOT; ?>/service.php">Services</a>
                <li class="<?php if($page == 'contact') echo "nav-item active"; else echo "nav-item"; ?>"><a class="nav-link" href="<?php echo WWW_ROOT; ?>/contact.php">Contact</a></li>
                <li class="<?php if($page == 'in') echo "nav-item active"; else echo "nav-item"; ?>"><a class="nav-link" href="<?php echo WWW_ROOT; ?>/sign_in.php">Sign in</a></li>
                <li class="<?php if($page == 'up') echo "nav-item active"; else echo "nav-item"; ?>"><a class="nav-link" href="<?php echo WWW_ROOT; ?>/sign_up.php">Sign up</a></li>
                <li class="<?php if($page == 'dashboard') echo "nav-item active"; else echo "nav-item"; ?>"><a class="nav-link" href="<?php echo WWW_ROOT; ?>/admin">Dashboard</a></li>
                <li class="<?php if($page == 'logout') echo "nav-item active"; else echo "nav-item"; ?>"><a class="nav-link" href="<?php echo WWW_ROOT; ?>/log_out.php">Log out</a></li>
              </ul>
            </div>
          </div>
        </nav>
        <div class="container">
        <div class="top_menu m0">
            <div class="float-left">
              <h2>Super Admin Controller</h2>
            </div>
            <div class="float-right">
              <a class="dn_btn" href="<?php echo WWW_ROOT; ?>/admin/services/index.php">Services</a>
              <a class="dn_btn" href="<?php echo WWW_ROOT; ?>/admin/services/index.php">Required Documents</a>
              <a class="dn_btn" href="#">Requests</a>
              <a class="dn_btn" href="#">Staff</a>
            </div>
          </div>
        </div>
      </div>
    </header>
