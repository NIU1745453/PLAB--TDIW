<?php
    ob_start();
    session_start();
    
    $accio = $_GET['accio'] ?? NULL;

    $ajax = NULL;     // fragment for fetch (no menu or footer)
    $pagina = NULL;   // full page (inside the layout)

    switch ($accio) {
        // --- AJAX: fragments only ---
        case 'ajax-productes':
            $ajax = 'controller/llistar_productes.php';
            break;
        case 'ajax-detall-producte':
            $ajax = 'controller/detall_producte.php';
            break;
        case 'ajax-registre':
            $ajax = 'controller/registre.php';
            break;
        case 'ajax-login':
            $ajax = 'controller/login.php';
            break;

        // --- Normal pages ---
        case 'login':
            $pagina = 'resource_login.php';
            break;
        case 'registre':
            $pagina = 'resource_registre.php';
            break;
        case 'llistar-productes':
            $pagina = 'resource_llistar_productes.php';
            break;
        default:
            $pagina = 'resource_portada.php';
            break;
    }

    if ($ajax) {
        require __DIR__ . '/' . $ajax;   // only the fragment
        exit;
    }

    require __DIR__ . '/resource_menu.php';    // layout: top
    require __DIR__ . '/' . $pagina;           // what changes
    require __DIR__ . '/resource_footer.php';  // layout: bottom

?>