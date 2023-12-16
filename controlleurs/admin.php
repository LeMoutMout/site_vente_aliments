<?php

require "./GlobalVar.php";
session_start();

if (!isAdmin($_SESSION['id_util'])){
    //redirect
    header('Location: ' . $pathcontrolleurs . '/index.php');
    exit();
}

require $pathModels."/ProductorRead.php";

if (isset($_POST['idUserASupr'])){
    require $pathModels."/DeleteAccount.php";
    deleteAcount($_POST['idUserASupr']);
}

if (isset($_POST['idUserAValide'])){
    require $pathModels."/ProductorWrite.php";
    setValidProductor($_POST['idUserAValide']);
}

if (isset($_GET['recherche'])) {
    $usersSearch = getUserSearch($_GET['recherche']);
}

$producteursNonValide = getProductorNonValide();

$csss[] = "../admin.css";

$messagerie = true;
$mesPanier = true;

require $pathcontrolleurs .'/Header.php';
require $pathVues."/admin.php";