<?php

function getCategorie() {
    $bdd = getDBc();
    $produits_query = $bdd->query("select * from CATEGORIE;");
    $produits = $produits_query->fetchall(PDO::FETCH_ASSOC);
    return $produits;
}

function getCategorieOf($id_produit){
    $bdd = getDBc();
    $produits_query = $bdd->prepare("select * from CATEGORISATION join CATEGORIE on CATEGORIE.id_categorie = CATEGORISATION.id_categorie where id_produit = :id;");
    $produits_query->execute(['id'=>$id_produit]);
    $produits = $produits_query->fetchall(PDO::FETCH_ASSOC);
    return $produits;
}