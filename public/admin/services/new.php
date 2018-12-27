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

    $target_dir = "../../img/icon/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

          $name = $_POST['name'];
          $description = $_POST['description'];
          $price = $_POST['price'];
          $img = basename( $_FILES["fileToUpload"]["name"]);

          $args['name'] = $name;
          $args['description'] = $description;
          $args['price'] = $price;
          $args['icon'] = $img;
          $service = new Service($args);

    if(empty($name) || empty($description) || empty($price) || empty($imageInformation) && trim($name) == '' && trim($description) == '' && trim($price) == '' && trim($imageInformation) == '')
    {
      echo "<br>";
       echo "You did not fill out all the required fields.";
       echo "<br>";
       echo "Service Not Created";
       die("");
    } else {
      $imageInformation = getimagesize($_FILES['fileToUpload']['tmp_name']);
      $imageWidth = $imageInformation[0];
      $imageHeight = $imageInformation[1];
  if($imageWidth == 90 && $imageHeight == 90)
  {
    if(isset($_POST["submit"])) {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
  }
  else{
    echo "The photo is not in the correct size (90 * 90)";
    echo "<br>";
    echo "Service Not Created";
    exit();
  }

    if($service->create())
    echo "Service Created Successfully";
    else
    echo "Not created";
    die("");
  }




  // Check if image file is a actual image or fake image


    }

    ?>

  <section class="contact_area p_120">
    <div class="container">

    <div class="row">
      <div class="col-lg-3">
      </div>
      <div class="col-lg-9">
        <form class="row service_form" action="new.php" method="POST" enctype="multipart/form-data">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter service name">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="decription" name="description" placeholder="Enter description">
            </div>
            <div class="form-group">
              <input type="number" class="form-control" id="price" name="price" placeholder="Enter price">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group col-lg-4 ">
              <label for="code">Image</label>
              <input type="file" name="fileToUpload" id="fileToUpload">
            </div>
          </div>
          <div class="col-md-12 text-right">
            <button type="submit" name="submit" value="submit" class="btn submit_btn">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  </section>

</div>
