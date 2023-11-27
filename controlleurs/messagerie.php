<?php
require "./globalVar.php";
require $pathModels."/MessageRead.php";
require $pathModels."/MessageWrite.php";
require $pathModels."/UtilisateurRead.php";

// Définir $idUser en fonction de votre logique d'authentification
$idUser = 1; // Remplacez cela par la manière dont vous définissez l'ID de l'utilisateur

function displayConversations($idUser) {
    $conversations = getOtherUser($idUser);
    
    // Affichez les conversations comme vous le souhaitez
    foreach ($conversations as $conversation) {
        echo '<div onclick="loadMessages(' . $idUser . ',' . $conversation . ')">' . getUserByID($conversation)['mail_util'] . '</div>';
    }
}

function displayMessages($idUser, $idDestinataire) {
    $messages = getMessageWith($idUser, $idDestinataire);
    
    // Affichez les messages comme vous le souhaitez
    foreach ($messages as $message) {
        $sender = getUserByID($message['id_util']);
        echo '<div><strong>' . $sender['mail_util'] . ':</strong> ' . $message['contenu_message'] . '</div>';
    }
}

// Gérez le formulaire d'envoi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $emailDestinataire = $_POST['email'];
    $messageContent = $_POST['message'];

    // Récupérez l'ID du destinataire à partir de l'adresse e-mail
    $idDestinataire = getUserIdByEmail($emailDestinataire)['id_util'];

    // Vérifiez si la conversation existe déjà
    $conversations = getOtherUser($idUser);
    if (!in_array($idDestinataire, $conversations)) {
        // Si la conversation n'existe pas, créez-la
        sendMessage($idUser, 'Conversation créée', [$idDestinataire]);
    }

    // Envoyez le message
    sendMessage($idUser, $messageContent, [$idDestinataire]);
}

// Chargez les conversations
$conversations = getOtherUser($idUser);
$idDestinataire = !empty($conversations) ? reset($conversations) : null;

// Affichez les conversations
displayConversations($idUser);

// Chargez et affichez les messages si $idDestinataire est défini
if ($idDestinataire !== null) {
    $messages = getMessageWith($idUser, $idDestinataire);
    displayMessages($idUser, $idDestinataire);
}


require $pathVues."/messagerie.php";
?>
