<?php
$page = 'dashboard';
require_once('../../../private/initialize.php');
require_header($page);
deny_user_access();
deny_client_access();
deny_admin_access();
?>

<div class="container">
  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordCheck = $_POST['password_check'];

    if($password != $passwordCheck) {
      echo "Not created, Passwords didn't match";
      echo "<br>";
      echo "<br>";
    } else {
      $args['first_name'] = $first_name;
      $args['last_name'] = $last_name;
      $args['username'] = $username;
      $args['email'] = $email;
      $args['password'] = Admin::hash_password($password);
      $admin = new Admin($args);

      if($admin->create())
      echo "Admin Created Successfully";
      else
      echo "Not created";
      die("");
    }
  }

  ?>
  <form role="form"  action="new.php" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="form-group col-lg-4">
        <label for="code">First Name:</label>
        <input type="text" name="first_name" class="form-control" />
      </div>
      <div class="form-group col-lg-4">
        <label for="code">Last Name:</label>
        <input type="text" name="last_name" class="form-control" />
      </div>
    </div>
    <div class="row">
      <div class="form-group col-lg-4">
        <label for="code">Email:</label>
        <input type="email" name="email" class="form-control" />
      </div>
    </div>
    <div class="row">
      <div class="form-group col-lg-4">
        <label for="code">Username:</label>
        <input type="text" name="username" class="form-control" />
      </div>
    </div>
    <div class="row">
      <div class="form-group col-lg-4">
        <label for="code">Password:</label>
        <input type="password" name="password" class="form-control" />
      </div>
      <div class="form-group col-lg-4">
        <label for="code">Re-enter Password:</label>
        <input type="password" name="password_check" class="form-control" />
      </div>
    </div>
      <div class="row">
        <div class="form-group col-lg-1 ">
          <input class="btn btn-primary"  type="submit" name="submit" value="Add">
        </div>
      </div>
    </div>


  </form>
</div>
