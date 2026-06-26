<?php
require_once __DIR__ . '/../src/Repository/ProduitRepository.php';
require_once __DIR__ . '/../src/Factory/ProduitFactory.php';
include_once __DIR__ . '/formulaire.php';

$repository = new ProduitRepository();
$lignes = $repository->findAll();
$tabType = $repository->countByType();

$total = 0;

foreach($lignes as $ligne) {
    $produit = ProduitFactory::creerProduit($ligne);
    $ttc = $produit->calculerPrixTTC();
    $port = $produit->getFraisDePort();

    echo $produit->getNom() . " - TTC : $ttc € - Port : $port € - Type : " . $produit->getType() . "<br>";

    $total += $ttc + $port;    
}
echo "TOTAL : $total €";
echo "<br><br>";

echo "QUANTITE PAR TYPE DE PRODUIT <br> =============================<br>";
foreach($tabType as $tab) {
    echo $tab['type'] . " = " . $tab['total'] . "<br>";
}
?>
