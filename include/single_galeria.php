<!-- contenido -->
<article class="single-noticia">
    <div class="container">
      <div class="row">
        <div class="col-md-12 single">
        <h2><i class="fa fa-camera" aria-hidden="true"></i> Galerías Fotográficas / <?php echo $galerias[0]->titulo; ?></h2>

          <p class="fecha"><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo 'Publicado el : '.$galerias[0]->fecha_creacion; ?></p>
          <!-- Galerías -->
          <?php

            if ($galerias[0]->imagenes) { # code...

          ?>
          <div class="row">

          <?php
            foreach ($galerias[0]->imagenes as $imagen) {

          ?>
          <div class="col-md-3 img-portfolio2 hover">
            <a href="img/galeria/galeria/<?php print_r($id.'/'.$imagen->PATH);?>" data-lightbox="logo" data-title="<?php print_r($imagen->TITULO);?>">
            <div class="col-md-3 cover" style="background-image: url(img/galeria/galeria/<?php print_r($id.'/'.$imagen->PATH);?>);">

            </div>
            </a>
            </div>
          <?php
            }
          ?>

          </div>
          <?php
        }
           ?>
        </div>
      </div>
    </div>
  </article>
