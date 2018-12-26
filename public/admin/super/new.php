

<?php
$page = 'dashboard';
require_once('../../../private/initialize.php');
require_once PRIVATE_PATH . '/includes/user_header.php';
?>


<!--================Services Area =================-->
<section class="services_area p_120">
  <div class="container">
    <div class="main_title">
      <h2>Create Admin</h2>

      <?php
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordCheck = $_POST['password_check'];

        if(!has_presence($first_name) || !has_presence($last_name) || !has_presence($username) || !has_presence($email) || !has_presence($password) || !has_presence($passwordCheck)) {
          echo "Not created, all fields are required";
          echo "<br>";
          echo "<br>";
        } else {
          if($password != $passwordCheck) {
            echo "Not created, Passwords didn't match";
            echo "<br>";
            echo "<br>";
          } else {
            $args['first_name'] = $first_name;
            $args['last_name'] = $last_name;
            $args['username'] = $username;
            $args['email'] = $email;
            $args['password'] = User::hash_password($password);
            $admin = new User($args);

            if($admin->create_admin())
            echo "Admin Created Successfully";
            else
            echo "Not created";
            die("");
          }
        }


      }
      ?>

    </div>

    <form class="row contact_form" action="new.php" method="post">
      <div class="col-md-6">
        <div class="form-group">
          <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter first name">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter last name">
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <input type="password" class="form-control" id="password_check" name="password_check" placeholder="Enter password again">
        </div>
      </div>
      <div class="col-md-12 text-right">
        <button type="submit" value="create" class="btn submit_btn">Create</button>
      </div>
    </form>

  </div>

</section>
<!--================End Services Area =================-->


<div class="container">


</div>
