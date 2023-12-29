<?php

function getDBc() {
    $host = 'localhost';
    $dbName = 'sae';
    $user = 'root';
    $psw = '';
    return new PDO('mysql:host=' . $host . ';dbname=' . $dbName, $user, $psw);
}
