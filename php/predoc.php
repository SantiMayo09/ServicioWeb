<?php
require "conexion.php";
session_start();
$correo= $_SESSION["email"];
$resultadoBD = mysqli_query($conexion, "SELECT nombre FROM docente WHERE correo = '$correo'");
$row = mysqli_fetch_assoc($resultadoBD);
$nombre = $row['nombre'];
echo "Hola Docente " . $nombre;
?>