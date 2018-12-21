<?php $selected = "admins";?>
<?php require_once('../../../private/initialize.php'); ?>
<?php require_once(INCLUDES_PATH.'/admin_header.php'); ?>
<?php
db_connect();
$args['id'] = $_GET['id'];

$admin = new Admin($args);

if($admin->delete())
{
  echo "Admin deleted Successfully";
  header("Location: index.php" );
}
?>
