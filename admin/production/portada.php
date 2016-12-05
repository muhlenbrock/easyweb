<?php
    session_start();
    include('is_login.php');
?>
<?php 
require_once '../routes/contenido_slider_back.php';
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

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <!-- Dropzone Style -->
    <link href="../src/css/dropzone.css" type="text/css" rel="stylesheet" />
    <!-- Custom Style -->
    <link href="css/custom/style.css" type="text/css" rel="stylesheet" />
    <!-- jQuery -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
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
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Subir Imágenes</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div id="dropzone" class="dropzone">
                                 <div class="dz-message">Carga aquí tus imágenes 
                            <br> <i class="fa fa-cloud-upload fa-5x" aria-hidden="true" style="
    color: #a1d302;"></i>

                        </div>
                            </div>
                        </div>
                    </div>
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Portada</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <form id="portada">
                        <div class="x_content">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Miniatura</th>
                                            <th>Imagen</th>
                                            <th>Url</th>
                                            <th>Descripción</th>
                                            <th>Estado</th>
                                            <th>Acción</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody id="table_portada" class="form-group">
                                    <?php 
                                    if(!$objs == null)
                                    {
                                        $i=0; 
                                        foreach ($objs as $obj) 
                                        {
                                    ?>
                                    <tr id="fila<?php echo $i ?>" >
                                    <td class="center">
                                    <input type="hidden" id="id_path_imagenes<?php echo $i ?>" name="id_path_imagenes<?php echo $i ?>" value="<?php echo $obj->ID ?>">
                                    <input type="hidden" id="path<?php echo $i ?>" name="path<?php echo $i ?>" value="<?php echo $obj->PATH ?>">
                                    <img id="img_portada<?php echo $i ?>" name="img_portada<?php echo $i ?>" src="../../img/default.png" class="avatar avatar-portada<?php echo $i ?> center-block" alt="Avatar">
                                    </td>
                                    <td class="center">
                                    <select id="<?php echo $i ?>" name="select_img<?php echo $i ?>" class="form-control image-select selector<?php echo $i ?>" onchange="cambiaImg(this.id)" style="vertical-align:middle;">
                                    <option value="<?php echo $obj->PATH ?>" selected=""><?php echo $obj->PATH ?></option>
                                    </select>
                                    </td>
                                    <td class="center">
                                    <input id="titulo<?php echo $i ?>" name="titulo<?php echo $i ?>" type="text" class="form-control table-input" size="20" placeholder="http://www.google.cl">
                                    </td>
                                    <td class="center">
                                    <input id="descripcion<?php echo $i ?>" name="descripcion<?php echo $i ?>" type="text" class="form-control table-input" size="30" placeholder="Descripcion de la Imagen o Portada">
                                    </td>
                                    <td class="center">
                                    <select id="estados<?php echo $i ?>" name="estados<?php echo $i ?>" class="form-control table-input">
                                    <option value="1"> Activa </option>
                                    <option value="0"> Inactiva </option>
                                    </select>
                                    </td>
                                    <td class="center">
                                    <a href="javascript:void(0);" onclick="eliminar_filas('<?php echo $i ?>')" >eliminar</a>
                                    </td>
                                    </tr>
                                    <?php 
                                        $i++;
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="">
                                <button id="agregar_portada" type="button" class="btn btn-default pull-left"><i class="fa fa-plus"></i> &nbsp;Agregar Portada </button>
                                <button id="guardar" type="button" class="btn btn-success pull-right"><i class="fa fa-floppy-o"></i> &nbsp; Guardar Cambios </button>
                            </div>
                        </div>
                        </form>
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
    
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- jQuery custom content scroller -->
    <script src="../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <!-- Dropzone Scripts -->
    <script src="../src/js/dropzone.js"></script>
    <script src="../src/js/dropzone-custom.js" type="text/javascript"></script>
    <!--Custom JS-->
    <script src="js/custom/portada.js" type="text/javascript"></script>
</body>
</html>
