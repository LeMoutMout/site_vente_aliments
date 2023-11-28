<?php
function isProducteur($id) {
    $bdd = getDBc();
    $user_query = $bdd->prepare("select id_util FROM PRODUCTEUR where id_util = :id;");
    $user_query->execute(['id' => $id]);
    $user = $user_query->fetch(PDO::FETCH_ASSOC);
    
    if (isset ($user['id_util'])) {
        return true;
    }

    return false;
}

function isProducteurValide($id) {
    $bdd = getDBc();
    $user_query = $bdd->prepare("select id_util FROM PRODUCTEUR where id_util = :id and valid_production = 1;");
    $user_query->execute(['id' => $id]);
    $user = $user_query->fetch(PDO::FETCH_ASSOC);
    
    if (isset ($user['id_util'])) {
        return true;
    }

    return false;
}

function isAdmin($id) {
    $bdd = getDBc();
    $user_query = $bdd->prepare("select id_util FROM ADMINISTRATEUR where id_util = :id;");
    $user_query->execute(['id' => $id]);
    $user = $user_query->fetch(PDO::FETCH_ASSOC);
    
    if (isset ($user['id_util'])) {
        return true;
    }
    
    return false;
}