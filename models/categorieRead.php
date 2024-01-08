<?php

function getCategorie() {
    $bdd = getDBc();
    $produits_query = $bdd->query("select * from categorie;");
    $produits = $produits_query->fetchall(PDO::FETCH_ASSOC);
    return $produits;
}