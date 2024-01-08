<?php

function createUser($mail,$nom,$prenom,$mdp,$tel,$adresse) {
    $db = getDBc();
    
    $db->prepare('insert into UTILISATEUR(mail_util,nom_util,pren_util,mdp_util,tel_util,adresse_util) values(:mail,:nom,:pren,:mdp,:tel,:adrs)')->execute([
        'mail' => $mail,
        'nom' => $nom,
        'pren' => $prenom,
        'mdp' => $mdp,
        'tel' => $tel,
        'adrs' => $adresse
    ]);
}

function updateUser($id,$mail,$nom,$prenom,$tel,$adresse){
    $db = getDBc();
    
    $db->prepare('update UTILISATEUR set mail_util = :mail, nom_util = :nom, pren_util = :pren, tel_util = :tel, adresse_util = :adrs where id_util = :id;')->execute([
        'mail' => $mail,
        'nom' => $nom,
        'pren' => $prenom,
        'tel' => $tel,
        'adrs' => $adresse,
        'id' => $id
    ]);
}


