<?php
$page = 'dashboard';
require_once('../../../private/initialize.php');
deny_user_access();
deny_client_access();
deny_admin_access();
?>
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
