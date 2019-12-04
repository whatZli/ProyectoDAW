/*FUNCTION cargar
 * Carga todos los elementos de los formularios y le añade los eventos
 * */
function cargar() {
    alSeleccionarAlumno();

    nombreAlumno = document.getElementById("nombre");
    nombreAlumno.addEventListener("blur", validaNombreAlumno, false);

    apellidoAlumno = document.getElementById("apellidos");
    apellidoAlumno.addEventListener("blur", validaApellidoAlumno, false);

    dniAlumno = document.getElementById("dni");
    dniAlumno.addEventListener("blur", validaDniAlumno, false);

    menuAlumno = document.getElementById("eAlumno");
    menuAlumno.addEventListener("click", alSeleccionarAlumno);

    emailAlumno = document.getElementById("email");
    emailAlumno.addEventListener("blur", validaEmailAlumno, false);

    checkLopd = document.getElementById("lopd");
    checkLopd.addEventListener("change", cambiarEstadoEnviarAlumno, false);

    nombreProfesor = document.getElementById("nombrep");
    nombreProfesor.addEventListener("blur", validaNombreProfesor, false);

    menuProfesor = document.getElementById("eProfesor");
    menuProfesor.addEventListener("click", alSeleccionarProfesor);

    dniProfesor = document.getElementById("dnip");
    dniProfesor.addEventListener("blur", validaDniProfesor, false);

    apellidoProfesor = document.getElementById("apellidosp");
    apellidoProfesor.addEventListener("blur", validaApellidoProfesor, false);

    emailProfesor = document.getElementById("emailp");
    emailProfesor.addEventListener("blur", validaEmailProfesor, false);

    checkLopdp = document.getElementById("lopdp");
    checkLopdp.addEventListener("change", cambiarEstadoEnviarProfesor, false);
}
//---------------------------------------------Alumno-----------------------------------------------------
/*FUNCTION alSeleccionarAlumno
 * Cambia el fondo del menú alumno a azul
 * Cambia el fondo del menú profesor a gris
 * llama a verAsignaturasAlumno
 * Añade eventos de cambio al ciclo y curso
 * Activa el formulario de alumno
 * Desactiva el formulario de alumno
 * */
function alSeleccionarAlumno() {
    eProfesor = document.getElementById("eProfesor");
    eProfesor.style.backgroundColor = "grey";
    eProfesor = document.getElementById("eAlumno");
    eProfesor.style.backgroundColor = "#1976D2";
    verAsignaturasAlumno();
    ciclo = document.getElementById("ciclo");
    ciclo.addEventListener("change", verAsignaturasAlumno);
    curso = document.getElementById("curso");
    curso.addEventListener("change", verAsignaturasAlumno);

    var formularioAlumno = document.getElementById("alumno");
    formularioAlumno.style.display = "block";
    var formularioProfesor = document.getElementById("profesor");
    formularioProfesor.style.display = "none";
}
/*FUNCTION validaNombreAlumno
 * Se valida si el contenido es alfabético
 * Si es verdadero se pone en mayúsculas y pone el borde en verde
 * Si es falso pone el borde en rojo y pone el foco en el elemento actual
 * */
function validaNombreAlumno() {
    if (validaAlphabetic(nombreAlumno.value, 1)) {
        nombreAlumno.value = nombreAlumno.value.toUpperCase();
        nombreAlumno.style.borderColor = "green";
    } else {
        nombreAlumno.style.borderColor = "red";
        nombreAlumno.focus();
    }
}
/*FUNCTION validaApellidoAlumno
 * Se valida si el contenido es alfabético
 * Si es verdadero se pone en mayúsculas y pone el borde en verde
 * Si es falso pone el borde en rojo y pone el foco en el elemento actual
 * */
function validaApellidoAlumno() {
    if (validaAlphabetic(apellidoAlumno.value, 1)) {
        apellidoAlumno.value = apellidoAlumno.value.toUpperCase();
        apellidoAlumno.style.borderColor = "green";
    } else {
        apellidoAlumno.style.borderColor = "red";
        apellidoAlumno.focus();
    }
}
/*FUNCTION validaDniAlumno
 * Se valida si el DNI es válido
 * Si es verdadero se pone en mayúsculas y pone el borde en verde
 * Si es falso pone el borde en rojo y pone el foco en el elemento actual
 * */
function validaDniAlumno() {
    if (validaDNI(dniAlumno.value)) {
        dniAlumno.value = dniAlumno.value.toUpperCase();
        dniAlumno.style.borderColor = "green";
    } else {
        dniAlumno.style.borderColor = "red";
        dniAlumno.focus();
    }
}
/*FUNCTION validaEmailAlumno
 * Se valida si el Email es válido
 * Si es verdadero se pone el borde en verde
 * Si es falso pone el borde en rojo y pone el foco en el elemento actual
 * */
