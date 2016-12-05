<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="sitio, institucional, userena, uls, periodismo" />
	<meta name="description" content="Sitio de la carrera de Periodismo de la Universidad de La Serena" />

    <title>Contacto</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">


    <link rel="stylesheet" href="css/estilos.css">


    <link href="css/modern-business.css" rel="stylesheet">

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

    ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-3">
                <h1 class="seccioncontacto">Contacto</h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <!-- Map Column -->
            <div class="col-md-8">
                <!-- Embedded Google Map -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2215.78546786209!2d-71.24224745868456!3d-29.91357476168025!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x90293ea2ee353648!2sUniversidad+Serena!5e1!3m2!1ses!2scl!4v1474049398923" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <!-- Contact Details Column -->
            <div class="col-md-4 datoscontacto">
                <h3 class="ubic">Ubicación</h3>
                <p><i class="marcador fa fa-map-marker fa-2x"></i>
                    Campus Andrés Bello<br>Avenida Raúl Bitrán Nachary #1305<br>
                </p>
                <p><i class="fa fa-phone"></i>
                    <abbr title="Phone">F</abbr>: <a href="tel:+56512204352">+56 (51) 2204352</a>
                    </p>
                <p><i class="fa fa-envelope-o"></i>
                    <abbr title="Email">E</abbr>: <a href="mailto:eperiodismo@userena.cl">eperiodismo@userena.cl</a>
                </p>
                <ul class=" iconos list-unstyled list-inline list-social-icons pull-right">
                    <li>
                        <a href="#"><i class="fa fa-facebook-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-twitter-square fa-2x"></i></a>
                    </li>

                </ul>
            </div>
        </div>
        <!-- /.row -->

        <!-- Contact Form -->
        <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
        <div class="row">
            <div class="col-md-8">
                <h3 class="envianos">Envianos un mensaje</h3>
                <form method="POST" class="formulario" name="sentMessage" id="contactForm" novalidate>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Nombre y Apellido:</label>
                            <input type="text" class="form-control" id="name" name="name" required data-validation-required-message="Ingresa tu nombre.">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Dirección de correo eléctronico:</label>
                            <input type="email" class="form-control" id="email" name="email" required data-validation-required-message="Ingresa tu mail.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Asunto:</label>
                            <input type="text" class="form-control" id="asunto" name="asunto">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Mensaje:</label>
                            <textarea rows="10" cols="100" class="form-control" id="message" name="message" required data-validation-required-message="Ingresa tu mensaje" maxlength="999" style="resize:none"></textarea>
                        </div>
                    </div>
                    <div id="success"></div>
                    <!-- For success/fail messages -->
                    <button type="submit" class="emailbtn btn btn-primary">Enviar</button>
                </form>
            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->


    </div>
    <?php include 'include/footer.php'; ?>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script src="js/main.js"></script>

    <!-- Contact Form JavaScript -->
    <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

</body>

</html>
