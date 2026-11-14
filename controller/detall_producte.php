<?php
require_once __DIR__ . '/../model/productes.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$producte = $id ? get_producte($id) : null;

if (!$producte) {
    http_response_code(404);
}
require __DIR__ . '/../views/detall_producte.php';

?>