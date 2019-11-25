function empezarFuncion() {
    var parrafo = document.getElementById('mostrar1');
    var frase = prompt("Introduzca una frase que contenga la palabra: `de`");

    parrafo.innerHTML += "La frase introducida es: <strong>" + frase + "</strong><br>";

    exp = /de/g;

    var fraseN = (frase.replace(exp, function (palabra) {
        if (palabra === "de") {
            return palabra.bold();
        }
    }));

    parrafo.innerHTML += "La nueva frase es: " + fraseN;

}
