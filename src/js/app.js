document.addEventListener('DOMContentLoaded', () => {
    eventListeners();
    darkMode();
    mostrarHTML();
});

function darkMode() {
    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');

    // console.log(prefiereDarkMode.matches);

    if (prefiereDarkMode.matches) {
        document.body.classList.add('dark-mode')
    } else {
        document.body.classList.remove('dark-mode')
    }
    prefiereDarkMode.addEventListener('change', () => {
        if (prefiereDarkMode.matches) {
            document.body.classList.add('dark-mode')
        } else {
            document.body.classList.remove('dark-mode')
        }
    })
    const btnDarkMode = document.querySelector('.dark-mode-boton');

    btnDarkMode.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
    })

}

function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navegacionResponsive);

}

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');
    navegacion.classList.toggle('mostrar')
}
function mostrarHTML() {
    //muestra campos condicionales
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
    metodoContacto.forEach(input => input.addEventListener('click', mostrarMetodosContacto));
    metodoContacto.addEventListener('click', mostrarMetodosContacto);
}
function mostrarMetodosContacto(e) {
    const contactoDiv = document.querySelector('#contacto');
    if (e.target.value === 'telefono') {
        contactoDiv.innerHTML = `
        <!-- telefono -->
                
                <input type="tel" name="contacto[telefono]" id="telefono" placeholder="Tu telefono" required>
                <p>Elija el horario para ser contactado por telefono</p>

                <label for="fecha">Fecha</label>
                <input type="date" id="fecha" name="contacto[fecha]" required>
    
                <label for="telefono">Hora</label>
                <input type="time" id="telefono" min="09:00" max="18:00" name="contacto[hora]" required>
    
        `;
    } else {
        contactoDiv.innerHTML = `
        <!-- email -->
                
                <input type="text" name="contacto[email]" id="email" placeholder="Tu email" required>
        `;
    }

}


// Espera 3 segundos y luego oculta el elemento con id "mensaje"
setTimeout(function () {
    var mensajeElement = document.getElementById("alerta");
    if (mensajeElement) {
        mensajeElement.style.display = "none";
    }
}, 3000); // 3000 milisegundos = 3 segundos

