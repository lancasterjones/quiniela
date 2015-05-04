<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
include 'conf/db.php';

sec_session_start();
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Champions League 2015</title>
<style>
  th {
    text-align: center !important;
  }
  td {
    line-height: 35px !important;
    vertical-align: middle !important; 
    text-align: center !important;
  }
  td img {
    width: 35px;
  }
</style>

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
            <li style="float:right;"><?php if (login_check($mysqli) == true) {
                echo "<a href='includes/logout.php' >Salir</a>";
            } ?>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav><br><br>

  <div class="container" style="max-width: 700px;">
    <div class="starter-template">
      <?php if (login_check($mysqli) == true) : ?>
        <h1>Partidos Siguientes</h1>

      <div class="panel panel-primary" style="max-width: 600px; margin: 0 auto;">
    <!-- Default panel contents -->
        <div class="panel-heading">Cuartos de Final</div>
        <div class="panel-body">
          <p>2 Puntos por acertar en resultado (Local, Empate, Visitante)</p>
          <p>4 Puntos por acertar en marcador</p>
          <p>6 puntos máximo por partido</p>
        </div>

        <!-- Table -->
        
      </div>
      <br>
      <div class="panel panel-primary" style="max-width: 600px; margin: 0 auto;">
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
              <?php
              $sql = "SELECT * FROM view_partidos
                WHERE ronda = 'Semis'
                AND (view_partidos.fecha BETWEEN DATE_ADD(NOW(), INTERVAL 0 HOUR) AND DATE_ADD(view_partidos.fecha, INTERVAL 1 HOUR))";
              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_array($result))
                  {
                    echo  "<tr><td style='text-align: left;'><img src='". $row['logo_local'] ."' > ". $row['local'] ."</td>" .
                      "<td style='text-align: left;'><img src='". $row['logo_visitante'] ."' > ". $row['visitante'] ."</td>" .
                      "<td style='text-align: center;'>". date('M j g:i A', strtotime($row['fecha'])) ."</td>" .
                      "<td style='text-align: center;'><a href='/pronosticar.php?p=". ($row['id_partido']*112) . "'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a></td></tr>" ;
                  } ; 
                } else {
                    echo "<br>Sin Resultados";
                  };
                //$conn->close(); // Cerrar DB
                ?>
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
    <?php else : ?>
      <br><br>
        <p>
        <?php include 'includes/mensaje_no_autorizado.php'; ?>
        </p>
    <?php endif; ?>
    </div>
  </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  </body>
