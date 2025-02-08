<?php
require "conexion.php"; // se conecta al archivo de conexión
session_start();
$codigo = $_SESSION['codigo'];
// Obtener los usuarios de la base de datos
$resultadoBD = mysqli_query($conexion, "SELECT estado FROM documento WHERE codigo = '$codigo'");

// Verificar si hay resultados
if (mysqli_num_rows($resultadoBD) > 0) {
  // Recorrer los resultados y generar el HTML para cada usuario
  $row = mysqli_fetch_assoc($resultadoBD); 
    $estado = $row['estado'];

    // Generar el HTML para cada usuario
    /*echo '<a href="documentacion1.4.html?codigo=' . $codigo . '" class="nuevacasilla">';
    echo '<img src="../img/flechadoble.png" class="logo2" alt="Revisar joven investigador">';
    echo '<img src="../img/usuario.png" class="logo2" alt="Foto de perfil de joven investigador">';
    echo  $nombre .'  '. $apellido. '</a>';*/
    echo  $estado;


  
} else {
  // Si no hay usuarios en la base de datos, mostrar un mensaje alternativo
  echo 'No se ha entregado.';
}

mysqli_close($conexion);
?>