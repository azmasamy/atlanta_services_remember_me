<?php $page = "dashboard";?>

<?php require_once('../../../private/initialize.php'); ?>
<?php require_once('../../../private/includes/user_header.php'); ?>
<div class="container">
  <a href="new.php">New Document</a>
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
