<?php
    require_once __DIR__ . '/php/connectaBd.php';
    require_once __DIR__ . '/model/productes.php';

    $productes = get_productes($_GET['id_categoria'] ?? NULL);

    require_once __DIR__ . '/views/llistar_productes.php';

?>