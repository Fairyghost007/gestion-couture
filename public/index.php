<?php
define("WEBROOT","http://localhost:8010");
define('nbElementBypage', 5);


//--------//ROUTEUR//---------//
// require_once("../views/layout/base.layout.php");
require_once("../core/routeur.php");
$routeur=new routeur;
$routeur::run();



