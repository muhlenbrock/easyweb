<?php
	require_once('../controllers/all_controllers.php');
	date_default_timezone_set("America/Santiago");

	$controller = new Controllers();
	$fecha_publicacion = date('Y-m-d H:i:s');
	$fecha_modificacion = date('Y-m-d H:i:s');

	extract($_POST);
	echo json_encode($controller->updateContent($id_, 7, 1, $titulo, $bajada, $descr, $portada, $fecha_modificacion, $fecha_publicacion, $galeria, '', ''));

?>