<?php include 'conf/db.php'; ?> <!-- Menú Global -->

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
  .panel-heading img {
    width: 35px;
  }
  tr {
    text-align: center;
  }
</style>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
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
            <li class="active"><a href="/pronosticos.php">Pronósticos</a></li>
            <li><a href="/tabla.php">Tabla</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav><br><br><br><br>

  <div class="container" style="max-width: 700px;">
    <div class="starter-template">



              <?php
              $i = 0;
              $sql = "SELECT partidos.id,
       equipos.nombre AS local,
       equipos.logo AS logo_local,
       equipos_1.nombre AS visitante,
       equipos_1.logo AS logo_visitante,
       partidos.goles_local,
       partidos.goles_visitante,
       DATE_SUB(partidos.fecha, INTERVAL 1 HOUR),
       DATE_ADD(NOW(), INTERVAL 1 HOUR)
  FROM (admin_shampions.partidos partidos
        INNER JOIN admin_shampions.equipos equipos_1
           ON (partidos.visitante = equipos_1.id))
       INNER JOIN admin_shampions.equipos equipos
          ON (partidos.local = equipos.id)
 WHERE (partidos.fecha BETWEEN DATE_SUB(partidos.fecha, INTERVAL 1 HOUR) AND DATE_ADD(NOW(), INTERVAL 1 HOUR))
ORDER BY partidos.id ASC";
              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_array($result))
            {
                $i++;
                echo "
                <div class='panel panel-primary' style='max-width: 600px; margin: 0 auto;'>
                <div class='panel-heading'>".
                  $row['local'].
                  "<img src='" . $row['logo_local'] . "''>
                  vs
                  <img src='" . $row['logo_visitante'] . "'>".
                  $row['visitante'] .
                  "<strong>".
                  $row['goles_local'] .
                  " - " .
                  $row['goles_visitante'] .
                  "</strong></div>
                  <div class='panel-body'>
                  </div>
                  <table class='table'>
                    <thead><tr>
                      <th>Nombre</th>
                      <th>Local</th>
                      <th>Visitante</th>
                      <th>Puntos</th>
                    </tr></thead>
                    <tbody>";
                    // DATOS AQUÍ
                    $partido = $i;
                    $query_pronosticos = "SELECT DISTINCT
       pronosticos.id_partido,
       usuarios.nombre,
       pronosticos.goles_local,
       pronosticos.goles_visitante,
           IF(pts_partido.pts_marcador = 'ok', '2', '0')
         * valor_puntos.pts_marcador
       +   IF(pts_partido.pts_resultado = 'ok', '1', '0')
         * valor_puntos.pts_resultado
          AS puntos
  FROM (((admin_shampions.pronosticos pronosticos
          INNER JOIN admin_shampions.pts_partido pts_partido
             ON (pronosticos.id_usuario = pts_partido.id_usuario))
         INNER JOIN admin_shampions.usuarios usuarios
            ON (pronosticos.id_usuario = usuarios.id))
        INNER JOIN admin_shampions.partidos partidos
           ON (partidos.id = pts_partido.id_partido))
       INNER JOIN admin_shampions.valor_puntos valor_puntos
          ON (valor_puntos.ronda = partidos.ronda)
 WHERE pronosticos.id_partido = '$partido' AND pts_partido.id_partido = '$partido'
GROUP BY usuarios.nombre
ORDER BY puntos DESC";
                    $resultado_pronosticos = mysqli_query($conn, $query_pronosticos);

                    while($linea = mysqli_fetch_array($resultado_pronosticos))
                    {echo "<tr>
                            <td>" . $linea['nombre'] . "</td>
                            <td>" . $linea['goles_local'] . "</td>
                            <td>" . $linea['goles_visitante'] . "</td>
                            <td>" . $linea['puntos'] . "</td>

                      </tr>";};
                    // FIN DATOS
                    echo "
                    </tbody>
                  </table>
                </div>
                <br>
                  ";
              };


              } else {
                echo "<br>Sin Resultados";
              };
                //$conn->close(); // Cerrar DB
                ?>

      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  </body>
