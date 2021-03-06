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
  tr {
    text-align: center;
  }
  .panel-heading img {
    width: 35px;
  }
  .badge {
    font-size: 18px !important;
  }
  .marcador {
    max-width: 150px;
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
            <li><a href="/pronosticos.php">Pronósticos</a></li>
            <li class="active"><a href="/tabla.php">Tabla</a></li>
            <li style="float:right;"><?php if (login_check($mysqli) == true) {
                echo "<a href='includes/logout.php' >Salir</a>";
            } ?>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav><br><br><br><br>

  <div class="container" style="max-width: 700px;">
    <div class="starter-template" style="text-align: center;">
      <?php if (login_check($mysqli) == true) :
        $accion = "Cambiar";
        $id_partido =  ($_GET['p']/112);
        $id_usuario = htmlentities($_SESSION['user_id']);
        $sql = "SELECT *
                FROM pronosticos
                WHERE id_partido = '$id_partido'
                AND id_usuario =  '$id_usuario'  ";
        $result = mysqli_query($conn, $sql);
        $sql_info = "SELECT * FROM view_partidos WHERE id_partido = '$id_partido' ";
        $result_info = mysqli_query($conn, $sql_info);
        ?>
        <h3>Pronóstico Actual</h3>
        <div class='panel panel-primary' style='max-width: 400px; margin: 0 auto;'>
        <div class='panel-heading'>
          <?php
          $rows = $result_info->fetch_array(MYSQLI_ASSOC);
          printf("<img src='%s'> -
                  <img src='%s'>",
                  $rows['logo_local'],
                  $rows['logo_visitante'])
           ?>
        </div>
        <table class='table'>
          <tbody>
              <?php


              if (mysqli_num_rows($result) > 0) {
                $row = $result->fetch_array(MYSQLI_ASSOC);
                printf ("<tr><td><span class='badge'>%s</span></td><td><span class='badge'>%s</span></td></tr>", $row["goles_local"], $row["goles_visitante"]);

                  /*while($row = mysqli_fetch_array($result))
                  {
              echo  "<tr><td> . $row['goles_local'] . </td></tr>" ;


            }*/ }
                 else {
                  $accion = "Agregar";
                }
                //$conn->close(); // Cerrar DB
                ?>



        <form action="editar.php" method="post">
          <tr><td>
              <input type="hidden" name="id_partido" id="id_partido" value="<?php echo $id_partido ?>">

              <input type="text" name="goles_local" id="goles_local" class="marcador">

            </td>
            <td>

              <input type="text" name="goles_visitante" id="goles_visitante" class="marcador">
            </td>
          </tbody>
        </table>
        <br>
            <input type="submit" value="<?php echo $accion ?>" class="btn btn-success">
        </form>
        <br><br>
      </div>



    <?php else : ?>
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
