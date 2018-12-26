
<?php
$page = "dashboard";
php require_once('../../../private/initialize.php');
php require_header($page);
deny_user_access();
deny_client_access();
?>

<div class="container">
  <?php

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $target_dir = "../../img/";
    //print_r($_FILES["fileToUpload"]);
    //die();
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        echo "<br>";
      } else {
        echo "Sorry, there was an error uploading your file.";
        echo "<br>";
      }
    }
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $img = basename( $_FILES["fileToUpload"]["name"]);

    $args['name'] = $name;
    $args['description'] = $description;
    $args['price'] = $price;
    $args['category'] = $category;
    $args['photo'] = $img;
    $meal = new MenuItem($args);

    if($meal->create())
    echo "Meal Created Successfully";
    else
    echo "Meal Not created";
    die("");
  }

  ?>
  <form role="form" id='meal_form'  action="new.php" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="form-group col-lg-4">
        <label for="code">Meal Name:</label>
        <input type="text" name="name" class="form-control" />
        <br>

        <label for="code">Meal Description:</label>
        <textarea name="description" class="form-control"></textarea>
        <br>

        <label for="code">Meal Price:</label>
        <input type="number" step="0.01" name="price" class="form-control" />
        <br>

        <label for="code">Meal Category:</label>
        <br>
        <select name="category"  class="form-control">
          <?php
            $cats = Category::find_all();
            foreach ($cats as $cat) {
              echo "<option value=\"" . $cat->getID() . "\">" . $cat->getName() . "</option>";
            }
          ?>
        </select>
        <br>

      </div>
    </div>
    <div class="row">
      <div class="form-group col-lg-4 ">
        <label for="code">Meal Image</label>
        <input type="file" name="fileToUpload" id="fileToUpload">
      </div>
    </div>
    <br>
    <div class="row">
      <div class="form-group col-lg-1 ">
        <input class="btn btn-primary"  type="submit" name="submit" value="Add">
      </div>
    </div>
  </div>


</form>
</div>
