let radioemail = document.getElementById("correo");
radioemail.addEventListener("click", leeremail);

let radiopassword = document.getElementById("password");
radiopassword.addEventListener("click", leerpass);




function leeremail() {
    let p1 = document.getElementById("p");                       //Selecciona el <p> por medio de su id
    p1.remove();
    let divp = document.getElementById("divpass");              //Selecciona el <div> del password por medio de su id
    divp.remove();
    const inp = document.createElement("INPUT");               //Crea el nuevo <input>
    inp.placeholder = "Ingrese nombre y apellidos ingresados";
    inp.classList.add("campos2");
    const forme1 = document.getElementById("divcorreo");       // Selecciona el <div> del correo para modificar sus componentes internos
    const h3_1 = document.getElementById("h3a");               // Selecciona el <h3> dentro de correo para cambiarlo abajo en el replaceChild
    forme1.replaceChild(inp, h3_1);
}


function leerpass() {
    const inp = document.createElement("INPUT");                 //Crea un nuevo <input>
    inp.placeholder = "Ingrese el correo";
    inp.classList.add("campos2");
    const forme1 = document.getElementById("divcorreo");      // Selecciona el <div> del correo para modificar sus componentes internos
    const h3_1 = document.getElementById("h3a");             // Selecciona el <h3> dentro de correo para cambiarlo abajo en el replaceChild
    forme1.replaceChild(inp, h3_1);

    const inp2 = document.createElement("INPUT");                //Crea un nuevo <input>
    inp2.placeholder = "Nueva contraseña";
    inp2.classList.add("campos2");
    const forme2 = document.getElementById("divpass");        // Selecciona el <div> del password para modificar sus componentes internos
    const h3_2 = document.getElementById("h3b");             // Selecciona el <h3> dentro de password para cambiarlo abajo en el replaceChild
    forme2.replaceChild(inp2, h3_2); 

    var p1 = document.getElementById("p");                     //Selecciona el <p> por medio de su id
    p1.remove();

    const div1 = document.createElement("DIV");                           //Crea el nuevo <div>
    div1.classList.add("campos");                                        // Añade una nueva clase el nuevo <div>
    div1.id = "divnuevo";
    const forme= document.querySelector(".agg");                       //Para agregar en el HTML un nuevo <div>, dentro del form
    forme.appendChild(div1);
    const inp3 = document.createElement("INPUT");                    //Crea un nuevo <input>
    inp3.placeholder = "Repita contraseña";  
    inp3.classList.add("campos2");
    div1.appendChild(inp3);
    
}