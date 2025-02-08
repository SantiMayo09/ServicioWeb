function aprobar() {
    var ajaxrequest = new XMLHttpRequest();
    var tex = "aprobado";
  
    var data = {
      estado: tex,
    };
    var jsonData = JSON.stringify(data);
  
    ajaxrequest.onreadystatechange = function () {
      if (ajaxrequest.readyState == 4 && ajaxrequest.status == 200) {
        // Aquí puedes agregar código para manejar la respuesta de la solicitud
        console.log("Solicitud de aprobación completada con éxito");
      }
    };
  
    ajaxrequest.open("POST", "../php/aprobado.php", true);
    ajaxrequest.setRequestHeader("Content-Type", "application/json");
    ajaxrequest.send(jsonData);
  }
  
  function rechazar() {
    var ajaxrequest = new XMLHttpRequest();
    var tex = "rechazado";
  
    var data = {
      estado: tex,
    };
    var jsonData = JSON.stringify(data);
  
    ajaxrequest.onreadystatechange = function () {
      if (ajaxrequest.readyState == 4 && ajaxrequest.status == 200) {
        // Aquí puedes agregar código para manejar la respuesta de la solicitud
        console.log("Solicitud de rechazo completada con éxito");
      }
    };
  
    ajaxrequest.open("POST", "../php/aprobado.php", true);
    ajaxrequest.setRequestHeader("Content-Type", "application/json");
    ajaxrequest.send(jsonData);
  }
  