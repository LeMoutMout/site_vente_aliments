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

function getPanierEnCoursFromProductor($idProductor) {
    $bdd = getDBc();
    $paniers_query = $bdd->query("select * from producteurPanier where id_production = ".$idProductor." and id_statut in (2,3);");
    $paniers = $paniers_query->fetchall(PDO::FETCH_ASSOC);
    return $paniers;
}

function getPanierLivreeFromProductor($idProductor) {
    $bdd = getDBc();
    $paniers_query = $bdd->query("select * from producteurPanier where id_production = ".$idProductor." and id_statut = 4;");
    $paniers = $paniers_query->fetchall(PDO::FETCH_ASSOC);
    return $paniers;
}

function getProducteurOf($id_panier) {
    $bdd = getDBc();
    $paniers_query = $bdd->query("select distinct producteur.* from COMPOSITION join produit on produit.id_produit = COMPOSITION.id_produit join producteur on producteur.id_production = produit.id_production where id_panier = ".$id_panier.";");
    $producteur = $paniers_query->fetch(PDO::FETCH_ASSOC);
    return $producteur;
}

