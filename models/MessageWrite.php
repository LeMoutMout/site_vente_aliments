<?php

/*
 * need trigger
 * 
 */

function sendMessage($idUser,$content,$ListReceveur) {
    $db = getDBc();
    
    $db->prepare('insert into MESSAGE(contenu_message,date_message,id_util) values(:cont,NOW(),:id)')->execute(['cont' => $content, 'id' => $idUser]);
    
    $idMes = $db->query("select id_message from MESSAGE where contenu_message = '".$content."' and id_util = ".$idUser." order by date_message desc LIMIT 0,1;")->fetch();
    
    echo $idMes['id_message'];
    
    $resInsert = $db->prepare("insert into RECEPTION(id_message,id_util) values(:send,:res)");
    foreach ($ListReceveur as $resv) {
        $resInsert->execute(['send'=>$idMes['id_message'],'res' => $resv]);
    };
}