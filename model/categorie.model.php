<?php

function findAllCategorie(): array{
    $dsn = 'mysql:host=localhost:8889;dbname=cour_php_2024';
    $username = 'root';
    $password = 'root';
    try {
        $dbh = new PDO($dsn, $username, $password);
        $sql="SELECT * FROM categorie c";
        $stmt = $dbh->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo "connexion reussie";
    } catch (PDOException $e) {
        echo "connexion echouee" . $e->getMessage();
    }
};