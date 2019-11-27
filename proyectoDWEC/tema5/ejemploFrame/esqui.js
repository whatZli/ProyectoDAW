function cambiarBlack(){//Acceder a una función de una ventana padre
    window.parent.leer();//Las funciones se almacenan en window
}
function cargar(){
    cambiarFondo=document.getElementById("cambiarFondo");
    cambiarFondo.addEventListener('click',cambiarBlack,false);
}
window.addEventListener('load',cargar,false);

