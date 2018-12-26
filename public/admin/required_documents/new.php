<?php
$page = "dashboard";
require_once('../../../private/initialize.php');
require_header($page);
deny_user_access();
deny_client_access();
?>

<div class="container">
  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {



    // Check if image file is a actual image or fake image

    $name = $_POST['name'];
    $description = $_POST['description'];


    $args['name'] = $name;
    $args['description'] = $description;
    $doc = new RequiredDocuments($args);

    if($doc->create())
    echo "document Created Successfully";
    else
    echo "Not created";
    die("");
  }

  ?>

  <br>
  <form class="row contact_form" action="new.php" method="post"  novalidate="novalidate">
        <div class="col-md-6">
          <div class="single-footer-widget">
            <div class="form-group">

              <input required type="text" class="form-control" id="name" name="name" placeholder="Enter document name here">
            </div>
          </div>
        </div>
        <div class="col-md-6">
         <div class="single-footer-widget">
            <div class="form-group">

              <input required type="textarea" class="form-control" id="description" name="description" placeholder="Enter document description here">
            </div>
          </div>
        </div>
          <div class="col-md-12 text-right">
            <button type="submit" value="submit" class="btn submit_btn">CREATE DOCUMENT</button>
          </div>
        </form>
</div>
