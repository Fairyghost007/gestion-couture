<?php
require_once("../model/type.model.php");

if (isset($_REQUEST['action'])) {
    if ($_REQUEST['action'] == "liste-type") {
        unset($_REQUEST['action']);
        unset($_REQUEST['controller']);
        $page= $_REQUEST['page'];
        $debut=nbElementBypage*($_REQUEST['page']-1);
        listerType($debut,$page);
        
    } elseif ($_REQUEST['action'] == "form-type") {
        chargerFormulaireType();
    } elseif ($_REQUEST['action'] == "save-type") {

        unset($_REQUEST['action']);
        unset($_REQUEST['btnSaveType']);
        array_pop($_REQUEST);
        storeType($_REQUEST);
        header("Location: " . WEBROOT . "/?controller=type&action=liste-type&page=1");
        exit();
    } elseif ($_REQUEST['action'] == "deleteType") {
        unset($_REQUEST['action']);
        unset($_REQUEST['controller']);
        var_dump($_REQUEST['id']);
        removeType($_REQUEST['id']);
        header("Location: " . WEBROOT . "/?controller=type&action=liste-type&page=1");
        exit();
    } elseif ($_REQUEST['action'] == "updateType") {
        unset($_REQUEST['action']);
        unset($_REQUEST['controller']);
        var_dump($_REQUEST['id']);
        var_dump($_REQUEST);
        chargerFormulaireUpdateType($_REQUEST['id']);
        exit();
    } elseif ($_REQUEST['action'] == "modifier-type") {
        unset($_REQUEST['action']);
        unset($_REQUEST['controller']);
        unset($_REQUEST['btnUpdateType']);
        var_dump($_REQUEST);
        modifierType($_REQUEST['id'], $_REQUEST);
        header("Location: " . WEBROOT . "/?controller=type&action=liste-type&page=1");
        exit();
    }
} else {
    listerType(0,1);
}


function listerType(int $debut,$page): void{

    $types = findAllType($debut, nbElementBypage);
    require_once("../views/type/liste.html.php");
}


function chargerFormulaireType(): void
{
    require_once("../views/type/form.html.php");
}

function chargerFormulaireUpdateType(int $id): void
{
    $type = getTypeById($id);
    var_dump($type);
    require_once("../views/type/update.form.html.php");
}

function storeType(array $type): void
{
    saveType($type);
}

function removeType(int $id): void
{
    // $type = getTypeById($id);
    // var_dump($type);
    deleteType($id);
}

function modifierType(int $id, array $type): void
{
    updateType($id, $type);
}

function getTypeById(int $id): ?array
{
    return findTypeById($id);
}



///////////////////////////////////////

function nbrType():int{
    return getNbrType();
}

function numberofpageType():int{
    // var_dump(nbrArticle());
    // var_dump(ceil(nbrArticle()/$nbArticleByPage));
    return $nbrPage=ceil(nbrType()/nbElementBypage);

}
