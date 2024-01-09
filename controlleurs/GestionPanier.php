<?php 

$nomPage = "mes paniers";


require './GlobalVar.php';
require $pathModels . "/produitLecture.php";
require $pathModels . "/PanierRead.php";
require $pathModels . "/produitWrite.php";
require $pathModels . "/ProductorRead.php";
require $pathModels . "/AvisRead.php";
require $pathModels . "/AvisWrite.php";

session_start();

if (!isset($_SESSION['id_util'])){
    ?> <script>location.href = 'index.php'</script> <?php
}

if (isset($_POST['annuler'])) {
    supprPanier($_POST['annuler']);
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
if(isset($_POST['panier_avis'])){
    $id_panier = $_POST['panier_avis'];
    $note = $_POST['note'];
    $contenu = $_POST['avis'];
    createAvis($id_panier,$note,$contenu);
}

$paniers = getPanierByUtilWithStatus($_SESSION['id_util'],'(1)');
if(isset($_POST['panier_enCours'])){
    $paniers = getPanierByUtilWithStatus($_SESSION['id_util'],'(1)');
}
if(isset($_POST['panier_prep_pret'])){
    $paniers = getPanierByUtilWithStatus($_SESSION['id_util'],'(2,3)');
}
if(isset($_POST['panier_livre'])){
    $paniers = getPanierByUtilWithStatus($_SESSION['id_util'],'(4)');
}
if(isset($_POST['panier_annule'])){
    $paniers = getPanierByUtilWithStatus($_SESSION['id_util'],'(5)');
}


require $pathcontrolleurs . "/Header.php";
require $pathVues . "/Avis.php";
require $pathVues . '/GestionPanier.php';
?>