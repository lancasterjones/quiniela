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
 <?php

// connect to the database
 include 'conf/db.php';

 $id_usuario = 1;
 $id_partido = 1;
 $goles_local = 3;
 $goles_visitante = 2;

 echo 'Usuario: ' . $id_usuario . '<br>' .
      'Partido: ' . $id_partido . '<br>' .
      'Local: ' . $goles_local . '<br>' .
      'Visitante' . $goles_visitante . '<br>';

 $sql = " INSERT INTO pronosticos_prueba
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
          ) ";
if ($conn->query($sql) === TRUE) {
  echo "Resultado Guardado";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

?>
