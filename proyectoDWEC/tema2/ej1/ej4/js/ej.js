var lado1,lado2;
lado1=prompt("Introduzca el lado 1");
lado2=prompt("Introduzca lado 2");
alert("Has introducido: "+lado1+" y "+lado2);

function empezarFuncion(){
    var parrafo=document.getElementById("mostrar1");
        var perimetro=parseInt(lado1)+parseInt(lado2);
        var area=parseInt(lado1)*parseInt(lado2)/2;
        parrafo.innerHTML=
            "El perimetro es ->"+perimetro+"</br>El area es ->"+area;

            
}