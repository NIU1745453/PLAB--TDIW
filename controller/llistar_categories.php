<?php
// controller/llsitar_categories.php
    //header('Content-Type: application/json; charset=utf-8');

    require_once __DIR__ . '/../model/connectaBd.php';
    require_once __DIR__ . '/../model/categories.php';

    $categories = get_categories();
     
    //echo json_encode($categories);
    //exit;
    include __DIR__ . '/../views/llistar_categories.php';
    //include __DIR__ . '/../views/test.php';

?>