<?php
$page = 'in';
require_once('../private/initialize.php');

if(is_get_request()) {
  require_header($page);
}
?>

<!--================Services Area =================-->
<section class="services_area p_120">
  <div class="container">
    <div class="main_title">
      <h2>Sign in</h2>

      <?php
      $username = '';
      $password = '';

      if(is_post_request()) {

        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        // Validations
        if(!is_blank($username) || !is_blank($password)) {
          $user = User::find_by_username($username);
          if($user != false && $user->verify_password($password)) {
            $session->login($user);
            set_login_cookie($user);
            //header("Location:sign_in.php?location=".urlencode($_SERVER['HTTP_REFERER']));
            redirect_to('index.php');
          } else {
            redirect_to('sign_in.php?errors=1');
          }
        } else {
          redirect_to('sign_in.php?errors=1');
        }
      } else {
        if(isset($_GET['errors'])) {
          echo "Wrong username or password";
        }
      }

      ?>

    </div>

    <form class="row contact_form" action="sign_in.php" method="post">
      <div class="col-md-6">
        <div class="form-group">
          <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
        </div>
      </div>
      <div class="col-md-12 text-right">
        <button type="submit" value="create" class="btn submit_btn">Sign in</button>
      </div>
    </form>

  </div>

</section>
<!--================End Services Area =================-->


<?php
require_once '../private/includes/footer.php';
require_once '../private/includes/js_tags.php';
?>

</body>
</html>
