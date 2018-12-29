<?php $page = "out";
require_once('../private/initialize.php');
?>


<?php
$session->logout();
spit_login_cookie();
redirect_to('sign_in.php');
?>
