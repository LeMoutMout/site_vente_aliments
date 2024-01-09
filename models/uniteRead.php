<?php
function getUnite() {
    
    $bdd = getDBc();
    $produits_query = $bdd->query("select * from UNITE;");
    $produits = $produits_query->fetchall(PDO::FETCH_ASSOC);
    return $produits;
}

