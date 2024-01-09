<?php 

require './GlobalVar.php';
require $pathModels . "/produitLecture.php";
require $pathModels . "/PanierRead.php";
require $pathModels . "/produitWrite.php";
require $pathModels . "/ProductorRead.php";
require $pathModels . "/AvisRead.php";

session_start();

if (isset($_POST['annuler'])) {
    supprPanier($_POST['supprimer_produit']);
}
if (isset($_POST['commander'])) {
    changeStatut($_POST['commander'], 2);
}
if(isset($_POST['supprimer_produit'])){
    supprFromPanier($_POST['supprimer_produit'],$_POST['supprimer_produit_2']);
    if(empty(getProduitOf($_POST['supprimer_produit']))){
        supprPanier($_POST['supprimer_produit']);
    }
}

$paniers = getPanierByUtil($_SESSION['id_util']);

require $pathcontrolleurs . "/Header.php";
require $pathVues . '/GestionPanier.php';
?>