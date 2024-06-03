<?php

class TypeModel
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

    public function findAll(int $debut = 0, int $nbTypeByPage = 5): array
    {
        try {
            $sql = "SELECT t.id, t.nomType
                    FROM type t
                    ORDER BY t.id
                    LIMIT :debut, :nbTypeByPage";

            $stmt = $this->dbh->prepare($sql);
            $stmt->bindParam(':debut', $debut, PDO::PARAM_INT);
            $stmt->bindParam(':nbTypeByPage', $nbTypeByPage, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Query failed: " . $e->getMessage());
            return [];
        }
    }

    public function save(array $type): int
    {
        try {
            $sql = "INSERT INTO `type` (`nomType`) VALUES (:nomType)";
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindParam(':nomType', $type['nomType'], PDO::PARAM_STR);

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
            $sql = "SELECT * FROM `type` WHERE `id` = :id";
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
            $sql = "DELETE FROM type WHERE id = :id";
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            error_log("Deletion failed: " . $e->getMessage());
            return false;
        }
    }

    public function update(int $id, array $type): bool
    {
        try {
            $sql = "UPDATE `type` SET `nomType` = :nomType WHERE `id` = :id";
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindParam(':nomType', $type['nomType'], PDO::PARAM_STR);
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
            $sql = "SELECT COUNT(id) as nbrTypes FROM type";
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['nbrTypes'];
        } catch (PDOException $e) {
            error_log("Error fetching type count: " . $e->getMessage());
            return 0;
        }
    }
}
?>
