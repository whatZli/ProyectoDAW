var segundos;
segundos=prompt("Introduzca los segundos");

alert("Has introducido: "+segundos+" segundos");

function empezarFuncion(){
    var parrafo=document.getElementById("mostrar1"); 
        parrafo.innerHTML=
            "<h3>Has introducido: "+segundos+" segundos</h3>\
            </br>Las dias son->"+parseInt((segundos/3600)/24)+"\
            </br>Las horas son->"+parseInt((segundos/3600)%24)+"\
            </br>Los minutos son->"+parseInt((segundos%3600)/60)+"\n\
            </br> Los segundos son->"+parseInt(segundos%60);
}

//Usar constantes