function empezarFuncion(){
    var parrafo = document.getElementById('mostrar1');
    var dni = prompt("Introduzca un DNI válido");
    var numeros=parseInt(dni.substring(0,8));
    var letra=dni.substring(8,9);
    var cadena = "TRWAGMYFPDXBNJZSQVHLCKE";
    parrafo.innerHTML+="El DNI introducido es: <strong>"+dni+"</strong><br>";
    
    exp=/^\d{8}\D{1}$/g;
    
    if(exp.test(dni)){
        console.log(numeros);
        console.log(numeros%23);
        console.log(cadena.substring(numeros%23, (numeros%23)+1));
        if(cadena.substring(numeros%23, (numeros%23)+1)===letra){
            parrafo.innerHTML+=("El DNI <strong>"+dni+"</strong> es válido");
        }else{
            parrafo.innerHTML+=("No coincide la letra del DNI introducido");
        }
    }else{
        parrafo.innerHTML+=("El formato del DNI introducido <strong>"+dni+"</strong> no es válida");
    }
    
}
