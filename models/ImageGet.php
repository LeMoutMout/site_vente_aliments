<?php

function getUserImage($id) {
    return glob($GLOBALS['pathImage']."/utilisateurs/".$id.".*")[0];
}

function getProductImage($id) {
    return glob($GLOBALS['pathImage']."/produits/".$id.".*")[0];
}



