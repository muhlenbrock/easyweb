<?php 
include("../models/calendario.model.php");

extract($_POST);

if (isset($name) && isset($fecha_inicio) && isset($fecha_fin)) {
	$fecha_1 = implode('-',array_reverse(explode('/',$fecha_inicio)));
	$fecha_2 = implode('-',array_reverse(explode('/',$fecha_fin)));
	$hora_1 = $hora_inicial.':00';
	$hora_2 = $hora_final.':00';
	echo json_encode(guardar($name, $fecha_1, $fecha_2, $hora_1, $hora_2, '#466189', $url));
	# code...
}
else
{
	listar();
}


?>