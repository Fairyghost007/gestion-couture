<?php

function findAllType(): array{
    $dsn = 'mysql:host=localhost:8889;dbname=cour_php_2024';
    $username = 'root';
    $password = 'root';
    try {
        $dbh = new PDO($dsn, $username, $password);
        $sql="SELECT * FROM `type`";
        $stmt = $dbh->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo "connexion reussie";
    } catch (PDOException $e) {
        echo "connexion echouee" . $e->getMessage();
    }
};


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
