<?php

require $pathModels.'/PDO.php';

/**
 * return l'utilisateur si sa match sinon -1;
 */
function connect($mail,$mdp) {
    $bdd = getDBc();
    $user_query = $bdd->query("select * from UTILISATEUR where mail_util = '".$mail."';");
    $user = $user_query->fetch(PDO::FETCH_ASSOC);
    
    if (password_verify($mdp,$user['mdp_util'])) {
        $user['mdp_util'] = NULL;
        return $user;
    }
    
    return -1;
}