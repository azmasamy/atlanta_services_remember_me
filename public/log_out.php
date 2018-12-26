<?php $page = "out";?>
<?php require_once('../private/initialize.php'); ?>


<?php
$session->logout();
redirect_to('sign_in.php');
?>
