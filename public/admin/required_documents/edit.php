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

    $name = $_POST['name'];

  $description = $_POST['description'];
    $id = $_POST['id'];

    $args['id'] = $id;
    $args['name'] = $name;
    $args['description'] = $description;
    $doc = new RequiredDocuments($args);

    if($doc->update())
    {echo "document updated Successfully";
      //header("Location: index.php" );
    }
    else
    echo "Not updated";
    die("");
  }//End handling POST request

  ?>
  <?php
  //get the category information related to the id sent

  $doc = RequiredDocuments::find_by_id($_GET['id']);
  //print_r($cat);
  //die("HH");
  ?>
  <br>
  <form class="row contact_form" action="edit.php" method="post"  enctype="multipart/form-data" novalidate="novalidate">
    <input type="hidden" name="id" value="<?php echo $doc->getId() ?>" />
        <div class="col-md-6">
          <div class="single-footer-widget">
            <div class="form-group">

              <input required type="text" class="form-control" id="name" name="name" value="<?php echo $doc->getName() ?>">
            </div>
          </div>
        </div>
        <div class="col-md-6">
         <div class="single-footer-widget">
            <div class="form-group">

              <input required type="textarea" class="form-control" id="description" name="description"  value="<?php echo $doc->getDescription() ?>" >
            </div>
          </div>
        </div>
          <div class="col-md-12 text-right">
            <button type="submit" value="submit" class="btn submit_btn">UPDATE DOCUMENT</button>
          </div>
        </form>

</div>
