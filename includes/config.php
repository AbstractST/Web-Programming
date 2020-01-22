<?php
ob_start();
session_start();
require_once('connection.php');
// define site path
define('DIR','http://localhost/medalje/');
// define admin site path
define('DIRADMIN','http://localhost/medalje/admin/');
// define site title for top of the browser
define('SITETITLE','Medalje');
//define include checker
define('included', 1);

require_once('functions.php');
?>
