<?php
  session_start();
  if (isset($_SESSION['user'])) {
    header('Location: production/index.php');
    die;
  }
?>
<!DOCTYPE html>
<html lang="es-cl">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Recuperar Contraseña | Universidad De La Serena</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="https://colorlib.com/polygon/gentelella/css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signin"></a>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form id="target" method="POST" >
              <h2>Recuperar Contraseña</h2>
              <div>
                <label>Correo Electrónico del Usuario</label>
                <input id="email" type="email" class="form-control" placeholder="Email" required/>
              </div>
              <div>
                <button type="submit" class="btn btn-default">Recuperar Contraseña</button>
              </div>
              <div class="clearfix"></div>
              <div class="separator"></div>
                <br />
                <div>
                  <h1>Easy Web</h1>
                  <p>©2016 Oxido Creative Studo. Todos los derechos reservados.</p>
                </div>
            </form>
          </section>
        </div>
      </div>
    </div>
      
      
    <!-- Modal -->
    <div class="modal fade" id="mensaje_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Mensaje del Sistema</h4>
          </div>
          <div class="modal-body">
            <p id="mensaje"></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
          </div>
        </div>
      </div>
    </div>
      
      <!-- jQuery -->
      <script src="vendors/jquery/dist/jquery.min.js"></script>
      <!-- Bootstrap -->
      <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
      
      <script>
          $('#target').on('submit',function(event){
              event.preventDefault();
              $.post("routes/restore.php",{email: $('#email').val()},function(data){
                  $("#mensaje").text(data);
                  $("#mensaje_modal").modal('show');
              }).done(function(){
                  $("#email").val("");
              }); 
          });
      </script>
      
  </body>
</html>