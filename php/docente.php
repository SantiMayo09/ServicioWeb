<?php
require "conexion.php";
session_start();
// Obtiene los datos enviados en formato JSON
$data = json_decode(file_get_contents('php://input'), true);

// Extrae los valores del correo y la contraseña
$correo = $data['correo'];
$password = $data['password'];

// Realiza la consulta SQL para verificar las credenciales
$consulta = "SELECT * FROM docente WHERE correo = '$correo'";
$resultado = mysqli_query($conexion, $consulta);

if ($resultado) {
    // Verifica si se encontró un usuario con el correo proporcionado
    if (mysqli_num_rows($resultado) === 1) {
        $usuario = mysqli_fetch_assoc($resultado);

        // Verifica la contraseña utilizando password_verify
        if ($password===$usuario['password']) {
            // Las credenciales son válidas, el inicio de sesión es exitoso
            $_SESSION["email"]=$correo;
            $response = "1";
            echo $response; // redirige al usuario a la página correspondiente
        } else {
            // Contraseña incorrecta
            $response = "Contraseña incorrecta";
            echo $response;
        }
    } else {
        // No se encontró un usuario con el correo proporcionado
        $response = "Correo no encontrado";
        echo $response;
    }
} else {
    // Error en la consulta
    $response = "Error en la consulta: " . mysqli_error($conexion);
    echo $response;
}

mysqli_close($conexion);
?>
