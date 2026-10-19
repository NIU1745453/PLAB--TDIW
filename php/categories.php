<?php
header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/connectaDb.php';

$conn = conectaDb();

$sql = 'SELECT id_categoria, nom, descripcio
        FROM categoria
        ORDER BY id_categoria';

echo($sql);

$result = pg_query($conn, $sql);

if ($result === false) {
    http_response_code(500);
    echo json_encode(['error' => 'Error al consultar categorías']);
    exit;
}

echo json_encode(pg_fetch_all($result) ?: []);