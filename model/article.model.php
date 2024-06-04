<?php
require_once("../core/model.php");
class ArticleModel extends Model
{

    public function __construct()
    {
        $this->connexion();
        $this->table="article";
    }

    public function findAll(int $debut = 0, int $nbArticleByPage = 5): array
    {
        return $this->executeSelect("SELECT a.id, a.libelle, a.qteStock, a.prixAppro, c.nomCategorie, t.nomType 
    FROM $this->table a
    JOIN categorie c ON a.categorieId = c.id
    JOIN type t ON a.typeId = t.id
    ORDER BY a.id
    LIMIT ?, ?", false, $debut, $nbArticleByPage);
    }

    public function save(array $article): int
    {
        return $this->executeInsert("INSERT INTO $this->table (libelle, qteStock, prixAppro, typeId, categorieId) 
        VALUES (:libelle, :qteStock, :prixAppro, :typeId, :categorieId)", $article, [':libelle' => PDO::PARAM_STR,':qteStock' => PDO::PARAM_INT,':prixAppro' => PDO::PARAM_INT,':typeId' => PDO::PARAM_INT,':categorieId' => PDO::PARAM_INT]);
    }

    public function findElementById(int $id): ?array
    {
        return $this->executeSelectId("SELECT * FROM $this->table WHERE id = :id",$id);
    }

    public function delete(int $id): bool
    {
        return $this->executeDelete("DELETE FROM $this->table WHERE id = :id",$id);
    }

    public function update(int $id, array $article): bool
    {
        return $this->executeUpdate("UPDATE $this->table
                    SET libelle = :libelle, qteStock = :qteStock, prixAppro = :prixAppro, typeId = :typeId, categorieId = :categorieId
                    WHERE id = :id",$id,$article,[':libelle' => PDO::PARAM_STR,':qteStock' => PDO::PARAM_INT,':prixAppro' => PDO::PARAM_INT,':typeId' => PDO::PARAM_INT,':categorieId' => PDO::PARAM_INT]);
    }

    public function getNbrOfElement(): int
    {
        return $this->executeSelectNbrOfElement("SELECT COUNT(id) as nbrElements FROM $this->table");
    }
}
