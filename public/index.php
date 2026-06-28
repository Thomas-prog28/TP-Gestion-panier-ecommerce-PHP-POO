<?php
require_once __DIR__ . '/../src/Repository/ProduitRepository.php';
require_once __DIR__ . '/../src/Factory/ProduitFactory.php';

$repository = new ProduitRepository();
$lignes = $repository->findAll();
$tabType = $repository->countByType();

$total = 0;
foreach ($lignes as $ligne) {
    $produit = ProduitFactory::creerProduit($ligne);
    $ttc = $produit->calculerPrixTTC();
    $port = $produit->getFraisDePort();
    $type = strtolower($produit->getType());
    $total += $ttc + $port;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Panier</title>
</head>

<body>
    <header class="header">
        <h1 class="header__titre">La Librairie du Coin</h1>
        <h2 class="header__sous-titre">- Registre des ouvrages -</h2>
    </header>

    <main class="main">
        <section class="section">
            <h3 class="section__titre">Votre panier</h3>
            <div class="stats">
                <?php foreach ($tabType as $tab): ?>
                    <div class="stats__carte">
                        <span class="stats__nombre">
                            <?= $tab['total'] ?>
                        </span>
                        <span class="stats__label">
                            <?= $tab['type'] ?>
                        </span>
                    </div>
                <?php endforeach; ?>
                <!-- Carte TOTAL -->
                <div class="stats__carte">
                    <span class="stats__nombre">
                        <?= number_format($total, 2, ',', ' ') ?> €
                    </span>
                    <span class="stats__label">
                        TOTAL
                    </span>
                </div>
            </div>
        </section>

        <section class="tableau-wrapper">
            <table class="tableau">
                <thead class="tableau__head">
                    <tr>
                        <th>Nom</th>
                        <th>Type</th>
                        <th>Prix TTC</th>
                        <th>Frais de port</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lignes as $ligne): ?>
                        <?php
                            $produit = ProduitFactory::creerProduit($ligne);
                            $ttc = $produit->calculerPrixTTC();
                            $port = $produit->getFraisDePort();
                            $type = strtolower($produit->getType()); 
                            ?>
                            <tr class="tableau__ligne">
                                <td><?= htmlspecialchars($produit->getNom()) ?></td>
                                <td><span class="badge badge--<?= $type ?>"> <?= htmlspecialchars($produit->getType()) ?></span></td>
                                <td><?= number_format($ttc, 2, ',', ' ') ?> €</td>
                                <td><?= number_format($port, 2, ',', ' ') ?> €</td>
                            </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </section>

        <p class="total">Total : <?= number_format($total, 2, ',', ' ') ?></p>

        <hr class="divider">

        <section class="section">
            <h3 class="section__titre">ajouter un produit</h3>
            <form class="formulaire" method="post" action="traitement_formulaire.php">
                <div class="formulaire__grille">
                    <div class="formulaire__groupe">
                        <label class="formulaire__label" for="nom">Nom du produit</label>
                        <input class="formulaire__input" type="text" id="nom" name="nom" placeholder="nom du produit" required>
                    </div>
                    <div class="formulaire__groupe">
                        <label class="formulaire__label" for="prixht">Prix HT</label>
                        <input class="formulaire__input" type="text" id="prixht" name="prixht" placeholder="prix HT du produit" required>
                    </div>
                </div>
                <fieldset>
                    <legend>Type du produit</legend>
                    <div class="formulaire__radio-groupe">
                        <label class="formulaire__radio-label" for="livre">
                            <input type="radio" name="type" id="livre" value="livre" checked>Livre
                        </label>
                        <label class="formulaire__radio-label" for="ebook">
                            <input type="radio" name="type" id="ebook" value="ebook">Ebook
                        </label>
                        <label class="formulaire__radio-label" for="vinyl">
                            <input type="radio" name="type" id="vinyl" value="vinyle">Vinyl
                        </label>
                    </div>
                </fieldset>
                <button class="formulaire__btn" type="submit" value="Envoyer">Envoyer</button>
            </form>
        </section>
    </main>

    <footer class="footer">
        Copyright 2025 - La Librairie du Coin
    </footer>
</body>

</html>