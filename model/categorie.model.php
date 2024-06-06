<?php
require_once("../core/model.php");
class CategorieModel extends Model
{
    public function __construct()
    {
        $this->connexion();
        $this->table = "categorie";
    }

    public function findAll(int $debut = 0, int $nbCategorieByPage = 5): array
    {
        return $this->executeSelect("SELECT c.id, c.nomCategorie
    FROM $this->table c
    ORDER BY c.id
    LIMIT ?, ?", false, $debut, $nbCategorieByPage);
    }

    public function save(array $categorie): int
    {
        return $this->executeInsert("INSERT INTO `$this->table` (`nomCategorie`) VALUES (:nomCategorie)", $categorie, [':nomCategorie' => PDO::PARAM_STR]);
    }

    public function findElementById(int $id): ?array
    {
        return $this->executeSelectId("SELECT * FROM $this->table WHERE id = :id", $id);
    }

    public function delete(int $id): bool
    {
        return $this->executeDelete("DELETE FROM $this->table WHERE id = :id", $id);
    }

    public function update(int $id, array $categorie): bool
    {
        return $this->executeUpdate("UPDATE `$this->table` SET `nomCategorie` = :nomCategorie WHERE `id` = :id", $id, $categorie, [':nomCategorie' => PDO::PARAM_STR]);
    }


    public function getNbrOfElement(): int
    {
        return $this->executeSelectNbrOfElement("SELECT COUNT(id) as nbrElements FROM $this->table");
    }

    public function findByNameCategorie(string $nameCategorie): array|false
    {
        return $this->executeSelectBis("SELECT * FROM $this->table WHERE nomCategorie LIKE '$nameCategorie'", true);
    }
}
