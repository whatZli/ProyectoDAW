function empezarFuncion() {
    var parrafo = document.getElementById('mostrar1');
    var frase = prompt("Introduzca una frase)");

    parrafo.innerHTML += "La frase es: <strong>" + frase + "</strong><br>";

    exp = /[aeo]/gi;
    var fraseN=frase.replace(exp, function (caracter) {
        if (caracter === "a") {
            return "@";
        }
        if (caracter === "e") {
            return "3";
        }
        if (caracter === "o") {
            return "0";
        }
    });
    
    parrafo.innerHTML+=("La frase modificada es <strong>"+fraseN+"</strong>");


}
