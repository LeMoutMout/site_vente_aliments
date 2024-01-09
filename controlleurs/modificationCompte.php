<?php 

$nomPage = "modification compte";

require './globalVar.php';

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
    updateUser($_SESSION['id_util'],htmlspecialchars($_POST['email']),htmlspecialchars($_POST['nom']),htmlspecialchars($_POST['prenom']),htmlspecialchars($_POST['numero']),htmlspecialchars($_POST['adresse']));
    if (isset($_POST['domaine'])&& isset($_POST['description'])) {
        updateProductor(htmlspecialchars($producteur['id_production']),htmlspecialchars($_POST['domaine']),htmlspecialchars($_POST['description']));
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

require $pathcontrolleurs . '/Header.php';

if (isProducteur($_SESSION['id_util'])){
    $domain = $producteur['nom_production'];
    $desc = $producteur['descr_production'];
    require $pathVues . '/modificationProducteur.php';
} else {
    require $pathVues . '/modificationUtilisateur.php';
}


