<?php

function getOtherUser($idUser) {
    $bdd = getDBc();
    $messages_query = $bdd->query("select distinct MESSAGE.id_util as env,RECEPTION.id_util as recv,date_message from RECEPTION join MESSAGE on RECEPTION.id_message=MESSAGE.id_message where RECEPTION.id_util = ".$idUser." OR MESSAGE.id_util = ".$idUser." order by date_message DESC;");
    $messages = $messages_query->fetchall(PDO::FETCH_ASSOC);
    
    $res = []; 
    foreach ($messages as $value) {
        if ($value['env'] !== $idUser)
            $res[] = $value['env'];
        if ($value['recv'] !== $idUser)
            $res[] = $value['recv'];
    }
    
    return array_unique($res,SORT_REGULAR);
}

function getMessageWith($idUser1,$idUser2) {
    $bdd = getDBc();
    $messages_query = $bdd->query("select distinct MESSAGE.contenu_message, MESSAGE.id_util, date_message from RECEPTION join MESSAGE on RECEPTION.id_message=MESSAGE.id_message where (RECEPTION.id_util = ".$idUser1." AND MESSAGE.id_util = ".$idUser2.") OR (RECEPTION.id_util = ".$idUser2." AND MESSAGE.id_util = ".$idUser1.") order by date_message;");
    $messages = $messages_query->fetchall(PDO::FETCH_ASSOC);
    
    return $messages;
}

function getReceivedMessages($id_util) {
    $db = getDBc();

    $query = "SELECT MESSAGE.id_message, UTILISATEUR.nom_util, UTILISATEUR.pren_util, UTILISATEUR.mail_util, MESSAGE.contenu_message, MESSAGE.date_message
              FROM MESSAGE
              INNER JOIN RECEPTION ON MESSAGE.id_message = RECEPTION.id_message
              INNER JOIN UTILISATEUR ON MESSAGE.id_util = UTILISATEUR.id_util
              WHERE RECEPTION.id_util = :id_util
              ORDER BY MESSAGE.date_message DESC";

    $stmt = $db->prepare($query);
    $stmt->bindParam(':id_util', $id_util, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getMessagesById($id) {
    $db = getDBc();

    $query = "SELECT MESSAGE.id_message, UTILISATEUR.nom_util, UTILISATEUR.pren_util, UTILISATEUR.mail_util, MESSAGE.contenu_message, MESSAGE.date_message
              FROM MESSAGE
              INNER JOIN RECEPTION ON MESSAGE.id_message = RECEPTION.id_message
              INNER JOIN UTILISATEUR ON MESSAGE.id_util = UTILISATEUR.id_util
              WHERE MESSAGE.id_message = :id
              ORDER BY MESSAGE.date_message DESC";

    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}
