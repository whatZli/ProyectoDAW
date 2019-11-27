function abrirVentana(){
    miVentana = open('http://daw-used.sauces.local/DAW205/public_html/proyectoDWEC/tema5/ventanaFrame/colores.html', '_blank', 'width=300px,height=300px');
}
function cargar(){
    colorFondo=document.getElementById("cambiarColorFondo");
    colorFondo.addEventListener('click',abrirVentana,false);
    
    colorLetra=document.getElementById("cambiarColorLetra");
    colorLetra.addEventListener('click',abrirVentana,false);
}
window.addEventListener('load',cargar,false);

