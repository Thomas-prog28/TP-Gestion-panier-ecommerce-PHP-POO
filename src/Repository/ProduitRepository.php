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
}
?>