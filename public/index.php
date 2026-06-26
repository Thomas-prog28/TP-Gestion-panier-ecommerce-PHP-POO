<?php
require_once __DIR__ . '/../src/Repository/ProduitRepository.php';
require_once __DIR__ . '/../src/Factory/ProduitFactory.php';

$repository = new ProduitRepository();
$lignes = $repository->findAll();

$total = 0;

foreach($lignes as $ligne) {
    $produit = ProduitFactory::creerProduit($ligne);
    $ttc = $produit->calculerPrixTTC();
    $port = $produit->getFraisDePort();

    echo $produit->getNom() . " - TTC : $ttc € - Port : $port € - Type : " . $produit->getType() . "<br>";

    $total += $ttc + $port;
}
echo "TOTAL : $total €";
?>
