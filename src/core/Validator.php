<?php
namespace App\core;
class Validator{
    public static array $errors=[];

    public static function isValide():bool{
        return count(self::$errors)==0;
    }

    public static function isEmpty(string $fieldValue, string $fieldName, string $message="Champ Obligatrore"):bool{
        if(empty($fieldValue)){
            self::$errors[$fieldName]= $message;
            return true;
        }
        return false;

    }

    public static function isEmail(string $fieldValue, string $fieldName, string $message="Doit etre un email"){
        if (!filter_var($fieldValue,FILTER_VALIDATE_EMAIL)){
            self::$errors[$fieldName]= $message;
        }

    }

    public static function addError( string $key, mixed $data){
        self::$errors[$key]=$data;
        
    }

    public static function isPositif(string $fieldValue, string $fieldName, string $message="Doit être un numeric positif") {
        if (!is_numeric($fieldValue) || $fieldValue <= 0) {
            self::$errors[$fieldName] = $message;
        }
    }



}


