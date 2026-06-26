<?php
require_once __DIR__ . '/../Model/livre.php';
require_once __DIR__ . '/../Model/ebook.php';
require_once __DIR__ . '/../Model/vinyle.php';

class ProduitFactory
{
    public static function creerProduit(array $ligne): Produit
    {
        return match($ligne['type']) {
            'livre' => new Livre($ligne['nom'], $ligne['prix_ht']),
            'ebook' => new Ebook($ligne['nom'], $ligne['prix_ht']),
            'vinyle' => new Vinyle($ligne['nom'], $ligne['prix_ht']),
            default => throw new Exception("Type inconnu : " . $ligne['type'])
        };
    }
}
?>