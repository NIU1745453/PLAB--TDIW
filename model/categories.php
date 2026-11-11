<?php
require_once __DIR__ . '/connectaDb.php';

function get_categories() {
        $conn = conectaDb();
        $sql = 'SELECT id_categoria, nom, descripcio
                FROM categoria
                ORDER BY id_categoria';

        $result = pg_query($conn, $sql);

        if ($result === false) {
            echo 'Error al consultar productes';
            return [];
        }

        return pg_fetch_all($result);
}
?>


