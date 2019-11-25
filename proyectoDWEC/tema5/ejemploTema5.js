var miVentana;
function abrir() {
    //El open devuelve un objeto window
    /*Abrir en otra ventana*/miVentana = open('http://daw-used.sauces.local/DAW205/public_html/proyectoDWEC/tema5/ejemploTema5_2.html', 'segundaVentana', '');
    /*Abrir en la misma ventana*/miVentana = open('http://daw-used.sauces.local/DAW205/public_html/proyectoDWEC/tema5/ejemploTema5_2.html', '_blank', 'width=1000px,height=300px');
    console.log(miVentana);
    console.log(miVentana.location.pathname);//Muestra la URL de la ventana
}
function enviar() {
    miVentana.postMessage('Texto del mensaje', '*');//El asterisco dice el dominio lacal
}
function recibir() {
    ul = document.getElementById('lista');
    ul.innerHTML += event.data + "<---->"+event.source.name+"<----->"+event.origin+"<----->"+event.location+"<----->"+event.source;
    console.log(event.source.name);
    console.log(event.origin);//Devuelve el dominio
}
function cargar() {
    //Añadimos el evento al click el botón
    var btnAbrir = document.getElementById("abrir");
    btnAbrir.addEventListener('click', abrir, false);

    var btnEnviar = document.getElementById("enviar");
    btnEnviar.addEventListener('click', enviar, false);
    window.addEventListener('message', recibir, false);
}
window.addEventListener('load', cargar, false);