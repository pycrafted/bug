<?php
require_once __DIR__ . '/../config/db_connect.php';

class Category {
    private $pdo;

    public function __construct() {
        $this->pdo = getDatabaseConnection();
    }

    public function getAllCategories(): array {
        $sql = 'SELECT id, libelle FROM Categorie ORDER BY libelle';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}