function validaEmailAlumno() {
    if (validaEmail(emailAlumno.value)) {
        emailAlumno.style.borderColor = "green";
    } else {
        emailAlumno.style.borderColor = "red";
        emailAlumno.focus();
    }
}
/*FUNCTION verAsignaturasAlumno
 * Oculta todas las asignaturas
 * Si el ciclo y curso seleccionados coinciden se muestran unas determinadas asignaturas
 * */
function verAsignaturasAlumno() {
    var asignaturas = ["DAW", "DIW", "DWES", "DWEC"];
    var asignaturasCurso = document.getElementById("asignaturasCurso");
    
    while(asignaturasCurso.hasChildNodes()){
          asignaturasCurso.removeChild(asignaturasCurso.firstChild);  
    }
    
    for (var i = 0; i < asignaturas.length; i++) {
        var asignaturasCurso = document.getElementById("asignaturasCurso");
        asignaturasCurso.style.display = "block";
        var elementoInput = document.createElement("input");
        elementoInput.setAttribute("type", "checkbox");
        elementoInput.setAttribute("id", asignaturas[i]);
        var elementoLabel = document.createElement("label");
        elementoLabel.setAttribute("for", asignaturas[i]);
        var asignatura = document.createTextNode(asignaturas[i]);
        elementoLabel.appendChild(asignatura);
        asignaturasCurso.appendChild(elementoInput);
        asignaturasCurso.appendChild(elementoLabel);
    }
}
/*FUNCTION cambiarEstadoEnviarAlumno
 * Comprueba el estado del checkBox lopd
 * Si se ha seleccionado, se activa el botón de enviar
 * Sino, se desactiva el botón de enviar
 * */
function cambiarEstadoEnviarAlumno() {
    var enviar = document.getElementById("enviar");
    if (checkLopd.checked) {
        enviar.disabled = false;
    } else {
        enviar.disabled = true;
    }
}
//---------------------------------------------------Profesor---------------------------------------------
/*FUNCTION alSeleccionarProfesor
 * Cambia el fondo del menú alumno a azul
 * Cambia el fondo del menú profesor a gris
 * llama a verAsignaturasAlumno
 * Añade eventos de cambio al ciclo y curso
 * Activa el formulario de alumno
 * Desactiva el formulario de alumno
 * */
function alSeleccionarProfesor() {
    eProfesor = document.getElementById("eAlumno");
    eProfesor.style.backgroundColor = "grey";
    eProfesor = document.getElementById("eProfesor");
    eProfesor.style.backgroundColor = "#1976D2";
    verAsignaturasProfesor();
    ciclop = document.getElementById("ciclop");
    ciclop.addEventListener("change", verAsignaturasProfesor);
    cursop = document.getElementById("cursop");
    cursop.addEventListener("change", verAsignaturasProfesor);

    var formularioProfesor = document.getElementById("profesor");
    formularioProfesor.style.display = "block";
    var formularioAlumno = document.getElementById("alumno");
    formularioAlumno.style.display = "none";
}
/*FUNCTION validaNombreProfesor
 * Se valida si el contenido es alfabético
 * Si es verdadero se pone en mayúsculas y pone el borde en verde
 * Si es falso pone el borde en rojo y pone el foco en el elemento actual
 * */
function validaNombreProfesor() {
    if (validaAlphabetic(nombreProfesor.value, 1)) {
        nombreProfesor.value = nombreProfesor.value.toUpperCase();
        nombreProfesor.style.borderColor = "green";
    } else {
        nombreProfesor.style.borderColor = "red";
        nombreProfesor.focus();
    }
}
/*FUNCTION validaApellidoProfesor
 * Se valida si el contenido es alfabético
 * Si es verdadero se pone en mayúsculas y pone el borde en verde
 * Si es falso pone el borde en rojo y pone el foco en el elemento actual
 * */
function validaApellidoProfesor() {
    if (validaAlphabetic(apellidoProfesor.value, 1)) {
        apellidoProfesor.value = apellidoProfesor.value.toUpperCase();
        apellidoProfesor.style.borderColor = "green";
    } else {
        apellidoProfesor.style.borderColor = "red";
        apellidoProfesor.focus();
    }
}
/*FUNCTION validaDniProfesor
 * Se valida si el DNI es válido
 * Si es verdadero se pone en mayúsculas y pone el borde en verde
 * Si es falso pone el borde en rojo y pone el foco en el elemento actual
 * */
function validaDniProfesor() {
    if (validaDNI(dniProfesor.value)) {
        dniProfesor.value = dniProfesor.value.toUpperCase();
        dniProfesor.style.borderColor = "green";
    } else {
        dniProfesor.style.borderColor = "red";
        dniProfesor.focus();
    }
}
/*FUNCTION verAsignaturasProfesor
 * Oculta todas las asignaturas
 * Si el ciclo y curso seleccionados coinciden se muestran unas determinadas asignaturas
 * */
