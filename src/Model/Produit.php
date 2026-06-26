<?php
abstract class Produit 
{
    protected string $nom;
    protected float $prixHT;

    public function __construct(string $nom, float $prixHT)
    {
        $this->nom = $nom;
        $this->prixHT = $prixHT;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    abstract public function calculerPrixTTC(): float;

    public function getFraisDePort() 
    {
        return 0;
    }

    abstract public function getType(): string;   //on ajoute ici pour éviter que PHP ne comprenne pas dans index.php alors qu'on a surchargé getType() dans chaque enfant livre, ebook et vinyl
}
?>