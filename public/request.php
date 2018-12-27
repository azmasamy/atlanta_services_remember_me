<?php
$page = 'service';
require_once('../private/initialize.php');
require_header($page);
deny_user_access();
?>
<div class="container">

  <?php
  $user_id=($_SESSION['user_id']);
  //print_r($user_id);

  //this code to save data from html inside file
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $target_dir = "../../img/";
    //print_r($_FILES["fileToUpload"]);
    //die();
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {  // this function to save photo from target and move it to fil img
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }

    // this code to take form user and  save in database

    $name = basename( $_FILES["fileToUpload"]["name"]); // this function to give the photo the unreal name
    $args['name'] = $name;
    $args['user_id'] = $user_id;

    $request_args['user_id'] = $user_id;
    $request_args['service_id'] = $_POST['user_id'];
    $request_args['status'] = 'In Progress';

    // $user = User::find_by_id($user_id);
    // print_r($args);
    $docu = new UserDocuments($args);
    $request = new Requests($request_args);
    //print_r($request);

    if($docu->create()) {
      echo '<br>';
      echo "Documents Added Successfully";
      echo '<br>';
      if($request->create()) {
      echo "Requset Created Successfully";
      echo '<br>';
}
      else
      echo "Request Not created";
      echo '<br>';
      die("");

    } else
    echo "Not Added";
    die("");


  }
  ?>

  <form role="form"  action="request.php" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="form-group col-lg-4 ">
        <label for="code">Image</label>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="hidden" name="user_id" id="user_id" value=" <?php echo $_GET['id']; ?>">
      </div>
    </div>
    <div class="row">
      <div class="form-group col-lg-1 ">
        <input class="btn btn-primary"  type="submit" name="submit" value="Add">
      </div>
    </div>
  </div>
</form>
</div>
