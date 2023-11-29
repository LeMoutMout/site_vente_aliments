<?php

require "./globalVar.php";
require $pathModels . "/ProductorRead.php";
require $pathModels . "/produitLecture.php";
require $pathModels . "/AvisRead.php";
require $pathModels . "/PanierRead.php";
require $pathModels . "/UtilisateurRead.php";
require $pathModels . "/ImageGet.php";
require $pathModels . "/PanierWrite.php";

session_start();

$_SESSION['id_util'] = 1;

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

if (isset($_SESSION['id_util'])) {
    $productor = getProductorById($_SESSION['id_util']);
    if (isset($productor['id_production'])) {
        $image_producteur = getUserImage($productor['id_util']);
        $adresse = $productor['adresse_util'];
        $desc = 'CCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCC'; //$productor['descr_production'];
        $nom_producteur = 'CCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCC'; //$productor['nom_production'];
        $produits = getProduitsFromProducteur($productor['id_production']);
        $nb_produits = getNbProduitsOf($productor['id_production']);
        $avis = getAvisFromProducteur($productor['id_production']);
        $nb_avis = getNbAvisOf($productor['id_production']);
        $moy_avis = getAVGAvisOf($productor['id_production']);
        $paniers = getPanierEnCoursFromProductor($productor['id_production']);
    }
}





require $pathVues . "/GestionProducteur.php";
