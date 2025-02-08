<?php
require "conexion.php";
session_start();
$profe = $_SESSION["email"];

// Obtén los datos enviados en formato JSON
$data = json_decode(file_get_contents('php://input'), true);

// Extrae los valores del código, nombre, apellido y correo
$codigo = $data['codigo'];
$nombre = $data['nombre'];
$apellido = $data['apellido'];
$correo = $data['correo'];

// Consulta para verificar si el código ya existe en la tabla
$consulta = "SELECT COUNT(*) AS total FROM estudiante WHERE codigo = '$codigo'";
$resultadoConsulta = mysqli_query($conexion, $consulta);

if ($resultadoConsulta) {
    $row = mysqli_fetch_assoc($resultadoConsulta);
    $total = $row['total'];

    // Si el total es mayor a cero, significa que el código ya existe en la tabla
    if ($total > 0) {
        $response = "El código de estudiante ingresado ya está registrado, prueba con otro";
        echo $response;
    } else {
        // Realiza la inserción en la tabla correspondiente utilizando una sentencia preparada
        $stmt = mysqli_prepare($conexion, "INSERT INTO estudiante (codigo, nombre, apellido, correo, profe) VALUES (?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sssss", $codigo, $nombre, $apellido, $correo, $profe);

        if (mysqli_stmt_execute($stmt)) {
            $response = "1";
            echo $response;
        } else {
            $response = "Error al realizar la inserción en la base de datos: " . mysqli_error($conexion);
            echo $response;
        }

        mysqli_stmt_close($stmt);
    }
} else {
    $response = "Error en la consulta: " . mysqli_error($conexion);
    echo $response;
}

mysqli_close($conexion);
?>
