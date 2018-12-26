
<?php $selected = "admins";?>
<?php require_once('../../../private/initialize.php'); ?>
<?php require_once(INCLUDES_PATH.'/admin_header.php'); ?>

<div class="container">
  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $admin_id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordCheck = $_POST['password_check'];

    if($password != $passwordCheck) {
      echo "Not updated, New Passwords didn't match";
      echo "<br>";
      echo "<br>";
    } else {

    }

    $args['id'] = $admin_id;
    $args['first_name'] = $first_name;
    $args['last_name'] = $last_name;
    $args['email'] = $email;
    $args['username'] = $username;
    $args['password'] = Admin::hash_password($password);

    $admin = new Admin($args);

    if($admin->update())
    {echo "Admin updated Successfully";
      header("Location: index.php" );
    }
    else
    echo "Not updated";
    die("");
  }//End handling POST request

  ?>
  <?php
  //get the category information related to the id sent

  $admin = Admin::find_by_id($_GET['id']);
  //print_r($cat);
  //die("HH");
  ?>
  <form role="form"  action="edit.php" method="post" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?php echo $admin->getId() ?>" />
    <div class="row">
      <div class="form-group col-lg-4">
        <label for="code">First Name:</label>
        <input type="text" name="first_name" value="<?php echo $admin->getFirstname() ?>" class="form-control" />
      </div>
      <div class="form-group col-lg-4">
        <label for="code">Last Name:</label>
        <input type="text" name="last_name" value="<?php echo $admin->getLastname() ?>" class="form-control" />
      </div>
    </div>

    <div class="row">
      <div class="form-group col-lg-4">
        <label for="code">Email:</label>
        <input type="email" name="email" value="<?php echo $admin->getEmail() ?>" class="form-control" />
      </div>
    </div>

    <div class="row">
      <div class="form-group col-lg-4">
        <label for="code">Username:</label>
        <input type="text" name="username" value="<?php echo $admin->getUsername() ?>" class="form-control" />
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
        <input class="btn btn-primary"  type="submit" name="submit" value="Edit">
      </div>
    </div>
  </div>


</form>
</div>
