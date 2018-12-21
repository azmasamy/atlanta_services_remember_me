
<?php
$page = 'home';
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
  <center>
    <div class="container">
      <div class="main_title">
        <h2>Our Offered Services</h2>
        <p>Lorem ipsum dolor sit amet, consecteturadipis icing elit,</p>
      </div>
      <div class="row services_inner">

        <div class="col-lg-4">
          <a href="#">
            <div class="services_item">
              <img src="img/icon/service-icon-1.png" alt="">
              <h4>Building Drawings</h4>
              <p>Lorem ipsum dolor sit amet, consecteturadipis icing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </a>
        </div>


          <div class="col-lg-4">
            <a href="#">
            <div class="services_item">
              <img src="img/icon/service-icon-2.png" alt="">
              <h4>Painting Constructions</h4>
              <p>Lorem ipsum dolor sit amet, consecteturadipis icing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
        </a>


          <div class="col-lg-4">
            <a href="#">
            <div class="services_item">
              <img src="img/icon/service-icon-3.png" alt="">
              <h4>Repairing Constructions</h4>
              <p>Lorem ipsum dolor sit amet, consecteturadipis icing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
        </a>

      </div>
    </div>

    <br>

  </center>
  <div>
    <center> <a class="black_btn" class="float-right" href="#">More Services</a>
    </div>
  </center>

</section>
<!--================End Services Area =================-->

<?php
require_once '../private/includes/footer.php';
require_once '../private/includes/js_tags.php';
?>

</body>
</html>
