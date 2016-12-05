<?php

if (isset($_GET['dir'])) {
	uploadImages($_GET['dir']);
}

function uploadImages($url){

	$ds = DIRECTORY_SEPARATOR;
	 
	if (!empty($_FILES)) {

		if(isset($_GET["delete"]) && $_GET["delete"] == true) {
			$name = $_POST["filename"];
			if(file_exists($url.$name)) {
				unlink($url.$name);
				echo json_encode(array("res" => true));
			}else{
				echo json_encode(array("res" => true));
			}
		} else {

			$tempFile = $_FILES['file']['tmp_name'];
		    $targetPath = dirname( __FILE__ ) . $ds. $url . $ds; 
		    $nombrelimpio = limpiar_string($_FILES['file']['name']);
		    $targetFile =  $targetPath. $nombrelimpio; 
		   
		    move_uploaded_file($tempFile,$targetFile);
		    
		}
	 
	} else {

		if(isset($_GET["delete"]) && $_GET["delete"] == true) {
			$name = $_POST["filename"];
			if(file_exists($url.$name)) {
				unlink($url.$name);
				echo json_encode(array("res" => true));
			}else{
				echo json_encode(array("res" => true));
			}
		}else{

			$result  = array();
	 
		    $files = scandir($url);
		   // print_r($files);
		    if ( false!==$files ) {
		        foreach ( $files as $file ) {
		            if ( '.'!=$file && '..'!=$file) {
		            	$obj['name'] = $file;
		                $obj['size'] = filesize($url.$ds.$file);
		                $result[] = $obj;
		            }
		        }
		    }
		     
		    header('Content-type: text/json');
		    header('Content-type: application/json');
		    echo json_encode($result);
		}
	}
}

function limpiar_string($s) {
		$s = mb_convert_encoding($s, 'UTF-8','');
		$s = preg_replace("/á|à|â|ã|ª/","a",$s);
		$s = preg_replace("/Á|À|Â|Ã/","A",$s);
		$s = preg_replace("/é|è|ê/","e",$s);
		$s = preg_replace("/É|È|Ê/","E",$s);
		$s = preg_replace("/í|ì|î/","i",$s);
		$s = preg_replace("/Í|Ì|Î/","I",$s);
		$s = preg_replace("/ó|ò|ô|õ|º/","o",$s);
		$s = preg_replace("/Ó|Ò|Ô|Õ/","O",$s);
		$s = preg_replace("/ú|ù|û/","u",$s);
		$s = preg_replace("/Ú|Ù|Û/","U",$s);
		$s = str_replace(" ","_",$s);
		$s = str_replace("ñ","n",$s);
		$s = str_replace("Ñ","N",$s);
		
		$s = preg_replace('/[^a-zA-Z0-9_.-]/', '', $s);
		return $s;
	}

?>