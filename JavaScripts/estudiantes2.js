function enviarcodigo(co){
    var ajaxrequest = new XMLHttpRequest();
    var cod = co;
  
    var data = {
        codigo:cod,
    };
    var jsonData = JSON.stringify(data);
  
    ajaxrequest.onreadystatechange = function() {
        if (ajaxrequest.readyState == 4 && ajaxrequest.status == 200) {
          var mensaje = ajaxrequest.responseText;
  
  
          if (mensaje.includes("exitoso")) {
            window.location.href = "../docenteee/documentacion1.4.html"; // Redirecciona a la página index.html
          }
  
        }
    }
  
  
    ajaxrequest.open("POST","../php/estudiantes2.php", true);
    ajaxrequest.setRequestHeader("Content-Type", "application/json");
    ajaxrequest.send(jsonData);
  
  }