<?php

$nomPage = "messagerie";

require "./globalVar.php";
require $pathModels . "/MessageRead.php";
require $pathModels . "/MessageWrite.php";

session_start();

if (!isset($_SESSION['id_util'])) {
?>
    <script>
        location.href = "index.php"
    </script>
    <?php
}

$id_util = $_SESSION['id_util'];

if (isset($_POST['message_id'])) {
    deleteMessage($_POST['message_id']);
}

if (isset($_POST['message_id_reply'])) {
    $mes = getMessagesById($_POST['message_id_reply']);
    $email = $mes['mail_util'];
    $msg = $mes['contenu_message'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $destinataireEmail = $_POST['email'];
    $destinataireId = array(getUserIdByEmail($destinataireEmail));

    if (isAdmin($_SESSION['id_util'])) {
        require $pathModels . '/ProductorRead.php';
        if ($destinataireEmail === 'dif@util') {
            $destinataireId = array();
            $dests = getUser();
            foreach ($dests as $dest) {
                if (isset($dest['id_util']))
                    array_push($destinataireId, $dest['id_util']);
            }
        } 
        if ($destinataireEmail === 'dif@prod') {
            $destinataireId = array();
            $dests = getIdUtilOfAllProducteur();
            foreach ($dests as $dest) {
                if (isset($dest['id_util']))
                    array_push($destinataireId, $dest['id_util']);
            }
        }
    }

    var_dump($destinataireId);

    if (isset($id_util) && isset($destinataireId) && isset($destinataireId[0])) {
        sendMessage($id_util, htmlspecialchars($_POST['message']), $destinataireId);
    ?>
        <script>
            alert('message envoyer')
            //location.href = 'messagerie.php';
        </script> <?php
                } else {
                    ?> <script>
            alert('Erreur : email invalide.')
        </script>
<?php
                }
            }
            $receivedMessages = getReceivedMessages($id_util);

            require $pathcontrolleurs . "/Header.php";
            require $pathVues . "/messagerie.php";
