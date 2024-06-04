<?php
class Controller{
    protected string $layout;
    public function __construct()
    {
        $this->layout="base";
    }
    public function redirectToRoute(string $path){
        header("Location:" . WEBROOT . "?$path");
        exit();
    }

    public function renderView(string $view, array $data=[]){
        ob_start();
        extract($data);
        require_once("../views/$view.html.php");
        $contentView= ob_get_clean();
        require("../views/layout/$this->layout.layout.php");
       
    }
}