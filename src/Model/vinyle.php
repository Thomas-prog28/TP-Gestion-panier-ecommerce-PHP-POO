<?php
require_once __DIR__ . '/produit.php';

class Vinyle extends Produit
{
    public function calculerPrixTTC(): float 
    {
        return $this->prixHT * 1.20;
    }

    public function getFraisDePort(): float
    {
        return 4.0;
    }

    public function getType(): string
    {
        return 'vinyle';
    }
}
?>