<?php
require_once __DIR__ . '/../../config/database.php';

class ProduitRepository
{
    public function findAll(): array
    {
       $pdo = Database::getConnexion();
       $stmt = $pdo->query('SELECT * FROM produit') ;
       return $stmt->fetchAll();
    }

    public function countByType(): array
    {
        $pdo = Database:: getConnexion();
        $stmt = $pdo->query('SELECT type, count(type) as total FROM produit GROUP BY (type)');
        return $stmt->fetchAll();
    }
}
?>