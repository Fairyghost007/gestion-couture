<?php
require_once("../model/type.model.php");

if(isset($_REQUEST['action'])){
    if($_REQUEST['action']=="liste-article"){
        listerArticle();
    }elseif($_REQUEST['action']=="form-article"){
        chargerFormulaire();
    }elseif($_REQUEST['action']=="save-article"){
        // chargerFormulaire();
        var_dump($_REQUEST);
        unset($_REQUEST['action']);
        unset($_REQUEST['btnSave']);
        store($_REQUEST);
        header("location:",WEBROOT,"?action=liste-article");
    }

}else{
    listerArticle();
}
    
    
    function listerType():void{
        
        $articles=findAllType();
        require_once("../views/types/liste.html.php");
    }

    function chargerFormulaire():void{
        $categories=findAllCategorie();
        $types=findAllType();
        require_once("../views/articles/form.html.php");
    }

    function store(array $type):void{
        save($type);
        
    }