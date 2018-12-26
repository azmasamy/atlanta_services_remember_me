<?php $page = "dashboard";?>
<?php require_once('../../../private/initialize.php'); ?>
<?php require_once('../../../private/includes/user_header.php'); ?>

<?php
db_connect();
$args['id'] = $_GET['id'];
$service = new Service($args);

if($service->delete())
{
  header("Location: index.php" );
}
?>
