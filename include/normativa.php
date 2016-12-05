<?php

    $id = 5;

    $domain = $_SERVER['HTTP_HOST'];
    $url = 'http://'.$domain.'/admin/routes/single_normativa.php?id='.$id;
    $json = obtener($url);
    $normativas = json_decode($json);
    setlocale(LC_TIME, 'es_ES.UTF-8');



?>
<?php
        if(!$normativas[0]->imagenes == null){
        $i=0;
?>
<!-- Aqui comienza la sección normativa de descargas de documentos -->
<section class="normativas">
    <div class="container">
        <div class="row marquesina2">
        <h2>Normativas</h2>
        </div>
        <div class="row paneles">
        <?php
        foreach ($normativas[0]->imagenes as $normativa)
        {
        ?>
        <div class="col-md-6">
            <div class="panel panel-info">

                <div class="panel-heading">
                <a target="_blank" href='docs/normativas/<?php echo $normativa->PATH;?>'> 
                <h4><i class="pdficon fa fa-file-pdf-o"></i><?php echo $normativa->TITULO?></h4>
                </a>
                </div>
                <div class="panel-body">
                <!-- la idea es que la descripción de la descarga no sobrepase esta cantidad de caracteres -->
                <p><?php echo $normativa->DESCRIPCION;?></p>
                <a target="_blank" href='docs/normativas/<?php echo $normativa->PATH;?>' class="descargabtn btn btn-success pull-right">Descargar</a>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
      </div>
    </div>
</section>
<?php
        }
        ?>