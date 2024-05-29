<?php

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


function save(string $nomType): int{
    $dsn = 'mysql:host=localhost:8889;dbname=cour_php_2024';
    $username = 'root';
    $password = 'root';
    try {
        $dbh = new PDO($dsn, $username, $password);
        $sql="INSERT INTO `type` (  `nomType`) VALUES ( '$nomType');";
        return $dbh->exec($sql);;
        echo "connexion reussie";
    } catch (PDOException $e) {
        echo "connexion echouee" . $e->getMessage();
    }
};