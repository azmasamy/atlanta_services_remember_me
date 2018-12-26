
<?php
$page = 'dashboard';
require_once('../../private/initialize.php');
require_header($page);
deny_user_access();
deny_client_access();
?>

<!--================Services Area =================-->
<section class="services_area p_120">
  <div class="container">
    <div class="main_title">
      <h2>Admin Panel</h2>
      <p>Lorem ipsum dolor sit amet, consecteturadipis icing elit,</p>
    </div>
  </div>
</section>
<!--================End Services Area =================-->

<?php
require_once '../../private/includes/footer.php';
require_once '../../private/includes/js_tags.php';
?>

</body>
</html>
