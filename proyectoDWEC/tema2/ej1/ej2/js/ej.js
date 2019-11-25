var precio,descuento,resultado,total;
precio=prompt("Introduzca el precio");
descuento=prompt("Introduzca el tanto porciento de descuento");
alert("Has introducido: "+precio+" y "+descuento);

function empezarFuncion(){
    var parrafo=document.getElementById("mostrar1");
    resultado=parseInt(precio)*parseInt(descuento)/100;
    total=parseInt(precio)-parseInt(resultado);
    parrafo.innerHTML=
            "El precio es: "+precio+
            "<br>El descuento es: "+descuento+
            "<br>El precio con descuento es: "+total;
}