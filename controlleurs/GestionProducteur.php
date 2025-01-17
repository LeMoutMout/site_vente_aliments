<?php

$nomPage = "gestion production";

require "./globalVar.php";
require $pathModels . "/ProductorRead.php";
require $pathModels . "/produitLecture.php";
require $pathModels . "/AvisRead.php";
require $pathModels . "/PanierRead.php";
require $pathModels . "/produitWrite.php";
require $pathModels . "/uniteRead.php";
require $pathModels . "/categorieRead.php";

session_start();

if (!isset($_SESSION['id_util']) or !isProducteur($_SESSION['id_util'])){
    ?> <script>location.href = 'index.php'</script> <?php
}

require $pathcontrolleurs . "/Header.php";

$productor = getProductorByIdUtil($_SESSION['id_util']);

if (isProducteurValide($_SESSION['id_util'])==-1) {
    $msg = 'votre compte n\'a pas été validé par un producteur vous produit ne sont pas visible dans la recherche';
    require $pathVues .'/message.php';
}

if (isset($_POST['refusee'])) {
    changeStatut($_POST['refusee'], 5);
}
if (isset($_POST['prete'])) {
    changeStatut($_POST['prete'], 3);
}
if (isset($_POST['livree'])) {
    changeStatut($_POST['livree'], 4);
}
if (isset($_POST['pdf'])) {
    //TODO
}

if (isset($_POST['gestion_produit'])) {

    $nom = htmlspecialchars($_POST['nom']);
    $stock = $_POST['stock'];
    $prix = $_POST['prix'];
    $unite = $_POST['unite'];
    $promotion = 0;
    $bio = 0;
    if (isset($_POST['categorie'])) {
        $categories = $_POST['categorie'];
    }else {
        $categorie = array();
    }

    if (isset($_POST['bio']) && $_POST['bio'] == 'checked') {
        $bio = 1;
    }

    if ($_POST['promotion'] != "") {
        $promotion = $_POST['promotion'];
    }

    if ($_POST['gestion_produit'] == -1) {
        createProduct($productor['id_production'], $nom, $stock, $prix, $bio, $unite, $promotion,$categories);
        $id_produit = getLastIdProduit();
    } else {
        updateProduit($_POST['gestion_produit'], $nom, $stock, $prix, $bio, $unite, $promotion);
        $id_produit = $_POST['gestion_produit'];
    }

    $fichierTemporaire = $_FILES["image"]["tmp_name"];
    if (!empty($fichierTemporaire)) {
        $extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        $cheminComplet = $pathImage . '/produits/' . $id_produit . '.' . $extension;

        $anciennes_images = glob($GLOBALS['pathImage'] . "/produits/" . $id_produit . ".*");

        if (isset($anciennes_images)) {
            foreach ($anciennes_images as $ancienne_image) {
                unlink($ancienne_image);
            }
        }

        move_uploaded_file($fichierTemporaire, $cheminComplet);
    }
}

if (isset($productor['id_production'])) {
    $image_producteur = getUserImage($productor['id_util']);
    $adresse = $productor['adresse_util'];
    $desc = $productor['descr_production'];
    $nom_producteur = $productor['nom_production'];
    $produits = getProduitsFromProducteurAll($productor['id_production']);
    $nb_produits = getNbProduitsOf($productor['id_production']);
    $avis = getAvisFromProducteur($productor['id_production']);
    $nb_avis = getNbAvisOf($productor['id_production']);
    $moy_avis = getAVGAvisOf($productor['id_production']);
    $paniers = getPanierEnCoursFromProductor($productor['id_production']);
}

$unites = getUnite();
$categories = getCategorie();

require $pathVues . "/GestionProduit.php";
require $pathVues . "/GestionProducteur.php";
