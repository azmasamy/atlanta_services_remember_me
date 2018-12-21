
<?php require_once('../../../private/initialize.php'); ?>
<?php require_once(INCLUDES_PATH.'/admin_header.php'); ?>
<?php
db_connect();
$args['id'] = $_GET['id'];
$cat = new Category($args);

if($cat->delete())
{
  echo "Category deleted Successfully";
  header("Location: index.php" );
}
?>
