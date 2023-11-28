<?php

/**
 * return l'utilisateur si ca match sinon -1;
 */
function connect($mail,$mdp) {
    $bdd = getDBc();
    $user_query = $bdd->query("select * from UTILISATEUR where mail_util = '".$mail."';");
    $user = $user_query->fetch(PDO::FETCH_ASSOC);
    if(isset($user['mdp_util'])){
    if (password_verify($mdp,$user['mdp_util'])) {
        $user['mdp_util'] = NULL;
        return $user;
    }
}
    return -1;
}

function getUser() {
    $bdd = getDBc();
    $user_query = $bdd->query("select id_util,mail_util from UTILISATEUR;");
    $user = $user_query->fetch(PDO::FETCH_ASSOC);
    return $user;
}

function getUserByID($id) {
    $bdd = getDBc();
    $user_query = $bdd->prepare("select id_util,nom_util,pren_util,mail_util,tel_util from UTILISATEUR where id_util = :id;");

    $user_query->execute(['id'=>$id]);
    $user = $user_query->fetch(PDO::FETCH_ASSOC);
    return $user;
}

function getUserByMail($mail) {
    $bdd = getDBc();
    $user_query = $bdd->prepare("select id_util,nom_util,pren_util,mail_util from UTILISATEUR where mail_util = :mail;");
    $user_query->execute(['mail'=>$mail]);
    $user = $user_query->fetch(PDO::FETCH_ASSOC);
    return $user;
}

function getUserSearch($search){
    $bdd = getDBc();
    $user_query = $bdd->prepare("select id_util,nom_util,pren_util,mail_util from UTILISATEUR where LOWER(mail_util) like LOWER(CONCAT('%',:sm,'%')) or LOWER(nom_util) like LOWER(CONCAT('%',:sn,'%')) or LOWER(pren_util) like LOWER(CONCAT('%',:sp,'%'));");
    $user_query->execute([
        'sm'=>$search,
        'sn'=>$search,
        'sp'=>$search
        ]);
    $users = $user_query->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}

function getUserIdByEmail($mail) {
    $bdd = getDBc();
    $user_query = $bdd->prepare("select id_util from UTILISATEUR where mail_util = :mail;");
    $user_query->execute(['mail'=>$mail]);
    $user = $user_query->fetch(PDO::FETCH_ASSOC);
    return $user;
}