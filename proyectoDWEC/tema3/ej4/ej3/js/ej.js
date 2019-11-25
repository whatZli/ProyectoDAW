var hx,octal;
hx=prompt("Introduzca un numero en hexadecimal");
octal=prompt("Introduzca un numero en octal");
alert("Has introducido: "+hx+" y "+octal);

function empezarFuncion(){
    var parrafo=document.getElementById("mostrar1");
    parrafo.innerHTML=
            "Hexadecimal->"+hx+" Decimal->"+parseInt("0x"+hx)+"\
            </br>Octal->"+octal+" Decimal->"+parseInt(octal,8);
}