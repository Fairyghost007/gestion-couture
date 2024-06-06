<?php
require_once("../model/type.model.php");
require_once("../core/controller.php");

class TypeController extends Controller {
    private TypeModel $typeModel;

    public function __construct() {
        parent::__construct();
        if(!Autorisation::isConnect()){
            $this->redirectToRoute("controller=security&action=show-form-connexion");
        }
        $this->typeModel = new TypeModel();
        $this->load();
    }

    public function load(): void {
        if (isset($_REQUEST['action'])) {
            if ($_REQUEST['action'] == "liste-type") {
                unset($_REQUEST['action']);
                unset($_REQUEST['controller']);
                $page = $_REQUEST['page'];
                $debut = nbElementBypage * ($_REQUEST['page'] - 1);
                $this->listerType($debut, $page);
            } elseif ($_REQUEST['action'] == "save-type") {
                unset($_REQUEST['action']);
                unset($_REQUEST['btnSaveType']);
                unset($_REQUEST['controller']);
                // var_dump($_REQUEST);
                $this->storeType($_REQUEST);
                
                exit();
            } elseif ($_REQUEST['action'] == "deleteType") {
                unset($_REQUEST['action']);
                unset($_REQUEST['controller']);
                $this->removeType($_REQUEST['id']);
                $this->redirectToRoute("controller=type&action=liste-type&page=1");
                exit();
            } elseif ($_REQUEST['action'] == "updateType") {
                unset($_REQUEST['action']);
                unset($_REQUEST['controller']);
                $this->chargerFormulaireUpdateType($_REQUEST['id']);
                exit();
            } elseif ($_REQUEST['action'] == "modifier-type") {
                unset($_REQUEST['action']);
                unset($_REQUEST['controller']);
                unset($_REQUEST['btnUpdateType']);
                $this->modifierType($_REQUEST['id'], $_REQUEST);
                $this->redirectToRoute("controller=type&action=liste-type&page=1");
                exit();
            }
        } else {
            $this->listerType(0, 1);
        }
    }

    public function listerType(int $debut, int $page): void {
        $types = $this->typeModel->findAll($debut, nbElementBypage);
        $this->renderView("type/liste", ['types' => $types, 'page' => $page]);
    }

    public function chargerFormulaireUpdateType(int $id): void {
        $type = $this->typeModel->findElementById($id);
        $this->renderView("type/update.form", ['type' => $type]);
    }

    public function storeType(array $type): void {
        Validator::isEmpty($type["nomType"],"nomType");
        if (Validator::isValide()) {
            $type=$this->typeModel->findByNameType($type["nomType"]);
            // dd($type);
            if ($type) {
                Validator::addError("nomType","Ce nomType Existe deja");
                Session::addSession("errors",Validator::$errors);
            } else {
                $this->typeModel->save($type);
            }
            
            
        } else {
           Session::addSession("errors",Validator::$errors);
        }
        $this->redirectToRoute("controller=type&action=liste-type&page=1");
        
        
    }

    public function removeType(int $id): void {
        $this->typeModel->delete($id);
    }

    public function modifierType(int $id, array $type): void {
        $this->typeModel->update($id, $type);
    }

    public function nbrType(): int {
        return $this->typeModel->getNbrOfElement();
    }

    public function numberOfPageType(): int {
        return ceil($this->nbrType() / nbElementBypage);
    }
}

