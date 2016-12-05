<?php
	
	require_once('../controllers/all_controllers.php');

	$controller = new Controllers();
	$objs = $controller->getContentNoticia('',11, '', '', '', '','',false, false, false, '');
	$result = array();
	foreach ($objs as $obj) {	
		$tmp = array(			
				"<a href='editar_funcionario.php?id=$obj->id'>$obj->titulo</a>",
				"$obj->subtitulo",
				"<img  src='../../img/galeria/cuerpo/$obj->id/$obj->portada_contenido' class='avatar avatar-portada0 center-block' alt='Avatar'>",
				"<a href='editar_funcionario.php?id=$obj->id'> Editar </a> <a onClick='eliminarCuerpo($obj->id)';>Eliminar</a>"
			    );
		array_push($result, $tmp);
	}
	echo "{ \"data\":".json_encode($result)."}";
?>