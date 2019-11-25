function inicio(){
    //Seleccionamos el select
    var select = document.getElementById("select");

    //Le ponemos el valor 0 Rellenar el select
    var option = document.createElement("option");
    option.value = "0";
    option.text = "Seleccione una asignatura";
    select.add(option);
    var arrayCurso = ["Primero", "Segundo"];
    for (var value in arrayCurso) {
            option = document.createElement("option");
            option.value = arrayCurso[value].toLocaleLowerCase();
            option.text = arrayCurso[value];
            select.add(option);
        }
}

function valida() {
    //Seleccionamos el select
    var select = document.getElementById("select");

    if (select.selectedIndex === 0) {
        alert("Selecciona una opción");
    } else {
        var array;
        if(select.selectedIndex==="primero"){
            //Rellenar con las asignaturas
            array=[];
            array = ["PROG", "ED", "BBDD", "LM", "FOL", "SO"];
        }else{
            //Rellenar con las asignaturas
            array=[];
            array = ["DWEC", "DWES", "DAW", "DIW", "EMPRESA"];
        }
        //Seleccionar el select donde quiere meter los valores
        var sel = document.getElementById("select2");

        //Le ponemos el valor 0 Rellenar el select
        var option = document.createElement("option");
        option.value = "0";
        option.text = "Seleccione una asignatura";
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