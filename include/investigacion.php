<?php

    require_once('cUrl.php');

    $id = 7;
    $domain = $_SERVER['HTTP_HOST'];
    $url = 'http://'.$domain.'/admin/routes/single_seminario.php?id='.$id;
    $json = obtener($url);
    $articulos = json_decode($json);
    setlocale(LC_TIME, 'es_ES.UTF-8');
    
    if(!$articulos[0]->imagenes == null){
?>
<section class="seminarios-investigacion">
		<div class="container">
			<div class="row">
				<div class="pull-right">
					<h2 class="text-right">Seminarios de Investigación</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-md-12">
					<div class="table-responsive">
						<table class="tabla-seminarios table table-striped">
							<tr>
								<th>
									Seminario
								</th>
								<th>
									Descripción
								</th>
								<th>
									Descargar
								</th>
							</tr>
							<?php
					       
					        $i=0;
					        foreach ($articulos[0]->imagenes as $articulo)
					        {
					        ?>
							<tr>
								<td class="enlace-titulo">
									<a target="_blank" href="docs/seminarios_de_investigacion/<?php echo $articulo->PATH;?>"><h4><?php echo $articulo->TITULO;?></h4></a>
								</td>
								<td>
									<small>
										<?php echo $articulo->DESCRIPCION;?>
									</small>
								</td>
								<td>
									<p class="text-center descarga">

											<a target="_blank" href="docs/seminarios_de_investigacion/<?php echo $articulo->PATH;?>">
												<i class="fa fa-3x fa-arrow-circle-down" aria-hidden="true"></i>
											</a>

									</p>
								</td>
							</tr>
							<?php
							}
							?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php 
  }
  else{
  ?>
  <h2>No existen registros</h2>
  <?php
}
  ?>