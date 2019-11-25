function empezarFuncion(){
    var num1,desplazamiento,suma;
    num1=prompt("Introduzca numero");
    desplazamiento=prompt("Introduzca el valor de desplazamiento a la izquierda");

    num1=parseInt(num1);
    desplazamiento=parseInt(desplazamiento);
    
    aux=num1;
    aux<<=desplazamiento;
    suma=aux;
    
    var parrafo=document.getElementById("mostrar1"); 
        parrafo.innerHTML=
            "El numero introducido es-> "+num1+
            "</br>El valor de desplazamiento es->"+desplazamiento+
            "</br>"+num1.toString(2)+" con desplazamiento a la izquierda de "+desplazamiento+
            "</br>El resultado final es->"+suma.toString(2);
}