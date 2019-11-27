var recibido;
function enviarColor() {
    window.opener.postMessage(recibido + "-" + this.style.backgroundColor, '*');
    window.close();
}
function recibirOrigen() {
    recibido = event.data;
}
function cargar() {
    var divColor = document.getElementsByTagName('div');
    for (var i = 0; i < divColor.length; i++) {
        divColor[i].addEventListener('click', enviarColor, false);
    }
    window.addEventListener('message', recibirOrigen, false);
}
window.addEventListener('load', cargar, false);