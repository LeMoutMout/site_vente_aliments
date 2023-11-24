<?php
require "./globalVar.php";
require $pathModels."/UtilisateurRead.php";

$error_message = ""; // Initialisez la variable d'erreur

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = connect($email, $password);

        if ($user !== -1) {
            echo "caca";
            exit();
        } else {
            $error_message = "Identifiants invalides. Veuillez réessayer.";
            echo $error_message;
        }
    }
}

require $pathVues."/index.php";
?>
