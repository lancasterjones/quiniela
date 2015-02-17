<?php
$servername = "104.236.137.39";
$username = "admin_shampions";
$password = "AlrorO";
$db = "admin_shampions";

// Conectar
$conn = new mysqli($servername, $username, $password, $db) or die("Some error occurred during connection " . mysqli_error($connares));
// Check connection
if ($connares->connect_error) {
    die("Conexión a Shampions DB falló: " . $connares->connect_error);
}

?>
