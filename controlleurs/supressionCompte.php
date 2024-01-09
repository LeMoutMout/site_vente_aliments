<?php

$nomPage = 'supprimer compte';

require './GlobalVar.php';

session_start();

//require $pathcontrolleurs .'/Header.php';

require $pathModels .'/DeleteAccount.php';

if (isset($_GET['del'])) {
    deleteAcount($_SESSION['id_util']);
    ?>
    <script> location.href = "./resetSession.php"; </script>
    <?php
}

require $pathVues .'/suppresionCompte.php';