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
    <!-- jQuery custom content scroller -->
    <link href="../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>
    <!-- PNotify -->
    <link href="../vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
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
                <div class="">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Configuración de Password</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form action="../routes/guardar_correo.php" class="form-horizontal">
                                        <div class="form-group">
                                            <div class="col-sm-2 control-label">
                                               <label>Password Actual: </label> 
                                            </div>
                                            <div class="col-sm-10">
                                     
                                                <input type="password" id="pass_actual" name="pass_actual" class="form-control" placeholder="*******">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-2 control-label">
                                               <label>Password Nueva: </label> 
                                            </div>
                                            <div class="col-sm-10">
                                               
                                                <input type="password" id="pass_nueva" name="pass_nueva" class="form-control" placeholder="*******">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-2 control-label">
                                               <label>Re Password Nueva: </label> 
                                            </div>
                                            <div class="col-sm-10">
                                                
                                                <input type="password" id="pass_nueva2" name="pass_nueva2" class="form-control" placeholder="*******">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success pull-right">Guardar Cambios</button>
                                        </div>                                       
                                    </form>
                                </div>
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
    <!-- PNotify -->
    <script src="../vendors/pnotify/dist/pnotify.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.nonblock.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <script type="text/javascript" src="js/custom/config.js"></script>
</body>
</html>
