<?php
require_once("../model/categorie.model.php");
require_once("../core/controller.php");

class CategorieController extends Controller {
    private CategorieModel $categorieModel;

    public function __construct() {
        parent::__construct();
        if(!Autorisation::isConnect()){
            $this->redirectToRoute("controller=security&action=show-form-connexion");
        }
        $this->categorieModel = new CategorieModel();
        $this->load();
    }

    public function load(): void {
        $this->layout="base";
        if (isset($_REQUEST['action'])) {
            if ($_REQUEST['action'] == "liste-categorie") {
                unset($_REQUEST['action']);
                unset($_REQUEST['controller']);
                $page = $_REQUEST['page'];
                $debut = nbElementBypage * ($_REQUEST['page'] - 1);
                $this->listerCategorie($debut, $page);
            } elseif ($_REQUEST['action'] == "save-categorie") {
                unset($_REQUEST['action']);
                unset($_REQUEST['btnSaveCategorie']);
                array_pop($_REQUEST);
                $this->storeCategorie($_REQUEST);
                $this->redirectToRoute("controller=categorie&action=liste-categorie&page=1");
                exit();
            } elseif ($_REQUEST['action'] == "deleteCategorie") {
                unset($_REQUEST['action']);
                unset($_REQUEST['controller']);
                $this->removeCategorie($_REQUEST['id']);
                $this->redirectToRoute("controller=categorie&action=liste-categorie&page=1");
                exit();
            } elseif ($_REQUEST['action'] == "updateCategorie") {
                unset($_REQUEST['action']);
                unset($_REQUEST['controller']);
                $this->chargerFormulaireUpdateCategorie($_REQUEST['id']);
                exit();
            } elseif ($_REQUEST['action'] == "modifier-categorie") {
                unset($_REQUEST['action']);
                unset($_REQUEST['controller']);
                unset($_REQUEST['btnUpdateCategorie']);
                $this->modifierCategorie($_REQUEST['id'], $_REQUEST);
                $this->redirectToRoute("controller=categorie&action=liste-categorie&page=1");
                exit();
            }
        } else {
            $this->listerCategorie(0, 1);
        }
    }

    public function listerCategorie(int $debut, int $page): void {
        $categories = $this->categorieModel->findAll($debut, nbElementBypage);
        $this->renderView("categories/liste", ['categories' => $categories, 'page' => $page]);
    }

    public function chargerFormulaireUpdateCategorie(int $id): void {
        $categorie = $this->categorieModel->findElementById($id);
        $this->renderView("categories/update.form", ['categorie' => $categorie]);
    }

    public function storeCategorie(array $categorie): void {
        Validator::isEmpty($categorie["nomCategorie"], "nomCategorie");
        if (Validator::isValide()) {
            $existingCategorie = $this->categorieModel->findByNameCategorie($categorie["nomCategorie"]);
            if ($existingCategorie) {
                Validator::addError("nomCategorie", "Ce nomCategorie Existe deja");
                Session::addSession("errors", Validator::$errors);
            } else {
                $this->categorieModel->save($categorie);
            }
        } else {
            Session::addSession("errors", Validator::$errors);
        }
        $this->redirectToRoute("controller=categorie&action=liste-categorie&page=1");
    }
    

    public function removeCategorie(int $id): void {
        $this->categorieModel->delete($id);
    }

    public function modifierCategorie(int $id, array $categorie): void {
        $this->categorieModel->update($id, $categorie);
    }

    public function nbrCategorie(): int {
        return $this->categorieModel->getNbrOfElement();
    }

    public function numberOfPageCategorie(): int {
        return ceil($this->nbrCategorie() / nbElementBypage);
    }
}


?>
