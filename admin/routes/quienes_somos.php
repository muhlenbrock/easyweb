<?php
	
	require_once('../controllers/all_controllers.php');

	extract($_POST);
	$controller = new Controllers();
	if (isset($id)) {
		echo json_encode(($controller->createContent($id, $section_id, 1, '', '', $data, '', '', '','' , '', '', 'noticias', 'tmp')));
	}else{
		echo json_encode([$controller->getContentNoticia('', 2, '', '', '', '','',false, false, false, '1'),$controller->getContentNoticia('', 3, '', '', '', '','',false, false, false, '1')]);
	}
?>