function verAsignaturasProfesor() {
    var smr1 = document.getElementById("bsmr1p");
    smr1.style.display = "none";
    var smr2 = document.getElementById("bsmr2p");
    smr2.style.display = "none";
    var daw1 = document.getElementById("bdaw1p");
    daw1.style.display = "none";
    var daw2 = document.getElementById("bdaw2p");
    daw2.style.display = "none";
    var botonAgregar = document.getElementById("botonAgregarAsignatura");
    botonAgregar.style.display = "none";
    botonAgregar.addEventListener("click", botonAgregarAsignatura);
    if (ciclop.selectedIndex === 1 && cursop.selectedIndex === 1) {
        smr1.style.display = "block";
        botonAgregar.style.display = "inline-block";
    } else if (ciclop.selectedIndex === 1 && cursop.selectedIndex === 2) {
        smr2.style.display = "block";
        botonAgregar.style.display = "inline-block";
    } else if (ciclop.selectedIndex === 2 && cursop.selectedIndex === 1) {
        daw1.style.display = "block";
        botonAgregar.style.display = "inline-block";
    } else if (ciclop.selectedIndex === 2 && cursop.selectedIndex === 2) {
        daw2.style.display = "block";
        botonAgregar.style.display = "inline-block";
    }
}
function botonAgregarAsignatura() {
    var elementoNuevo = document.getElementById("selectAsignaturasAgregadas");
    var option = document.createElement("option");
    if (ciclop.selectedIndex === 1 && cursop.selectedIndex === 1) {
        var e = document.getElementById("smr1p");
        var strUser = e.options[e.selectedIndex].value;
        option.text = strUser;
    } else if (ciclop.selectedIndex === 1 && cursop.selectedIndex === 2) {
        var e = document.getElementById("smr2p");
        var strUser = e.options[e.selectedIndex].value;
        option.text = strUser;
    } else if (ciclop.selectedIndex === 2 && cursop.selectedIndex === 1) {
        var e = document.getElementById("daw1p");
        var strUser = e.options[e.selectedIndex].value;
        option.text = strUser;
    } else if (ciclop.selectedIndex === 2 && cursop.selectedIndex === 2) {
        var e = document.getElementById("daw2p");
        var strUser = e.options[e.selectedIndex].value;
        option.text = strUser;
    }
    elementoNuevo.add(option);
}
/*FUNCTION validaEmailProfesor
 * Se valida si el Email es válido
 * Si es verdadero se pone el borde en verde
 * Si es falso pone el borde en rojo y pone el foco en el elemento actual
 * */
function validaEmailProfesor() {
    if (validaEmail(emailProfesor.value)) {
        emailProfesor.style.borderColor = "green";
    } else {
        emailProfesor.style.borderColor = "red";
        emailProfesor.focus();
    }
}
/*FUNCTION cambiarEstadoEnviarAlumno
 * Comprueba el estado del checkBox lopd
 * Si se ha seleccionado, se activa el botón de enviar
 * Sino, se desactiva el botón de enviar
 * */
function cambiarEstadoEnviarProfesor() {
    var enviar = document.getElementById("enviarp");
    if (checkLopdp.checked) {
        enviar.disabled = false;
    } else {
        enviar.disabled = true;
    }
}
//------------------------------------------------Validación de campos---------------------------------------
/*FUNCTION validaAlphabetic
 * @param textoValidar: Texto que se desea validar
 * @param obligatorio: boolean para comprobar si el campo es obligatorio o no
 * Funcionamiento
 * Si el texto que se le pasa son caracteres alfabéticos y entre 5 y 25
 * devuelve true
 * Sino
 * devuelve false
 * */
function validaAlphabetic(textoValidar, obligatorio) {
    var exp = /^[A-z]{5,25}$/;
    if (obligatorio) {
        if (!exp.test(textoValidar)) {
            return false;
        } else {
            return true;
        }
    }
}/*FUNCTION validaAlphabetic
 * @param dni: DNI que se desea validar
 * Funcionamiento
 * Si el dni cumple es válido
 * devuelve true
 * Sino
 * devuelve false
 * */
function validaDNI(dni) {
    exp = /^\d{8}\D{1}$/;
    var numeros = dni.substring(0, 8);
    var letra = dni.substring(8, 9);

    var cadena = "TRWAGMYFPDXBNJZSQVHLCKE";
    if (!exp.test(dni)) {
        return false;
    } else {
        console.log(cadena.substr(numeros % 23 + 1, 1));
        if (cadena.substr(numeros % 23, 1) === letra) {
            return true;
        } else {
            return false;
        }
    }
}
/*FUNCTION validaAlphabetic
 * @param email: Email que se desea validar
 * Funcionamiento
 * Si el email cumple la expresión
 * devuelve true
 * Sino
 * devuelve false
 * */
function validaEmail() {
    exp = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    if (!exp.test(document.getElementById("email").value)) {
        return false;
    } else {
        return true;
    }
}
//Cargar el script de inicio
window.addEventListener('load', cargar, false);