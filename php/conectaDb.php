<?php

function conectaDb() {
    $databaseName = 'tdiw';
    $databaseUser = 'user';
    $databasePassword = 'password';
    $databaseHost = '127.0.0.1';
    return pg_connect("host=$databaseHost dbname=$databaseName user=$databaseUser password=$databasePassword");
}


?>