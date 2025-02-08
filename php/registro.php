<?php
require "conexion.php";

// Obtén los datos enviados en formato JSON
$data = json_decode(file_get_contents('php://input'), true);

// Extrae los valores del nombre, apellido, área, correo y contraseña
$nombre = $data['nombre'];
$apellido = $data['apellido'];
$area = $data['area'];
$correo = $data['correo'];
$password = $data['password'];

// Verifica el valor del campo "area" y decide en qué tabla insertar los datos
if ($area === "Docente") {
    $tabla = "docente";
} elseif ($area === "Centro de Investigaciones") {
    $tabla = "centro";
}


// Consulta para verificar si el correo ya existe en la tabla
$consulta = "SELECT COUNT(*) AS total FROM $tabla WHERE correo = '$correo'";
$resultadoConsulta = mysqli_query($conexion, $consulta);

if ($resultadoConsulta) {
    $row = mysqli_fetch_assoc($resultadoConsulta);
    $total = $row['total'];

    // Si el total es mayor a cero, significa que el correo ya existe en la tabla
    if ($total > 0) {
        $response = "El correo ingresado ya esta registrado, pruebe con otro";
        echo $response;

    } else {
        // Realiza la inserción en la tabla correspondiente utilizando una sentencia preparada
        $stmt = mysqli_prepare($conexion, "INSERT INTO $tabla (nombre, apellido, correo, password) VALUES (?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "ssss", $nombre, $apellido, $correo, $password);

        if (mysqli_stmt_execute($stmt)) {
           $response = "1";
            echo $response;

        } else {
            $response = "Error al realizar la inserción en la base de datos: " . mysqli_error($conexion);
            echo $response;
        }

        mysqli_stmt_close($stmt);
    }
} 

mysqli_close($conexion);
?>
