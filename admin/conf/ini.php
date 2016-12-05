<?php 
 $json = json_encode(parse_ini_file('file.ini', true));
 $configuracion = json_decode($json, true);
 $bd = $configuracion['bd'];
 $route = $configuracion['route'];
