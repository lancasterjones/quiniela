<?php
$servername = "104.236.137.39";
$username = "admin_shampions";
$password = "AlrorO";
$db = "admin_shampions";

define("CAN_REGISTER", "any");
define("DEFAULT_ROLE", "member");

define("SECURE", FALSE);    // FOR DEVELOPMENT ONLY!!!!

// Conectar
$conn = new mysqli($servername, $username, $password, $db) or die("Some error occurred during connection " . mysqli_error($conn));
// Check connection
if ($conn->connect_error) {
    die("Conexión a Shampions DB falló: " . $conn->connect_error);
}

?>
