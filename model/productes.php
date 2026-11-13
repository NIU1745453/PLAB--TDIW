<?php
    require_once __DIR__ . '/connectaBd.php';
    
    function get_productes($idCategoria) {
        $conn = conectaBd();

        //$idCategoria = $_GET['id_categoria'] ?? '';

        if (!is_string($idCategoria) || !ctype_digit($idCategoria)) {
            //http_response_code(400);
            echo 'Categoria no vàlida';
            return [];
        }

        $sql = 'SELECT id_producte, nom, preu, descripcio
                FROM producte
                WHERE id_categoria = $1
                AND actiu = TRUE
                ORDER BY id_producte';

        $result = pg_query_params($conn, $sql, [(int) $idCategoria]);

        if ($result === false) {
            echo 'Error al consultar productes';
            return [];
        }

        return pg_fetch_all($result);
    }
?>