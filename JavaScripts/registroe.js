document.getElementById("Registro").addEventListener("submit", function(event) {
    event.preventDefault(); // Evita que el formulario se envíe
  
    // Obtén los valores de nombre y apellido
    let codigo = document.getElementById("ID").value;
    let nombre = document.getElementById("Name").value;
    let apellido = document.getElementById("Apellidos").value;
    let correo = document.getElementById("correo").value;
    
  
    // Crea un objeto con los datos a enviar
    var data = {
      codigo: codigo,
      nombre: nombre,
      apellido: apellido,
      correo: correo,
    };
  
    // Convierte el objeto a una cadena JSON
    var jsonData = JSON.stringify(data);
  
    // Crea una instancia de XMLHttpRequest
    var xhr = new XMLHttpRequest();
  
    // Configura la solicitud AJAX
    xhr.open("POST", "../php/registroe.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
  
    // Define la función de callback para la respuesta del servidor
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          var response = xhr.responseText;
          console.log(xhr.readyState);
  
          if (response === "1") {
            // Redirige a index.html con el mensaje en los parámetros de URL
            var mensaje = "Se%20registró%20correctamente";
            window.location.href = "documentacion1.1.html?mensaje=" + mensaje;
          } else {
            document.getElementById("resultado").innerHTML = response; // Muestra la respuesta en el elemento con ID "resultado"
            document.getElementById("ID").value = "";
            document.getElementById("Name").value = "";
            document.getElementById("Apellidos").value = "";
            document.getElementById("correo").value = "";
            
          }
        } else {
          console.log("Error en la solicitud");
        }
      }
    };
  
    // Envía la solicitud AJAX con los datos en formato JSON
    xhr.send(jsonData);
  });
  