<?php
/* a suprimer
require "./globalVar.php";

$nomPage = "truc";
/*
$devenirProducteur = false;
$ajouteUnProduit = false;
$gestionProduit = false;
$gestionCompte = true;

$barreDeRecherche = true;

$mesPanier = true;
$messagerie = true;
/**/ //-----------

$csss[] = "../Header.css";

//---/
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

if (isset($_POST['ConnectionMail']) && isset($_POST['ConnectionPassword'])) {
    $user = connect($_POST['ConnectionMail'], $_POST['ConnectionPassword']);

    if ($user !== -1) {

        $_SESSION['id_util'] = $user['id_util'];
        $_SESSION['mail_util'] = $user['mail_util'];
        if (($idp = isProducteur($user['id_util'])) != -1) {
            $_SESSION['id_production'] = $idp;
        }
    } else {
        $error_message = "Identifiants invalides. Veuillez réessayer.";
    }
}

if (isset($_SESSION['id_util']) && isset($_SESSION['mail_util'])) {
    $isConnected = true;
    $idUtilisateur = $_SESSION['id_util'];
    $mailUtilisateur = $_SESSION['mail_util'];
} else {
    $isConnected = false;
}

if (!isset($devenirProducteur) && !isset($ajouteUnProduit) && !isset($barreDeRecherche) && !isset($gestionProduit) && !isset($mesPanier) && !isset($messagerie) && !isset($gestionCompte)) {
    $barreDeRecherche = true;
    if ($isConnected) {
        $messagerie = true;
        $mesPanier = true;

        if (isProducteur($idUtilisateur) !== -1){
            $gestionProduit = true;
        }

        if(isAdmin($idUtilisateur)){
            $gestionCompte = true;
        }       
    }
    
    if (!isset($gestionProduit) && !isset($gestionCompte)) {
        $devenirProducteur = true;
    } 
}

if (!isset($devenirProducteur)) {
    $devenirProducteur = false;
}

if (!isset($ajouteUnProduit)) {
    $ajouteUnProduit = false;
}

if (!isset($barreDeRecherche)) {
    $barreDeRecherche = false;
}

if (!isset($gestionProduit)) {
    $gestionProduit = false;
}

if (!isset($mesPanier)) {
    $mesPanier = false;
}

if (!isset($messagerie)) {
    $messagerie = false;
}

if (!isset($gestionCompte)) {
    $gestionCompte = false;
}

if (!isset($recherchePath)) {
    $recherchePath = $pathcontrolleurs . '/rechercheProduit.php';
}
require $pathVues . "/header.php";
