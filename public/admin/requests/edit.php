<?php
$page = "dashboard";
require_once('../../../private/initialize.php');
require_header($page);
deny_user_access();
deny_client_access();
?>

<div class="container">
  <?php

  if(is_get_request()) {
    $requ = Requests::find_by_id($_GET['id']);
  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $status = $_POST['Status'];
    $id = $_POST['id'];

    //insert data comes from user inside the array
    $args['status'] = $status;
    $args['id'] = $id;


    //convert data and inserted>> from array to object

    $reqs = new Requests($args);

    if($reqs->update()){
      echo "status updated Successfully";
    }
    else {
    echo "Not Updated";
    die("");
  }
}

  ?>

<form role="form"  action="edit.php" method="post">
    <input type="hidden" name="id" value="<?php echo $requ->getId() ?>" />

    <div class="row">
      <div class="form-group col-lg-4">
        <label for="code"> Status:</label>

          <select name="Status" class="form-control">
             <option value="Completed" <?php if($requ->getStatus() === 'Completed'){echo"selected";} ?>>Completed</option>
             <option value="In Progress"<?php if($requ->getStatus() === 'In Progress'){echo"selected";} ?> >In Progress</option>
             <option value="Received" <?php if($requ->getStatus() === 'Received'){echo"selected";} ?>>Received</option>
             <option value="On Hold" <?php if($requ->getStatus() === 'On Hold'){echo"selected";} ?>>On Hold</option>
          </select>

      </div>
    </div>

    <div class="row">
      <div class="form-group col-lg-1 ">
        <input class="btn btn-primary"  type="submit" name="submit" value="Edit">
      </div>
    </div>
  </div>

    </form>


          <?php

            $reque = Requests::find_all();
            //print_r($reque);
            foreach ($reque as $reque) {
              echo "<option value=\"" . $reque->getID() . "\"";
              if($reque->getID() == $reque->getStatus())
              echo "selected";
              // echo ">" . $reque->getName() . "</option>";
            }
          ?>
        </select>
      </div>
    </div>
</form>
</div>
