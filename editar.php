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

 $sql = " INSERT INTO pronosticos_prueba
          (
            id_usuario,
            id_partido,
            goles_local,
            goles_visitante
            )
          VALUES (
            1,
            1,
            5,
            5
          ) ";
if ($conn->query($sql) === TRUE) {
  echo "Resultado Guardado";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

?>
