<?php
	
	require_once('../controllers/all_controllers.php');

	$controller = new Controllers();
	$objs = $controller->getContentNoticia('', 5, '', '', '', '','',false, false, false ,'');
	$result = array();
	foreach ($objs as $obj) {	
		if ($obj->titulo=="Galeria Home") {

			$tmp = array(			
				"<a href='editar_galeria.php?id=$obj->id'>$obj->titulo</a>",
				"$obj->fecha_creacion",
				"<img  src='../../img/home.png' class='avatar avatar-portada0 center-block' alt='Avatar'>",
				"<a href='editar_galeria.php?id=$obj->id'> Editar </a>"
			    );
			# code...
		}
		else{
			$tmp = array(			
				"<a href='editar_galeria.php?id=$obj->id'>$obj->titulo</a>",
				"$obj->fecha_creacion",
				"<img  src='../../img/galeria/galeria/$obj->id/$obj->portada_contenido' class='avatar avatar-portada0 center-block' alt='Avatar'>",
				"<a href='editar_galeria.php?id=$obj->id'> Editar </a> <a onClick='eliminarGaleria($obj->id)';>Eliminar</a>"
			    );
		}
		
		array_push($result, $tmp);
	}
	echo "{ \"data\":".json_encode($result)."}";
?>