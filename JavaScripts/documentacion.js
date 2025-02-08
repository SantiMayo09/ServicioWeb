window.addEventListener('DOMContentLoaded', (event) => {
    // Obtener el formulario
    const form = document.getElementById('uploadForm');
  
    // Agregar evento de clic al botón "Agregar Documentos"
    const agregarBtn = document.getElementById('agregarBtn');
    agregarBtn.addEventListener('click', (event) => {
      event.preventDefault(); // Evitar que se realice la acción predeterminada
  
      // Obtener todos los campos de archivo en el formulario
      const fileInputs = form.querySelectorAll('input[type="file"]');
  
      // Crear un objeto FormData
      const formData = new FormData();
  
      // Agregar cada archivo al objeto FormData
      fileInputs.forEach((input) => {
        const files = input.files;
        for (let i = 0; i < files.length; i++) {
          formData.append('archivos[]', files[i]);
        }
      });
  
      // Realizar la solicitud AJAX
      const xhr = new XMLHttpRequest();
      xhr.open('POST', '../php/documentacion.php', true);
      xhr.onload = function () {
        if (xhr.status === 200) {
          // La solicitud se completó correctamente
          //console.log(xhr.responseText); // Puedes mostrar una respuesta o realizar alguna acción adicional
          document.getElementById('mensaje').innerHTML = xhr.responseText;
        } else {
          // Hubo un error en la solicitud
          console.error('Error al enviar los archivos');
        }
      };
      xhr.send(formData);
    });
  });
  
