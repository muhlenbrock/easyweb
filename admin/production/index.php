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

    <title>Periodismo | Panel de Administración</title>

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
    <link href="../build/css/adminstyle.css" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
        <?php
            include("aside.php");
            include("nav.php");
        ?>
            <!-- page content -->
            <div class="right_col adminpanel" role="main">
                <div class="">
                    <div>
                        <div class="title_left">
                            <h3>Panel Principal</h3>
                            <div class="alert alert-info">
                              <p>
                                Bienvenido(a):
                              </p>
                              <p>
                                En este lugar podrás acceder a todas las opciones de EasyWeb de una forma rápida, o simplemente puedes hacer click desde el panel en la izquierda de tu pantalla.
                              </p>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                      <div class="col-md-4 acciones">
                        <div>
                        <div class="x_title">
                          <h2> <i class="fa fa-cogs fa-lg"></i>  Acciones</h2>
                        <div class="clearfix"></div>
                        </div>
                        <ul class="list-unstyled top_profiles scroll-view">
                          <li class="media event">
                            <a class="pull-left  ">
                              <i class="fa fa-image fa-lg"></i>
                            </a>
                            <div class="media-body">
                              <a class="title" href="../production/portada.php">Añadir imágenes a Portada</a>
                              <p>
                                Personaliza el slide de bienvenida del sitio. <small>
                                  <i>(Recomendamos un tamaño de 1900x490px)</i>
                                </small>
                              </p>
                            </div>
                          </li>
                          <li class="media event">
                            <a class="pull-left  ">
                              <i class="fa fa-institution fa-lg"></i>
                            </a>
                            <div class="media-body">
                              <a class="title" href="../production/quienes_somos.php">Editar Misión y Visión</a>
                              <p>
                                Aquí podrás agregar la misión y visión de tu sitio.
                              </p>
                            </div>
                          </li>
                          <li class="media event">
                            <a class="pull-left  ">
                              <i class="fa fa-file-text-o fa-lg"></i>
                            </a>
                            <div class="media-body">
                              <a class="title" href="../production/noticias.php">Añadir Noticias</a>
                              <p>
                                Publica y administra las noticias desde este enlace.
                              </p>
                            </div>
                          </li>
                          <li class="media event">
                            <a class="pull-left  ">
                              <i class="fa fa-file-image-o fa-lg"></i>
                            </a>
                            <div class="media-body">
                              <a class="title" href="../production/galerias.php">Añade Galerías de Imágenes</a>
                              <p>
                                Sube un set de fotos y crea una galería.
                              </p>
                            </div>
                          </li>

                        </ul>
                      </div>
                      </div>
                      <!-- secciones -->
                      <div class="col-md-4 secciones">
                        <div>
                        <div class="x_title">
                          <h2> <i class="fa fa-th-large fa-lg"></i>  Secciones</h2>
                        <div class="clearfix"></div>
                        </div>
                        <ul class="list-unstyled top_profiles scroll-view">
                          <li class="media event">
                            <a class="pull-left  ">
                              <i class="fa fa-file-pdf-o fa-lg"></i>
                            </a>
                            <div class="media-body">
                              <a class="title" href="../production/normativas.php">Normativas</a>
                              <p>
                                Sube los archivos con las normativas<small>
                                  <i>(Recomendamos archivos en formato PDF)</i>
                                </small>
                              </p>
                            </div>
                          </li>
                          <li class="media event">
                            <a class="pull-left  ">
                              <i class="fa fa-user-plus fa-lg"></i>
                            </a>
                            <div class="media-body">
                              <a class="title" href="../production/cuerpo.php">Cuerpo Docente</a>
                              <p>
                                Desde este enlace podrás agregar nuevos funcionarios al listado de docentes.
                              </p>
                            </div>
                          </li>
                          <li class="media event">
                            <a class="pull-left  ">
                              <i class="fa fa-graduation-cap fa-lg"></i>
                            </a>
                            <div class="media-body">
                              <a class="title" href="../production/articulos_academicos.php">Artículos Académicos</a>
                              <p>
                                Publica y administra los artículos académicos que deseas publicar en tu sitio desde este enlace.
                              </p>
                            </div>
                          </li>
                          <li class="media event">
                            <a class="pull-left  ">
                              <i class="fa fa-file-powerpoint-o fa-lg"></i>
                            </a>
                            <div class="media-body">
                              <a class="title" href="../production/seminarios.php">Seminarios de Investigación</a>
                              <p>
                                Publica y administra los artículos referentes a seminarios de investigación desde este enlace.
                              </p>
                            </div>
                          </li>
                          <li class="media event">
                            <a class="pull-left  ">
                              <i class="fa fa-calendar fa-lg"></i>
                            </a>
                            <div class="media-body">
                              <a class="title" href="../production/listar_calendario.php">Calendario de Eventos</a>
                              <p>
                                Publica y administra el calendario de eventos.
                              </p>
                            </div>
                          </li>

                        </ul>
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

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
</body>
</html>
