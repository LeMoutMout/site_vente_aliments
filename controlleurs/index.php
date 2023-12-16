<?php
require './GlobalVar.php';

require $pathModels.'/produitLecture.php';
require $pathModels.'/ProductorRead.php';
require $pathModels."/AvisRead.php";



$promos = getPromo(6);

$produits = getProduitsLimit(10);

$producteurs = getProductorOrderByAvis(10);

require $pathcontrolleurs . '/Header.php';
require $pathVues.'/index.php';
?>
