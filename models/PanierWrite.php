<?php

function insertIntoPanier($idUtil,$qteProduit,$idProduit,$date) {
    $db = getDBc();
    
    $stm = $db->prepare('CALL InsererProduitPanier( :idU, :idP, :qte, :date)');
    
    $stm->execute([
        'idU' => $idUtil,
        'idP' => $idProduit,
        'qte' => $qteProduit,
        'date' => $date
    ]);
    
    $res = $stm->fetchAll();
    
    if (isset($res['errorMSG'])) {
        return false;
    }
    return true;
}

function supprFromPanier($idPanier,$idProduit) {
    $db = getDBc();
    
    $stm = $db->prepare('DELETE FROM COMPOSITION WHERE id_panier = :idPanier and id_produit = :idProduit;');
    
    $stm->execute([
        'idPanier' => $idPanier,
        'idProduit' => $idProduit
    ]);
}

function supprPanier($idPanier) {
    $db = getDBc();
    
    $produits = getProduitOf($idPanier);

    foreach($produits as $produit) {
        supprFromPanier($idPanier,$produit['id_produit']);
    }

    $stm = $db->prepare('DELETE FROM PANIER WHERE id_panier = :idPanier;');
    
    $stm->execute([
        'idPanier' => $idPanier
    ]);
}


function updateDate($idPanier,$date){
    $db = getDBc();
    
    $db->prepare('UPDATE PANIER SET PANIER.date_panier = :date WHERE PANIER.id_panier = :id;')->execute([
        'id' => $idPanier,
        'date' => $date
    ]);
}

function changeStatut($idPanier,$idStatut){
    $db = getDBc();
    
    $stm = $db->prepare('CALL changerStatutPanier ( :idP, :idS)');
    
    $stm->execute([
        'idP' => $idPanier,
        'idS' => $idStatut
    ]);
    
    $res = $stm->fetchAll();
    
    if (isset($res['errorMSG'])) {
        return false;
    }
    return true;
}

