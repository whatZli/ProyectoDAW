function empezarFuncion() {
    var parrafo = document.getElementById('mostrar1');
    var fecha = prompt("Introduzca una fecha en formato dd-mm-aaaa ó dd/mm/aaaa)");

    parrafo.innerHTML += "La fecha introducida es: <strong>" + fecha + "</strong><br>";

    exp=/\//g;
    var fechaN = fecha.replace(exp, function (caracter) {
        if (caracter === "/") {
            return "-";
        }
    });

    exp = /^\d{1,2}[-|/]\d{1,2}[-|/]\d{4}$/g;
    if (exp.test(fechaN)) {
        parrafo.innerHTML += "La fecha " + fechaN + " es correcta";
    } else {
        parrafo.innerHTML += "La fecha " + fechaN + " no es correcta";
    }

}
