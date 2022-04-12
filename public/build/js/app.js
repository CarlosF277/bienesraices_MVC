document.addEventListener("DOMContentLoaded",function(){

    eventListeners();

    darkMode();
});

function darkMode(){

    const prefiereDarkMode = window.matchMedia("(prefers-color-scheme: dark)");

    //console.log(prefiereDarkMode.matches);
    if(prefiereDarkMode.matches){
        document.body.classList.add("dark-mode");
    }
    else{
        document.body.classList.remove("dark-mode");
    }

    prefiereDarkMode.addEventListener("change",function(){
        if(prefiereDarkMode.matches){
            document.body.classList.add("dark-mode");
        }
        else{
            document.body.classList.remove("dark-mode");
        }
    
    });

    const botonDarkMode = document.querySelector(".dark-mode-boton");
    botonDarkMode.addEventListener("click",function(){
        document.body.classList.toggle("dark-mode");
    });
}

function eventListeners(){

    const mobileMenu = document.querySelector(".mobile-menu");

    mobileMenu.addEventListener("click",navegacionResponsive)

    //muestra campos condicionales
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"'); //selecciona todos los input que tengan como name "contacto[contacto]"

    //en los querySelectorAll no esta disponible el addEventListener para todos los elementos
    //por lo que se debe iterar un addEventeListener para cada elemento del arreglo de querySelectoAll

    metodoContacto.forEach(input => input.addEventListener("click", mostrarMetodosContacto));
   
}

function navegacionResponsive(){

        const navegacion = document.querySelector(".navegacion");

    /*
    if (navegacion.classList.contains("mostrar")){
        navegacion.classList.remove("mostrar")
    }

    else{
        navegacion.classList.add("mostrar")
    }
    */
   //usando toggle, para cambiar el estado en cada click,quitar o poner
   navegacion.classList.toggle("mostrar");

}

function mostrarMetodosContacto (e){ //evento

    
    const contactoDiv = document.querySelector("#contacto");

    if(e.target.value === "telefono"){
        contactoDiv.innerHTML = `
        <label for="telefono">Numero de Telefono</label>
        <input type="tel" placeholder="Tu telefono" id="telefono" name="contacto[telefono]">

        <p>Eliga una fecha y hora para ser contactado</p>

        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="contacto[fecha]">

        <label for="hora">Hora:</label>
        <input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]">


        `;
    }
    else{
        contactoDiv.innerHTML = `
        <label for="email">E-Mail</label>
        <input type="email" placeholder="Tu e-mail" id="email" name="contacto[email]" required>

        `;
    }

}

