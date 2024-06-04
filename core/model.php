<?php
class Model
{
    protected $dsn = 'mysql:host=localhost:8889;dbname=cour_php_2024';
    protected $username = 'root';
    protected $password = 'root';
    protected PDO|NULL $pdo = null;
    protected string $table;

    public function connexion()
    {

        try {
            if ($this->pdo == null) {
                $this->pdo = new PDO($this->dsn, $this->username, $this->password);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function deconnecxion(): void
    {
        if ($this->pdo != null) {
            $this->pdo = null;
        }
    }

    protected function executeSelect(string $sql, bool $fetch = false, int $debut = 0, int $nbElementByPage = 5)
{
    try {
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $debut, PDO::PARAM_INT);
        $stmt->bindValue(2, $nbElementByPage, PDO::PARAM_INT);
        $stmt->execute();

        return $fetch ? $stmt->fetch(PDO::FETCH_ASSOC) : $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        return [];
    }
}

protected function executeInsert(string $sql, array $data, array $bindings): bool
{
    try {
        $stmt = $this->pdo->prepare($sql);
        
        foreach ($bindings as $param => $type) {
            $stmt->bindValue($param, $data[substr($param, 1)], $type);
        }

        return $stmt->execute();
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        return false;
    }
}







    protected function executeSelectId(string $sql,int $id): ?array
    {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
        } catch (PDOException $e) {
            error_log("Query failed: " . $e->getMessage());
            return null;
        }
    }

    protected function executeDelete(string $sql,int $id): bool
    {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            error_log("Deletion failed: " . $e->getMessage());
            return false;
        }
    }

    protected function executeUpdate(string $sql, int $id, array $data, array $bindings): bool
    {
        try {
            $stmt = $this->pdo->prepare($sql);
            
            foreach ($bindings as $param => $type) {
                $stmt->bindParam($param, $data[substr($param, 1)], $type); // Extracting key name from binding key
            }
    
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Update failed: " . $e->getMessage());
            return false;
        }
    }
    


    protected function executeSelectNbrOfElement(string $sql,): int
    {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['nbrElements'];
        } catch (PDOException $e) {
            error_log("Error fetching type count: " . $e->getMessage());
            return 0;
        }
    }

}
