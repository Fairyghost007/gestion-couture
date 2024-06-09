<?php
namespace App\core;

use App\API\ArticleController as APIArticleController;
use App\API\CategorieController as APICategorieController;
use App\API\TypeController as APITypeController;
use App\Controllers\ArticleController;
use App\Controllers\CategorieController;
use App\Controllers\SecurityController;
use App\Controllers\TypeController;

class Routeur
{
    public static function run()
    {
        if (isset($_REQUEST['controller'])) {
            if ($_REQUEST['controller'] == "article") {
                // require_once "../src/controllers/ArticleController.php";
                $controller =new ArticleController();
            } elseif ($_REQUEST['controller'] == "type") {
                // require_once("../src/controllers/TypeController.php");
                $controller =new TypeController();
            } elseif ($_REQUEST['controller'] == "categorie") {
                // require_once("../src/controllers/CategorieController.php");
                $controller =new CategorieController();
            }elseif ($_REQUEST['controller'] == "security") {
                // require_once("../src/controllers/SecurityController.php");
                $controller =new SecurityController();
            }elseif ($_REQUEST['controller'] == "api-type") {
                // require_once("../src/controllers/SecurityController.php");
                $controller =new APITypeController;
            }elseif ($_REQUEST['controller'] == "api-categorie") {
                // require_once("../src/controllers/SecurityController.php");
                $controller =new APICategorieController;
            }elseif ($_REQUEST['controller'] == "api-article") {
                // require_once("../src/controllers/SecurityController.php");
                $controller =new APIArticleController;
            }
        } else {
            // require_once("../src/controllers/SecurityController.php");
            $controller =new SecurityController();
        }
    }
}
