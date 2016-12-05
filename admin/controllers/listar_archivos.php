<?php

if (isset($_POST['dir'])) {
	getFilesName($_POST['dir']);
}elseif (isset($_REQUEST['dir_galeria'])) {
	getFilesGaleria($_REQUEST['dir_galeria']);
}

function getFilesName($url){
	$files_array = array();
    $files = scandir($url);
    foreach ($files as $file) {
    	if ($file!="."&&$file!="..") {
    		array_push($files_array, "<option value='$file'>".$file."</option>");
    	}
    }
    echo json_encode($files_array);
}

function getFilesGaleria($url){
	$files_array = array();
    $files = scandir($url);
    foreach ($files as $file) {
    	if ($file!="."&&$file!="..") {
    		array_push($files_array, $file);
    	}
    }
    echo json_encode($files_array);
}

?>