<?php

class CategorieModel
{
    private $dbh;

    public function __construct()
    {
        $dsn = 'mysql:host=localhost:8889;dbname=cour_php_2024';
        $username = 'root';
        $password = 'root';

        try {
            $this->dbh = new PDO($dsn, $username, $password);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            error_log("Connection failed: " . $e->getMessage());
        }
    }

    public function findAll(int $debut = 0, int $nbCategorieByPage = 5): array
    {
        try {
            $sql = "SELECT c.id, c.nomCategorie
                    FROM categorie c
                    ORDER BY c.id
                    LIMIT :debut, :nbCategorieByPage";

            $stmt = $this->dbh->prepare($sql);
            $stmt->bindParam(':debut', $debut, PDO::PARAM_INT);
            $stmt->bindParam(':nbCategorieByPage', $nbCategorieByPage, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Query failed: " . $e->getMessage());
            return [];
        }
    }

    public function save(array $categorie): int
    {
        try {
            $sql = "INSERT INTO `categorie` (`nomCategorie`) VALUES (:nomCategorie)";
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindParam(':nomCategorie', $categorie['nomCategorie'], PDO::PARAM_STR);

            $stmt->execute();
            return $this->dbh->lastInsertId();
        } catch (PDOException $e) {
            error_log("Insertion failed: " . $e->getMessage());
            return 0;
        }
    }

    public function findElementById(int $id): ?array
    {
        try {
            $sql = "SELECT * FROM `categorie` WHERE `id` = :id";
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
        } catch (PDOException $e) {
            error_log("Query failed: " . $e->getMessage());
            return null;
        }
    }

    public function delete(int $id): bool
    {
        try {
            $sql = "DELETE FROM categorie WHERE id = :id";
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Deletion failed: " . $e->getMessage());
            return false;
        }
    }

    public function update(int $id, array $categorie): bool
    {
        try {
            $sql = "UPDATE `categorie` SET `nomCategorie` = :nomCategorie WHERE `id` = :id";
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindParam(':nomCategorie', $categorie['nomCategorie'], PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Update failed: " . $e->getMessage());
            return false;
        }
    }

    public function getNbrOfElement(): int
    {
        try {
            $sql = "SELECT COUNT(id) as nbrCategories FROM categorie";
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['nbrCategories'];
        } catch (PDOException $e) {
            error_log("Error fetching category count: " . $e->getMessage());
            return 0;
        }
    }
}
?>
