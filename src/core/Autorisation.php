<?php
namespace App\core;
use App\core\Session;
class Autorisation{
    public static function isConnect():bool{
        return Session::getSession("userConnect")!=false;
    }
    public static function hasRole(string $nomRole):bool{
        $userConnect=Session::getSession("userConnect");
        if($userConnect){
            return $userConnect["nomRole"]==$nomRole;
        }
        return false;
    }
}
