
<?php
$page = 'home';
require_once('../private/initialize.php');
require_header($page);
?>

<!--================Home Banner Area =================-->
<section class="home_banner_area">
  <div class="banner_inner d-flex align-items-center">
    <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
    <div class="container">
      <div class="banner_content text-center">
        <h3>Made to <span>SERVE</span></h3>
        <p></p>
      </div>
    </div>
  </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Services Area =================-->



<?php

$counter = 0;
$services_per_row = 3;
$services = Service::find_three();
if(count($services) == 3){
  ?>
  <section class="services_area p_120">
    <div class="container">
      <div class="main_title">
        <h2>Services</h2>
        <p>Sample of our services</p>
      </div>

      <?php
      if(!empty($services)) {
        foreach ($services as $service ) {
          if($counter % $services_per_row == 0) {
            echo "<div class=\"row services_inner\">";
          }
          ?>

          <div class="col-lg-4">
            <div class="services_item">
              <a href='request.php?id=<?php echo $service->getId();?>'>
                <img src="img/icon/<?php echo $service->getIcon(); ?>" alt="">
                <a><h4> <?php echo $service->getName(); ?> </h4></a>
                <p><?php echo $service->getDescription(); ?></p>
              </div>
            </div>

            <?php
            $counter++;
            if($counter % $services_per_row == 0) {
              echo "</div>";
            }
          }
        }
      }

      ?>
      <?php
      if(count($services) == 3){
        ?>

        <br>
        <br>
        <center>
          <a class="black_btn" href="service.php">More Services</a>
        </center>

      <?php } ?>

      </div>



    </section>
    <!--================End Services Area =================-->

    <?php
    require_once '../private/includes/footer.php';
    require_once '../private/includes/js_tags.php';
    ?>

  </body>
  </html>
