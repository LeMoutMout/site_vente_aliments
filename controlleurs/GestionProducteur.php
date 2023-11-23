<?php

require "./globalVar.php";
require $pathModels."/ProductorRead.php";
require $pathModels."/ProduitLecture.php";
require $pathModels."/AvisRead.php";
require $pathModels."/ImageGet.php";

session_start();

$_SESSION['id_util'] = 1;

if(isset($_SESSION['id_util'])){
    $productor = getProductorById($_SESSION['id_util']);
    if(isset($productor['id_production'])){
        $image_producteur = getUserImage($productor['id_util']);
        $adresse = $productor['adresse_util'];
        $desc = $productor['descr_production'];
        $nom_producteur = "PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP";//$productor['nom_production'];
        $nb_avis = getNbAvisOf($productor['id_production']);
        $moy_avis = 4;
    }
}

require $pathVues."/GestionProducteur.php";
?>