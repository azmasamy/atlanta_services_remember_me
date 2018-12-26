

<?php
$page = 'dashboard';
require_once('../../../private/initialize.php');
require_header($page);
deny_user_access();
deny_client_access();
deny_admin_access();
?>
<!--================Services Area =================-->
<section class="services_area p_120">
  <div class="container">
    <div class="main_title">
      <h2>Staff</h2>
    </div>
    <a href="new.php">New Admin</a>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Username</th>
          <th scope="col">Created</th>
          <th scope="col">Updated</th>
          <th scope="col">Email</th>
          <th scope="col">Operations</th>
        </tr>
        <?php
        //Get all categories from database
        $admins = User::find_all_admins();
        if(!empty($admins)) {
          foreach ($admins as $admin) {
            echo "<tr>";
            echo "<td>".$admin->getFullname()."</td>";
            echo "<td>".$admin->getUsername()."</td>";
            echo "<td>".$admin->getCreatedAt()."</td>";
            echo "<td>".$admin->getUpdatedAt()."</td>";
            echo "<td>".$admin->getEmail()."</td>";
            echo "<td>"
            ."<a href='delete.php?id={$admin->getId()}' "
            ."onclick='return confirm(\"Are you sure?\")' >". " -  Delete -" ."</a>"
            ."</td>";
            echo "</tr>";
          }
        } else {
          echo "No admins to be shown";
        }
        ?>

      </thead>
    </table>
  </div>

</section>
<!--================End Services Area =================-->
