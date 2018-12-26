<?php
$page = "dashboard";
require_once('../../../private/initialize.php');
require_header($page);
deny_user_access();
deny_client_access();
?>
<div class="container">
  <a href="index.php"> All Meals  </a>
</br>

<table class="table">
  <?php

  $meal = MenuItem::find_by_id($_GET['id']);

  echo "<h3> <b> ID: </b> {$meal->getID()}</h3>";
  echo "<h3> <b> Name: </b> {$meal->getName()}</h3>";
  echo "<h3> <b> Decription: </b> {$meal->getDecription()}</h3>";
  echo "<h3> <b> Price: </b> {$meal->getPrice()}</h3>";
  echo "<h3> <b> Category: </b> {$meal->getCategory()}</h3>";
  echo "<h3> <b> Photo </b> </h3>";
  echo "<img height='100' width='100' src ='../../img/".$meal->getPhoto()."'></img>";

  ?>

</table>



</div>

</body>
</html>
