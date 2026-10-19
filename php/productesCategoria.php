<?php
header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/connectaDb.php';
$conn = conectaDb();

$idCategoria = $_GET['id_categoria'] ?? '';

if (!is_string($idCategoria) || !ctype_digit($idCategoria)) {
    http_response_code(400);
    echo json_encode(['error' => 'Categoría no válida']);
    exit;
}

$sql = 'SELECT id_producte, nom, preu, descripcio
        FROM producte
        WHERE id_categoria = $1
          AND actiu = TRUE
        ORDER BY id_producte';

$result = pg_query_params($conn, $sql, [(int) $idCategoria]);

if ($result === false) {
    http_response_code(500);
    echo json_encode(['error' => 'Error al consultar productos']);
    exit;
}

echo json_encode(pg_fetch_all($result) ?: []);