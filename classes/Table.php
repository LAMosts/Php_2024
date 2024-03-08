<?php

require_once __DIR__ . "/Database.php";

abstract class Table
{
    protected PDO $pdo;
    
    public function __construct(
        protected string $name
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
    public function search(string $catname): ?array 
    {
        $stmt = $this->pdo->prepare('SELECT ' . $catname . ' FROM ' . $this->name . " WHERE name = :catname");
        $stmt->execute(['name' => $catname]);
        $categories = $stmt->fetch(PDO::FETCH_ASSOC);
        return $categories;
    }
}