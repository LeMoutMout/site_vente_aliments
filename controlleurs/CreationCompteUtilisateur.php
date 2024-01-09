<?php

$nomPage = "creation compte";


require './globalVar.php';

session_start();

if(isset($_SESSION['id_util'])){
    //redirect
    header('Location: ' . $pathcontrolleurs . '/index.php');
}

if (isset($_POST['prenom']) && isset($_POST['nom']) && isset($_FILES['image']) && isset($_POST['email']) && isset($_POST['numero']) && isset($_POST['motdepasse']) && isset($_POST['motdepasse2']) && isset($_POST['adresse']) && isset($_POST['ville']) && isset($_POST['cp'])) {
    if ($_POST['motdepasse'] !== $_POST['motdepasse2']) {
        $erreur = 'Les mots de passe ne sont pas identiques.';
    } else {
        if (isset(getUserByMail($_POST['email'])['id_util'])) {
            $erreur = 'Cette adresse mail est déjà utilisée.';
        } else {
            require $pathModels . '/UtilisateurWrite.php';
            createUser(htmlspecialchars($_POST['email']), htmlspecialchars($_POST['nom']), htmlspecialchars($_POST['prenom']), password_hash($_POST['motdepasse'], PASSWORD_DEFAULT), htmlspecialchars($_POST['numero']), htmlspecialchars($_POST['adresse'].' '.$_POST['ville'].' '.$_POST['cp']));
            $users = connect($_POST['email'], $_POST['motdepasse']);
            if ($users === -1) {
                $erreur = 'Une erreur est survenue';
            } else {
                $fichierTemporaire = $_FILES["image"]["tmp_name"];
                if (!empty($fichierTemporaire)) {
                    $extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
                    $cheminComplet = $pathImage . '/utilisateurs/' . $users['id_util'] . '.' . $extension;

                    move_uploaded_file($fichierTemporaire, $cheminComplet);
                    
                    $_SESSION['id_util'] = $users['id_util'];
                    $_SESSION['mail_util'] = $users['mail_util'];

                    //redirect
                    header('Location: ' . $pathcontrolleurs . '/index.php');
                } else {
                    $erreur = "Aucun fichier sélectionné.";
                }
            }
        }
    }
}

if (isset($erreur)) {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $image = $_FILES['image'];
    $email = $_POST['email'];
    $numero = $_POST['numero'];
    $mdp = $_POST['motdepasse'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $cp = $_POST['cp'];
}

$devenirProducteur = false;

require $pathcontrolleurs .'/Header.php';
require $pathVues . '/CreationCompteUtilisateur.php';
