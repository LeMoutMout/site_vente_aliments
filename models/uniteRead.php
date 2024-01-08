<?php
function getUnite() {
    
    $bdd = getDBc();
    $produits_query = $bdd->query("select * from unite;");
    $produits = $produits_query->fetchall(PDO::FETCH_ASSOC);
    return $produits;
}

