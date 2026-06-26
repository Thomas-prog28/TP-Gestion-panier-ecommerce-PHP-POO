<?php

require_once __DIR__ . '/../src/Repository/ProduitRepository.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $nom = trim($_POST['nom']) ?? "";
    $prixht = trim($_POST['prixht']) ?? "";
    $type = trim($_POST['type']) ?? "";

    $repository = new ProduitRepository();
    $repository->save($nom, $prixht, $type);

    header('Location: index.php');
}


