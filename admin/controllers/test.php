<?php
	include ("../models/contenido.php");

	class Controllers {

		public function getContent($id_section) {

			$quienes = array();
			$Quienes = Contenido::getContent($id_section);

			array_push($quienes, $Quienes->secciones_id);
			array_push($quienes, $Quienes->estados_id);
			array_push($quienes, $Quienes->titulo);
			array_push($quienes, $Quienes->descripcion);
			array_push($quienes, $Quienes->imagenes);
			array_push($quienes, $Quienes->redes_sociales);
			array_push($quienes,'');

			return $quienes;

		}
	}
?>