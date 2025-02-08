<?php
require "conexion.php"; // se conecta al archivo de conexión
session_start();
$docemail = $_SESSION['email'];
// Obtener los usuarios de la base de datos
$resultadoBD = mysqli_query($conexion, "SELECT * FROM estudiante");

// Verificar si hay resultados
if (mysqli_num_rows($resultadoBD) > 0) {
  // Recorrer los resultados y generar el HTML para cada usuario
  while ($row = mysqli_fetch_assoc($resultadoBD)) {
    $codigo = $row['codigo'];
    $nombre = $row['nombre'];
    $apellido = $row['apellido'];
    // Generar el HTML para cada usuario
    /*echo '<a href="documentacion1.4.html?codigo=' . $codigo . '" class="nuevacasilla">';
    echo '<img src="../img/flechadoble.png" class="logo2" alt="Revisar joven investigador">';
    echo '<img src="../img/usuario.png" class="logo2" alt="Foto de perfil de joven investigador">';
    echo  $nombre .'  '. $apellido. '</a>';*/
    echo '<input type="button" onclick="enviarcodigo(\'' . $codigo . '\')" value="' . $nombre . ' ' . $apellido . '" class="nuevacasilla">';


  }
} else {
  // Si no hay usuarios en la base de datos, mostrar un mensaje alternativo
  echo 'No se encontraron usuarios.';
}

mysqli_close($conexion);
?>