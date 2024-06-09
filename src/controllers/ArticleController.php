<?php
namespace App\Controllers;
use App\Model\ArticleModel;
use App\Model\TypeModel;
use App\Model\CategorieModel;
use App\Core\Controller;
use App\Core\Autorisation;
use App\Core\Validator;
use App\Core\Session;

class ArticleController extends Controller {
    private ArticleModel $articleModel;
    private CategorieModel $categorieModel;
    private TypeModel $typeModel;

    public function __construct() {
        parent::__construct();
        if(!Autorisation::isConnect()){
            $this->redirectToRoute("controller=security&action=show-form-connexion");
        }
        $this->articleModel = new ArticleModel();
        $this->categorieModel = new CategorieModel();
        $this->typeModel = new TypeModel();
        $this->load();
        
    }

    public function load(): void {
        if (isset($_REQUEST['action'])) {
            if ($_REQUEST['action'] == "liste-article") {
                unset($_REQUEST['action']);
                unset($_REQUEST['controller']);
                $page = $_REQUEST['page'];
                $debut = nbElementBypage * ($_REQUEST['page'] - 1);
                $this->listerArticle($debut, $page);
            } elseif ($_REQUEST['action'] == "form-article") {
                $this->chargerFormulaireArticle();
            } elseif ($_REQUEST['action'] == "save-article") {
                // var_dump($_REQUEST);
                unset($_REQUEST['action']);
                unset($_REQUEST['btnSave']);
                $this->storeArticle($_REQUEST);
            } elseif ($_REQUEST['action'] == "delete") {
                unset($_REQUEST['action']);
                // var_dump($_REQUEST['id']);
                $this->removeArticle($_REQUEST['id']);
                $this->redirectToRoute("controller=article&action=liste-article&page=1");
            } elseif ($_REQUEST['action'] == "update") {
                unset($_REQUEST['action']);
                // var_dump($_REQUEST['id']);
                $this->chargerFormulaireUpdateArticle($_REQUEST['id']);
            } elseif ($_REQUEST['action'] == "modifier") {
                unset($_REQUEST['action']);
                unset($_REQUEST['btnUpdateArticle']);
                // var_dump($_REQUEST['id']);
                // var_dump($_REQUEST);
                $this->modifierArticle($_REQUEST['id'], $_REQUEST);
                $this->redirectToRoute("controller=article&action=liste-article&page=1");
            }
        } else {
            $this->listerArticle(0, 1);
        }
    }

    public function listerArticle($debut, $page): void {
        $this->renderView("articles/liste", ['articles' => $this->articleModel->findAll($debut, nbElementBypage), 'page' => $page]);
    }

    public function chargerFormulaireArticle(): void {
        $categories = $this->categorieModel->findAll();
        $types = $this->typeModel->findAll();
        $this->renderView("articles/form", ['categories' => $categories, 'types' => $types]);
    }

    public function chargerFormulaireUpdateArticle(int $id): void {
        $article = $this->articleModel->findElementById($id);
        $categories = $this->categorieModel->findAll();
        $types = $this->typeModel->findAll();
        $this->renderView("articles/update.form", ['article' => $article, 'categories' => $categories, 'types' => $types]);
    }

    public function storeArticle(array $article): void {
        
        Validator::isEmpty($article["libelle"], "libelle");
        if (!Validator::isEmpty($article["qteStock"], "qteStock")) {
            Validator::isPositif($article["qteStock"], "qteStock");
        }
        if (!Validator::isEmpty($article["prixAppro"], "prixAppro")) {
            Validator::isPositif($article["prixAppro"], "prixAppro");
        }
    
        if (!Validator::isValide()) {
            Session::addSession("errors", Validator::$errors);
            $this->redirectToRoute("controller=article&action=form-article");
            return;
        }

        $existingArticle = $this->articleModel->findByLibelle($article["libelle"]);

        if ($existingArticle) {
            Validator::addError("libelle", "Ce libelle existe déjà");
            Session::addSession("errors", Validator::$errors);
            $this->redirectToRoute("controller=article&action=form-article");
            return;
        } else {
            $this->articleModel->save($article);
        }

        $this->redirectToRoute("controller=article&action=liste-article&page=1");
    }
    

    

    public function getArticleById(int $id): ?array {
        return $this->articleModel->findElementById($id);
    }

    public function removeArticle(int $id): void {
        $this->articleModel->delete($id);
    }

    public function modifierArticle(int $id, array $article): void {
        Validator::isEmpty($article["libelle"], "libelle");
        if (!Validator::isEmpty($article["qteStock"], "qteStock")) {
            Validator::isPositif($article["qteStock"], "qteStock");
        }
        if (!Validator::isEmpty($article["prixAppro"], "prixAppro")) {
            Validator::isPositif($article["prixAppro"], "prixAppro");
        }
    
        if (!Validator::isValide()) {
            Session::addSession("errors", Validator::$errors);
            $this->redirectToRoute("controller=article&action=update&id=$id");
            return;
        }
    
        $existingArticle = $this->articleModel->findByLibelle($article["libelle"]);
    
        if ($existingArticle && $existingArticle["id"] != $id) {
            Validator::addError("libelle", "Ce libelle existe déjà");
            Session::addSession("errors", Validator::$errors);
            $this->redirectToRoute("controller=article&action=update&id=$id");
            return; 
        }
    
        $this->articleModel->update($id, $article);
    
        $this->redirectToRoute("controller=article&action=liste-article&page=1");
    }
    

    public function nbrArticle(): int {
        return $this->articleModel->getNbrOfElement();
    }

    public function numberofpageArticle(): int {
        return ceil($this->nbrArticle() / nbElementBypage);
    }
}

?>
