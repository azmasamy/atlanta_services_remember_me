<?php
$page = 'service';
require_once('../private/initialize.php');
require_once('../private/includes/user_header.php');
?>
<!--================Services Area =================-->

<section class="services_area p_120">
  <div class="container">
    <div class="main_title">
      <h2>Services</h2>
    </div>
    <?php
    $counter = 0;
    $services_per_row = 3;
    $services = Service::find_all();
    foreach ($services as $service ) {
      if($counter % $services_per_row == 0) {
        echo "<div class=\"row services_inner\">";
      }
      ?>

      <a href='request.php?id=<?php $service->getId(); ?>'> <div class="col-lg-4">
          <div class="services_item">
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
  ?>

  </div>



</section>
<!--================End Services Area =================-->



<?php
require_once '../private/includes/footer.php';
require_once '../private/includes/js_tags.php';
?>

</body>
</html>