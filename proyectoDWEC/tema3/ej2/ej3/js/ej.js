var frase,frase2;
frase=prompt("Introduzca una frase");
frase2=frase;
function empezarFuncion(){
    var parrafo=document.getElementById("mostrar1");
	
	for(var i=0; i<frase2.length;i++){
		switch (frase2[charAt(i)]){
			case "a":
				frase2[charAt(i)]="@";
		}
	}
	
	parrafo.innerHTML+="La frase "+frase+" tiene ";
	parrafo.innerHTML+=partes.length+" palabras";
}