<?php
    require_once __DIR__ . '/connectaBd.php';
    
    function get_productes($categoria) {
        if (!is_string($categoria) || empty($categoria)) {
            //http_response_code(400);
            //echo 'Categoria no vàlida';
            return [];
        }

        $conn = connectaBd();
        
        $sql = 'SELECT p.id_producte as id_producte, p.nom as nom, p.preu as preu, p.descripcio as descripcio, p.imatge as imatge
                FROM producte as p, categoria as c
                WHERE c.id_categoria = p.id_categoria
                AND c.nom = $1
                AND p.actiu = TRUE
                ORDER BY p.id_producte';

        $result = pg_query_params($conn, $sql, [$categoria]);

        if ($result === false) {
            //echo 'Error al consultar productes';
            return [];
        }

        return pg_fetch_all($result);
    }
    
    function get_producte($id) {
        $conn = connectaBd();
        $sql = 'SELECT id_producte, nom, preu, descripcio, imatge
                FROM producte
                WHERE id_producte = $1 AND actiu = TRUE';
        $result = pg_query_params($conn, $sql, [$id]);
        if ($result === false) return null;
        return pg_fetch_assoc($result) ?: null;   // one row, or null if not found
    }
?>