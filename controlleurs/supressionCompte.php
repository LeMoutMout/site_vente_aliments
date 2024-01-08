<?php

require './GlobalVar.php';

//require $pathcontrolleurs .'/Header.php';

require $pathModels .'/DeleteAccount.php';

if (isset($_GET['del'])) {
    deleteAcount($_SESSION['id_util']);
    ?>
    <script> location.href = "./index.php"; </script>
    <?php
}

require $pathVues .'/suppresionCompte.php';