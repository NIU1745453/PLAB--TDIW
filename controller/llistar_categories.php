<?php
// controller/llsitar_categories.php

    require_once __DIR__ . '/../model/connectaDb.php';
    require_once __DIR__ . '/../model/categories.php';

    $categories = get_categories();
        
    include __DIR__ . '/../views/llistar_categories.php';

?>