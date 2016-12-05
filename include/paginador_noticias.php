<?php

    require_once('cUrl.php');

    $json = "";
    $domain = $_SERVER['HTTP_HOST'];
    if (isset($_REQUEST['pagina']) && is_numeric($_REQUEST['pagina'])) {
        $limite_desde = ($_REQUEST['pagina'] - 1) * 3;
        $domain = $_SERVER['HTTP_HOST'];
        $url = 'http://'.$domain.'/admin/routes/paginador_noticias.php?limite_desde='.$limite_desde;
        $json = obtener($url);
    }
    
    $url = 'http://'.$domain.'/admin/routes/paginador_noticias.php';
    $cant_noticias = obtener($url);
    $objs2 = json_decode($cant_noticias);
    $numrows = count($objs2);
    $total_pages = ceil($numrows/3);
    $objs = json_decode($json);
    setlocale(LC_TIME, 'es_ES.UTF-8');
?>
<!-- aglutinador noticias -->
<!-- Projects Row -->
<div class="row aglutinador">
    <div class="row">
        <div class="aglunoticias">
            <h4 class="col-lg-3 col-md-3 col-xs-12">NOTICIAS</h4>
        </div>
    </div>
    <?php
    if(!$objs == null){
    $i=0;
    foreach ($objs as $obj)
    {
    ?>
    <div class="col-md-4 img-portfolio">
        <a href="single_noticias/<?php echo $obj->id; ?>">
            <div class="col-md-3 cover" style="background-image: url(img/galeria/noticias/<?php echo $obj->id.'/'.$obj->portada_contenido; ?>);">
            </div>
        </a>
        <br>
        <h3>
            <a href="single_noticias/<?php echo $obj->id; ?>">
                <?php echo $obj->titulo; ?>
            </a>
        </h3>
        <p>
            <?php
        $texto =  strip_tags(html_entity_decode($obj->descripcion, ENT_NOQUOTES));

        echo substr($texto, 0, 100)."...";
        ?>
        </p>
        <p class="fecha"><i class="fa fa-clock-o"></i>Publicado el <?php  $date = date_create($obj->fecha_creacion);
                $dia = date_format($date, 'd');
                $mes = date_format($date, 'm');
                $anio = date_format($date, 'Y');
                $miFecha = gmmktime(12,0,0,$mes,$dia,$anio);
                echo strftime("%A, %d de %B de %Y", $miFecha);?></p>
    <hr class="visible-xs hidden-md hidden-lg">
    <p>
    </div>
    <?php
    }
    }
    else
    {
    ?>
    <div class="col-md-4 img-portfolio">
        <a href="portfolio-item.html">
            <img class="img-responsive img-hover" src="http://placehold.it/700x400" alt="">
        </a>
        <h3>
        <a href="single-noticias.php">
            Investigación de Académicas de Periodismo es Publicado por Sitio SciELO
        </a>
        </h3>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.
        </p>
    </div>
    <?php
    }
    ?>
</div>
<!-- /.row -->
<!-- Pagination -->
<div class="row text-center">
    <div class="col-lg-12">
        <ul class="pagination">
            <?php
            if($_REQUEST['pagina'] > 1)
            {
            ?>
            <li>
                <a href="noticias/<?php echo $_REQUEST['pagina']-1;?>">&laquo;</a>
            </li>

            <?php }for ($i=1; $i <= $total_pages; $i++) {
                if ($_REQUEST['pagina'] == $i) {
                    $clase = "active";
                    # code...
                }
                else
                {
                    $clase = "";
                }
            ?>

            <li class="<?php echo $clase; ?>">
                <a href="noticias/<?php echo $i;?>"><?php echo $i;?></a>
            </li>

            <?php
            }
            ?>
            <?php
            if ($_REQUEST['pagina'] < $total_pages) {
                # code...
            ?>
            <li>
                <a href="noticias/<?php echo $_REQUEST['pagina']+1;?>">&raquo;</a>
            </li>
            <?php
        }
        ?>

        </ul>
    </div>
</div>
<!-- /.row -->
