<?php
require_once __DIR__ . '/produit.php';

class Livre extends Produit
{
    public function calculerPrixTTC(): float 
    {
        return $this->prixHT * 1.055;
    }

    public function getFraisDePort(): float
    {
        return 2.0;
    }

    public function getType(): string
    {
        return 'livre';
    }
}
?>