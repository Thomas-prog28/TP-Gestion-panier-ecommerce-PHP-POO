<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
</head>

<body>
    <section>
        <h2>PANIER</h2>
    </section>

    <section>
        <h2>ajouter un produit</h2>
        <form method="post" action="traitement_formulaire.php">
            <div>
                <label for="nom">Nom du produit</label>
                <input type="text" id="nom" name="nom" placeholder="nom du produit" required>
            </div>
            <div>
                <label for="prixht">Prix HT</label>
                <input type="text" id="prixht" name="prixht" placeholder="prix HT du produit" required>
            </div>
            <fieldset>
                <legend>Type du produit</legend>
                <div>
                    <input type="radio" name="type" id="livre" value="livre" checked>
                    <label for="livre">Livre</label>
                </div>
                <div>
                    <input type="radio" name="type" id="ebook" value="ebook">
                    <label for="ebook">Ebook</label>
                </div>
                <div>
                    <input type="radio" name="type" id="vinyl" value="vinyle">
                    <label for="vinyl">Vinyl</label>
                </div>
            </fieldset>
            <input type="submit" value="Envoyer" />
        </form>
    </section>
</body>

</html>