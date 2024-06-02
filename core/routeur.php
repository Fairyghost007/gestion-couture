<?php

class routeur
{
    public static function run()
    {
        if (isset($_REQUEST['controller'])) {
            if ($_REQUEST['controller'] == "article") {
                require_once("../controllers/article.controller.php");
                new ArticleController();
            } elseif ($_REQUEST['controller'] == "type") {
                require_once("../controllers/type.controller.php");
                new TypeController();
            } elseif ($_REQUEST['controller'] == "categorie") {
                require_once("../controllers/categorie.controller.php");
                new CategorieController();
            }
        } else {
            require_once("../controllers/article.controller.php");
            new ArticleController();
        }
    }
}
