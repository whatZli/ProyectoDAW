var horas,minutos,segundos;
function actualizarHora(){
    var d = new Date();
    horas.innerHTML=d.getHours()+" : ";
    minutos.innerHTML=d.getMinutes()+" : "; 
    segundos.innerHTML=d.getSeconds();
}
function cargar(){
    horas=document.getElementById("horas");
    minutos=document.getElementById("minutos");
    segundos=document.getElementById("segundos");
    setInterval(actualizarHora,1000);
}
window.addEventListener('load',cargar,false);
