<?php
require "./globalVar.php";
require $pathModels."/MessageRead.php";
require $pathModels."/MessageWrite.php";
require $pathModels."/UtilisateurRead.php";
session_start();
$_SESSION['id_util']=1;
// Vérifiez si le formulaire de démarrage d'une nouvelle conversation est soumis
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['email'])) {
    $destinataireEmail = $_GET['email'];

    // Vous devez obtenir l'ID de l'utilisateur actuel à partir de la session (assurez-vous que l'ID est stocké en session lors de la connexion de l'utilisateur)
    $id_util = $_SESSION['id_util']; // Assurez-vous de définir cela correctement en fonction de la structure de votre session

    // Obtenez l'ID du destinataire à partir de son adresse e-mail (vous devez implémenter cette fonction dans votre modèle UtilisateurRead.php)
    $destinataireId = getUserByMail($destinataireEmail)['id_util'];

    echo $destinataireId;

    // Assurez-vous que l'ID de l'utilisateur actuel et du destinataire est valide
    if (isset($id_util) && isset($destinataireId)) {
        // Envoyez le message en utilisant la fonction du modèle
        sendMessage($id_util, "Message de démarrage de conversation", [$destinataireId]);

        // Effectuez d'autres actions si nécessaire

        exit();
    } else {
        // Gérez le cas où les ID ne sont pas valides
        echo "Erreur : ID d'utilisateur invalide.";
    }
}

require $pathVues."/messagerie.php";