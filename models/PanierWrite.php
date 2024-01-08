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