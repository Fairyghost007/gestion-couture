<?php
require_once("../model/type.model.php");

if(isset($_REQUEST['action'])){
    if($_REQUEST['action']=="liste-type"){
        listerType();
    }elseif($_REQUEST['action']=="form-type"){
        chargerFormulaireType();
    }elseif($_REQUEST['action']=="save-type" && $_REQUEST['controller']=="type"){
        
        unset($_REQUEST['action']);
        unset($_REQUEST['btnSaveType']);
        array_pop($_REQUEST);
        storeType($_REQUEST);
        header("Location: " . WEBROOT . "/?controller=type&action=liste-type");
        exit();
    }

}else{
    listerType();
}
    
    
    function listerType():void{
        
        $types=findAllType();
        require_once("../views/type/liste.html.php");
    }

    function chargerFormulaireType():void{
        require_once("../views/type/form.html.php");
    }

    function storeType(array $type):void{
        saveType($type);
       
        
    }

    function getArticleById(int $id){
        

    }