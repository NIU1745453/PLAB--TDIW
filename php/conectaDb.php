<?php




function conectaDb() { // les variables han de ser extretes d'un arxiu .env o secrets i no guardar-los en el codi font, i menys al github xd
    include_once __DIR__ . "/config.php";

    return pg_connect("host=$DB_HOST dbname=$DB_TABLE user=$DB_USER password=$DB_PASSWORD"); 
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