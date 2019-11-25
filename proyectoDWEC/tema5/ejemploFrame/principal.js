function leer(){
    var frame1=document.getElementById("blackFriday");
    console.log(frame1);
    console.log(frame1.contentWindow);//Coger el window
    console.log(frame1.contentWindow.document);//Acceder a las etiquetas
    
    var bFriday=frame1.contentWindow.document;
    bFriday.body.style.backgroundColor="#ff99ff";
}
function cargar() {
    var btnRcogerDatos=document.getElementById("leer");
    btnRcogerDatos.addEventListener('click',leer,false);
    window.addEventListener('message', recibir, false);
}
window.addEventListener('load', cargar, false);