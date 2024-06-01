<?php
define("WEBROOT","http://localhost:8010");
define('nbElementBypage', 5);
ob_start();
require_once("../views/sidebar.html.php");
require_once("../views/navbar.html.php");


if(isset($_REQUEST['controller'])){
    if($_REQUEST['controller']=="article"){
        require_once("../controllers/article.controller.php");
    }elseif($_REQUEST['controller']=="type"){
        require_once("../controllers/type.controller.php");
    }elseif($_REQUEST['controller']=="categorie"){
        require_once("../controllers/categorie.controller.php");
    }

}else{
    require_once("../controllers/article.controller.php");
}
ob_end_flush();
?>

