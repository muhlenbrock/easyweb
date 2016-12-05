<?php
include('../controllers/all_controllers.php');
	$controller = new Controllers();
	echo json_encode(($controller->getContentNoticia('', 11, '', '', '', '','',false, false, false, '1')));

?>