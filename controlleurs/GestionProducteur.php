<?php

require "./globalVar.php";
require $pathModels . "/ProductorRead.php";
require $pathModels . "/produitLecture.php";
require $pathModels . "/AvisRead.php";
require $pathModels . "/PanierRead.php";
require $pathModels . "/PanierWrite.php";
require $pathModels . "/produitWrite.php";
require $pathVues . "/GestionProduit.php";

session_start();

require $pathcontrolleurs . "/Header.php";

if (!isProducteur($_SESSION['id_util'])) {
    header('Location: ' . $pathcontrolleurs . '/index.php');
}

$productor = getProductorByIdUtil($_SESSION['id_util']);
var_dump($_POST);
if (isset($productor['id_production'])) {
    $image_producteur = getUserImage($productor['id_util']);
    $adresse = $productor['adresse_util'];
    $desc = $productor['descr_production'];
    $nom_producteur = $productor['nom_production'];
    $produits = getProduitsFromProducteur($productor['id_production']);
    $nb_produits = getNbProduitsOf($productor['id_production']);
    $avis = getAvisFromProducteur($productor['id_production']);
    $nb_avis = getNbAvisOf($productor['id_production']);
    $moy_avis = getAVGAvisOf($productor['id_production']);
    $paniers = getPanierEnCoursFromProductor($productor['id_production']);
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

    $nom = $_POST['nom'];
    $stock = $_POST['stock'];
    $categorie = 'fruit'; //$_POST['categorie'];
    $prix = $_POST['prix'];
    $unite = 1; //$_POST['unite'];
    $promotion = 0;
    $bio = 0;

    if (isset($_POST['bio']) && $_POST['bio'] == 'checked') {
        $bio = 1;
    }

    if ($_POST['promotion'] != "") {
        $promotion = $_POST['promotion'];
    }

    if ($_POST['gestion_produit'] == -1) {
        ?> <script> alert('new') </script> <?php
        createProduct($productor['id_production'], $nom, $stock, $prix, $bio, $unite, $promotion);
        $id_produit = getLastIdProduit();
    } else {
        ?> <script> alert('upd') </script> <?php
        updateProduit($_POST['gestion_produit'], $nom, $stock, $prix, $bio, $promotion);
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


require $pathVues . "/GestionProducteur.php";
