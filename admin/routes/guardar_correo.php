<?php
	
	require_once('../controllers/all_controllers.php');

	extract($_POST);
	$controller = new Controllers();
	if (isset($id)) {
		echo json_encode(($controller->createContent($id, 10, 1, '', '', $correo, '', '', '', '' , '', '', '', '')));
	}else{
		echo json_encode($controller->getContentNoticia('', 10, '', '', '', '','',false, false, false, '1'));
	}
?>