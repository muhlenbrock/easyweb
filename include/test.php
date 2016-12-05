<?php
$domain = $_SERVER['HTTP_HOST'];
$json = file_get_contents('http://'.$domain.'/admin/routes/hilo_noticia.php');
$objs = json_decode($json);
setlocale (LC_TIME, "es_ES");

	    if(!$objs == null){
		    $i=0;
		    foreach ($objs as $obj)
		    {
		    	$date = date_create($obj->fecha_creacion);
        		$dia = date_format($date, 'd');
        		$mes = date_format($date, 'm');
        		$anio = date_format($date, 'Y');
        		$miFecha = gmmktime(12,0,0,$mes,$dia,$anio);
        		echo strftime("%A, %d de %B de %Y", $miFecha);
        		
		    }
		}

 ?>