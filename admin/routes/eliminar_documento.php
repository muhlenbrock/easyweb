<?php
	require_once('../controllers/all_controllers.php');
	extract($_POST);

	$controller = new Controllers();
	$res = "";
	$delete = "";
	$delete_map = "";

	$documentos = $controller->getContentNoticia('', $id, '', '', '', '', '', true, false, false,'');

	foreach ($documentos as $documento) {
		foreach ($documento->imagenes as $imagen) {	
			if ($filename == $imagen['PATH']) {
				$delete = $controller->delete('ID', $imagen['ID'], 'path_imagenes');
				$delete_map = $controller->delete('PAT_ID', $imagen['ID'], 'contenido_path');
			}
		}
	}
	
	print_r($delete_map);
?>