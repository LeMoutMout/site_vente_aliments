<?php 

require './GlobalVar.php';
require $pathModels . "/produitLecture.php";
require $pathModels . "/PanierRead.php";
require $pathModels . "/UtilisateurRead.php";
require $pathModels . "/ImageGet.php";
require $pathModels . "/PanierWrite.php";
require $pathModels . "/produitWrite.php";
require $pathModels . "/ProductorRead.php";
require $pathModels . "/AvisRead.php";

session_start();

$_SESSION['id_util'] = 1;

if (isset($_POST['annuler'])) {
    changeStatut($_POST['annuler'], 5);
}
if (isset($_POST['commander'])) {
    changeStatut($_POST['commander'], 2);
}

$paniers = getPanierByUtil($_SESSION['id_util']);


require $pathVues . '/GestionPanier.php';
?>