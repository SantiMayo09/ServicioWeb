<?php
session_start();
require "conexion.php";

$data = json_decode(file_get_contents('php://input'), true);
$codigo = $_SESSION['codigo'];
$estado = $data['estado'];
// Actualizar el valor de la columna "estado" en la tabla
$query = "UPDATE documento SET estado = '$estado' WHERE codigo = '$codigo'";
mysqli_query($conexion, $query);

mysqli_close($conexion);
?>