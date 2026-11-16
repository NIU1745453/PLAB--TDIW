<?php
    require_once __DIR__ . '/connectaBd.php';

    function get_usuari_per_email($email)
    {
        $conn = connectaBd();

        $sql = 'SELECT id_user,nom,cognoms,email,password FROM usuari WHERE email = $1';

        $result = pg_query_params($conn, $sql, [$email]);

        if ($result === false) {
            return null;
        }

        return pg_fetch_assoc($result) ?: false;
    }

    function registrar_usuari($nom, $cognoms, $email, $password_hash, $codi_postal, $direccio, $aniversari)
    {
        $conn = connectaBd();

        $sql = 'INSERT INTO usuari (nom, cognoms, email, password, codi_postal, direccio, aniversari) VALUES ($1, $2, $3, $4, $5, $6, $7)';

        $result = pg_query_params($conn, $sql, [$nom, $cognoms, $email, $password_hash, $codi_postal, $direccio, $aniversari]);

        if ($result === false) {
            //echo 'Error al registrar usuari';
            return false;
        }

        return true;
    }

    function get_usuari_per_id($id_user)
    {
        $conn = conectaBd();

        $sql = 'SELECT id_user,nom,cognoms,email,codi_postal,direccio,aniversari FROM usuari WHERE id_user = $1';

        $result = pg_query_params($conn, $sql, [$id_user]);

        if ($result === false) {
            return null;
        }

        return pg_fetch_assoc($result) ?: false;
    }

    function get_usuari_per_email_i_password($email, $password)
    {
        $usuari = get_usuari_per_email($email);

        if ($usuari === null) {
            return null;
        }

        if (!$usuari || !password_verify($password, $usuari['password'])) {
            return false;
        }

        return $usuari;
    }
?>