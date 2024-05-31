<?php
require_once("../model/categorie.model.php");

if(isset($_REQUEST['action'])){
    if($_REQUEST['action']=="liste-categorie"){
        listerCategorie();
    }elseif($_REQUEST['action']=="form-categorie"){
        chargerFormulaireCategorie();
    }elseif($_REQUEST['action']=="save-categorie"){
        unset($_REQUEST['action']);
        unset($_REQUEST['btnSaveCategorie']);
        var_dump($_REQUEST);
        storeCategorie($_REQUEST);
        header("location:".WEBROOT."/?controller=categorie&action=liste-categorie");
    }

}else{
    listerCategorie();
}
    
    
    function listerCategorie():void{
        
        $categories=findAllCategorie();
        require_once("../views/categories/liste.html.php");
    }

    function chargerFormulaireCategorie():void{
        require_once("../views/categories/form.html.php");
    }

    function storeCategorie(array $categorie):void{
        saveCategorie($categorie);
        
    }