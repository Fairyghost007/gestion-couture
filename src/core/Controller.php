<?php
namespace App\core;


class Controller{
    protected string $layout;
    public function __construct()
    {
        Session::openSession();
        $this->layout="base";
    }
    public function redirectToRoute(string $path){
        header("Location:" . WEBROOT . "?$path");
        exit();
    }

    public function renderJson(array $data=[]){
        echo json_encode($data);

       
    }
    public function renderView(string $view, array $data=[]){
        ob_start();
        extract($data);
        require_once("../views/$view.html.php");
        $contentView= ob_get_clean();
        require("../views/layout/$this->layout.layout.php");
       
    }
}
