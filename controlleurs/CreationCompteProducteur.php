<?php
require './GlobalVar.php';

session_start();

if(isset($_SESSION['id_util'])){
    //redirect
    header('Location: ' . $pathcontrolleurs . '/index.php');
}

if (isset($_POST['prenom']) && isset($_POST['nom']) && isset($_FILES['image']) && isset($_POST['email']) && isset($_POST['numero']) && isset($_POST['motdepasse']) && isset($_POST['motdepasse2']) && isset($_POST['adresse']) && isset($_POST['ville']) && isset($_POST['cp']) && isset($_POST['domaine'])&& isset($_POST['description'])) {
    if ($_POST['motdepasse'] !== $_POST['motdepasse2']) {
        $erreur = 'les mot de passe sont diferent';
    } else {
        if (isset(getUserByMail($_POST['email'])['id_util'])) {
            $erreur = 'cette adresse mail est deja use';
        } else {
            require $pathModels . '/UtilisateurWrite.php';
            createUser($_POST['email'], $_POST['nom'], $_POST['prenom'], password_hash($_POST['motdepasse'], PASSWORD_DEFAULT), $_POST['numero'], $_POST['adresse']);
            $users = connect($_POST['email'], $_POST['motdepasse']);
            if ($users === -1) {
                $erreur = 'un erreur est survenue';
            } else {
                require $pathModels.'/ProductorWrite.php';

                createProductor($_POST['domaine'],$_POST['description'],$users['id_util']);

                $fichierTemporaire = $_FILES["image"]["tmp_name"];
                if (!empty($fichierTemporaire)) {
                    $extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
                    $cheminComplet = $pathImage . '/utilisateurs/' . $users['id_util'] . '.' . $extension;

                    move_uploaded_file($fichierTemporaire, $cheminComplet);

                    $_SESSION['id_util'] = $users['id_util'];
                    $_SESSION['mail_util'] = $users['mail_util'];
                    
                    //redirect
                    header('Location: ' . $pathcontrolleurs . '/index.php');
                    exit();
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
    $domain = $_POST['domaine'];
    $desc = $_POST['description'];
}

require $pathVues . '/CreationCompteProducteur.php';
