<?php
    require_once __DIR__ . '/../model/productes.php';

    $categoria = $_GET['categoria'] ?? NULL;
    $productes = get_productes($categoria);

    require_once __DIR__ . '/../views/llistar_productes.php';

?>