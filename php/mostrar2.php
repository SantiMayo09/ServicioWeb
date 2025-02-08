<?php
require "conexion.php"; // se conecta al archivo de conexión
session_start();
$codigo = $_SESSION['codigo'];
// Obtener los usuarios de la base de datos
$resultadoBD = mysqli_query($conexion, "SELECT * FROM documento WHERE codigo = '$codigo'");

// Verificar si hay resultados
if (mysqli_num_rows($resultadoBD) > 0) {
  // Recorrer los resultados y generar el HTML para cada usuario
  while ($row = mysqli_fetch_assoc($resultadoBD)) {
    $nombre = $row['nombre_archivo'];
    $ruta = $row['ruta_archivo'];
    echo 'div class="contenedor-campos2" id="info">';   
    echo '<div class="hhe3">'. $nombre .'</div>';
    echo '<img src="../img/Iconopdf.png" class="logo3" alt="Documento PDF" id="img1" href="'.$ruta.'"></div>';
  }
} else {
  // Si no hay usuarios en la base de datos, mostrar un mensaje alternativo
  echo 'No se encontraron estudiantes';
}

mysqli_close($conexion);
?>