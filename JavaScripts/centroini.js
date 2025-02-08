document.getElementById("inicio").addEventListener("submit", function(event) {
    event.preventDefault(); // Evita que el formulario se envíe
       // Obtén los valores de nombre y apellido
    var correo = document.getElementById("correo").value;
    var password = document.getElementById("password").value;
    console.log(password);
    // Crea un objeto con los datos a enviar
    var data = {
        correo: correo,
        password: password
    };

    // Convierte el objeto a una cadena JSON
    var jsonData = JSON.stringify(data);

    // Crea una instancia de XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Configura la solicitud AJAX
    xhr.open("POST","../php/centroini.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");

    // Define la función de callback para la respuesta del servidor
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            var response = xhr.responseText;
            var ver= xhr.responseText;
            
            document.getElementById("resultado").innerHTML = response;
            if (response === "1") {
                // Redirige a documentacion1.1.html con el mensaje en los parámetros de URL
                window.location.href = "docu1.1.html";
              } else {
                document.getElementById("resultado").innerHTML = response; // Muestra la respuesta en el elemento con ID "resultado"
                document.getElementById("correo").value = "";
                document.getElementById("password").value = "";
              }
        }
    };

    // Envía la solicitud AJAX con los datos en formato JSON
    xhr.send(jsonData);
});
