<?php
	
	require_once('../controllers/all_controllers.php');

	extract($_POST);
	$controller = new Controllers();
	
	$fecha_publicacion = "";
	$fecha_modificacion = "";

	if(!isset($galeria)){
		$galeria = '';
	}
	if ($estado == 1) {
		$fecha_publicacion = date('Y-m-d H:i:s');
	}

	echo json_encode($controller->createContent('', 4, $estado, $titulo , $bajada, $descr, $portada , $fecha_modificacion, $fecha_publicacion, $galeria , '', '','noticias', 'tmp'));
	
?>