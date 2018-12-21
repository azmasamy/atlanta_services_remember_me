
<?php
$page = 'dashboard';
require_once('../private/initialize.php');
require_once '../private/includes/user_header.php';
?>

<!--================Home Banner Area =================-->
<section class="home_banner_area">
  <div class="banner_inner d-flex align-items-center">
    <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
    <div class="container">
      <div class="banner_content text-center">
        <h3>Build Your <span>Dream</span></h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temp or incididunt ut labore et dolore magna aliqua. Ut enim ad minim.</p>
      </div>
    </div>
  </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Services Area =================-->
<section class="services_area p_120">
  <div class="container">
    <div class="main_title">
      <h2>Our Offered Services</h2>
      <p>Lorem ipsum dolor sit amet, consecteturadipis icing elit,</p>
    </div>
    <div class="row services_inner">
      <div class="col-lg-4">
        <div class="services_item">
          <img src="img/icon/service-icon-1.png" alt="">
          <a href="#"><h4>Building Drawings</h4></a>
          <p>Lorem ipsum dolor sit amet, consecteturadipis icing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          <a class="black_btn" href="#">Request Now</a>

        </div>
      </div>
      <div class="col-lg-4">
        <div class="services_item">
          <img src="img/icon/service-icon-2.png" alt="">
          <a href="#"><h4>Painting Constructions</h4></a>
          <p>Lorem ipsum dolor sit amet, consecteturadipis icing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          <a class="black_btn" href="#">Request Now</a>

        </div>
      </div>
      <div class="col-lg-4">
        <div class="services_item">
          <img src="img/icon/service-icon-3.png" alt="">
          <a href="#"><h4>Repairing Constructions</h4></a>
          <p>Lorem ipsum dolor sit amet, consecteturadipis icing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          <a class="black_btn" href="#">Request Now</a>

        </div>

      </div>

    </div>

  </div>
  <div>
    <center> <a class="black_btn" class="float-right" href="#">More Services</a> </center>
  </div>

</section>
<!--================End Services Area =================-->

<?php
require_once '../private/includes/footer.php';
require_once '../private/includes/js_tags.php';
?>

</body>
</html>
