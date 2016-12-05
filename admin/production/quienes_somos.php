<?php
    session_start();
    include('is_login.php');
?>
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
    <!-- Summernote editor -->
    <link href="summernote/summernote.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <!-- PNotify -->
    <link href="../vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
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
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Misión</h2>
                                <div class="clearfix"></div>
                            </div>
                            <form id="mision" action="../routes/quienes_somos.php" method="POST">
                                <div class="x_content">
                                    <input type="hidden" id="id_mision" name="id_mision">
                                    <input type="hidden" class="seccion" value="2">
                                    <div id="text_area_mision" class="summernote"></div>
                                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-floppy-o"></i> &nbsp;Guardar Cambios </button>
                                </div>
                            </form>
                        </div>
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Visión</h2>
                                <div class="clearfix"></div>
                            </div>
                            <form id="vision" action="../routes/quienes_somos.php" method="POST">
                                <div class="x_content">
                                    <input type="hidden" id="id_vision" name="id_vision">
                                    <input type="hidden" class="seccion" value="3">
                                    <div id="text_area_vision" class="summernote"></div>
                                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-floppy-o"></i> &nbsp;Guardar Cambios </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- Summernote editor -->
    <script src="summernote/summernote.min.js" type="text/javascript"></script>
    <script src="summernote/lang/summernote-es-ES.js" type="text/javascript"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <script src="js/custom/quienes.js"></script>
    <!-- PNotify -->
    <script src="../vendors/pnotify/dist/pnotify.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.nonblock.js"></script>

</body>
</html>
