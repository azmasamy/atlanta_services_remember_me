<?php
$page = 'profile';
require_once('../../private/initialize.php');
require_header($page);
deny_user_access();
?>

<div class="container">
    <div class="main_title">
      <h2>welcome to your profile</h2>
    </div>
    <div>
      <?php
      $user_id = $_SESSION['user_id'];
        $users = User::find_by_id($user_id);
      //   print_r($users);
      //  $username = User -> getUsername;

        echo "<h5>USERNAME<h5> ". $users->getUsername();echo"<br><br>";
        echo "<h5>FIRST NAME<h5> ". $users->getFirstname();echo"<br><br>";
        echo "<h5>LAST NAME<h5> ". $users->getLastname();echo"<br><br>";
        echo "<h5>EMAIL<h5> ". $users->getEmail();echo"<br><br>";



        ?>
     <br><h2>previous requests</h2>
    </div>
    <?php
    $counter = 0;
    $user_id = $_SESSION['user_id'];
    $requests_per_row = 3;
    $request = new $args[Request];
    $requests = Requests::find_by_userid($user_id);
  print_r($requests);
    foreach ($requests as $request ) {
       if($counter % $requests_per_row == 0) {
        echo "<div class=\"row services_inner\">";
      }}
      ?>

        <div class="col-lg-4">
          <div class="services_item">
            <a><h4> <?php echo $request->getId(); ?> </h4></a>
            <p><?php echo $request->getStatus(); ?></p>
            <p><?php echo $request->getStatus(); ?></p>
          </div>
      </div>

    <?php
     $counter++;
     if($counter % $requests_per_row == 0) {
       echo "</div>";
     }

  ?>

  </div>
