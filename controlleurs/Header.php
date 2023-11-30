<?php
//* a suprimer
require "./globalVar.php";
require $pathModels.'/ImageGet.php';

$nomPage = "truc";

$devenirProducteur = true;
$ajouteUnProduit = false;
$gestionProduit = false;
$gestionCompte = false;

$barreDeRecherche = true;

$mesPanier = true;
$messagerie =true;
/**///-----------

$csss[] = "../Header.css";

session_start();

if (isset($_SESSION['id_util']) && isset($_SESSION['mail_util'])) {
    $isConnected = true;
    $idUtilisateur = $_SESSION['id_util'];
    $mailUtilisateur = $_SESSION['mail_util'];
}else {
    $isConnected = false;
}

if (!isset($devenirProducteur)){
    $devenirProducteur = false;
}

if (!isset($ajouteUnProduit)){
    $ajouteUnProduit = false;
}

if (!isset($barreDeRecherche)){
    $barreDeRecherche = false;
}

if (!isset($gestionProduit)){
    $gestionProduit = false;
}

if (!isset($mesPanier)){
    $mesPanier = false;
}

if (!isset($messagerie)){
    $messagerie = false;
}

if (isset($gestionCompte)){
    $gestionCompte = false;
}

require $pathVues."/header.php";