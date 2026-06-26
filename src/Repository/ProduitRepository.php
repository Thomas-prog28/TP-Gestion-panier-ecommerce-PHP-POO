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

    public function save(string $nom, float $prix_ht, string $type): void
    {
        $pdo = Database::getConnexion();
        $insert = $pdo->prepare('INSERT INTO produit (nom, prix_ht, type) VALUES (:nom, :prix_ht, :type)');
        $insert->execute([':nom' => $nom, ':prix_ht' => $prix_ht, ':type' => $type]);
    }
}
?>