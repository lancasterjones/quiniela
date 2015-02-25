<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
include 'conf/db.php';

sec_session_start();
?>

 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
 <html>
 <head>
 <title>Editar Pronóstico</title>
 </head>
 <body>
   <?php if (login_check($mysqli) == true) : ?>
   <p>Hola <?php echo htmlentities($_SESSION['username']); ?>!</p>

 <?php

// connect to the database


 $id_usuario = htmlentities($_SESSION['user_id']);
 $id_partido = $_POST['id_partido'];
 $goles_local = $_POST['goles_local'];
 $goles_visitante = $_POST['goles_visitante'];

 echo 'Usuario: ' . $id_usuario . '<br>' .
      'Partido: ' . $id_partido . '<br>' .
      'Local: ' . $goles_local . '<br>' .
      'Visitante' . $goles_visitante . '<br>';

 $sql = " INSERT INTO pronosticos
          (
            id_usuario,
            id_partido,
            goles_local,
            goles_visitante
            )
          VALUES (
            '$id_usuario',
            '$id_partido',
            '$goles_local',
            '$goles_visitante'
          )
          ON DUPLICATE KEY UPDATE
            goles_local = '$goles_local',
            goles_visitante = '$goles_visitante'
          ";

if ($conn->query($sql) === TRUE) {
  echo "Resultado Guardado";
  header("Location: ../partidos.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
 else : ?>
    <p>
      <?php include 'includes/mensaje_no_autorizado.php'; ?>
    </p>
<?php endif; ?>
