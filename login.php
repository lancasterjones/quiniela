<?php
/**
 * Copyright (C) 2013 peredur.net
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();

if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Champions League 2015</title>
        <link rel="stylesheet" href="styles/main.css" />
        <script type="text/JavaScript" src="js/sha512.js"></script>
        <script type="text/JavaScript" src="js/forms.js"></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <!-- Parallax Login-->
        <script src="http://mymaplist.com/js/vendor/TweenLite.min.js"></script>
        <style>
          body{
            background: url(http://marcadeportiva.com.mx/wp-content/uploads/2015/02/champions-league-2013-2014.jpg);
            background-color: #444;
            background: url(/img/logoslogin.png),url(http://marcadeportiva.com.mx/wp-content/uploads/2015/02/champions-league-2013-2014.jpg);    
        }

          .vertical-offset-100{
              padding-top:100px;
          }
        </style>
    </head>
    <body>
      <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Champions League 2015</a>
              </div>
              <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                  <li><a href="/">Inicio</a></li>
                  <li><a href="/partidos.php">Partidos</a></li>
                  <li><a href="/pronosticos.php">Pronósticos</a></li>
                  <li><a href="/tabla.php">Tabla</a></li>
                </ul>
              </div><!--/.nav-collapse -->
            </div>
          </nav><br><br><br><br>
          <div class="container">
            <div class="starter-template">
              <?php if (login_check($mysqli) == true) : ?>
                <script language="javascript">
                  window.location.href = "http://shampions.vende.io/partidos.php"
                </script>
        <br><br><br><br>
        <p>Ya estás loggeado.</p>
        <p>Salir</p>

      <?php else : ?>

            <?php
            if (isset($_GET['error'])) {
                echo '<p class="error">¡Error en Login!</p>';
            }
            ?>
            <div class="row vertical-offset-100">
              <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                  <div class="panel-heading"> 
                    <h3 class="panel-title">Inicia Sesión</h3>
                  </div>
                  <div class="panel-body">
                    <form action="includes/process_login.php" method="post" name="login_form">
                      <fieldset>
                        <div class="form-group">
                          <input type="text" name="email" class="form-control" placeholder="Email" aria-describedby="basic-addon1">
                        </div>
                        <div class="form-group">
                          <input type="password" name="password" id="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="checkbox">
                          <label>
                            <input name="remember" type="checkbox" value="Remember Me"> Recordarme
                          </label>
                        </div>
                        <button type="button" value="Login" onclick="formhash(this.form, this.form.password);" class="btn btn-lg btn-success btn-block">Entrar</button>
                      </fieldset>
                    </form>
                  </div>
                </div>
              </div>
            </div>

          </p>
      <?php endif; ?>
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
        <script>
          $(document).ready(function(){
            $(document).mousemove(function(e){
               TweenLite.to($('body'), 
                  .5, 
                  { css: 
                      {
                          backgroundPosition: ""+ parseInt(event.pageX/8) + "px "+parseInt(event.pageY/'12')+"px, "+parseInt(event.pageX/'15')+"px "+parseInt(event.pageY/'15')+"px, "+parseInt(event.pageX/'30')+"px "+parseInt(event.pageY/'30')+"px"
                      }
                  });
            });
          });
        </script>
    </body>
</html>
