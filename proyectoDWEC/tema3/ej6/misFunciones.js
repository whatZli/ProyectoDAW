//Función random()
//Parametros
//  min->valor mínimo del aleatorio
//  max->valor máximo del aleatorio
//  dec->número de decimales que se añaden al número aleatorio
//Funcionamiento
//  Si se le pasan 2 parametros, devuelve un número entero
//  Si se le pasan 3 parametros, devuelve el número aleatorio con la cantidad de decimales que le hemos pasado
function random(min,max,dec){
    if(arguments.length === 2){
        return parseInt(Math.random() * (max - min + 1) + min);
    }else if(arguments.length === 3){
        return Number(Math.random() * (max - min + 1) + min).toFixed(dec);
    }
}

//Función validaEntradaNumero()
//Parametros
//  num->valor que debe ser un número
//Funcionamiento
//  Si se le pasan 2 parametros, devuelve un número entero
//  Si se le pasan 3 parametros, devuelve el número aleatorio con la cantidad de decimales que le hemos pasado
function validaEntradaNumero(num){
    while(isNaN(num)){
        num=prompt("Introduzca el numero");
    }
    return num;
}

function getid(id){
    return document.getElementById(id);
}

function aniadeParrafo(id,string){
    return id.innerHTML += string;
}