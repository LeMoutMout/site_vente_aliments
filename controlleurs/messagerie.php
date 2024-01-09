<?php

$nomPage = "messagerie";

require "./globalVar.php";
require $pathModels."/MessageRead.php";
require $pathModels."/MessageWrite.php";

session_start();

$id_util = $_SESSION['id_util']; 

if (isset($_POST['message_id'])){
    deleteMessage($_POST['message_id']);
    }

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $destinataireEmail = $_POST['email'];    
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
        echo "Erreur : Identifiant invalide.";
    }
}
$receivedMessages = getReceivedMessages($id_util);

require $pathcontrolleurs . "/Header.php";
require $pathVues."/messagerie.php";
        