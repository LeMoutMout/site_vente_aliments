<?php
require "./globalVar.php";
require $pathModels."/MessageRead.php";
require $pathModels."/MessageWrite.php";
session_start();
$_SESSION['id_util']=15;
$id_util = $_SESSION['id_util']; 
if (isset($_POST['message_id'])){
    deleteMessage($_POST['message_id']);
    }

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $destinataireEmail = $_POST['email'];    
    $destinataireId = getUserIdByEmail($destinataireEmail);

    if (isset($id_util) && isset($destinataireId)) {
        sendMessage($id_util,$_POST['message'], array($destinataireId));
    } else {
        echo "Erreur : Identifiant invalide.";
    }
}
$receivedMessages = getReceivedMessages($id_util);

require $pathVues."/messagerie.php";
        