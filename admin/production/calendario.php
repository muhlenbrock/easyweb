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
    <link rel="stylesheet" href="../vendors/timepicker/bootstrap-timepicker.min.css">
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
                                    <h2>Crear Evento</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form action="../routes/guardar_correo.php" class="form-horizontal">
                                        <div class="form-group">
                                            <div class="col-sm-1 control-label">
                                               <label>Nombre Evento: </label> 
                                            </div>
                                            <div class="col-sm-11">
                                                <input type="hidden" name="id" value="8">
                                                <input type="text" id="name" name="name" class="form-control">
                                            </div>

                                        </div>
                                        <div class="form-group">

                                            <label  class="col-sm-1 control-label">Fecha Inicio **</label>
                                            <div id="fecha_1" class="col-sm-11">
                                                <div class="input-group date">
                                                    <input id="fecha_inicio" name="fecha_inicio" type="text" class="form-control"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>



                                        </div>
                                        <div class="form-group">
                                            <label  class="col-sm-1 control-label">Fecha fin **</label>
                                            <div id="fecha_2" class="col-sm-11">
                                                <div class="input-group date">
                                                    <input id="fecha_fin" name="fecha_fin" type="text" class="form-control"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label  class="col-sm-1 control-label">Horario</label>
                                        <div class="box-body table-responsive no-padding">
                                          <table class="table table-hover">
                                            <tbody>
                                            
                                            <tr>
                                              
                                              <th>Inicio</th>
                                              <th>Final</th>
                                              
                                            </tr>
                                            <tr>
                                              
                                              <td>
                                                  <div class="input-group bootstrap-timepicker">
                                                 <input id="hora_inicial" name="hora_inicial" type="text" class="form-control timepicker">
                                                 <span class="input-group-addon"> 
                                                   <i class="fa fa-clock-o"></i>
                                                 </span>
                                              </div>
                                          </td>
                                              <td>
                                                  <div class="input-group bootstrap-timepicker">
                                                 <input id="hora_final" name="hora_final" type="text" class="form-control timepicker">
                                                 <span class="input-group-addon"> 
                                                   <i class="fa fa-clock-o"></i>
                                                 </span>
                                              </div>
                                              </td>
                                              
                                            </tr>
                                            </tbody>
                                            </table>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-1 control-label">
                                               <label>url: </label> 
                                            </div>
                                            <div class="col-sm-11">
                                                <input type="hidden" name="id" value="">
                                                <input type="text" id="url" name="url" class="form-control" placeholder="https://google.cl">
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
    <script src="../vendors/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

    <script src="bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js" charset="UTF-8"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <script type="text/javascript" src="js/custom/evento.js"></script>
    <script type="text/javascript">
    $(".timepicker").timepicker({
           showInputs: false,
           minuteStep: 5,
           defaultTime: '08:00',
           showMeridian: true
    });
    $('#fecha_1 .input-group.date').datepicker({
    language: 'es',
    });

    $('#fecha_2 .input-group.date').datepicker({
    language: 'es'
      });
    </script>
</body>
</html>
