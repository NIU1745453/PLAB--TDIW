<?php
    require_once __DIR__ . '/connectaBd.php';

    function get_usuari_per_email($email)
    {
        $conn = conectaBd();

        $sql = 'SELECT id_user,nom,cognoms,email,password FROM usuari WHERE email = $1';

        $result = pg_query_params($conn, $sql, [$email]);

        if ($result === false) {
            return null;
        }

        return pg_fetch_assoc($result) ?: null;
    }

    function registrar_usuari($nom, $cognoms, $email, $password_hash, $codi_postal, $direccio, $aniversari)
    {
        $conn = conectaBd();

        if(!isset($nom, $cognoms, $email, $password_hash, $codi_postal, $direccio, $aniversari)) {
            return false;
        }

        $sql = 'INSERT INTO usuari (nom, cognoms, email, password, codi_postal, direccio, aniversari) VALUES ($1, $2, $3, $4, $5, $6, $7)';

        $result = pg_query_params($conn, $sql, [$nom, $cognoms, $email, $password_hash, $codi_postal, $direccio, $aniversari]);

        if ($result === false) {
            //echo 'Error al registrar usuari';
            return false;
        }

        return true;
    }
?>