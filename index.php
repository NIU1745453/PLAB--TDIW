<?php
    $accio = $_GET['accio'] ?? NULL;
    switch ($accio) {
        case 'llistar-categories':
            require_once __DIR__.'./resource_llistar_categories.php';
            break;
        default:
            require_once __DIR__.'./resource_portada.php';
            break;
    }
?>