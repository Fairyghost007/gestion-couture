<?php
require_once("../core/model.php");
class CategorieModel extends Model
{
    public function __construct()
    {
        $this->connexion();
    }

    public function findAll(int $debut = 0, int $nbCategorieByPage = 5): array
    {
        return $this->executeSelect("SELECT c.id, c.nomCategorie
    FROM categorie c
    ORDER BY c.id
    LIMIT ?, ?", false, $debut, $nbCategorieByPage);
    }

    public function save(array $categorie): int
    {
        return $this->executeInsert("INSERT INTO `categorie` (`nomCategorie`) VALUES (:nomCategorie)", $categorie, [':nomCategorie' => PDO::PARAM_STR]);
    }

    public function findElementById(int $id): ?array
    {
        return $this->executeSelectId("SELECT * FROM categorie WHERE id = :id",$id);
    }

    public function delete(int $id): bool
    {
        return $this->executeDelete("DELETE FROM categorie WHERE id = :id",$id);
    }

    public function update(int $id, array $categorie): bool
{
    return $this->executeUpdate("UPDATE `categorie` SET `nomCategorie` = :nomCategorie WHERE `id` = :id", $id, $categorie, [':nomCategorie' => PDO::PARAM_STR]);
}


    public function getNbrOfElement(): int
    {
        return $this->executeSelectNbrOfElement("SELECT COUNT(id) as nbrElements FROM categorie");
    }
}
