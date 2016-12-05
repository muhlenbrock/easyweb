<?php
    
    require_once('cUrl.php');

    $domain = $_SERVER['HTTP_HOST'];
    $url = 'http://'.$domain.'/admin/routes/hilo_docentes.php';
    $json = obtener($url);
    $objs = json_decode($json);
    setlocale(LC_TIME, 'es_ES.UTF-8');

 ?>
<section class="docentes">
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Cuerpo Docente</h1>
			<p class="lead">
				El activo más importante para toda organización son las personas que la integran, y en nuestro Departamento de Ciencias Sociales y en la Escuela de Periodismo su cuerpo docente se constituye en un equipo de profesionales con vasta experiencia académica
				y profesional.
			</p>
		</div>
	</div>
	<!-- /.row -->

	<!-- docentes -->
	<?php
	    if(!$objs == null){
		    $i=0;

	?>
	<div class="container docentesbg">
	<?php
	 foreach ($objs as $obj)
		    {
		    	$texto =  html_entity_decode($obj->descripcion, ENT_NOQUOTES);
	?>
		<div class="row">
			<div class="col-md-6" style="padding-top: 2%;">
	            <div
		            <?php
			            echo 'style="
			            height: 200px;
			            width: 100%;
			            border: 2px solid white;
			            background-repeat: no-repeat;
			            background-position: center;
			            background-size: contain;
			            background-image: url( img/galeria/cuerpo/'.$obj->id.'/'.$obj->portada_contenido.');"';
		            ?>
	            >
	            </div>
				<h3 class="nombre-docente"><?php echo $obj->titulo.' '.$obj->subtitulo; ?></h3>
			</div>
			<div class="col-md-6 docentesdatos">
				<h5><i class="fa fa-university" aria-hidden="true"></i> Antecedentes</h5>
				<p>
					<?php echo $texto;?>
				</p>
			</div>
		</div>
	<?php
	}
	?>
	</div>
  <hr>
	<?php
		}

	?>
</div><!--fin contenedor-->
</section>
