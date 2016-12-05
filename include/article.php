
<!-- contenido -->
<article class="single-noticia">
    <div class="container">
      <div class="row">
        <div class="col-md-9 single">
        <h2><?php echo $articles[0]->titulo; ?></h2>
          <p class="fecha"><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo 'Publicado el : '.$articles[0]->fecha_creacion; ?></p>
          <a href="<?php echo "img/galeria/noticias/".$id."/".$articles[0]->portada_contenido; ?>" data-lightbox="logo" data-title="">
            <img src='<?php echo "img/galeria/noticias/".$id."/".$articles[0]->portada_contenido; ?>' alt="" class="img-responsive center-block">
          </a>
           
          <div class="row sharing">
            <div class="col-md-4 compartir">
							<small class="comp">COMPARTIR:</small>
							<div class="smallt">
                <ul class="list-unstyled list-inline list-social-icons">
                    <li style="vertical-align: super;">
                        <div class="fb-share-button" data-href="<?php echo $actual_link;?>" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="<?php echo $actual_link;?>">Compartir</a></div>
                    </li>
                    <li>
                        <a href="https://twitter.com/share" class="twitter-share-button" data-via="periodismo_uls" data-hashtags="userena" data-related="userena" data-show-count="false">Tweet</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </li>
                </ul>
              </div>
            </div>
					</div>
          <?php 
            if($articles[0]->subtitulo != ""){
          ?>
          <blockquote>
          <h3 class = "text-justify"><?php echo $articles[0]->subtitulo; ?></h3>
          </blockquote>
          <?php
        }
            echo html_entity_decode($articles[0]->descripcion);
            if ($articles[0]->imagenes) { # code...

          ?>

          <div class="row galerianoticia">
            <h3>Imágenes Relacionadas</h3>
          <?php
            foreach ($articles[0]->imagenes as $imagen) {

          ?>
            <div class="col-md-3">
              <a href="img/galeria/noticias/<?php print_r($id.'/'.$imagen->PATH);?>" data-lightbox="logo" data-title="<?php print_r($imagen->TITULO);?>">
              <div class="col-md-3 cover" style="background-image: url(img/galeria/noticias/<?php print_r($id.'/'.$imagen->PATH);?>);">

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

        <div  class="text-center redessociales pull-left hidden-xs hidden-sm col-md-3">



          <!-- twitter-->
          <div class="fb-page" data-href="https://www.facebook.com/periodismo.uls" data-tabs="timeline,messages,events" data-width="500" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/periodismo.uls" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/periodismo.uls">Periodismo Uls</a></blockquote></div>
          <a class="twitter-timeline" data-height="400" href="https://twitter.com/periodismo_uls">Tweets by userena</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
      </div>
    </div>
  </article>
