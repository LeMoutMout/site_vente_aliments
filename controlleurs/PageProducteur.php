<?php

require "./globalVar.php";
require $pathModels . "/ProductorRead.php";
require $pathModels . "/produitLecture.php";
require $pathModels . "/AvisRead.php";
require $pathModels . "/PanierRead.php";
require $pathModels . "/PanierWrite.php";
require $pathVues . "/AchatProduit.php";

session_start();

//a deplacer dans le header (avec condition de si isset session id_util)
/*$id_util = $_SESSION['id_util'];

if (isset($_POST['achat_produit'])) {
    $id_produit = sprintf("%d", $_POST['achat_produit']);
    $quantite = $_POST['quantite'];
    $date = date("Y-m-d");

    insertIntoPanier($id_util, $id_produit, $quantite, $date);
}*/


if (!isset($_GET['prod'])) {
    header('Location: ' . $pathcontrolleurs . '/index.php');
}

//pb ici
$productor = getProductorById($_GET['prod']);
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
}


require $pathcontrolleurs . "/Header.php";
require $pathVues . "/PageProducteur.php";
