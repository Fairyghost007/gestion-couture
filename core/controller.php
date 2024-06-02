<?php
class Controller{
    public function redirectToRoute(string $path){
        header("Location:" . WEBROOT . "?$path");
    }

    public function renderView(string $view, array $data=[]){
        extract($data);
        require_once("../views/$view.html.php");
    }
}