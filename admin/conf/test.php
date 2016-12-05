<?php  
 $json = json_encode(parse_ini_file('file.php', true));
 $configuracion = json_decode($json, true);
 $bd = $configuracion['bd'];
 $route = $configuracion['route'];
 echo $json;
?>