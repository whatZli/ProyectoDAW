var intervalo, horasC, minutosC, segundosC, miliSegundosC;
var horas, minutos, segundos;



function empezarCronometro() {
    $ms = "00";
    $s = "59";
    $m = "59";
    $h = "00";
    horasC.innerHTML = $h+" :";
    minutosC.innerHTML = $m+" :";
    segundosC.innerHTML = $s+" :";
    miliSegundosC.innerHTML = $ms;
    intervalo = setInterval(function () {
        if ($ms === 100) {
            if ($m === 60) {
                $s=00;
                $m=00;
                $h++;
                if ($h < 10) {
                    horasC.innerHTML = "0" + $h+" :";
                } else {
                    horasC.innerHTML = $h+" :";
                }
            }
            if ($s === 60) {
                $s=00;
                $m++;
                if ($m < 10) {
                    minutosC.innerHTML = "0" + $m+" :";
                } else {
                    minutosC.innerHTML = $m+" :";
                }
            }
            
            $s++;
            if ($s < 10) {
                segundosC.innerHTML = "0" + $s+" :";
            } else {
                segundosC.innerHTML = $s+" :";
            }
            
            $ms = 00;
        } else {

            miliSegundosC.innerHTML = $ms;
            $ms++;
        }
    }, 10);
}
function pararCronometro() {
    clearInterval(intervalo);
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
}
function cargar() {
    /*Reloj*/
    horas = document.getElementById("horas");
    minutos = document.getElementById("minutos");
    segundos = document.getElementById("segundos");
    setInterval(actualizarHora, 1000);
    /*Cornómetro*/
    horasC = document.getElementById("horasC");
    minutosC = document.getElementById("minutosC");
    segundosC = document.getElementById("segundosC");
    miliSegundosC = document.getElementById("miliSegundosC");
    empezar = document.getElementById("start");
    parar = document.getElementById("stop");

    empezar.addEventListener('click', empezarCronometro, false);
    parar.addEventListener('click', pararCronometro, false);
}
window.addEventListener('load', cargar, false);
