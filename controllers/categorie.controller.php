<?php
require_once("../model/categorie.model.php");

if(isset($_REQUEST['action'])){
    if($_REQUEST['action']=="liste-categorie"){
        unset($_REQUEST['action']);
        unset($_REQUEST['controller']);
        $page= $_REQUEST['page'];
        $debut=nbElementBypage*($_REQUEST['page']-1);
        listerCategorie($debut,$page);
    }elseif($_REQUEST['action']=="form-categorie"){
        chargerFormulaireCategorie();
    }elseif($_REQUEST['action']=="save-categorie"){
        unset($_REQUEST['action']);
        unset($_REQUEST['btnSaveCategorie']);
        var_dump($_REQUEST);
        storeCategorie($_REQUEST);
        header("location:".WEBROOT."/?controller=categorie&action=liste-categorie&page=1");
    }elseif($_REQUEST['action']=="deleteCategorie"){
        unset($_REQUEST['action']);
        unset($_REQUEST['controller']);
        removeCategorie($_REQUEST['id']);
        header("location:".WEBROOT."/?controller=categorie&action=liste-categorie&page=1");
        exit();
    } elseif($_REQUEST['action']=="updateCategorie"){
        unset($_REQUEST['action']);
        unset($_REQUEST['controller']);
        chargerFormulaireUpdateCategorie($_REQUEST['id']);
        exit();
    } elseif($_REQUEST['action']=="modifier-categorie"){
        var_dump($_REQUEST);
        unset($_REQUEST['action']);
        unset($_REQUEST['controller']);
        unset($_REQUEST['btnUpdateCategorie']);
        var_dump($_REQUEST);
        modifierCategorie($_REQUEST['id'], $_REQUEST);
        header("location:".WEBROOT."/?controller=categorie&action=liste-categorie&page=1");
        exit();
    }

}else{
    listerCategorie(0,1);
}
    
    
function listerCategorie(int $debut,$page): void {
    $categories = findAllCategorie($debut, nbElementBypage);
    require_once("../views/categories/liste.html.php");
}

function chargerFormulaireCategorie(): void {
    require_once("../views/categories/form.html.php");
}

function chargerFormulaireUpdateCategorie(int $id): void {
    $categorie = getCategorieById($id);
    require_once("../views/categories/update.form.html.php");
}

function storeCategorie(array $categorie): void {
    saveCategorie($categorie);
}

function getCategorieById(int $id): ?array
{
    return findCategorieById($id);
}

function removeCategorie(int $id): void
{
    deleteCategorie($id);
}

function modifierCategorie(int $id, array $categorie): void
{
    updateCategorie($id, $categorie);

}



///////////////////////////////////////

function nbrCategorie():int{
    return getNbrCategorie();
}

function numberofpageCategorie():int{
    // var_dump(nbrArticle());
    // var_dump(ceil(nbrArticle()/$nbArticleByPage));
    return $nbrPage=ceil(nbrCategorie()/nbElementBypage);

}