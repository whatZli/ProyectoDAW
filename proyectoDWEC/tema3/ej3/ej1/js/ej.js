var num1;
var num2;
var suma,multi,divi,resta;
num1=prompt("Introduzca el primer número");
num2=prompt("Introduzca el segundo número");

function empezarFuncion(){
    var parrafo=document.getElementById("mostrar1");
    suma=parseInt(num1)+parseInt(num2);
    resta=parseInt(num1)-parseInt(num2);
    divi=parseInt(num1)/parseInt(num2);
    multi=parseInt(num1)*parseInt(num2);
    parrafo.innerHTML=
            "Suma: "+suma+
            "<br>Resta: "+resta+
            "<br>Multiplicacion: "+multi+
            "<br>Division: "+divi;
}