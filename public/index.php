<?php
define("WEBROOT","http://localhost:8010");
define('nbElementBypage', 5);
ob_start();
require_once("../views/sidebar.html.php");
require_once("../views/navbar.html.php");


//--------//ROUTEUR//---------//

require_once("../core/routeur.php");
$routeur=new routeur;
$routeur::run();

ob_end_flush();
?>

