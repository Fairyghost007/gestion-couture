<?php
require_once("../model/article.model.php");
require_once("../model/categorie.model.php");
if(isset($_REQUEST['action'])){
    if($_REQUEST['action']=="liste-article"){
        listerArticle();
    }elseif($_REQUEST['action']=="form-article"){
        chargerFormulaire();
    }elseif($_REQUEST['action']=="save-article"){
        // chargerFormulaire();
        // var_dump($_REQUEST);
        unset($_REQUEST['action']);
        unset($_REQUEST['btnSave']);
        store($_REQUEST);
        listerArticle();
    }

}else{
    listerArticle();
}
    
    
    function listerArticle():void{
        
        $articles=findAll();
        require_once("../views/articles/liste.html.php");
    }

    function chargerFormulaire():void{
        $categories=findAllCategorie();
        $types=findAllType();
        require_once("../views/articles/form.html.php");
    }

    function store(array $article):void{
        save($article);
        // require_once("../views/articles/liste.html.php");
        // header("location:".WEBROOT."/?action=liste-article");
        
    }
?>