<?php

function createProduct($idProductor,$nom,$quantite,$prix,$bio,$idUnite,$promotion) {
    $db = getDBc();
    
    $db->prepare('insert into PRODUIT(nom_produit,quantite_produit,prix_produit,bio_produit,id_production,id_unite,promotion_produit) values(:nom,:quant,:prix,:bio,:idP,:idU,:promo)')->execute([
        'nom' => $nom,
        'quant' => $quantite,
        'prix' => $prix,
        'bio' => $bio,
        'idP' => $idProductor,
        'idU' => $idUnite,
        'promo' => $promotion
    ]);
}

function updateProduit($idProduit,$nom,$quantite,$prix,$bio, $promotion) {
    $db = getDBc();
    
    $db->prepare('update PRODUIT set nom_produit = :nom, quantite_produit = :quant, prix_produit = :prix, bio_produit = :bio, promotion_produit = :promo where id_produit = :idP')->execute([
        'nom' => $nom,
        'quant' => $quantite,
        'prix' => $prix,
        'bio' => $bio,
        'idP' => $idProduit,
        'promo' => $promotion
    ]);
}