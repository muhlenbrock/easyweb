<?php
	
	require_once('../controllers/all_controllers.php');

	$controller = new Controllers();

	extract($_GET);

	echo json_encode($controller->getContentNoticia('', 8, '', '', '', '', '', true, false, false,'')[0]);
?>