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
$doc = new RequiredDocuments($args);

if($doc->delete())
{
  echo "doument deleted Successfully";
//  header("Location: index.php" );
}
?>
