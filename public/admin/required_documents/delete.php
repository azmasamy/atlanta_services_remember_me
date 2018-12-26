<?php require_once('../../../private/initialize.php'); ?>
<?php require_once('../../../private/includes/user_header.php'); ?>
<?php
db_connect();
$args['id'] = $_GET['id'];
$doc = new RequiredDocuments($args);

if($doc->delete())
{
  echo "doument deleted Successfully";
//  header("Location: index.php" );
}
?>
