function reloj(){
    var parrafo=document.getElementById("hora");
    momentoActual = new Date();
    dia = momentoActual.getDate();
    mes = momentoActual.getMonth()+1;
    anyo = momentoActual.getFullYear();
    hora = momentoActual.getHours();
    minuto = momentoActual.getMinutes();
    segundo = momentoActual.getSeconds();
    
    fechaImprimible = dia + " / " + mes + " / " + anyo;
    horaImprimible = hora + " : " + minuto + " : " + segundo;

    parrafo.innerHTML = fechaImprimible + "<br>";
    parrafo.innerHTML += horaImprimible;
    

    setTimeout("reloj()",1000);
}