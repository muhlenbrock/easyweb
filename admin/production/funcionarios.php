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
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <!-- PNotify -->
    <link href="../vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
    <!-- Custom Style -->
    <link href="css/custom/style.css" type="text/css" rel="stylesheet" />
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
            <div class="right_col" role="main">
                <div class="clearfix"></div>
                <div class="row">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Funcionarios</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="text-center">
                                <a type="button" href="nuevo_funcionario.php" class="btn btn-info creardocente"><span><i class="fa fa-pencil-square-o fa-2x center"></i></span> <span>Crear Funcionario</span> </a>
                            </div>
                            <div class="table-responsive">
                                <table id="datatable-keytable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th> <!-- Titulo -->
                                            <th>Apellido</th> <!-- Bajada -->
                                            <th>Imágen</th> <!-- Imagen -->
                                            <th>Acciones</th> <!-- Acciones -->
                                        </tr>
                                    </thead>
                                </table>
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
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
    <!-- PNotify -->
    <script src="../vendors/pnotify/dist/pnotify.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.nonblock.js"></script>

    <script type="text/javascript">

        var table = $('#datatable-keytable').DataTable({
            dom: "Bfrtip",
            lengthMenu: [
                [ 10, 25, 50, -1 ],
                [ '10 Filas', '25 Filas', '50 Filas', 'Mostrar Todos' ]
            ],
            "oLanguage": {
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "sLengthMenu": "Mostrar _MENU_ registros por página",
                "sEmptyTable": "No existen registros",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "No se han encontrado resultados",
                "sInfoFiltered": "(Filtrado de _MAX_ registros)",
                "sZeroRecords": "No se han encontrado resultados"
            },
            ajax: "../routes/listar_funcionario.php",
            deferRender: true,
            scrollY: 380,
            scrollCollapse: true,
            keys: true,

            buttons: [
            {
              extend: "pageLength",
              className: "btn-sm"
            },
            {
              extend: "copy",
              className: "btn-sm"
            },
            {
              extend: "csv",
              className: "btn-sm"
            },
            {
              extend: "excel",
              className: "btn-sm"
            },
            {
              extend: "pdf",
              className: "btn-sm"
            },
            {
              extend: "print",
              className: "btn-sm"
            },
            ],
            responsive: true
        });

        function eliminarCuerpo($id){
            if (confirm("Estas a punto de eliminar una noticia ¿Estás Seguro?")) {
                $.post('../routes/eliminar_funcionario.php', {id: $id}, function(data){
                     table.ajax.reload();
                }).done(function(data){
                    new PNotify({
                        title: data,
                        type: 'success',
                        styling: 'bootstrap3'
                    })
                }).error(function(){
                    new PNotify({
                        title: '¡Error al comunicarse con Base de Datos!',
                        text: 'Verifique su conexión a internet',
                        type: 'error',
                        styling: 'bootstrap3'
                    });
                });
            }
        }
    </script>
</body>
</html>
