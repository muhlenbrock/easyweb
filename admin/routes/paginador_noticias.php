<?php
include('../controllers/all_controllers.php');
	$controller = new Controllers();
	if (isset($_REQUEST['limite_desde'])) {
		# code...

		if (is_numeric($_REQUEST['limite_desde'])) {
			# code...
				
			echo json_encode(($controller->getContentNoticia('', 4, $_REQUEST['limite_desde'], '', '3', 'fecha_creacion','desc',false, false, false, '1')));
		}
	}
	else
	{
		echo json_encode(($controller->getContentNoticia('', 4, '', '', '', 'fecha_creacion','desc',false, false, false, '1')));
	}
	
?>