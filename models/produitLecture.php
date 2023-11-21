<?php

/*
 *
 * create view produitPageRecherche as
 * select
 * PRODUIT.id_produit,
 * PRODUIT.nom_produit,
 * PRODUIT.quantite_produit,
 * PRODUIT.prix_produit,
 * PRODUIT.promotion_produit,
 * UNITE.nom_unite,
 * PRODUIT.bio_produit,
 * PRODUCTEUR.id_production,
 * PRODUCTEUR.nom_production
 * from PRODUIT
 * join PRODUCTEUR on PRODUIT.id_production = PRODUCTEUR.id_production
 * join UNITE on UNITE.id_unite = PRODUIT.id_unite
 * where PRODUCTEUR.valid_production=1;
 *
 *
 */
function getProduits()
{
    $bdd = getDBc();
    $produits_query = $bdd->query('select * from produitPageRecherche;');
    $produits = $produits_query->fetchall(PDO::FETCH_ASSOC);
    return $produits;
}

function getProduitsSearch($search)
{
    $bdd = getDBc();
    $produits_query = $bdd->query("select * from produitPageRecherche where nom_produit like '%" . $search . "%';");
    $produits = $produits_query->fetchall(PDO::FETCH_ASSOC);
    return $produits;
}

function getProduitsTag($tag)
{
    $bdd = getDBc();
    $produits_query = $bdd->query("select produitPageRecherche.id_produit,produitPageRecherche.nom_produit,produitPageRecherche.quantite_produit,produitPageRecherche.prix_produit,produitPageRecherche.promotion_produit,produitPageRecherche.nom_unite,produitPageRecherche.bio_produit,produitPageRecherche.id_production,produitPageRecherche.nom_production from produitPageRecherche join categorisation as catg on produitPageRecherche.id_produit = catg.id_produit join categorie as catr on catr.id_categorie = catg.id_categorie where nom_categorie = '".$tag."';");
    $produits = $produits_query->fetchall(PDO::FETCH_ASSOC);
    return $produits;
}

function getProduitsTagSearch($tag, $search)
{
    $bdd = getDBc();
    $produits_query = $bdd->query("select produitPageRecherche.id_produit,produitPageRecherche.nom_produit,produitPageRecherche.quantite_produit,produitPageRecherche.prix_produit,produitPageRecherche.promotion_produit,produitPageRecherche.nom_unite,produitPageRecherche.bio_produit,produitPageRecherche.id_production,produitPageRecherche.nom_production from produitPageRecherche join categorisation as catg on produitPageRecherche.id_produit = catg.id_produit join categorie as catr on catr.id_categorie = catg.id_categorie where nom_categorie = '".$tag."' and nom_produit like '%" . $search . "%';");
    $produits = $produits_query->fetchall(PDO::FETCH_ASSOC);
    return $produits;
}

function getProduitsFromProducteur($idProducteur)
{
    $bdd = getDBc();
    $produits_query = $bdd->query("select * from produitPageRecherche where id_production = ".$idProducteur.";");
    $produits = $produits_query->fetchall(PDO::FETCH_ASSOC);
    return $produits;
}

