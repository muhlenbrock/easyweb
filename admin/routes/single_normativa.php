<?php
	
	require_once('../controllers/all_controllers.php');

	$controller = new Controllers();

	extract($_GET);

	echo json_encode($controller->getContent($id, 6, '', '', '', '', '', true, false, false, ''));
?>