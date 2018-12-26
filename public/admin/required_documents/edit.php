
<?php $selected = "cats";?>
<?php require_once('../../../private/initialize.php'); ?>
<?php require_once(INCLUDES_PATH.'/admin_header.php'); ?>

<div class="container">
  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //Upload
    if($_FILES["fileToUpload"]["name"] !==''){
      $target_dir = "../../img/";
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
    $name = $_POST['category_name'];
    $img = '';
    if($_FILES["fileToUpload"]["name"] !== ''){
      $img = basename( $_FILES["fileToUpload"]["name"]);//$_POST['category_photo'];
    }else{
      $img = $_POST['category_image'];
    }
    $cat_id = $_POST['category_id'];

    $args['name'] = $name;
    $args['photo'] = $img;
    $args['id'] = $cat_id;
    $cat = new Category($args);

    if($cat->update())
    {echo "Category updated Successfully";
      header("Location: index.php" );
    }
    else
    echo "Not created";
    die("");
  }//End handling POST request

  ?>
  <?php
  //get the category information related to the id sent

  $cat = Category::find_by_id($_GET['id']);
  //print_r($cat);
  //die("HH");
  ?>
  <form role="form"  action="edit.php" method="post" enctype="multipart/form-data">

    <input type="hidden" name="category_id" value="<?php echo $cat->getId() ?>" />
    <input type="hidden" name="category_image" value="<?php echo $cat->getPhoto() ?>"/>

    <div class="row">
      <div class="form-group col-lg-4">
        <label for="code">Category Name:</label>
        <input type="text" name="category_name" value="<?php echo $cat->getName() ?>" class="form-control" />
      </div>
    </div>
    <div class="row">
      <div class="form-group col-lg-4 ">
        <label for="code">Image</label></br>
        <img height='100' width='100' src="<?php echo "../../img/".$cat->getPhoto() ?>"> </img>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-lg-4 ">
        <input type="file" name="fileToUpload" id="fileToUpload" value="<?php echo $cat->getPhoto() ?>">
      </div>
    </div>
    <div class="row">
      <div class="form-group col-lg-1 ">
        <input class="btn btn-primary"  type="submit" name="submit" value="Edit">
      </div>
    </div>
  </div>


</form>
</div>
