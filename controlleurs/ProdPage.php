<?php

require "./globalVar.php";
require $pathModels."/ProductorRead.php";
require $pathModels."/produitLecture.php";
require $pathModels."/AvisRead.php";
require $pathModels."/PanierRead.php";
require $pathModels."/UtilisateurRead.php";
require $pathModels."/ImageGet.php";

session_start();
// edit demain matin
$_SESSION['id_util'] = 1;

if(isset($_SESSION['id_util'])){
    $productor = getProductorById($_SESSION['id_util']);
    if(isset($productor['id_production'])){
        $image_producteur = getUserImage($productor['id_util']);
        $adresse = $productor['adresse_util'];
        $desc = 'test desc';//$productor['descr_production'];
        $nom_producteur = 'test';//$productor['nom_production'];
        $produits = getProduitsFromProducteur($productor['id_production']);
        $nb_produits = getNbProduitsOf($productor['id_production']);
        $avis = getAvisFromProducteur($productor['id_production']);
        $nb_avis = getNbAvisOf($productor['id_production']);
        $moy_avis = getAVGAvisOf($productor['id_production']);
        $paniers = getPanierEnCoursFromProductor($productor['id_production']);
    }
}

require $pathVues."/PageProducteur.php";
?>