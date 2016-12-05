<?php
	
	require_once('../controllers/all_controllers.php');

	$controller = new Controllers();
	$objs = $controller->getContentNoticia('', 4, '', '', '', '','',false, false, false, '');
	$result = array();
	$publicado = "";
	foreach ($objs as $obj) {
		if ($obj->estados_id==1) {
			$publicado = "Publicado";
		}
		if ($obj->estados_id==0) {
			$publicado = "Borrador";
		}
		$tmp = array(			
				"<a href='editar_noticia.php?id=$obj->id'>$obj->titulo</a>",
				"$obj->subtitulo",
				"<img  src='../../img/galeria/noticias/$obj->id/$obj->portada_contenido' class='avatar avatar-portada0 center-block' alt='Avatar'>",
				"$obj->fecha_publicacion",
				"$obj->fecha_modificacion",
				"$obj->fecha_creacion",
				"$publicado",
				"<a href='editar_noticia.php?id=$obj->id'> Editar </a> <a onClick='eliminarNoticia($obj->id)';>Eliminar</a>"
			    );
		array_push($result, $tmp);
	}
	echo "{ \"data\":".json_encode($result)."}";
?>