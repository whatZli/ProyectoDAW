function empezarFuncion(){
    var num1,num2,suma;
    num1=prompt("Introduzca numero 1");
    num2=prompt("Introduzca numero 2");

    num1=parseInt(num1);
    num2=parseInt(num2);
    
    aux=num1;
    aux=aux|=num2; // Se hace la suma lógica
    suma=aux;
    
    var parrafo=document.getElementById("mostrar1"); 
        parrafo.innerHTML=
            "<h3>Has introducido: "+num1.toString(2)+" y "+num2.toString(2)+"\n\
            </br>La suma logica es->"+suma.toString(2)+"\n\
            </br>El resultado es->"+suma;
}