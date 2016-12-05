<?php 
 $domain = $_SERVER['HTTP_HOST'];
?>
<!DOCTYPE html>
<html lang="es-cl">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <base href="<?php echo 'http://'.$domain; ?>" />

    <title>ULS | Escuela de Periodismo</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">

    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato|Roboto" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="apple-touch-icon" href="favicon.png">
    <link rel="stylesheet" href="css/monthly.css">

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
    ?>

    <!-- Page Content -->
    <div class="container-fluid">

        <div class="row">

            <div class="col-lg-12">
                <div class="text-center" style="padding-top:60px;">
                <img src="img/404logo.gif" class="img-responsive center-block">
                    
                    <h3>No se encontró la página que estás buscando.</h3>
                </div>
            </div>

        </div>

        <hr>

        <!-- Footer -->
        

    </div>
    <?php include 'include/footer.php'; ?>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
