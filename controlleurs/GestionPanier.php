<?php 

require './GlobalVar.php';
require $pathModels . "/produitLecture.php";
require $pathModels . "/PanierRead.php";
require $pathModels . "/UtilisateurRead.php";
require $pathModels . "/ImageGet.php";
require $pathModels . "/PanierWrite.php";
require $pathModels . "/produitWrite.php";

session_start();

$paniers = getPanierByUtil($_SESSION['id_util']);

require $pathVues . '/GestionPanier.php';
?>