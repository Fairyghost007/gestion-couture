<?php
require_once("../model/user.model.php");
require_once("../core/controller.php");

class SecurityController extends controller
{
    private UserModel $usermodel;

    public function __construct()
    {
        parent::__construct();
        $this->usermodel = new UserModel();
        $this->layout = "connexion";
        $this->load();
    }

    public function load(): void
    {
        if (isset($_REQUEST['action'])) {
            if ($_REQUEST['action'] == "connexion") {
                unset($_REQUEST['action']);
                unset($_REQUEST['btnConnexion']);
                // dd($_REQUEST);
                $this->connexion($_REQUEST);
            } elseif ($_REQUEST['action'] == "show-form-connexion") {
                $this->showFormConnexion();
            }elseif ($_REQUEST['action'] == "logout") {
                $this->logout();
            }
        } else {
            $this->showFormConnexion();
        }
    }

    private function showFormConnexion(): void
    {
        parent::renderView("security/form");
    }


    private function logout(): void
    {
        Session::closeSession();
        $this->redirectToRoute("controller=security&action=show-form-connexion");
    }

    private function connexion(array $data): void
    {
        if (!Validator::isEmpty($data["login"], "login")) {
            Validator::isEmail($data["login"], "login");
        }
        Validator::isEmpty($data["password"], "password");
        if (Validator::isValide()) {
            // dd(Validator::isValide());
            // dd($this->usermodel->findByLoginAndPassword($data["login"], $data["password"]));
            $userConnect = $this->usermodel->findByLoginAndPassword($data["login"], $data["password"]);
            // dd($userConnect);
            if ($userConnect) {
                Session::addSession("userConnect", $userConnect);
                $this->redirectToRoute("controller=article&action=liste-article&page=1");
            } else {
                Validator::addError("error_connexion", "Utilisateur introuvable");
                Session::addSession("errors", Validator::$errors);
            }
        } else {
            Session::addSession("errors", Validator::$errors);
        }
        $this->redirectToRoute("controller=security&action=show-form-connexion");
    }
}
