<?php  include '../conf/db.php'; ?> <!-- Conexión a DB -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Champions League 2015</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

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
            <li class="active"><a href="/partidos.php">Partidos</a></li>
            <li><a href="/pronosticos.php">Pronósticos</a></li>
            <li><a href="/tabla.php">Tabla</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav><br><br>

  <div class="container" style="max-width: 700px;">
    <div class="starter-template">
        <h1>Partidos Siguientes</h1>

      <div class="panel panel-primary" style="max-width: 600px; margin: 0 auto;">
    <!-- Default panel contents -->
        <div class="panel-heading">Octavos de Final</div>
        <div class="panel-body">
          <p>1 Punto por acertar en resultado (Local, Empate, Visitante)</p>
          <p>2 Puntos por acertar en marcador</p>
          <p>3 puntos máximo por partido</p>
        </div>

        <!-- Table -->
        <?php
        echo "Inicio Body";
          
          $conn->close(); // Cerrar DB
        ?>

        <table class='table'>
          <thead><tr>
            <th>Local</th>
            <th>Visitante</th>
            <th>Fecha</th>
            <th>Pronóstico</th>
          </tr></thead>
          <tbody>
            <tr>
              <td>Local</td>
              <td>Visitante</td>
              <td>Fecha</td>
              <td><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></td>
            </tr>
            <tr>
              <td>Local</td>
              <td>Visitante</td>
              <td>Fecha</td>
              <td><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></td>
            </tr>
          </tbody>
        </table>
      </div>
      <br>



      <div class="panel panel-default" style="max-width: 600px; margin: 0 auto;">
    <!-- Default panel contents -->
        <div class="panel-heading">Cuartos de Final</div>
        <div class="panel-body">
          <p>2 Puntos por acertar en resultado (Local, Empate, Visitante)</p>
          <p>4 Puntos por acertar en marcador</p>
          <p>6 puntos máximo por partido</p>
        </div>

        <!-- Table -->
        <table class='table'>
          <thead><tr>
            <th>Local</th>
            <th>Visitante</th>
            <th>Fecha</th>
            <th>Pronóstico</th>
          </tr></thead>
          <tbody>

          </tbody>
        </table>
      </div>
      <br>
      <div class="panel panel-default" style="max-width: 600px; margin: 0 auto;">
    <!-- Default panel contents -->
        <div class="panel-heading">Semi Finales</div>
        <div class="panel-body">
          <p>2 Puntos por acertar en resultado (Local, Empate, Visitante)</p>
          <p>4 Puntos por acertar en marcador</p>
          <p>6 puntos máximo por partido</p>
        </div>

        <!-- Table -->
        <table class='table'>
          <thead><tr>
            <th>Local</th>
            <th>Visitante</th>
            <th>Fecha</th>
            <th>Pronóstico</th>
          </tr></thead>
          <tbody>
          </tbody>
        </table>
      </div>
      <br>
      <div class="panel panel-default" style="max-width: 600px; margin: 0 auto;">
    <!-- Default panel contents -->
        <div class="panel-heading">Final</div>
        <div class="panel-body">
          <p>4 Puntos por acertar en resultado (Local, Empate, Visitante)</p>
          <p>8 Puntos por acertar en marcador</p>
          <p>12 puntos máximo por partido</p>
        </div>

        <!-- Table -->
        <table class='table'>
          <thead><tr>
            <th>Local</th>
            <th>Visitante</th>
            <th>Fecha</th>
            <th>Pronóstico</th>
          </tr></thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  </body>
