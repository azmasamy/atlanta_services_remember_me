<?php $selected = "cats";?>
<?php require_once('../../../private/initialize.php'); ?>
<?php require_once(INCLUDES_PATH.'/admin_header.php'); ?>
<div class="container">
  <a href="new.php">New Category</a>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Photo</th>
        <th scope="col">Operations</th>
      </tr>
      <?php
      //Get all categories from database
      $cats = Category::find_all();
      foreach ($cats as $cat) {
        echo "<tr>";
        echo "<td>".$cat->getId()."</td>";
        echo "<td>".$cat->getName()."</td>";
        echo "<td>".$cat->getPhoto()."</td>";
        echo "<td>"
        ."<a href='view.php?id={$cat->getId()}'>". "View" ."</a>"
        ."<a href='edit.php?id={$cat->getId()}'>". "  - Edit" ."</a>"
        ."<a href='delete.php?id={$cat->getId()}' "
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
