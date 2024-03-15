<?php

require_once __DIR__ . "/Database.php";

abstract class Table
{
    protected PDO $pdo;
    private $password;
    public function __construct(
        protected ?string $name
    )
    {
        $this->pdo = Database::getConnection();
    }

    public function findAll(): ?array
    {
        $stmt =  $this->pdo->query("SELECT * FROM " . $this->name);
        $findall = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $findall;
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
    public function searchAll(): ?array 
    {
        $stmt = $this->pdo->prepare('SELECT * FROM ' . $this->name);
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    
    
    public function filteredSearch(string $productName, int $categoryId): ?array {
        $stmt = $this->pdo->prepare('SELECT * FROM product WHERE category_id = :category_id AND name LIKE :product_name');
        $stmt->execute(['category_id' => $categoryId, 'product_name' => '%' . $productName . '%']); // recherche de produit partiellement ressemblant Made by chatGpt gg
        $productsFiltered = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $productsFiltered;
    }
    public function getCategoryName(int $categoryId): ?array
    {
    $stmt = $this->pdo->prepare('SELECT name FROM ' . $this->name . ' WHERE id = :id');
    $stmt->execute(['id' => $categoryId]);

    $category = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($category === false) {
        return null;
    }

    return $category;
    }

    public function insertUser($username, $password): ?array {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare("INSERT INTO users (login, password) VALUES (:username, :password)");
        $stmt->execute(['username' => $username, 'password' => $hashedPassword]);
        if ($stmt->rowCount() > 0) {
            return ['login' => $username];
        } else {
            return null;
        }
    }
    
    
    public function verifyUser($username): ?array {
        $stmt = $this->pdo->prepare("SELECT id, password FROM users WHERE User = :username");
        $stmt->execute(['login' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    public function countUser(): int {
        return $this->pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
    }
    

    public function getPassword()
    {
        $stmt = $this->pdo->prepare("SELECT Password FROM users");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($result) {
            return $result['Password'];
        } else {
            return null;
        }
    }
    
}