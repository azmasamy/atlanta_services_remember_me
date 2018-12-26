<?php
$page = "dashboard";
require_once('../../../private/initialize.php');
require_header($page);
deny_user_access();
deny_client_access();
?>

<div class="container">
  <a href="index.php"> All Services  </a>
</br>

<table class="table">
  <?php

  $service = Service::find_by_id($_GET['id']);


  echo "<h3> Name: {$service->getName()}</h3>";

  echo "<h3> Description: {$service->getDescription()}</h3>";

  echo "<h3> Price: {$service->getPrice()}</h3>";

  echo "<h3> Created At: {$service->getCreatedAt()}</h3>";

  echo "<h3> Updated At: {$service->getUpdatedAt()}</h3>";


  echo "<h3> Icon </h3>";
  echo "<img height='100' width='100' src ='../../img/".$service->getIcon()."'></img>";

  ?>

</table>



</div>

</body>
</html>
