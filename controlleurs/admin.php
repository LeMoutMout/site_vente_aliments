<?php

require "./GlobalVar.php";
require $pathModels."/is.php";
session_start();

$_SESSION['id_util'] = 10;

if (!isAdmin($_SESSION['id_util'])){
    //redirect
    header('Location: ' . $pathcontrolleurs . '/index.php');
    exit();
}

require $pathModels."/ProductorRead.php";
require $pathModels."/ImageGet.php";

if (isset($_POST['idUserASupr'])){
    require $pathModels."/DeleteAccount.php";
    deleteAcount($_POST['idUserASupr']);
}

if (isset($_POST['idUserAValide'])){
    require $pathModels."/ProductorWrite.php";
    setValidProductor($_POST['idUserAValide']);
}

if (isset($_GET['recherche'])) {
    require $pathModels."/utilisateurRead.php";
  //  $usersSearch = getUserSearch($_GET['recherche']); corriger ce soir
}

$producteursNonValide = getProductorNonValide();


require $pathVues."/admin.php";