<?php

function getCategorie() {
    $bdd = getDBc();
    $produits_query = $bdd->query("select * from categorie;");
    $produits = $produits_query->fetchall(PDO::FETCH_ASSOC);
    return $produits;
}

function getCategorieOf($id_produit){
    $bdd = getDBc();
    $produits_query = $bdd->prepare("select * from categorisation join categorie on categorie.id_categorie = categorisation.id_categorie where id_produit = :id;");
    $produits_query->execute(['id'=>$id_produit]);
    $produits = $produits_query->fetchall(PDO::FETCH_ASSOC);
    return $produits;
}