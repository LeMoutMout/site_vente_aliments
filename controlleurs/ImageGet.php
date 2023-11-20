<?php

function getUserImage($id) {
    return glob("../image/utilisateur/".$id.".*")[0];
}

function getProductorImage($id) {
    return glob("../image/producteur/".$id.".*")[0];
}

function getProductImage($id) {
    return glob("../image/produit/".$id.".*")[0];
}



