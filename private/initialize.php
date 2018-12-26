<?php

$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT", $doc_root);


define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PROJECT_PATH . '/public');
define("IMAGES_PATH", PROJECT_PATH . '/public/img');
define("INCLUDES_PATH", PRIVATE_PATH . '/includes');
define("LOGIN_WWW_PATH", WWW_ROOT . "/admin/login.php");
define("MEALS_WWW_PATH", WWW_ROOT . "/meals.php");
define("CURRENT_WWW_PATH", $_SERVER['SCRIPT_NAME']);


require_once("database_functions.php");
require_once("functions.php");
require_once("models/Services.class.php");
//require_once("models/Session.class.php");

//$session = new Session();

//if(!$session->is_logged_in() && CURRENT_WWW_PATH != LOGIN_WWW_PATH && CURRENT_WWW_PATH != MEALS_WWW_PATH)
//redirect_to(WWW_ROOT.'/admin/login.php');

$db = db_connect();
Service::set_database($db);

//Category::set_database($db);
//MenuItem::set_database($db);
//Admin::set_database($db);


?>
