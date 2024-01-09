<?php

function createProduct($idProductor,$nom,$quantite,$prix,$bio,$idUnite,$promotion,$categories) {
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

    $produit = $db->query('select max(id_produit) as last_produit from PRODUIT;')->fetch(PDO::FETCH_ASSOC)['last_produit'];

    foreach($categories as $categorie) {
        $db->prepare('INSERT INTO CATEGORISATION(id_produit, id_categorie) VALUES (:produit, :categorie);')->execute(['produit' => $produit,'categorie'=>$categorie]);
    }
}

function updateProduit($idProduit,$nom,$quantite,$prix,$bio, $unite, $promotion) {
    $db = getDBc();
    
    $db->prepare('update PRODUIT set nom_produit = :nom, quantite_produit = :quant, prix_produit = :prix, id_unite = :unite, bio_produit = :bio, promotion_produit = :promo where id_produit = :idP')->execute([
        'nom' => $nom,
        'quant' => $quantite,
        'prix' => $prix,
        'unite' => $unite,
        'bio' => $bio,
        'idP' => $idProduit,
        'promo' => $promotion
    ]);
}