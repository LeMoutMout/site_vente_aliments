<?php

function createAvis($idPanier,$note,$contenueAvis) {
    $bdd = getDBc();
    $avis_query = $bdd->prepare('insert into AVIS(note_avis,date_avis,contenu_avis,id_panier) values (:note,CURDATE(),:cont,:idP);');
    $avis_query->execute([
        'note' => $note,
        'cont' => $contenueAvis,
        'idP' => $idPanier
    ]);
}

function deleteAvis($id){
    $bdd = getDBc();
    $avis_query = $bdd->prepare('DELETE FROM AVIS WHERE AVIS.id_panier=:id;');
    $avis_query->execute([
        'id' => $id
    ]);
}