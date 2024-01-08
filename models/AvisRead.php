<?php

function getNbAvisOf($idProductor)
{
    $bdd = getDBc();
    $avis_query = $bdd->prepare('select COUNT(*) as nb_avis from producteurAvis where id_production = :id;');
    
    $avis_query->execute([
        'id' => $idProductor
    ]);
    
    $avis = $avis_query->fetch(PDO::FETCH_ASSOC);
    return $avis['nb_avis'];
}

function getAVGAvisOf($idProductor)
{
    $bdd = getDBc();
    $avis_query = $bdd->prepare('select moyen_avis from producteurAvgAvis where id_production = :id;');
    
    $avis_query->execute([
        'id' => $idProductor
    ]);
    
    $avis = $avis_query->fetch(PDO::FETCH_ASSOC);
    if (isset($avis['moyen_avis']))
        return $avis['moyen_avis'];
    return 0;
}

function getAvisFromProducteur($idProducteur)
{
    $bdd = getDBc();
    $produits_query = $bdd->query("select * from producteurAvis where id_production = ".$idProducteur.";");
    $produits = $produits_query->fetchall(PDO::FETCH_ASSOC);
    return $produits;
}
