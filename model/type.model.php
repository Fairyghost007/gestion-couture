<?php

function findAllType(int $debut=0, int $nbTypeByPage=5): array
{
    $dsn = 'mysql:host=localhost:8889;dbname=cour_php_2024';
    $username = 'root';
    $password = 'root';

    try {
        $dbh = new PDO($dsn, $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT t.id, t.nomType
                FROM type t
                ORDER BY t.id
                LIMIT :debut, :nbTypeByPage";

        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':debut', $debut, PDO::PARAM_INT);
        $stmt->bindParam(':nbTypeByPage', $nbTypeByPage, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Connection failed: " . $e->getMessage());
        return [];
    }
}




function saveType(array $type): int{
    $dsn = 'mysql:host=localhost:8889;dbname=cour_php_2024';
    $username = 'root';
    $password = 'root';
    try {
        $dbh = new PDO($dsn, $username, $password);
        extract($type);
        $sql="INSERT INTO `type` ( `nomType`) VALUES ( '$nomType');";
        return $dbh->exec($sql);;
        echo "connexion reussie";
    } catch (PDOException $e) {
        echo "connexion echouee" . $e->getMessage();
    }
};


function findTypeById(int $id): ?array {
    $dsn = 'mysql:host=localhost:8889;dbname=cour_php_2024';
    $username = 'root';
    $password = 'root';

    try {
        $dbh = new PDO($dsn, $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "SELECT * FROM `type` WHERE `id` = :id";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        return null;
    }
}


function deleteType(int $id): bool {
    $dsn = 'mysql:host=localhost:8889;dbname=cour_php_2024';
    $username = 'root';
    $password = 'root';

    try {
        $dbh = new PDO($dsn, $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "DELETE FROM type WHERE id = :id";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute(); // Execute the query

        // Check if any rows were affected
        return $stmt->rowCount() > 0;

    } catch (PDOException $e) {
        // Handle exceptions, you can log the error message or echo it
        error_log("Deletion failed: " . $e->getMessage());
        return false; // Return false indicating failure
    }
}



function updateType(int $id, array $type): bool {
    $dsn = 'mysql:host=localhost:8889;dbname=cour_php_2024';
    $username = 'root';
    $password = 'root';

    try {
        $dbh = new PDO($dsn, $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        extract($type);
        $sql = "UPDATE `type` SET `nomType` = :nomType WHERE `id` = :id";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':nomType', $nomType, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        return false;
    }
}


function getNbrType(): int
{
    $dsn = 'mysql:host=localhost:8889;dbname=cour_php_2024';
    $username = 'root';
    $password = 'root';

    try {
        $dbh = new PDO($dsn, $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "SELECT COUNT(id) as nbrTypes FROM type";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $result['nbrTypes'];
    } catch (PDOException $e) {
        error_log("Error fetching type count: " . $e->getMessage());
        return 0;
    }
}






