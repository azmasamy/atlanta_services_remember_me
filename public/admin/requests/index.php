<?php $selected = "meals";?>
<?php require_once('../../../private/initialize.php'); ?>
<?php require_once(INCLUDES_PATH.'/admin_header.php'); ?>
<div class="container">
  <a href="new.php">New Meal</a>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Descption</th>
        <th scope="col">Price</th>
        <th scope="col">Photo</th>
        <th scope="col">Category ID</th>
        <th scope="col">Operations</th>
      </tr>
      <?php
      //Get all meals from database
      $menu = MenuItem::find_all();
      if(empty($menu)) {
        die("No meals to be displayed");
      }
      foreach ($menu as $menuItem) {
        echo "<tr>";
        echo "<td>".$menuItem->getId()."</td>";
        echo "<td>".$menuItem->getName()."</td>";
        echo "<td>".$menuItem->getDecription()."</td>";
        echo "<td>".$menuItem->getPrice()."</td>";
        echo "<td>".$menuItem->getPhoto()."</td>";
        echo "<td>".$menuItem->getCategory()."</td>";
        echo "<td>"
        ."<a href='view.php?id={$menuItem->getId()}'>". "View" ."</a>"
        ."<a href='edit.php?id={$menuItem->getId()}'>". "  - Edit" ."</a>"
        ."<a href='delete.php?id={$menuItem->getId()}' "
        ."onclick='return confirm(\"Are you sure?\")' >". "  -  Delete" ."</a>"
        ."</td>";
        echo "</tr>";
        //print_r($cat);
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
</html>
