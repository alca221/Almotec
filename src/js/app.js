document.addEventListener('DOMContentLoaded', function() {

    eventListeners();

    darkMode();
});

function darkMode() {

    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');

    // console.log(prefiereDarkMode.matches);

    if(prefiereDarkMode.matches) {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }

    prefiereDarkMode.addEventListener('change', function() {
        if(prefiereDarkMode.matches) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    });

    const botonDarkMode = document.querySelector('.dark-mode-boton');
    botonDarkMode.addEventListener('click', function() {
        document.body.classList.toggle('dark-mode');
    });
    
}

function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navegacionResponsive);
//muestra campos condicionales de contacto
const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
metodoContacto.forEach(input => input.addEventListener('click', mostrarMetodosContacto));

}

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');

    navegacion.classList.toggle('mostrar')
}

function mostrarMetodosContacto(e) {
    // (e) es para poder ubicar la variable a seleccionar
    const contactoDiv = document.querySelector
    ('#contacto');


    if(e.target.value === 'telefono') {
        contactoDiv.innerHTML = `
            <label for="telefono">Ingrese Teléfono</label>
            <input type="tel" placeholder="Tu Teléfono" id="telefono"  name="contacto[telefono]" required>

            <p>Selecione fecha y la hora para contactar</p>

            <label for="fecha">Fecha Llamada:</label>
            <input type="date" id="fecha"  name="contacto[fecha]" required>

            <label for="hora">Hora Llamada:</label>
            <input type="time" id="hora" min="09:00" max="18:00"  name="contacto[hora]" required>

        `;
    } else {
        contactoDiv.innerHTML = `
            <label for="email">Ingrese E-mail</label>
            <input type="email" placeholder="Tu Email" id="email" name="contacto[email]" required>
        `;
    }
}