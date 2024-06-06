<?php
require_once("../core/model.php");

class UserModel extends Model
{

    public function __construct()
    {
        $this->connexion();
        $this->table="utilisateur";
    }

    public function findByLoginAndPassword(string $login,string $password):array|false{
        return $this->executeSelectBis("SELECT * FROM $this->table u,role r where u.roleId=r.id and u.login like '$login' and u.password like '$password'",true);
    }

}

