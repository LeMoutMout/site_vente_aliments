<?php

require './GlobalVar.php';

require $pathModels.'/produitLecture.php';
require $pathModels.'/ProductorRead.php';
require $pathModels.'/ImageGet.php';

$promos = getPromo(8);

$produits = getProduitsLimit(8);

$producteurs = getProductor();

require $pathVues.'/index.php';