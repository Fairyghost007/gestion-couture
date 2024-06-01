<?php
function findAll(int $debut=0, int $nbArticleByPage=5): array
{
    $dsn = 'mysql:host=localhost:8889;dbname=cour_php_2024';
    $username = 'root';
    $password = 'root';

    try {
        $dbh = new PDO($dsn, $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT a.id, a.libelle, a.qteStock, a.prixAppro, c.nomCategorie, t.nomType 
                    FROM article a
                    JOIN categorie c ON a.categorieId = c.id
                    JOIN type t ON a.typeId = t.id
                    ORDER BY a.id
                    LIMIT :debut, :nbArticleByPage";

        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':debut', $debut, PDO::PARAM_INT);
        $stmt->bindParam(':nbArticleByPage', $nbArticleByPage, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        return [];
    }
}



function saveArticle(array $article): int
{
    $dsn = 'mysql:host=localhost:8889;dbname=cour_php_2024';
    $username = 'root';
    $password = 'root';
    try {
        $dbh = new PDO($dsn, $username, $password);
        extract($article);
        $sql = "INSERT INTO `article` ( `libelle`, `qteStock`, `prixAppro`, `typeId`, `categorieId`) VALUES ( '$libelle', '$qteStock', '$prixAppro', '$typeId', '$categorieId');";
        return $dbh->exec($sql);
    } catch (PDOException $e) {
        echo "connexion echouee" . $e->getMessage();
    }
}

function findArticleById(int $id): ?array
{
    $dsn = 'mysql:host=localhost:8889;dbname=cour_php_2024';
    $username = 'root';
    $password = 'root';

    try {
        $dbh = new PDO($dsn, $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM `article` WHERE `id` = :id";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $article = $stmt->fetch(PDO::FETCH_ASSOC);
        return $article ?: null;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        return null;
    }
}



function deleteArticle(int $id): bool
{
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

function updateArticle(int $id, array $article): bool
{
    $dsn = 'mysql:host=localhost:8889;dbname=cour_php_2024';
    $username = 'root';
    $password = 'root';
    try {
        $dbh = new PDO($dsn, $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Extract array to variables
        extract($article);

        // Prepare the SQL statement with placeholders
        $sql = "UPDATE article 
                SET libelle = :libelle, qteStock = :qteStock, prixAppro = :prixAppro, typeId = :typeId, categorieId = :categorieId
                WHERE id = :id";

        // Prepare and execute the statement
        $stmt = $dbh->prepare($sql);
        return $stmt->execute([
            ':libelle' => $libelle,
            ':qteStock' => $qteStock,
            ':prixAppro' => $prixAppro,
            ':typeId' => $typeId,
            ':categorieId' => $categorieId,
            ':id' => $id
        ]);
    } catch (PDOException $e) {
        error_log("Update failed: " . $e->getMessage());
        return false;
    }
}

function getNbrArticle(): int
{
    $dsn = 'mysql:host=localhost:8889;dbname=cour_php_2024';
    $username = 'root';
    $password = 'root';

    try {
        $dbh = new PDO($dsn, $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "SELECT COUNT(id) as nbrArticles FROM article";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $result['nbrArticles'];
    } catch (PDOException $e) {
        error_log("Error fetching article count: " . $e->getMessage());
        return 0;
    }
}

