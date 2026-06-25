<?php
abstract class Produit 
{
    protected string $nom;
    protected float $prixHT;

    public function __cosntruct(string $nom, float $prixHT)
    {
        $this->nom = $nom;
        $this->prixHT = $prixHT;
    }

    public function getNom() {
        return $this->nom;
    }
}