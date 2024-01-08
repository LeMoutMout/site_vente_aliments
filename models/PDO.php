<?php

function getDBc() {
    $host = '25.62.203.145:3306';
    $dbName = 'sae';
    $user = 'php';
    $psw = 'PHPcours2023';
    return new PDO('mysql:host=' . $host . ';dbname=' . $dbName, $user, $psw);
}
