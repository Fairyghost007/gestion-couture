<?php

function findAllCategorie(int $debut = 0, int $nbCategorieByPage = 5): array
{
    $dsn = 'mysql:host=localhost:8889;dbname=cour_php_2024';
    $username = 'root';
    $password = 'root';

    try {
        $dbh = new PDO($dsn, $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT c.id, c.nomCategorie
                FROM categorie c
                ORDER BY c.id
                LIMIT :debut, :nbCategorieByPage";

        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':debut', $debut, PDO::PARAM_INT);
        $stmt->bindParam(':nbCategorieByPage', $nbCategorieByPage, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Connection failed: " . $e->getMessage());
        return [];
    }
}




function saveCategorie(array $categorie): int{
    $dsn = 'mysql:host=localhost:8889;dbname=cour_php_2024';
    $username = 'root';
    $password = 'root';
    try {
        $dbh = new PDO($dsn, $username, $password);
        extract($categorie);
        $sql="INSERT INTO `categorie` ( `nomCategorie`) VALUES ( '$nomCategorie');";
        return $dbh->exec($sql);;
        echo "connexion reussie";
    } catch (PDOException $e) {
        echo "connexion echouee" . $e->getMessage();
    }
};


function findCategorieById(int $id): ?array {
    $dsn = 'mysql:host=localhost:8889;dbname=cour_php_2024';
    $username = 'root';
    $password = 'root';

    try {
        $dbh = new PDO($dsn, $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "SELECT * FROM `categorie` WHERE `id` = :id";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        return null;
    }
}


function deleteCategorie(int $id): bool {
    $dsn = 'mysql:host=localhost:8889;dbname=cour_php_2024';
    $username = 'root';
    $password = 'root';
    try {
        $dbh = new PDO($dsn, $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM categorie WHERE id = :id";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    } catch (PDOException $e) {
        error_log("Deletion failed: " . $e->getMessage());
        return false;
    }
}




function updateCategorie(int $id, array $categorie): bool {
    $dsn = 'mysql:host=localhost:8889;dbname=cour_php_2024';
    $username = 'root';
    $password = 'root';

    try {
        $dbh = new PDO($dsn, $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        extract($categorie);
        $sql = "UPDATE `categorie` SET `nomCategorie` = :nomCategorie WHERE `id` = :id";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':nomCategorie', $nomCategorie, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        return false;
    }
}


function getNbrCategorie(): int
{
    $dsn = 'mysql:host=localhost:8889;dbname=cour_php_2024';
    $username = 'root';
    $password = 'root';

    try {
        $dbh = new PDO($dsn, $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "SELECT COUNT(id) as nbrCategories FROM categorie";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $result['nbrCategories'];
    } catch (PDOException $e) {
        error_log("Error fetching category count: " . $e->getMessage());
        return 0;
    }
}
