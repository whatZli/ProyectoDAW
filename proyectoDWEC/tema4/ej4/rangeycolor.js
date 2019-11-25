function valida() {
    var rango = document.getElementById("rango");
    console.log(rango);
    console.log(rango.value);
    
    var color= document.getElementById("color");
    console.log(color);
    console.log(color.value);
    
    var fecha= document.getElementById("fecha");
    console.log(fecha);
    console.log(fecha.value);

    var fechaTS = new Date(fecha.value);
    
    console.log(fechaTS.getTime());
    return false();
}