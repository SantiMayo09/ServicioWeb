<?php
require "conexion.php"; // se conecta al archivo de conexión
session_start();
$codigo = $_SESSION['codigo'];
// Obtener los usuarios de la base de datos
$resultadoBD = mysqli_query($conexion, "SELECT * FROM estudiante WHERE codigo = '$codigo'");

// Verificar si hay resultados
if (mysqli_num_rows($resultadoBD) > 0) {
  // Recorrer los resultados y generar el HTML para cada usuario
  while ($row = mysqli_fetch_assoc($resultadoBD)) {
    $nombre = $row['nombre'];
    echo  $nombre ;


  }
} else {
  // Si no hay usuarios en la base de datos, mostrar un mensaje alternativo
  echo '¿como llegaste hasta aqui?';
}

mysqli_close($conexion);
?>
