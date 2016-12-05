<?php
    
    require_once('include/cUrl.php');

    if ($_REQUEST['id'] && is_numeric($_REQUEST['id'])) {
        $id = $_REQUEST['id'];
        $domain = $_SERVER['HTTP_HOST'];
        $url = 'http://'.$domain.'/admin/routes/article.php?id='.$id;
        $articles = obtener($url);
        $articles = json_decode($articles);
        $actual_link = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        
        if (count($articles)== 0) {
            # code...
                header('Location: ./');
        }
    }
    else
    {
        header('Location: ./');
    }

?>
<!DOCTYPE html>
<html lang="es">

<head>

	<title><?php echo $articles[0]->titulo;?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="sitio, institucional, userena, uls, periodismo" />
	<meta name="description" content="Sitio de la carrera de Periodismo de la Universidad de La Serena" />
	
	<base href="<?php echo 'http://'.$domain; ?>" />

	<meta property="og:url"           content="<?php echo $actual_link;?>" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="<?php echo $articles[0]->titulo;?>" />
	<meta property="og:description"   content='<?php echo stripslashes(strip_tags(html_entity_decode($articles[0]->descripcion, ENT_NOQUOTES)))?>' />
	<meta property="og:image"         content="<?php echo "http://$domain/img/galeria/noticias/".$id."/".$articles[0]->portada_contenido; ?>" />



	


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
    include 'include/article.php';
    include 'include/footer.php';
  ?>



	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.7&appId=171271336612562";
	fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>



	<!-- /.container -->



	<!-- jQuery -->
	<script src="js/jquery.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>

	<script src="js/lightbox.min.js"></script>

	<script src="js/main.js"></script>

	<script type="text/javascript">
		$(window).resize(function(){$('.fb-comments iframe,.fb-comments span:first-child').css({'width':$('#commentboxcontainer').width()});});
	</script>

	<!-- slider noticias -->
	<script type="text/javascript">
	$(document).ready(function() {
	$('#myCarousel').carousel({
	interval: 10000
	})

		$('#myCarousel').on('slid.bs.carousel', function() {
			//alert("slid");
	});


});
	</script>
</body>

</html>
