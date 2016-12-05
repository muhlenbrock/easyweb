<?php
include('../controllers/all_controllers.php');
	$controller = new Controllers();
	echo json_encode(($controller->getContentNoticia('', 7, '', '', '', 'fecha_creacion','',false, false, false, '1')));
?>