<?php
require "./globalVar.php";
require $pathModels."/MessageRead.php";
require $pathModels."/MessageWrite.php";
require $pathModels."/UtilisateurRead.php";

session_start();
$_SESSION['idUser']=1;
$idUser = $_SESSION['idUser'] ?? null;
if (!$idUser) {
    exit("Utilisateur non défini.");
}

// Fonction pour afficher les messages
function displayMessages($messages) {
    foreach ($messages as $message) {
        $sender = getUserByID($message['id_util']);
        echo '<div><strong>' . $sender['mail_util'] . ':</strong> ' . $message['contenu_message'] . '</div>';
    }
}

// Fonction pour afficher la liste des conversations
function displayConversations($idUser, $searchTerm = null) {
    $conversations = getOtherUser($idUser);
    
    // Affichez les conversations comme vous le souhaitez
    foreach ($conversations as $conversation) {
        $user = getUserByID($conversation);
        
        // Appliquez le filtre de recherche si un terme est fourni
        if (!$searchTerm || stripos($user['mail_util'], $searchTerm) !== false) {
            echo '<li onclick="loadMessages(' . $idUser . ',' . $conversation . ')" data-id="' . $conversation . '">' . $user['mail_util'] . '</li>';
        }
    }
}
// Gérez le formulaire de recherche et de nouvelle conversation
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['search'])) {
        // Recherchez des conversations avec le terme spécifié
        $searchTerm = $_POST['search'];
        displayConversations($idUser, $searchTerm);
    } elseif (isset($_POST['email'])) {
        // Créez une nouvelle conversation avec l'email spécifié
        $emailDestinataire = $_POST['email'];
        $messageContent = 'Nouvelle conversation';
        $idDestinataire = getUserIdByEmail($emailDestinataire)['id_util'];

        // Vérifiez si la conversation existe déjà
        $conversations = getOtherUser($idUser);
        if (!in_array($idDestinataire, $conversations)) {
            // Si la conversation n'existe pas, créez-la
            sendMessage($idUser, $messageContent, [$idDestinataire]);
        }

        // Rechargez les conversations et les messages après la création
        $conversations = getOtherUser($idUser);
        displayConversations($idUser);

        // Chargez les messages pour la nouvelle conversation créée
        $messages = getMessageWith($idUser, $idDestinataire);
        displayMessages($messages);
    }
} else {
    // Chargez les conversations au chargement de la page
    displayConversations($idUser);

    // Affichez les messages pour la première conversation (s'il y en a)
    $conversations = getOtherUser($idUser);
    $idDestinataire = !empty($conversations) ? reset($conversations) : null;
    $messages = [];

    if ($idDestinataire) {
        $messages = getMessageWith($idUser, $idDestinataire);
    }

    // Affichez les messages pour la première conversation (s'il y en a)
    displayMessages($messages);
}

require $pathVues."/messagerie.php";
?>
