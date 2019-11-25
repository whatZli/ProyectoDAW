function empezarFuncion(){
    var parrafo = document.getElementById('mostrar1');
    var telefono = prompt("Introduzca un telefono válido (formato válido: 000-000-000)");
    
    parrafo.innerHTML+="El teléfono introducido es: <strong>"+telefono+"</strong><br>";
    
    exp=/^\d{3}-\d{3}-\d{3}$/g;
    if(exp.test(telefono)){
        parrafo.innerHTML+="El teléfono <strong>"+telefono+"</strong> es válido";
    }else{
        parrafo.innerHTML+="El teléfono <strong>"+telefono+"</strong> no es válido";
    }
    
    
}
