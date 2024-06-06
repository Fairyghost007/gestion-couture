<?php
require_once("../core/model.php");
class TypeModel extends Model
{
    public function __construct()
    {
        $this->connexion();
        $this->table="type";
    }

    public function findAll(int $debut = 0, int $nbTypeByPage = 5): array
    {
        return $this->executeSelect("SELECT t.id, t.nomType
        FROM $this->table t
        ORDER BY t.id
        LIMIT ?, ?", false, $debut, $nbTypeByPage);
    }



    public function save(array $type): int
    {
        return $this->executeInsert("INSERT INTO `$this->table` (`nomType`) VALUES (:nomType)", $type, [':nomType' => PDO::PARAM_STR]);
    }

    public function findElementById(int $id): ?array
    {
        return $this->executeSelectId("SELECT * FROM $this->table WHERE id = :id",$id);
    }

    public function delete(int $id): bool
    {
        return $this->executeDelete("DELETE FROM $this->table WHERE id = :id",$id);
    }

    public function update(int $id, array $type): bool
{
    return $this->executeUpdate("UPDATE `$this->table` SET `nomType` = :nomType WHERE `id` = :id", $id, $type, [':nomType' => PDO::PARAM_STR]);
}


    public function getNbrOfElement(): int
    {
        return $this->executeSelectNbrOfElement("SELECT COUNT(id) as nbrElements FROM $this->table");
    }

    public function findByNameType(string $nameType):array|false{
        return $this->executeSelectBis("SELECT * FROM $this->table WHERE nomType like '$nameType'",true);
    }
}
