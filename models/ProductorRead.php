<?php

/*
 * create view producteurValider as 
	select id_production,
		nom_production,
		descr_production, 
		mail_util as 'mail_producteur',
		nom_util as 'nom_producteur',
		pren_util as 'prenom_producteur',
		tel_util as 'telephone_producteur',
		adresse_util as 'adresse_producteur' 
	from PRODUCTEUR 
	join UTILISATEUR on UTILISATEUR.id_util = PRODUCTEUR.id_util 
	where valid_production = 1;
 * 
 */

/**
 * return l'utilisateur si sa match sinon -1;
 */
function productorConnect($mail,$mdp) {
    $bdd = getDBc();
    $user_query = $bdd->query("select PRODUCTEUR.id_util,mail_util,nom_util,pren_util,mdp_util,tel_util,adresse_util,id_production,descr_production from UTILISATEUR join PRODUCTEUR on PRODUCTEUR.id_util = UTILISATEUR.id_util where mail_util = '".$mail."';");
    $user = $user_query->fetch(PDO::FETCH_ASSOC);
    
    if (password_verify($mdp,$user['mdp_util'])) {
        $user['mdp_util'] = NULL;
        return $user;
    }
    
    return -1;
}

function getProductor()
{
    $bdd = getDBc();
    $produits_query = $bdd->query('select * from producteurValider;');
    $produits = $produits_query->fetchall(PDO::FETCH_ASSOC);
    return $produits;
}

function getProductorById($id)
{
    $bdd = getDBc();
    $produits_query = $bdd->query("select UT.id_util,mail_util,nom_util,pren_util,tel_util,id_production,nom_production,descr_production from PRODUCTEUR as PR join UTILISATEUR as UT on UT.id_util = PR.id_util where id_production = ".$id.";");
    $produits = $produits_query->fetch(PDO::FETCH_ASSOC);
    return $produits;
}

function getProductorSearch($search)
{
    $bdd = getDBc();
    $produits_query = $bdd->query("select * from producteurValider where LOWER(nom_production) like LOWER('%" . $search . "%');");
    $produits = $produits_query->fetchall(PDO::FETCH_ASSOC);
    return $produits;
}

function getProductorNonValide()
{
    $bdd = getDBc();
    $produits_query = $bdd->query('select * from producteurNonValider;');
    $produits = $produits_query->fetchall(PDO::FETCH_ASSOC);
    return $produits;
}

