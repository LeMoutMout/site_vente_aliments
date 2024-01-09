<?php 

$nomPage = "modification compte";

require './GlobalVar.php';

require $pathModels .'/ProductorRead.php';
require $pathModels .'/ProductorWrite.php';
require $pathModels .'/UtilisateurWrite.php';

session_start();

if (!isset($_SESSION['id_util'])) {
    ?> <script>location.href = './index.php'; </script> <?php
}

if (isProducteur($_SESSION['id_util'])){
    $producteur = getProductorByIdUtil($_SESSION['id_util']);
}

if ( isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['numero']) && isset($_POST['adresse']) ) {
    updateUser($_SESSION['id_util'],$_POST['email'],$_POST['nom'],$_POST['prenom'],$_POST['numero'],$_POST['adresse']);
    if (isset($_POST['domaine'])&& isset($_POST['description'])) {
        updateProductor($producteur['id_production'],$_POST['domaine'],$_POST['description']);
    }
    ?> 
    <script>
        location.href = 'index.php';
    </script>
    <?php
}

$user = getUserByID($_SESSION['id_util']);

$prenom = $user['pren_util'];
$nom = $user['nom_util'];
$image = getUserImage($_SESSION['id_util']);
$email = $user['mail_util'];
$numero = $user['tel_util'];
$adresse = $user['adresse_util'];

require $pathcontrolleurs . '/header.php';

if (isProducteur($_SESSION['id_util'])){
    $domain = $producteur['nom_production'];
    $desc = $producteur['descr_production'];
    require $pathVues . '/modificationProducteur.php';
} else {
    require $pathVues . '/modificationUtilisateur.php';
}


