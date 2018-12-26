
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
    $cats = Category::find_all();
    if(empty($cats)) {
      die("Please, enter at least 1 category first");
    }

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

    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $img = '';

    if($_FILES["fileToUpload"]["name"] !== ''){
      $img = basename( $_FILES["fileToUpload"]["name"]);//$_POST['category_photo'];
    }else{
      $img = $_POST['category_image'];
    }

    $args['id'] = $id;
    $args['name'] = $name;
    $args['description'] = $description;
    $args['price'] = $price;
    $args['category'] = $category;
    $args['photo'] = $img;
    $meal = new MenuItem($args);

    if($meal->update())
    {echo "Meal updated Successfully";
      header("Location: index.php" );
    }
    else
    echo "Not Updated";
    die("");
  }//End handling POST request

  ?>
  <?php
  //get the category information related to the id sent

  $meal = MenuItem::find_by_id($_GET['id']);
  //print_r($cat);
  //die("HH");
  ?>
  <form role="form"  action="edit.php" method="post" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?php echo $meal->getId() ?>" />
    <input type="hidden" name="photo" value="<?php echo $meal->getPhoto() ?>"/>

    <div class="row">
      <div class="form-group col-lg-4">
        <label for="code">Meal Name:</label>
        <input type="text" name="name" value="<?php echo $meal->getName() ?>" class="form-control" />
      </div>
    </div>

    <div class="row">
      <div class="form-group col-lg-4">
        <label for="code">Meal Description:</label>
          <textarea name="description" class="form-control"> <?php echo $meal->getDecription() ?></textarea>
      </div>
    </div>

    <div class="row">
      <div class="form-group col-lg-4">
        <label for="code">Meal Price:</label>
        <input type="number" name="price" step="0.01" value="<?php echo $meal->getPrice() ?>" class="form-control" />
      </div>
    </div>

    <div class="row">
      <div class="form-group col-lg-4">
        <label for="code">Meal Category:</label>
        <input type="number" name="category" value="<?php echo $meal->getCategory() ?>" class="form-control" />
        <br>
        <select name="category"  class="form-control">
          <?php
            $cats = Category::find_all();
            print_r($cats);
            foreach ($cats as $cat) {
              echo "<option value=\"" . $cat->getID() . "\"";
              if($cat->getID() == $meal->getCategory())
              echo "selected";
              echo ">" . $cat->getName() . "</option>";
            }
          ?>
        </select>
      </div>
    </div>

    <div class="row">
      <div class="form-group col-lg-4 ">
        <label for="code">Image</label></br>
        <img height='100' width='100' src="<?php echo "../../img/".$meal->getPhoto() ?>"> </img>
      </div>
    </div>

    <div class="row">
      <div class="form-group col-lg-4 ">
        <input type="file" name="fileToUpload" id="fileToUpload" value="<?php echo $meal->getPhoto() ?>">
      </div>
    </div>

    <div class="row">
      <div class="form-group col-lg-1 ">
        <input class="btn btn-primary"  type="submit" name="submit" value="Edit">
      </div>
    </div>


</form>

</div>
