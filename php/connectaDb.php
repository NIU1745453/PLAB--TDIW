<?php

function conectaDb() { // les variables han de ser extretes d'un arxiu .env o secrets i no guardar-los en el codi font, i menys al github xd
    $databaseName = 'tdiw';
    $databaseUser = 'user';
    $databasePassword = 'password';
    $databaseHost = '127.0.0.1';
    return pg_connect("host=$databaseHost dbname=$databaseName user=$databaseUser password=$databasePassword");
}

/*
Com fer una consulta amb una conexió a la BBDD:
$sql = 'SELECT id, `name` FROM category';

// Pas 2: Enviem la query a la BBDD. La variable $conn
// és la definida al pas anterior.
$result = pg_query($conn, $sql);

// Pas 3: agafem els resultats de la consulta.
$categories = pg_fetch_all($result);
*/
?>