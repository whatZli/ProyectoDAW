function cambiar(){
    var frame1=window.parent;
    var principal=frame1.document;
    principal.body.style.backgroundColor="#e6e6ff";
}
function cargar() {
    var cambiarFondo=document.getElementById("cambiarFondo");
    cambiarFondo.addEventListener('click',cambiar,false);
}
window.addEventListener('load', cargar, false);