
<?php require_once('../../../private/initialize.php'); ?>
<?php require_once(INCLUDES_PATH.'/admin_header.php'); ?>
<?php
db_connect();
$args['id'] = $_GET['id'];
$meal = new MenuItem($args);

if($meal->delete())
{
  echo "Meal deleted Successfully";
  header("Location: index.php" );
}
?>
