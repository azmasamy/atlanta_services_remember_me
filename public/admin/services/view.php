<?php
$page = "dashboard";
require_once('../../../private/initialize.php');
require_header($page);
deny_user_access();
deny_client_access();
?>

<div class="container">
  <a href="index.php"> All categories  </a>
</br>

<table class="table">
  <?php

  $cat = Category::find_by_id($_GET['id']);

  echo "<h3> ID: {$cat->getID()}</h3>";

  echo "<h3> Name: {$cat->getName()}</h3>";

  echo "<h3> Photo </h3>";
  echo "<img height='100' width='100' src ='../../img/".$cat->getPhoto()."'></img>";

  ?>

</table>



</div>

</body>
</html>
