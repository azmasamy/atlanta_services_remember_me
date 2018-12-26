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

    $imageInformation = getimagesize($_FILES['fileToUpload']['tmp_name']);
    $imageWidth = $imageInformation[0];
    $imageHeight = $imageInformation[1];
if($imageWidth == 90 && $imageHeight == 90)
{
    if($_FILES["fileToUpload"]["name"] !==''){

      $target_dir = "../../img/icon/";
      $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      // Check if image file is a actual image or fake image
      if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
        } else {
          echo "File is not an image.";
          $uploadOk = 0;
        }

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
          echo "Sorry, there was an error uploading your file.";
        }
      }
    }
  }
  else {
    echo "The photo is not in correct size (90 * 90)";
    echo "<br>";
     echo "Service Not Updated";
    exit();

  }

    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $icon = '';
    if($_FILES["fileToUpload"]["name"] !== ''){
      $icon = basename( $_FILES["fileToUpload"]["name"]);//$_POST['category_photo'];
    }else{
      $icon = $_POST['icon'];
    }


    $args['id'] = $id;
    $args['name'] = $name;
    $args['description'] = $description;
    $args['price'] = $price;
    $args['icon'] = $icon;
    $service = new Service($args);

    if($service->update())
    {
      echo "Service updated Successfully";
      header("Location: index.php" );
    }
    else
    echo "Not created";
    die("");
  }//End handling POST request

  ?>
  <?php
  //get the category information related to the id sent

  $service = Service::find_by_id($_GET['id']);
  //print_r($cat);
  //die("HH");
  ?>
  <section class="contact_area p_120">
    <div class="container">
    <div class="row">
      <div class="col-lg-3">
      </div>
      <div class="col-lg-9">
        <form class="row service_form" action="edit.php" method="post" enctype="multipart/form-data">
          <div class="col-md-6">
            <input type="hidden" name="id" value="<?php echo $service->getId() ?>" />
            <div class="form-group">
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter New service name">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="decription" name="description" placeholder="Enter New description">
            </div>
            <div class="form-group">
              <input type="number" class="form-control" id="price" name="price" placeholder="Enter New price">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group col-lg-4 ">
              <label for="code">Image</label>
              <input type="file" name="fileToUpload" id="fileToUpload">
            </div>
          </div>
          <div class="col-md-12 text-right">
            <button type="submit" name= "submit" value="submit" class="btn submit_btn">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  </section>

</div>
