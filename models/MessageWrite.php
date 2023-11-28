<?php

/*
 * need trigger
 * 
 */

function sendMessage($idUser,$content,$ListReceveur) {
    $db = getDBc();

    $db->prepare('insert into MESSAGE(contenu_message,date_message,id_util) values(:cont,NOW(),:id)')->execute(['cont' => $content, 'id' => $idUser]);
    
    $idMes = $db->query("select id_message from MESSAGE where contenu_message = '".$content."' and id_util = ".$idUser." order by date_message desc LIMIT 0,1;")->fetch();
    
    
    foreach ($ListReceveur as $resv) {
        $resInsert = $db->prepare("insert into RECEPTION(id_message,id_util) values(:send,:res)");
        $resInsert->execute(['send'=>$idMes['id_message'],'res' => $resv]);
    };
}

function deleteMessage($messageId) {
    $db = getDBc();
    $stmtReception = $db->prepare("DELETE FROM RECEPTION WHERE id_message = :messageId")->execute(['messageId'=>$messageId]);
    $stmtMessage = $db->prepare("DELETE FROM MESSAGE WHERE id_message = :messageId")->execute(['messageId'=>$messageId]);
}