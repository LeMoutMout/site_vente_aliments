<?php

function getDBc() {
    $host = 'localhost';
    $dbName = 'inf2pj_08';
    $user = 'inf2pj08';
    $psw = 'Ahsha4eeyi';
    return new PDO('mysql:host=' . $host . ';dbname=' . $dbName, $user, $psw);
}