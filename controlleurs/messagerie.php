<?php
require "./globalVar.php";
require $pathModels."/MessageRead.php";
require $pathModels."/MessageWrite.php";
require $pathModels."/UtilisateurRead.php";
session_start();
$_SESSION['id_util']=15;
$id_util = $_SESSION['id_util']; // Assurez-vous de définir cela correctement en fonction de la structure de votre session
if (isset($_POST['message_id'])){
    deleteMessage($_POST['message_id']);
    }
$receivedMessages = getReceivedMessages($id_util);

// Vérifiez si le formulaire de démarrage d'une nouvelle conversation est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $destinataireEmail = $_POST['email'];    
    // Obtenez l'ID du destinataire à partir de son adresse e-mail (vous devez implémenter cette fonction dans votre modèle UtilisateurRead.php)
    $destinataireId = getUserIdByEmail($destinataireEmail);

    // Assurez-vous que l'ID de l'utilisateur actuel et du destinataire est valide
    if (isset($id_util) && isset($destinataireId)) {
        // Envoyez le message en utilisant la fonction du modèle
        sendMessage($id_util,$_POST['message'], array($destinataireId));
    } else {
        // Gérez le cas où les ID ne sont pas valides
        echo "Erreur : Identifiant invalide.";
    }
}


require $pathVues."/messagerie.php";
