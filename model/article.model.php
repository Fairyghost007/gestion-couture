<?php
class ArticleModel
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
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function findAll(int $debut = 0, int $nbArticleByPage = 5): array
    {
        try {
            $sql = "SELECT a.id, a.libelle, a.qteStock, a.prixAppro, c.nomCategorie, t.nomType 
                    FROM article a
                    JOIN categorie c ON a.categorieId = c.id
                    JOIN type t ON a.typeId = t.id
                    ORDER BY a.id
                    LIMIT :debut, :nbArticleByPage";

            $stmt = $this->dbh->prepare($sql);
            $stmt->bindParam(':debut', $debut, PDO::PARAM_INT);
            $stmt->bindParam(':nbArticleByPage', $nbArticleByPage, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return [];
        }
    }

    public function save(array $article): int
    {
        try {
            extract($article);
            $sql = "INSERT INTO article (libelle, qteStock, prixAppro, typeId, categorieId) 
                    VALUES (:libelle, :qteStock, :prixAppro, :typeId, :categorieId)";
            
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindParam(':libelle', $libelle);
            $stmt->bindParam(':qteStock', $qteStock);
            $stmt->bindParam(':prixAppro', $prixAppro);
            $stmt->bindParam(':typeId', $typeId);
            $stmt->bindParam(':categorieId', $categorieId);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return 0;
        }
    }

    public function findElementById(int $id): ?array
    {
        try {
            $sql = "SELECT * FROM article WHERE id = :id";
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $article = $stmt->fetch(PDO::FETCH_ASSOC);
            return $article ?: null;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return null;
        }
    }

    public function delete(int $id): bool
    {
        try {
            $sql = "DELETE FROM article WHERE id = :id";
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Deletion failed: " . $e->getMessage());
            return false;
        }
    }

    public function update(int $id, array $article): bool
    {
        try {
            extract($article);
            $sql = "UPDATE article 
                    SET libelle = :libelle, qteStock = :qteStock, prixAppro = :prixAppro, typeId = :typeId, categorieId = :categorieId 
                    WHERE id = :id";

            $stmt = $this->dbh->prepare($sql);
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

    public function getNbrOfElement(): int
    {
        try {
            $sql = "SELECT COUNT(id) as nbrArticles FROM article";
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['nbrArticles'];
        } catch (PDOException $e) {
            error_log("Error fetching article count: " . $e->getMessage());
            return 0;
        }
    }
}
?>
