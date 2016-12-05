<?php
	
	require_once("../models/conection/conection.php");
	require_once("../models/crud.php");
	session_start();

	function login($nick, $pass){
		if ($nick == "") {
			$_SESSION['error'] = 'Debe Ingresar un Usuario';
			header('Location: ../login.php');
		}
		if ($pass == "") {
			$_SESSION['error'] = 'Debe Ingresar una Contraseña';
			header('Location: ../login.php');
		}
		$pass = md5($pass);
		$model = new Crud();
		$model->select = "NICKNAME, PASSWORD";
		$model->from = "usuarios";
		$model->condition = "NICKNAME like '".$nick."'AND PASSWORD like '".$pass."'";
		$model->Read();
		$response = $model->rows;
		if (count($response) == 0) {
			$_SESSION['error'] = 'Usuario y/o Contraseña incorrecto';
			header('Location: ../login.php');
		}else{
			$_SESSION['user'] = $response[0]['NICKNAME'];
			header('Location: ../production/index.php');
		}
	}
	

?>