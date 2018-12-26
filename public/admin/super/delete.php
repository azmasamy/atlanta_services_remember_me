




<?php
$page = 'dashboard';
require_once('../../../private/initialize.php');
?>


<!--================Services Area =================-->
<section class="services_area p_120">
  <div class="container">
    <div class="main_title">
      <h2>Delete Admin</h2>

      <?php
      db_connect();
      $args['id'] = $_GET['id'];

      $admin = new User($args);

      if($admin->delete())
      {
        header("Location: index.php" );
      }
      ?>
    </div>
  </div>
</section>
