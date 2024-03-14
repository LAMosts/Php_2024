<?php

require_once __DIR__ . "/Database.php";

abstract class Table
{
    protected PDO $pdo;
    
    public function __construct(
        protected ?string $name
    )
    {
        $this->pdo = Database::getConnection();
    }

    public function findAll(): array
    {
        $stmt =  $this->pdo->query("SELECT * FROM " . $this->name);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find(int $id): ?array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM " . $this->name . " WHERE id = :id");
        $stmt->execute(['id' => $id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result === false) {
            return null;
        }

        return $result;
    }
    public function searchAll(string $productName): ?array 
    {
        $stmt = $this->pdo->prepare('SELECT ' . $productName . ' FROM ' . $this->name . " WHERE name = :productName");
        $stmt->execute(['name' => $productName]);
        $categories = $stmt->fetch(PDO::FETCH_ASSOC);
        return $categories;
    }
    public function filteredSearch(string $filters): ?array {
        $stmt = $this->pdo->prepare('SELECT * FROM product WHERE category_id = :filters');
        $stmt->execute(['filters' => $filters]);
        $productsFiltred = $stmt->fetch(PDO::FETCH_ASSOC);
        return $productsFiltred;
    }
    
    
}