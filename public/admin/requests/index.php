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
      <h2>Required Documents</h2>
    </div>
<div class="container">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">created_at</th>
        <th scope="col">updated_at</th>
        <th scope="col">status</th>
        <th scope="col">user_Name</th>
        <th scope="col">service_Name</th>
        <th scope="col">Operations</th>
      </tr>
      <?php
      //Get all Request from database
      $req = Requests::find_all();

      if(empty($req)) {
        die("No Requests to be displayed");
      }
      foreach ($req as $request) {

        $user = User::find_by_id($request->getUser_id());
        $service = Service::find_by_id($request->getService_id());
        echo "<tr>";
        // echo "<td>".$request->getId()."</td>";
        echo "<td>".$request->getCreated_at()."</td>";
        echo "<td>".$request->getUpdated_at()."</td>";
        echo "<td>".$request->getStatus()."</td>";

        echo "<td>".$user->getUsername()."</td>";
        echo "<td>".$service->getName()."</td>";
        echo "<td>"
        ."<a href='view.php?id={$request->getId()}'>". "View" ."</a>"
        ."<a href='edit.php?id={$request->getId()}'>". "  - Edit" ."</a>"
        ."<a href='delete.php?id={$request->getId()}' "
        ."onclick='return confirm(\"Are you sure?\")' >". "  -  Delete" ."</a>"
        ."</td>";
        echo "</tr>";

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
