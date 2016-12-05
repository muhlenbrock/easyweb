<?php

    require_once('cUrl.php');

    $domain = $_SERVER['HTTP_HOST'];
    $url = 'http://'.$domain.'/admin/routes/hilo_noticia.php';
    $json = obtener($url);
    $objs = json_decode($json);
    setlocale(LC_TIME, 'es_ES.UTF-8');

?>

<div class="hilonoticias">

	<h4 class="col-lg-3 col-md-3 col-xs-12">NOTICIAS</h4>
	<!-- First Blog Post -->
	<?php
	    if(!$objs == null){
		    $i=0;
		    foreach ($objs as $obj)
		    {
	?>
	<a href="single_noticias/<?php echo $obj->id; ?>">
            <div style="height: 300px;
									  width: 100%;
									  border: 2px solid white;
									  background-repeat: no-repeat;
									  background-size: cover;
									  background-position: center;
									  background-image: url(img/galeria/noticias/<?php echo $obj->id.'/'.$obj->portada_contenido;?>);">
            </div>
        </a>
	<h2>
	<a href="single_noticias/<?php echo $obj->id; ?>"><?php echo $obj->titulo; ?></a>
	</h2>
	<p class="fecha"><i class="fa fa-clock-o"></i>Publicado el <?php  $date = date_create($obj->fecha_creacion);
        		$dia = date_format($date, 'd');
        		$mes = date_format($date, 'm');
        		$anio = date_format($date, 'Y');
        		$miFecha = gmmktime(12,0,0,$mes,$dia,$anio);
        		echo strftime("%A, %d de %B de %Y", $miFecha);?></p>
	<hr>
	<p>
		<?php
		$texto =  strip_tags(html_entity_decode($obj->descripcion, ENT_NOQUOTES));
		
		echo substr($texto, 0, 100)."...";
		?>
	</p>
	<a id="leermas" class="btn btn-primary pull-right" href="single_noticias/<?php echo $obj->id; ?>">
		Leer más 
		<i class="fa fa-angle-right"></i>
	</a>
	<div class="clearfix">
	</div>
	<?php
		}
	}
	else
	{
	?>


	<!-- Second Blog Post -->

	<img class="img-responsive" src="http://placehold.it/900x400&text=Imagen Noticias 2" alt="">

	<h2>
	<a href="#">Jefe de Carrera Asiste a Encuentro Nacional de Directores de Escuelas de Periodismo</a>
	</h2>
	<p class="fecha"><i class="fa fa-clock-o"></i> Publicado el 5 de Agosto, 2016</p>
	<hr>
	<p>Con el objetivo de discutir y apoyar la organización del XVI Encuentro de la Federación Latinoamericana de Facultades de Comunicación Social (FELAFACS), es que durante la semana pasada el Director de carrera, Cristian Muñoz Catalán, visitó la Escuela de Periodismo de la Pontificia Universidad Católica de Valparaíso...</p>
	<a id="leermas" class="btn btn-primary pull-right" href="#">Leer más <i class="fa fa-angle-right"></i></a>
	<?php 
	}
	?>
	
	<div class="clearfix"></div>

</div>