var cuerpo;

function cambiarFondo() {
    ventanaColores = open('colores.html', '_blank', 'width=300px,height=300px');
    setTimeout(function () {
        ventanaColores.postMessage('cambiarFondo', '*');
    }, 1000);
}
function cambiarLetra() {
    ventanaColores = open('colores.html', '_blank', 'width=300px,height=300px');
    setTimeout(function () {
        ventanaColores.postMessage('cambiarLetras', '*');
    }, 1000);
}
function recibirColor() {
    recibido = event.data;
    cadena = recibido.split('-');
    if (cadena[0] === "cambiarFondo") {
        cuerpo.style.backgroundColor = cadena[1];
    } else {
        cuerpo.style.color = cadena[1];
    }
}
function cargar() {
    cuerpo = document.getElementById("body");

    botonCambiarFondo = document.getElementById("cambiarFondo");
    botonCambiarFondo.addEventListener('click', cambiarFondo, false);

    botonCambiarLetra = document.getElementById("cambiarLetra");
    botonCambiarLetra.addEventListener('click', cambiarLetra, false);

    window.addEventListener('message', recibirColor, false);
}
window.addEventListener('load', cargar, false);

