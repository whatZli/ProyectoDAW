var frase;
frase=prompt("Introduzca una frase");

function empezarFuncion(){
    var parrafo=document.getElementById("mostrar1");
	var partes = frase.split(' ');
	
	parrafo.innerHTML+="La frase "+frase+" tiene ";
	parrafo.innerHTML+=partes.length+" palabras";
}