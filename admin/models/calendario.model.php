<?php 
include("conection/conection.php");
include("crud.php");

function guardar($name, $startdate, $enddate, $starttime, $endtime, $color, $url){

	$model = new Crud();
	$model->insertInto = 'calendario';
	$model->insertColumns = "name, startdate, enddate, starttime, endtime, color, url";
	$model->insertValues = "'$name', '$startdate','$enddate', '$starttime', '$endtime','$color','$url'";
	$model->Create();
	return $model->mensaje;

}

function eliminarEvento($id){

	$model = new Crud();
	$model->deletefrom='calendario';
	$model->condition="Id= $id";
	$model->Delete();
	$respuesta['res'] = $model->mensaje;
	echo json_encode($respuesta['res']);
			

}

function listar(){

	$model = new Crud();
	$model->select='*';
    $model->from = '`calendario` ORDER BY `calendario`.`startdate`';
    $model->Read();
	$filas = $model->rows; 
	
	$result = array();
	if ($filas!=null) {
		# code...
	
	foreach ($filas as $fila) {	

		$tmp = array( 			
				"name"=>$fila['name'],
				"startdate"=>$fila['startdate'],
				"enddate"=>$fila['enddate'],
				"starttime"=>$fila['starttime'],
				"endtime"=>$fila['endtime'],
				"color"=>$fila['color'],
				"url"=>$fila['url']
			    );
		array_push($result, $tmp);
	}
	echo "{ \"monthly\":".json_encode($result)."}";
}
	

}

function listarNormal(){

	$model = new Crud();
	$model->select='*';
    $model->from = '`calendario` ORDER BY `calendario`.`startdate`';
    $model->Read();
	$filas = $model->rows; 
	$result = array();
	if ($filas!=null) {
		# code...
	
	foreach ($filas as $fila) {	

		$tmp = array( 			
				$fila['name'],
				$fila['startdate'],
				$fila['enddate'],
				"<a onClick=eliminarEvento($fila[Id]);>Eliminar</a>"
			    );
		array_push($result, $tmp);
	}
	
}
echo "{ \"data\":".json_encode($result)."}";
}
	


?>