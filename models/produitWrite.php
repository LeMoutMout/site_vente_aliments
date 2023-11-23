<?php

function createProduct($idProductor,$nom,$quantite,$prix,$bio,$idUnite) {
    $db = getDBc();
    
    $db->prepare('insert into PRODUIT(nom_produit,quantite_produit,prix_produit,bio_produit,id_production,id_unite) values(:nom,:quant,:prix,:bio,:idP,:idU)')->execute([
        'nom' => $nom,
        'quant' => $quantite,
        'prix' => $prix,
        'bio' => $bio,
        'idP' => $idProductor,
        'idU' => $idUnite
    ]);
}

function updateProduit($idProduit,$nom,$quantite,$prix,$bio) {
    $db = getDBc();
    
    $db->prepare('update PRODUIT set nom_produit = :nom, quantite_produit = :quant, prix_produit = :prix, bio_produit = :bio where id_produit = :idP')->execute([
        'nom' => $nom,
        'quant' => $quantite,
        'prix' => $prix,
        'bio' => $bio,
        'idP' => $idProduit
    ]);
}