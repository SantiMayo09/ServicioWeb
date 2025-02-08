<?php
// Incluir el archivo de conexión a la base de datos
require 'conexion.php';
session_start();
$codigo = $_SESSION['codigo'];

// Recibir los archivos enviados desde el formulario
$archivos = $_FILES['archivos'];

// Iterar sobre los archivos y moverlos a una ubicación permanente
foreach ($archivos['tmp_name'] as $key => $tmp_name) {
    $nombreArchivo = $archivos['name'][$key];
    $rutaArchivo = "C:/xampp/htdocs/archivos/" . $nombreArchivo;

    if (move_uploaded_file($tmp_name, $rutaArchivo)) {
        // Insertar los detalles de los archivos en la base de datos
        $sql = "INSERT INTO documento (id, nombre_archivo, ruta_archivo, codigo, estado) VALUES (NULL, ?, ?, ?, 'entregado')";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sss", $nombreArchivo, $rutaArchivo, $codigo);
        $stmt->execute();
        echo "El archivo se ha subido correctamente el archivo " . $nombreArchivo;
    } else {
        echo "Error al mover el archivo: " . $nombreArchivo;
    }
}

$conexion->close();

?>

