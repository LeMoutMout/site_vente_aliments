<?php
require './GlobalVar.php';

require $pathModels.'/produitLecture.php';
require $pathModels.'/ProductorRead.php';
require $pathModels.'/ImageGet.php';
require $pathModels."/UtilisateurRead.php";
require $pathModels."/AvisRead.php";

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

$promos = getPromo(6);

$produits = getProduitsLimit(10);

$producteurs = getProductorOrderByAvis(10);

require $pathVues.'/index.php';
?>
