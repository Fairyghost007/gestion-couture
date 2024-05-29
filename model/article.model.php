<?php
    function findAll(): array{
        $dsn = 'mysql:host=localhost:8889;dbname=cour_php_2024';
        $username = 'root';
        $password = 'root';
        try {
            $dbh = new PDO($dsn, $username, $password);
            $sql="SELECT * FROM `article` a,categorie c, type t WHERE a.`typeId`=t.id and a.categorieId=c.id;";
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

    function save(array $article):int{
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
    function findAllType(): array{
        $dsn = 'mysql:host=localhost:8889;dbname=cour_php_2024';
        $username = 'root';
        $password = 'root';
        try {
            $dbh = new PDO($dsn, $username, $password);
            $sql="SELECT * FROM type t";
            $stmt = $dbh->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo "connexion reussie";
        } catch (PDOException $e) {
            echo "connexion echouee" . $e->getMessage();
        }
    };

    

    
