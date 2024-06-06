<?php

function add_class_invalid(string $fieldName):void{
    echo isset(Session::getSession("errors")[$fieldName])?"bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-red-100   focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500":""; 
}
function add_class_hidden(string $fieldName):void{
    echo !isset(Session::getSession("errors")[$fieldName])?"hidden":""; 
}
function has_role(string $fieldName):void{
    echo !Autorisation::hasRole($fieldName)?"hidden":""; 
}

function dd(mixed $data){
    dump ($data);
    die;
}

function dump(mixed $data){
    echo "<pre>";
        var_dump($data);
    echo "</pre>";
}