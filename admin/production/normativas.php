<?php
    session_start();
    include('is_login.php');
?>
<?include('../controllers/listar_archivos.php');?>
<!DOCTYPE html>
<html lang="ES-CL">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Nombre Empresa | Administración</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <!-- Dropzone Style -->
    <link href="../src/css/dropzone.css" type="text/css" rel="stylesheet" />
    <!-- PNotify -->
    <link href="../vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
    <!-- Custom Style -->
    <link href="css/custom/style.css" type="text/css" rel="stylesheet" />
</head>
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <?php 
                include("aside.php");
                include("nav.php");
            ?>
            <!-- page content -->
            <div class="right_col" role="main">
                <div class="clearfix"></div>
                <div class="row">
                    <form action="../routes/guardar_normativas.php">
                        <h2>Normativas</h2>
                        <!-- Tabs -->
                        <div id="wizard" class="form_wizard wizard_horizontal">
                            <ul class="wizard_steps">
                                <li>
                                    <a href="#step-11">
                                        <span class="step_no">1</span>
                                        <span class="step_descr">
                                            Paso 1<br />
                                            <small>Subir Documentos</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-22">
                                        <span class="step_no">2</span>
                                        <span class="step_descr">
                                            Paso 2<br />
                                            <small>Introducir Contenido</small>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                            <div id="step-11">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Subir Documentos</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div id="dropzone" class="dropzone">
                                            <div class="dz-message">Carga aquí tus Documentos 
                                                <br /> 
                                                <i class="fa fa-cloud-upload fa-5x" aria-hidden="true" style="color: #a1d302;"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="step-22">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="x_panel">
                                            <div class="x_title">
                                                <h2>Introducir Contenido</h2>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div id="documentos" class="x_content"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <!-- End SmartWizard Content -->
                    </form>
                </div>
            </div>
            <!-- /page content -->
            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Powered by <a href="https://oxidocs.com">Oxido Creative Studio</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>
    <!-- jQuery -->
     <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- jQuery custom content scroller -->
    <script src="../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <!-- Dropzone Scripts -->
    <script src="../src/js/dropzone.js"></script>
    <script src="../src/js/dropzone-documentos.js" type="text/javascript"></script>
    <!-- PNotify -->
    <script src="../vendors/pnotify/dist/pnotify.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.nonblock.js"></script>
     <!-- jQuery Smart Wizard -->
    <script src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
    <!--Custom JS-->
    <script src="js/custom/nueva_normativa.js" type="text/javascript"></script>
  
</body>
</html>
