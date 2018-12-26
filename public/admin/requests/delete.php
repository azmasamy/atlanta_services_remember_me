<?php
$page = "dashboard";
require_once('../../../private/initialize.php');
require_header($page);
deny_user_access();
deny_client_access();
?>

<?phps
db_connect();
$args['id'] = $_GET['id'];
$req = new Requests($args);

if($req->delete())
{
  echo "Requste deleted Successfully";
  header("Location: index.php" );
}
?>
