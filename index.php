<!DOCTYPE html>
<html lang="es">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="sitio, institucional, userena, uls, periodismo" />
	<meta name="description" content="Sitio de la carrera de Periodismo de la Universidad de La Serena" />
	

	<title>ULS | Escuela de Periodismo</title>


	<link href="css/bootstrap.min.css" rel="stylesheet">


	<link rel="stylesheet" href="css/estilos.css">


	<link href="css/modern-business.css" rel="stylesheet">

	<link rel="stylesheet" href="css/lightbox.min.css">

	<!-- fuentes -->

	<link href="https://fonts.googleapis.com/css?family=Lato|Roboto" rel="stylesheet">

	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- <link rel="shortcut icon" type="image/x-icon" href="favicon.ico"> -->

	<link rel="apple-touch-icon" href="favicon.png">
	<link rel="icon" type="image/png" href="favicon.png" />
	<link rel="stylesheet" href="css/monthly.css">
	<!-- jQuery -->
	<script src="js/jquery.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<?php
	include 'include/header.php';
	include 'include/nav.php';
	include 'include/slider-home.php';
	?>

	<!-- contenidos -->
	<section class="fondocontenidos">
		<div class="container">
			<div class="row">
				<div class="col-md-3 aside">
					<div>
						<h4><i class="fa fa-calendar" aria-hidden="true"></i> Calendario Académico</h4>
						<div style="width:100%; max-width:600px; display:inline-block;">
			<div class="monthly" id="mycalendar"></div>
		</div>
						
					</div>
				</div>
				<div class="col-md-6 antipadding">
					<?php
						include 'include/hilo_noticia.php'
					?>
			</div>
				<!-- twitter-->
				<div class="col-md-3 aside">
					<div class="center-block" style="
    text-align: center;">
						<h4><i id="icono" class="fa fa-share-square-o"></i> Redes Sociales</h4>
						<hr>
						<div class="fb-page" data-href="https://www.facebook.com/periodismo.uls" data-tabs="timeline,messages,events" data-width="500" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/periodismo.uls" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/periodismo.uls">Periodismo Uls</a></blockquote></div>
						<a class="twitter-timeline" data-height="400" href="https://twitter.com/periodismo_uls">Tweets by userena</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php
	include 'include/galeria_home.php';
	?>

<?php include 'include/footer.php'; ?>

	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.7&appId=171271336612562";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


	<script src="js/main.js"></script>
    <script type="text/javascript" src="js/monthly.js"></script>
	<!-- Script to Activate the Carousel -->
	<script>
		$('#myCarousel').carousel({
			interval: 4000 //changes the speed
		})
	</script>

	<script src="js/lightbox.min.js"></script>
	<script type="text/javascript">
		$(window).resize(function(){$('.fb-comments iframe,.fb-comments span:first-child').css({'width':$('#commentboxcontainer').width()});});
	</script>

<script type="text/javascript">

	$(window).load( function() {

		
		$('#mycalendar').monthly({
			mode: 'event',
			jsonUrl: 'admin/controllers/controlador_calendario.php',
			dataType: 'json'
			
		});

		
	switch(window.location.protocol) {
	case 'http:':
	case 'https:':
	// running on a server, should be good.
	break;
	case 'file:':
	alert('Just a heads-up, events will not work when run locally.');
	}
	});
</script>

</body>

</html>
