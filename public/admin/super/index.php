<?php $selected = "admins";?>
<?php require_once('../../../private/initialize.php'); ?>
<?php require_once(INCLUDES_PATH.'/admin_header.php'); ?>
<div class="container">
  <a href="new.php">New Admin</a>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">Operations</th>
      </tr>
      <?php
      //Get all categories from database
      $admins = Admin::find_all();
      foreach ($admins as $admin) {
        echo "<tr>";
        echo "<td>".$admin->getId()."</td>";
        echo "<td>".$admin->getFullname()."</td>";
        echo "<td>".$admin->getUsername()."</td>";
        echo "<td>".$admin->getEmail()."</td>";
        echo "<td>"
        ."<a href='edit.php?id={$admin->getId()}'>". "  Edit " ."</a>"
        ."<a href='delete.php?id={$admin->getId()}' "
        ."onclick='return confirm(\"Are you sure?\")' >". " -  Delete" ."</a>"
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
