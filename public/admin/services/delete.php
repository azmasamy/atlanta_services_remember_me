<?php
$page = "dashboard";
require_once('../../../private/initialize.php');
require_header($page);
deny_user_access();
deny_client_access();
?>
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
