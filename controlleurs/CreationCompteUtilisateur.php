<?php
require './GlobalVar.php';
echo 'start<br>';
if (isset($_POST['prenom']) && isset($_POST['nom']) && isset($_FILES['image']) && isset($_POST['email']) && isset($_POST['numero']) && isset($_POST['motdepasse']) && isset($_POST['motdepasse2']) && isset($_POST['adresse']) && isset($_POST['ville']) && isset($_POST['cp'])) {
    echo 'in<br>';
    if ($_POST['motdepasse'] !== $_POST['motdepasse2']) {
        $erreur = 'les mot de passe sont diferent';
    } else {
        require $pathModels . '/UtilisateurRead.php';
        if (isset(getUserByMail($_POST['email'])['id_util'])) {
            $erreur = 'cette adresse mail est deja use';
        } else {
            require $pathModels . '/UtilisateurWrite.php';
            createUser($_POST['email'], $_POST['nom'], $_POST['prenom'], password_hash($_POST['motdepasse'], PASSWORD_DEFAULT), $_POST['numero'], $_POST['adresse']);
            $users = connect($_POST['email'], $_POST['motdepasse']);
            if ($users === - 1) {
                $erreur = 'un erreur est survenue';
            } else {
                var_dump($users);

                echo '<br>';

                // Récupérer le fichier téléchargé
                $fichierTemporaire = $_FILES["image"]["tmp_name"];

                // Vérifier si un fichier a été sélectionné
                if (! empty($fichierTemporaire)) {
                    // Récupérer l'extension du fichier d'origine
                    $extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
                    $nomImage = $users['id_util']; // Vous pouvez utiliser un nom spécifique ou générer un nom dynamiquement
                    $cheminComplet = $pathImage . '/utilisateurs/' . $nomImage . '.' . $extension;

                    // Déplacer le fichier temporaire vers l'emplacement spécifié avec le nouveau nom
                    move_uploaded_file($fichierTemporaire, $cheminComplet);
                    
                    header('Location: '.$pathcontrolleurs.'/index.php');
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
}

require $pathVues . '/CreationCompteUtilisateur.php';