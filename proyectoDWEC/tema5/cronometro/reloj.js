var intervalo, horasC, minutosC, segundosC, miliSegundosC;
var gradosH, gradosM, gradosS, gradosMS;
var horas, minutos, segundos;
var empezar, parar;
var agujaMiliSegundosC, agujaSegundosC, agujaMinutosC, agujaHorasC;
var agujaSegundosA, agujaMinutosA, agujaHorasA;

function empezarCronometro() {
    empezar.removeEventListener('click', empezarCronometro, false);//Se quita el evento en empezar
    empezar.style.backgroundColor="#E50914";//Empezar se pone a rojo
    parar.addEventListener('click', pararCronometro, false);//Se añade el evento en parar
    parar.style.backgroundColor="#221F1F";//Parar se pone a negro
    horasC.style.color = "#221F1F";
    minutosC.style.color = "#221F1F";
    segundosC.style.color = "#221F1F";

    $ms = "00";
    $s = "00";
    $m = "00";
    $h = "00";
    $gradosS = 0;
    $gradosM = 0;
    $gradosH = 0;
    horasC.innerHTML = $h + " :";
    minutosC.innerHTML = $m + " :";
    segundosC.innerHTML = $s + " ";
    miliSegundosC.innerHTML = $ms;

    gradosH.innerHTML = $gradosH;
    gradosM.innerHTML = $gradosM;
    gradosS.innerHTML = $gradosS;
    intervalo = setInterval(function () {
        if ($ms === 100) {
            $ms = 00;
            miliSegundosC.innerHTML = $ms;
            $s++;
            if ($s < 10) {
                segundosC.innerHTML = "0" + $s + " ";
            } else {
                segundosC.innerHTML = $s + " ";
            }
            gradosS.innerHTML = 6 * $s;
            /*Cambiar agujas*/
            agujaSegundosC.style.transform = "rotate(" + Math.round(6 * $s) + "deg)";
            agujaMinutosC.style.transform = "rotate(" + Math.round(6 * $m) + "deg)";
            agujaHorasC.style.transform = "rotate(" + Math.round(30 * $h + 0.5 * $m) + "deg)";
            if ($s === 60) {
                $s = 0;
                gradosS.innerHTML = 6 * $s;
                segundosC.innerHTML = "0" + $s;
                $m++;
                gradosM.innerHTML = 6 * $m;
                gradosH.innerHTML = (30 * $h + 0.5 * $m);
                if ($m < 10) {
                    minutosC.innerHTML = "0" + $m + " :";
                } else {
                    minutosC.innerHTML = $m + " :";
                }
            }
            if ($m === 60) {
                $m = 0;
                gradosM.innerHTML = 6 * $m;
                minutosC.innerHTML = "0" + $m + " :";
                $h++;
                gradosH.innerHTML = (30 * $h + 0.5 * $m);
                if ($h < 10) {
                    horasC.innerHTML = "0" + $h + " :";
                } else {
                    horasC.innerHTML = $h + " :";
                }
            }
        } else {
            if ($ms < 10) {
                miliSegundosC.innerHTML = "0" + $ms;
            } else {
                miliSegundosC.innerHTML = $ms;
            }
            //Es 3.6 porque hay que dividir el total de grados(360)
            //entre el número de milisegundos(100)
            //Cada segundo son 3.6 grados
            gradosMS.innerHTML = Math.round(3.6 * $ms);
            agujaMiliSegundosC.style.transform = "rotate(" + Math.round(3.6 * $ms) + "deg)";
            $ms++;
        }
    }, 10);
}
function pararCronometro() {
    empezar.addEventListener('click', empezarCronometro, false);
    parar.removeEventListener('click', pararCronometro, false);
    empezar.style.backgroundColor="#221F1F";
    parar.style.backgroundColor="#E50914";
    clearInterval(intervalo);
    horasC.style.color = "#E50914";
    minutosC.style.color = "#E50914";
    segundosC.style.color = "#E50914";
    
}
function actualizarHora() {
    var d = new Date();
    if (d.getHours() < 10) {
        horas.innerHTML = "0" + d.getHours() + " : ";
    } else {
        horas.innerHTML = d.getHours() + " : ";
    }
    if (d.getMinutes() < 10) {
        minutos.innerHTML = "0" + d.getMinutes() + " : ";
    } else {
        minutos.innerHTML = d.getMinutes() + " : ";
    }

    if (d.getSeconds() < 10) {
        segundos.innerHTML = "0" + d.getSeconds();
    } else {
        segundos.innerHTML = d.getSeconds();
    }

    agujaSegundosA.style.transform = "rotate(" + Math.round(6 * d.getSeconds()) + "deg)";
    agujaMinutosA.style.transform = "rotate(" + Math.round(6 * d.getMinutes()) + "deg)";
    agujaHorasA.style.transform = "rotate(" + Math.round(30 * d.getHours()) + 0.5 * d.getMinutes() + "deg)";
}
function cargar() {
    /*Reloj Digital*/
    horas = document.getElementById("horas");
    minutos = document.getElementById("minutos");
    segundos = document.getElementById("segundos");
    setInterval(actualizarHora, 1000);
    /*Reloj Analógico*/
    agujaHorasA=document.getElementById("agujaHorasA");
    agujaMinutosA=document.getElementById("agujaMinutosA");
    agujaSegundosA=document.getElementById("agujaSegundosA");
    /*Cronómetro ----- Tiempo*/
    horasC = document.getElementById("horasC");
    minutosC = document.getElementById("minutosC");
    segundosC = document.getElementById("segundosC");
    miliSegundosC = document.getElementById("miliSegundosC");
    empezar = document.getElementById("start");
    parar = document.getElementById("stop");
    /*Cronómetro ----- Controles*/
    empezar.addEventListener('click', empezarCronometro, false);
    /*Cronómetro ----- grados*/
    gradosH = document.getElementById("gradosH");
    gradosM = document.getElementById("gradosM");
    gradosS = document.getElementById("gradosS");
    gradosMS = document.getElementById("gradosMS");
    /*Relog Analógico Cronómetro*/
    agujaSegundosC = document.getElementById("agujaSegundosC");
    agujaMiliSegundosC = document.getElementById("agujaMiliSegundosC");
    agujaMinutosC = document.getElementById("agujaMinutosC");
    agujaHorasC = document.getElementById("agujaHorasC");

    /*Mover agujas al principio*/
    agujaSegundosC.style.transform = "rotate(1080deg)";
    agujaMinutosC.style.transform = "rotate(720deg)";
    agujaHorasC.style.transform = "rotate(360deg)";
}
window.addEventListener('load', cargar, false);
