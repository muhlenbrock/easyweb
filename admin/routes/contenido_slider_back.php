<?php
    require_once('../../include/cUrl.php');

	$domain = $_SERVER['HTTP_HOST'];
	$json = obtener('http://'.$domain.'/admin/controllers/slider.php?action=listar');
	$objs = json_decode($json);
?>
