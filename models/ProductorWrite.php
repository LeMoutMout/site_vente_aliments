<?php

require $pathModels.'/PDO.php';

function createProductor($nom,$descr,$idUtil) {
    $db = getDBc();
    
    $db->prepare('insert into PRODUCTEUR(nom_production,descr_production,valid_production,id_util) values(:nom,:descr,0,:id)')->execute([
        'nom' => $nom,
        'descr' => $descr,
        'id' => $idUtil
    ]);
}

function updateProductor($id,$nom,$descr){
    $db = getDBc();
    
    $db->prepare('update PRODUCTEUR set nom_production = :nom, descr_production = :descr where id_production = :id;')->execute([
        'nom' => $nom,
        'descr' => $descr,
        'id' => $id
    ]);
}

function setValidProductor($id) {
    $db = getDBc();
    
    $db->prepare('update PRODUCTEUR set valid_production = 1 where id_production = :id;')->execute([
        'id' => $id
    ]);
}