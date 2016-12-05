<?php
	
	require_once('../admin/models/conection/conection.php');
	require_once("../admin/models/crud.php");

	$model = new Crud();
	$model->select = "`contenido`.`DESCRIPCION`";
	$model->from = "`contenido`";
	$model->condition = "`contenido`.`SECCIONES_ID` = 10";
	$model->Read();
	$response = $model->rows;

?>