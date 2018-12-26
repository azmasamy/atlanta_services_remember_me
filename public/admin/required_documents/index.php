<?php
$page = "dashboard";
require_once('../../../private/initialize.php');
require_header($page);
deny_user_access();
deny_client_access();
?>
<div class="container">
  <a href="new.php">New Document</a>
  <br>
  <table class="table">
    <thead>
      <tr>


        <th scope="col">name</th>
        <th scope="col">description</th>
        <th scope="col">options</th>
      </tr>
      <?php
      //Get all categories from database
      $documents = RequiredDocuments::find_all();
      if(!empty($admins)) {

      foreach ($documents as $doc) {
        echo "<tr>";

        echo "<td>".$doc->getName()."</td>";
        echo "<td>".$doc->getDescription()."</td>";
        echo "<td>"

        ."<a href='edit.php?id={$doc->getId()}'>". "   Edit" ."</a>"
        ."<a href='delete.php?id={$doc->getId()}' "
        ."onclick='return confirm(\"Are you sure?\")' >". "  -  Delete" ."</a>"
        ."</td>";
        echo "</tr>";
        //print_r($cat);
      }
    } else {
      echo "No required documents to be shown";
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
