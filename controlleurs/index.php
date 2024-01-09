<?php
require './GlobalVar.php';

require $pathModels.'/produitLecture.php';
require $pathModels.'/ProductorRead.php';
require $pathModels."/AvisRead.php";



$promos = getPromo(4);

$produits = getProduitsLimit(8);

$producteurs = getProductorOrderByAvis(10);

require $pathcontrolleurs . '/Header.php';
require $pathVues.'/index.php';
?>
