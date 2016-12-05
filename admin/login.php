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

    <title>Login | Universidad De La Serena</title>

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
            <form action="routes/login.php" method="POST" >
              <h1>Autentificación</h1>
              <?php
                if (isset($_SESSION['error'])) {
                  echo "<p class='text-danger'>".$_SESSION['error']."</p>";
                  session_destroy();
                }
              ?>
              <div>
                <input name="user" type="text" class="form-control" placeholder="Usuario" required/>
              </div>
              <div>
                <input name="pass" type="password" class="form-control" placeholder="Contraseña" required/>
              </div>
              <div>
                <button type="submit" class="btn btn-default">Ingresar</button>
              </div>
              <div class="clearfix"></div>
              <div class="separator"></div>
              <div class="col-xs-12 text-center">
                <a href="restore.php" target="_blank">¿Olvidaste tu contraseña?</a>
              </div>
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
      <!-- jQuery -->
      <script src="vendors/jquery/dist/jquery.min.js"></script>
      <!-- Bootstrap -->
      <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>