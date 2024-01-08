<?php 

require './GlobalVar.php';
require $pathModels . "/produitLecture.php";
require $pathModels . "/PanierRead.php";
require $pathModels . "/PanierWrite.php";
require $pathModels . "/produitWrite.php";
require $pathModels . "/ProductorRead.php";
require $pathModels . "/AvisRead.php";

session_start();

if (isset($_POST['annuler'])) {
    changeStatut($_POST['annuler'], 5);
}
if (isset($_POST['commander'])) {
    changeStatut($_POST['commander'], 2);
}

$paniers = getPanierByUtil($_SESSION['id_util']);

require $pathcontrolleurs . "/Header.php";
require $pathVues . '/GestionPanier.php';
?>