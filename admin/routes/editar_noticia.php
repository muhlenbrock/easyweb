<?php
	require_once('../controllers/all_controllers.php');
	date_default_timezone_set("America/Santiago");

	$controller = new Controllers();

	extract($_POST);

	$fecha_publicacion = "";
	$fecha_modificacion = date('Y-m-d H:i:s');

	if ($estado == 1) {
		$fecha_publicacion = date('Y-m-d H:i:s');
	}

	echo json_encode($controller->updateContent($id_, 4, $estado, $titulo, $bajada, $descr, $portada,$fecha_modificacion, $fecha_publicacion, $galeria, '', ''));

?>