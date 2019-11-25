function valida() {
    //Seleccionamos el select
    var select = document.getElementById("select");
    console.log(select);

    //Selección del select
    console.log(select.value);

    //Seleción del número elegido
    console.log(select.selectedIndex);

    //Seleción del valor elegido
    console.log(select.options[select.selectedIndex].text);

    if (select.selectedIndex === 0) {
        alert("Selecciona una opción");
    } else {

        //Rellenar con los meses pares del año
        var array = ["Febrero", "Abril", "Junio", "Agosto", "Octubre", "Diciembre"];

        //Seleccionar el select donde quiere meter los valores
        var sel = document.getElementById("select2");

        //Le ponemos el valor 0 Rellenar el select
        var option = document.createElement("option");
        option.value = "0";
        option.text = "Seleccione un mes";
        sel.add(option);
        for (var value in array) {
            option = document.createElement("option");
            option.value = array[value].toLocaleLowerCase();
            option.text = array[value];
            sel.add(option);
        }

        return false;
    }
}

function validaFichero(){
    //Seleccionar la etiqueta input file
    var fil= document.getElementById("fichero");
    console.log(fil);
    console.log(fil.files);
    
    //Si quiero entrar a uno de los ficheros
    console.log(fil.files[0].name);
    console.log(fil.files[0].type);
    console.log(fil.files[0].size);
    console.log(fil.files[0].lastModified);
}