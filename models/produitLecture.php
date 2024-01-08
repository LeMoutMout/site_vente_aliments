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
    $produits_query = $bdd->query("select * from produitPageRecherche where LOWER(nom_produit) like LOWER('%" . $search . "%');");
    $produits = $produits_query->fetchall(PDO::FETCH_ASSOC);
    return $produits;
}

function getProduitsBigSearchBio($search)
{
    $bdd = getDBc();
    $produits_query = $bdd->query("select produitPageRecherche.* from produitPageRecherche join categorisation as catg on produitPageRecherche.id_produit = catg.id_produit join categorie as catr on catr.id_categorie = catg.id_categorie where bio_produit = 1 and (LOWER(nom_produit) like LOWER('%" . $search . "%') or lower(catr.nom_categorie) like LOWER('%" . $search . "%'))group by id_produit;");
    $produits = $produits_query->fetchall(PDO::FETCH_ASSOC);
    return $produits;
}

function getProduitsBigSearch($search)
{
    $bdd = getDBc();
    $produits_query = $bdd->query("select produitPageRecherche.* from produitPageRecherche join categorisation as catg on produitPageRecherche.id_produit = catg.id_produit join categorie as catr on catr.id_categorie = catg.id_categorie where LOWER(nom_produit) like LOWER('%" . $search . "%') or lower(catr.nom_categorie) like LOWER('%" . $search . "%')group by id_produit;");
    $produits = $produits_query->fetchall(PDO::FETCH_ASSOC);
    return $produits;
}

function getProduitsTag($tag)
{
    $bdd = getDBc();
    $produits_query = $bdd->query("select produitPageRecherche.id_produit,produitPageRecherche.nom_produit,produitPageRecherche.quantite_produit,produitPageRecherche.prix_produit,produitPageRecherche.promotion_produit,produitPageRecherche.nom_unite,produitPageRecherche.bio_produit,produitPageRecherche.id_production,produitPageRecherche.nom_production from produitPageRecherche join categorisation as catg on produitPageRecherche.id_produit = catg.id_produit join categorie as catr on catr.id_categorie = catg.id_categorie where nom_categorie = '" . $tag . "';");
    $produits = $produits_query->fetchall(PDO::FETCH_ASSOC);
    return $produits;
}

function getProduitsTagSearch($tag, $search)
{
    $bdd = getDBc();
    $produits_query = $bdd->query("select produitPageRecherche.id_produit,produitPageRecherche.nom_produit,produitPageRecherche.quantite_produit,produitPageRecherche.prix_produit,produitPageRecherche.promotion_produit,produitPageRecherche.nom_unite,produitPageRecherche.bio_produit,produitPageRecherche.id_production,produitPageRecherche.nom_production from produitPageRecherche join categorisation as catg on produitPageRecherche.id_produit = catg.id_produit join categorie as catr on catr.id_categorie = catg.id_categorie where nom_categorie = '" . $tag . "' and LOWER(nom_produit) like LOWER('%" . $search . "%');");
    $produits = $produits_query->fetchall(PDO::FETCH_ASSOC);
    return $produits;
}

function getProduitsFromProducteur($idProducteur)
{
    $bdd = getDBc();
    $produits_query = $bdd->query("select * from produitPageRecherche where id_production = " . $idProducteur . ";");
    $produits = $produits_query->fetchall(PDO::FETCH_ASSOC);
    return $produits;
}

function getProduitsBigSearchBioFrom($producteur, $search)
{
    $bdd = getDBc();
    $produits_query = $bdd->query("select produitPageRecherche.* from produitPageRecherche join categorisation as catg on produitPageRecherche.id_produit = catg.id_produit join categorie as catr on catr.id_categorie = catg.id_categorie where id_production = ".$producteur." and bio_produit = 1 and (LOWER(nom_produit) like LOWER('%" . $search . "%') or lower(catr.nom_categorie) like LOWER('%" . $search . "%'))group by id_produit;");
    $produits = $produits_query->fetchall(PDO::FETCH_ASSOC);
    return $produits;
}

function getProduitsBigSearchFrom($producteur, $search)
{
    $bdd = getDBc();
    $produits_query = $bdd->query("select produitPageRecherche.* from produitPageRecherche join categorisation as catg on produitPageRecherche.id_produit = catg.id_produit join categorie as catr on catr.id_categorie = catg.id_categorie where id_production = ".$producteur." and (LOWER(nom_produit) like LOWER('%" . $search . "%') or lower(catr.nom_categorie) like LOWER('%" . $search . "%')) group by id_produit;");
    $produits = $produits_query->fetchall(PDO::FETCH_ASSOC);
    return $produits;
}

function getPromo($limit)
{
    $bdd = getDBc();
    $produits_query = $bdd->query("select * from produitPageRecherche where promotion_produit is not null LIMIT 0," . $limit . " ;");
    $produits = $produits_query->fetchall(PDO::FETCH_ASSOC);
    return $produits;
}

function getProduitsLimit($limit)
{
    $bdd = getDBc();
    $produits_query = $bdd->query("select * from produitPageRecherche LIMIT 0," . $limit . ";");
    $produits = $produits_query->fetchall(PDO::FETCH_ASSOC);
    return $produits;
}

function getNbProduitsOf($idProducteur)
{
    $bdd = getDBc();
    $produits_query = $bdd->query("select nombreDeProduit as nb_produits from nbProduitProducteur where id_production = " . $idProducteur . ";");
    $nb_produits = $produits_query->fetch(PDO::FETCH_ASSOC);
    if (isset($nb_produits['nb_produits']))
        return $nb_produits['nb_produits'];
    return 0;
}
