function validaAlphabetic(textoValidar, min, max, obligatorio) {
    var exp = /^[A-z]{min,max}$/;
    if (obligatorio) {
        if (!comprobarVacio(textoValidar)) {
            return false;
        }
    }
    if (!exp.test(textoValidar)) {
        return false;
    } else {
        return true;
    }
}
function validaAlphaNumeric(textoValidar, min, max, obligatorio) {
    /*Validación del campo de texto*/
    exp = /^[A-z0-9]{min,max}$/;
    if (!exp.test(document.getElementById(textoValidar).value)) {
        document.getElementById(textoValidar).style.borderColor = "red";
        return false;
    } else {
        document.getElementById(textoValidar).style.borderColor = "green";
        return true;
    }
}
function validaInt(numValidar, obligatorio = 0, min = Number.MIN_SAFE_INTEGER, max = Number.MAX_SAFE_INTEGER) {
    numValidar = numValidar.trim();
    var mensajeError = null;
    if (!obligatorio && numValidar === "") {
        return true;
    } else {
        numValidar = parseInt(numValidar);
        if (numValidar.isInteger() && numValidar >= min && numValidar <= max) {
            return true;
        }
    }
    return false;
}
function validaFloat(numValidar, obligatorio = 0, min = Number.MIN_SAFE_FLOAT, max = Number.MAX_SAFE_FLOAT) {
    numValidar = numValidar.trim();
    var mensajeError = null;
    if (!obligatorio && numValidar === "") {
        return true;
    } else {
        numValidar = parseInt(numValidar);
        if (numValidar.isInteger() && numValidar >= min && numValidar <= max) {
            return true;
        }
    }
    return false;
}
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
function validaColor(codColor) {
    exp = /^#(0-9a-f){6}$/;
    if (exp.test(codColor)) {
        return true;
    } else {
        return false;
    }
}
function validaRange(numero) {
    if (validaInt(numero)) {
        return true;
    } else {
        return false;
    }
}
function validaPassword(password) {
    exp = /^#(0-9a-Z){8}$/;
    if (exp.test(password)) {
        return true;
    } else {
        return false;
    }
}
function validaDate(date) {

}
function validaEmail() {
    exp = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    if (!exp.test(document.getElementById("email").value)) {
        document.getElementById("email").style.borderColor = "red";
        return false;
    } else {
        document.getElementById("email").style.borderColor = "green";
    }
}
function validaRadioButton() {}
function validaCheckBox() {}
function validaSelect() {}
function validaEmail(email) {
    exp = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    if (exp.test(email)) {
        return false;
    } else {
        return true;
    }
}
function comprobarVacio(cadena) {
    var mensajeError = null;
    cadena = cadena.replace(/(?!\w|\s)./g, '')
            .replace(/\s+/g, ' ')
            .replace(/^(\s*)([\W\w]*)(\b\s*$)/g, '$2');
    //https://rstopup.com/como-quitar-los-caracteres-especiales-de-una-cadena-usando-javascript.html
    if (cadena === "") {
        mensajeError = " Campo vacío.";
    }
    return mensajeError;
}
function comprobarTamanioMax(cadena, max) {
    var mensajeError = null;
    if (cadena.length > max) {
        mensajeError += " El tamaño tiene que ser menor que " + max + ".";
    }
    return mensajeError;
}
function comprobarTamanioMin(cadena, min) {
    var mensajeError = null;
    if (cadena.length > min) {
        mensajeError += " El tamaño tiene que ser menor que " + min + ".";
    }
    return mensajeError;
}