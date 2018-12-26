<?php
// Keep database credentials in a separate file
// 1. Easy to exclude this file from source code managers
// 2. Unique credentials on development and production servers
// 3. Unique credentials if working with multiple developers



$pass = true ;
if($pass = true){
  define("DB_SERVER", "localhost");
  define("DB_USER", "root");
  define("DB_PASS", "");
  define("DB_NAME", "atlanta_services");
}
else {
  define("DB_SERVER", "localhost");
  define("DB_USER", "root");
  define("DB_PASS", "machine1");
  define("DB_NAME", "atlanta_services");
}
?>
