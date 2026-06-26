<?php
require_once __DIR__ . '/produit.php';

class Ebook extends Produit
{
    public function calculerPrixTTC(): float
    {
        return $this->prixHT * 1.20;
    }

    public function getType(): string
    {
        return 'ebook';
    }
}