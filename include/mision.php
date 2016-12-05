<?php

    require_once('cUrl.php');

    $id = 2;

    $domain = $_SERVER['HTTP_HOST'];
    $url = 'http://'.$domain.'/admin/routes/single_mision.php?id='.$id;
    $json = obtener($url);
    $mision = json_decode($json);
    setlocale(LC_TIME, 'es_ES.UTF-8');

?>
<section class="mision">
    	<div class="container">
    		<div class="row">
    			<div class="hidden-xs hidden-sm col-md-6">
                	<img class="img-responsive" src="img/mision.png" alt="">
            	</div>
            	<div class="col-md-6">
					<h2 class="text-right">Misión</h2>
					<blockquote class="blockquote-reverse">
					  <p class="text-right"><?php print_r($mision[0]->descripcion)?></p>
					</blockquote>
            	</div>
    		</div>
    	</div>
  </section>