<?php
	
	require_once("../models/conection/conection.php");
	require_once("../models/crud.php");

	function email($email){
		if ($email != "") {
            $model = new Crud();
            $model->select = "DESCRIPCION";
            $model->from = "contenido";
            $model->condition = "SECCIONES_ID=10 and DESCRIPCION like '$email'";
            $model->Read();
            $response = $model->rows;
            return $response;
		}
	}

    function readEmail(){
       
            $model = new Crud();
            $model->select = "DESCRIPCION";
            $model->from = "contenido";
            $model->condition = "SECCIONES_ID=10";
            $model->Read();
            $response = $model->rows;
            return $response;
        
    }

    function readPass(){
        
        
            $model = new Crud();
            $model->select = "PASSWORD";
            $model->from = "usuarios";
            $model->condition = "ID=1";
            $model->Read();
            $response = $model->rows;
            return $response;
        
    }

    function restore($pass){
        
        $pass = md5($pass);
        $model = new Crud();
        $model->update = "usuarios";
        $model->set = "PASSWORD='$pass'";
        $model->condition = "ID=1";
        $model->Update();
    }

    function generateRandomString($length = 5) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>