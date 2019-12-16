function validar() {
    var nombre = document.getElementById("nombre");
    var apellidos = document.getElementById("apellidos");
    var email = document.getElementById("email");

    if (!validaAlphabetic(nombre.value)) {
        nombre.style.borderColor = "red";
    } else {
        nombre.value = nombre.value.charAt(0).toUpperCase() + nombre.value.slice(1);
        nombre.style.borderColor = "green";
    }
    if (!validaAlphabetic(apellidos.value)) {
        apellidos.style.borderColor = "red";
    } else {
        apellidos.value = apellidos.value.charAt(0).toUpperCase() + apellidos.value.slice(1);
        apellidos.style.borderColor = "green";
    }
    if (!validaEmail(email.value)) {
        email.style.borderColor = "red";
    } else {
        email.style.borderColor = "green";
    }
    if(!validaRadioButton("genero")){
        alert("No se ha seleccionado ningún género");
    }
    
    if(!validaCheckBox("aficion", 3)){
        alert("Se deben seleccionar 3 aficiones");
    } 
    return false;
}
