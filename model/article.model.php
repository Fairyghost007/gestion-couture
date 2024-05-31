<?php
    function findAll(): array{
        $dsn = 'mysql:host=localhost:8889;dbname=cour_php_2024';
        $username = 'root';
        $password = 'root';
        try {
            $dbh = new PDO($dsn, $username, $password);
            $sql="SELECT  a.id, a.libelle, a.qteStock, a.prixAppro, c.nomCategorie, t.nomType  FROM `article` a, categorie c, type t WHERE a.`typeId`=t.id and a.categorieId=c.id;";
            $stmt = $dbh->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            // echo "<pre>";
            //     var_dump($rows);
            // echo "<pre>";
            echo "connexion reussie";
        } catch (PDOException $e) {
            echo "connexion echouee" . $e->getMessage();
        }
    };

    function saveArticle(array $article):int{
        $dsn = 'mysql:host=localhost:8889;dbname=cour_php_2024';
        $username = 'root';
        $password = 'root';
        try {
            $dbh = new PDO($dsn, $username, $password);
            extract($article);
            $sql="INSERT INTO `article` ( `libelle`, `qteStock`, `prixAppro`, `typeId`, `categorieId`) VALUES ( '$libelle', '$qteStock', '$prixAppro', '$typeId', '$categorieId');";
            return $dbh->exec($sql);
        } catch (PDOException $e) {
            echo "connexion echouee" . $e->getMessage();
        }

    }

    function findArticleById(int $id): ?array {
        $dsn = 'mysql:host=localhost:8889;dbname=cour_php_2024';
        $username = 'root';
        $password = 'root';
    
        try {
            $dbh = new PDO($dsn, $username, $password);
            $sql = "SELECT * FROM `article` WHERE `id` = id";
            $stmt=$dbh ->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC)?: null;
        
    
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return null;
        }
    }


function deleteArticle(int $id): bool {
    $dsn = 'mysql:host=localhost:8889;dbname=cour_php_2024';
    $username = 'root';
    $password = 'root';
    try {
        $dbh = new PDO($dsn, $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM article WHERE id = :id";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    } catch (PDOException $e) {
        error_log("Deletion failed: " . $e->getMessage());
        return false;
    }
}


   
            

    

    
