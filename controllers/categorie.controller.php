<?php
require_once("../model/categorie.model.php");
require_once("../core/controller.php");

class CategorieController extends Controller {
    private CategorieModel $categorieModel;

    public function __construct() {
        $this->categorieModel = new CategorieModel();
        $this->load();
    }

    public function load(): void {
        if (isset($_REQUEST['action'])) {
            if ($_REQUEST['action'] == "liste-categorie") {
                unset($_REQUEST['action']);
                unset($_REQUEST['controller']);
                $page = $_REQUEST['page'];
                $debut = nbElementBypage * ($_REQUEST['page'] - 1);
                $this->listerCategorie($debut, $page);
            } elseif ($_REQUEST['action'] == "form-categorie") {
                $this->chargerFormulaireCategorie();
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
        $categories = $this->categorieModel->findAllCategorie($debut, nbElementBypage);
        $this->renderView("categories/liste", ['categories' => $categories, 'page' => $page]);
    }

    public function chargerFormulaireCategorie(): void {
        $this->renderView("categories/form");
    }

    public function chargerFormulaireUpdateCategorie(int $id): void {
        $categorie = $this->categorieModel->findCategorieById($id);
        $this->renderView("categories/update.form", ['categorie' => $categorie]);
    }

    public function storeCategorie(array $categorie): void {
        $this->categorieModel->saveCategorie($categorie);
    }

    public function removeCategorie(int $id): void {
        $this->categorieModel->deleteCategorie($id);
    }

    public function modifierCategorie(int $id, array $categorie): void {
        $this->categorieModel->updateCategorie($id, $categorie);
    }

    public function nbrCategorie(): int {
        return $this->categorieModel->getNbrCategorie();
    }

    public function numberOfPageCategorie(): int {
        return ceil($this->nbrCategorie() / nbElementBypage);
    }
}


?>
