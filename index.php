<?php
    require_once __DIR__ . '/resource_menu.php';
    $accio = $_GET['accio'] ?? NULL;
    switch ($accio) {
        case 'llistar-categories':
            require_once __DIR__ . '/resource_llistar_categories.php';
            break;
        case 'llistar-productes':
            require_once __DIR__ . '/resource_llistar_productes.php';
            break;
        default:
            require_once __DIR__.'/resource_portada.php';
            break;
    }
    require_once __DIR__ . '/resource_footer.php';
?>