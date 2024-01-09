<?php

$nomPage = "messagerie";

require "./globalVar.php";
require $pathModels . "/MessageRead.php";
require $pathModels . "/MessageWrite.php";

session_start();

$id_util = $_SESSION['id_util'];

if (isset($_POST['message_id'])) {
    deleteMessage($_POST['message_id']);
}

if (isset($_POST['message_id_reply'])){
    $mes = getMessagesById($_POST['message_id_reply']);
    $email = $mes['mail_util'];
    $msg = $mes['contenu_message'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $destinataireEmail = $_POST['email'];
    $destinataireId = getUserIdByEmail($destinataireEmail);

    if (isset($id_util) && isset($destinataireId)) {
        sendMessage($id_util, htmlspecialchars($_POST['message']), array($destinataireId));
    } else {
        echo "Erreur : Identifiant invalide.";
    }
}
$receivedMessages = getReceivedMessages($id_util);

require $pathcontrolleurs . "/Header.php";
require $pathVues . "/messagerie.php";
