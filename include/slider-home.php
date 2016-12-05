<?php include 'admin/routes/contenido_slider.php'; ?>
<!-- Header Carousel -->
	<header id="myCarousel" class="carousel slide carousel-fade">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<?php
		    if(!$objs == null)
		    {
			    $i=0;
			    foreach ($objs as $obj)
			    {
		   ?>
			<li data-target="#myCarousel" data-slide-to="<?php echo $i;?>" class="<?php if($i==0){echo "active";}$i++;?>"></li>
			<?php
					}
				}
			 ?>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner">
		    <?php
		    if(!$objs == null){
			    $i=0;
			    foreach ($objs as $obj)
			    {
		    ?>
				<div class="item <?php if($i==0){echo "active";}$i++;?>">
				    <a href="<?php echo $obj->TITULO;?>"> 
						<div class="fill" style="background-image:url('<?php
							if ($obj->PATH=="default.png")
							{
								echo "img/".$obj->PATH;
							}
							else
							{
								echo "img/slider-img/".$obj->PATH;
							}?>');
						">
						</div>
						<div class="carousel-caption">
							<h2><?php echo $obj->DESCRIPCION;?></h2>
						</div>
					</a>

				</div>
			<?php
				}
			}
			else
			{?>
				<div class="item active">
					<div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Imagen Uno');">
					</div>
					<div class="carousel-caption">
						<h2>Descripción</h2>
					</div>
				</div>

			<?php
			}
			?>
		</div>

		<!-- Controls -->
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">
			<span class="icon-prev"></span>
		</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">
			<span class="icon-next"></span>
		</a>
	</header>
