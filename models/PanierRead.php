<?php

function getPanierByUtil($idUtil) {
    $bdd = getDBc();
    $paniers_query = $bdd->query("select id_panier, date_panier, nom_statut from PANIER join STATUT on STATUT.id_statut = PANIER.id_statut where id_util = ".$idUtil." order by date_panier desc;");
    $paniers = $paniers_query->fetchall(PDO::FETCH_ASSOC);
    return $paniers;
}

function getProduitOf($idPanier) {
    $bdd = getDBc();
    $paniers_query = $bdd->query("select PANIER.id_panier, qte_produit_commandee, PRODUIT.id_produit, nom_produit, quantite_produit, prix_produit, promotion_produit, bio_produit, nom_unite  from PANIER join COMPOSITION on PANIER.id_panier = COMPOSITION.id_panier join PRODUIT on COMPOSITION.id_produit = PRODUIT.id_produit join UNITE on UNITE.id_unite = PRODUIT.id_unite where PANIER.id_panier = ".$idPanier.";");
    $paniers = $paniers_query->fetchall(PDO::FETCH_ASSOC);
    return $paniers;
}

function getPanierFromProductor($idProductor) {
    $bdd = getDBc();
    $paniers_query = $bdd->query("select * from producteurPanier where id_production = ".$idProductor." order by date_panier desc;");
    $paniers = $paniers_query->fetchall(PDO::FETCH_ASSOC);
    return $paniers;
}


