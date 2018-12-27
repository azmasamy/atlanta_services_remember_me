<?php
$page = "dashboard";
require_once('../../../private/initialize.php');
require_header($page);
deny_user_access();
deny_client_access();
?>
<section class="services_area p_120">
  <div class="container">
    <div class="main_title">
      <h2>Services</h2>
    </div>
<div class="container">
  <a href="new.php">New Service</a>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Descriprion</th>
        <th scope="col">Price</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
        <th scope="col">Icon</th>
        <th scope="col">Choose Action</th>
      </tr>
      <?php
      //Get all categories from database
      $services = Service::find_all();
      if(!empty($services)){
      foreach ($services as $service) {
        echo "<tr>";
        echo "<td>".$service->getId()."</td>";
        echo "<td>".$service->getName()."</td>";
        echo "<td>".$service->getDescription()."</td>";
        echo "<td>".$service->getPrice()."</td>";
        echo "<td>".$service->getCreatedAt()."</td>";
        echo "<td>".$service->getUpdatedAt()."</td>";
        echo "<td>".$service->getIcon()."</td>";
        echo "<td>"
        ."<a href='view.php?id={$service->getId()}'>". "View" ."</a>"
        ."<a href='edit.php?id={$service->getId()}'>". "  - Edit" ."</a>"
        ."<a href='delete.php?id={$service->getId()}' "
        ."onclick='return confirm(\"Are you sure?\")' >". "  -  Delete" ."</a>"
        ."</td>";
        echo "</tr>";
        //print_r($cat);
      }
    }
    else {
      echo "<br>";
      echo "No Service to be shown";
    }


      ?>

    </thead>


  </div>
  <script type="text/javascript">
      $('.confirmation').on('click', function () {
          return confirm('Are you sure?');
      });
  </script>
</body>
</section>

</html>
