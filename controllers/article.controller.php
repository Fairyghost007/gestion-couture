<?php
require_once("../model/article.model.php");
require_once("../model/categorie.model.php");
require_once("../model/type.model.php");

if (isset($_REQUEST['action'])) {
    if ($_REQUEST['action'] == "liste-article") {
        listerArticle();
    } elseif ($_REQUEST['action'] == "form-article") {
        chargerFormulaireArticle();
    } elseif ($_REQUEST['action'] == "save-article") {
        var_dump($_REQUEST);
        unset($_REQUEST['action']);
        unset($_REQUEST['btnSave']);
        storeArticle($_REQUEST);
        header("location:" . WEBROOT . "/?controller=article&action=liste-article");
        exit();
    } elseif ($_REQUEST['action'] == "delete") {
        unset($_REQUEST['action']);
        var_dump($_REQUEST['id']);
        removeArticle($_REQUEST['id']);
        header("location:" . WEBROOT . "/?controller=article&action=liste-article");
        exit();
    } elseif ($_REQUEST['action'] == "update") {
        unset($_REQUEST['action']);
        var_dump($_REQUEST['id']);
        chargerFormulaireUpdateArticle($_REQUEST['id']);
        exit();
    } elseif ($_REQUEST['action'] == "modifier") {
        unset($_REQUEST['action']);
        unset($_REQUEST['btnUpdateArticle']);
        var_dump($_REQUEST['id']);
        var_dump($_REQUEST);
        modifierArticle($_REQUEST['id'], $_REQUEST);
        header("location:" . WEBROOT . "/?controller=article&action=liste-article");
        exit();
    }
} else {
    listerArticle();
}


function listerArticle(): void
{

    $articles = findAll();
    require_once("../views/articles/liste.html.php");
}

function chargerFormulaireArticle(): void
{
    $categories = findAllCategorie();
    $types = findAllType();
    require_once("../views/articles/form.html.php");
}
function chargerFormulaireUpdateArticle(int $id): void
{
    $article = getArticleById($id);
    var_dump($article);
    $categories = findAllCategorie();
    $types = findAllType();
    require_once("../views/articles/update.form.html.php");
}

function storeArticle(array $article): void
{
    saveArticle($article);
}

function getArticleById(int $id): ?array
{
    return findArticleById($id);
}

function removeArticle(int $id): void
{
    deleteArticle($id);
}


function modifierArticle(int $id, array $article): void
{
    updateArticle($id, $article);

}
