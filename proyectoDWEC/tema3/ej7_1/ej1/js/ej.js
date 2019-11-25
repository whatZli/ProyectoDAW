function empezarFuncion(){
    var parrafo = document.getElementById('mostrar1');
    direccion = prompt("Introduzca una dirección de correo válida");
    
    parrafo.innerHTML+="La dirección introducida es: <strong>"+direccion+"</strong><br>";
    
    exp=/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    
    if(exp.test(direccion)){
        parrafo.innerHTML+=("La dirección <strong>"+direccion+"</strong> es válida");
    }else{
        parrafo.innerHTML+=("La dirección <strong>"+direccion+"</strong> no es válida");
    }
}
