<?php

function getUserImage($id) {
    return glob($GLOBALS['pathImage']."/utilisateur/".$id.".*")[0];
}

function getProductorImage($id) {
    return glob($GLOBALS['pathImage']."/producteur/".$id.".*")[0];
}

function getProductImage($id) {
    return glob($GLOBALS['pathImage']."/produit/".$id.".*")[0];
}



