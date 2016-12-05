<?php

    require_once('include/cUrl.php');
    
    $domain = $_SERVER['HTTP_HOST'];
    $url = 'http://'.$domain.'/admin/controllers/slider.php?action=listaractivas';
    $json = obtener($url);
    $objs = json_decode($json);
    setlocale(LC_TIME, 'es_ES.UTF-8');

?>
