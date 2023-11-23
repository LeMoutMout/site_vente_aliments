<?php

function getOtherUser($idUser) {
    $bdd = getDBc();
    $messages_query = $bdd->query("select distinct MESSAGE.id_util as env,RECEPTION.id_util as recv,date_message from RECEPTION join MESSAGE on RECEPTION.id_message=MESSAGE.id_message where RECEPTION.id_util = ".$idUser." OR MESSAGE.id_util = ".$idUser." order by date_message DESC;");
    $messages = $messages_query->fetchall(PDO::FETCH_ASSOC);
    
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

