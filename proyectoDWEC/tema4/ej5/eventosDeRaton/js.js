function mensaje() {
    alert("Has hecho doble click en la caja");
}

function mantenerPulsado() {
    this.style.backgroundColor = "purple";
}

function soltarPulsado() {
    this.style.backgroundColor = "orange";
}

function ponerCoordenadas() { //Conocer coordenadas
    this.addEventListener('mousemove', coordenadasMove, false);//Mientras estás moviendo el ratón
}

function coordenadasMove() { //Conocer coordenadas
    this.innerHTML = "X: " + event.clientX + "  Y: " + event.clientY;
}

function quitarCoordenadas() {
    this.removeEventListener('mousemove', coordenadasMove, false);
}

function alertar() {
    if (this.id === 'padre') {
        alert("Has pinchado en la caja del padre");
    } else {
        alert("Has pinchado en la caja del hijo");
        var padre = document.getElementById("padre");
        padre.stopPropagation();
    }
}
function presionarTecla() {
    if (event.ctrlKey) {
        if (event.code === "Space") {
            alert("Has pulsado control + espacio");
            teclado.style.backgroundColor = "purple";
        }
    } else {
        alert(event.key + "----" + event.keyCode + "-----" + event.code);
        teclado.style.backgroundColor = "green";
    }
}
function copiar() {
    alert("Has copiado----> " + window.getSelection().toLocaleString() + "\n");
    var pegarTexto = document.getElementById("pegarTexto");
    pegarTexto.innerHTML += window.getSelection().toLocaleString();
}
function pegar() {
    alert("Has Pegado" + window.getSelection().toLocaleString());
}

function cambiarFecha() {
    alert('Has cambiado la fecha');
    var texto1 = document.getElementById("texto1");
    texto1.value = document.getElementById('date').value;
}

function alIntroducir() {

}

function alPerderElFoco() {
    this.style.color = 'red';
}

function noValido() {
    alert('El email no es válido');
}

function seleccionado() {
    alert("Se ha seleccionado el elemento");
}

function alCambiarTamanio() {
    alert('La ventana tiene: ' + window.outerWidth + "X-" + window.outerHeight + "Y");
}

function alSalirDeLaPagina() {
    alert("Vas a aslir de la página");
}

function mensajeComienzo() {
    var cuadro3 = document.getElementById("cuadro3");
    cuadro3.innerHTML = "Empezar a arrastrar";
}

function dragStart() {
    var parrafoAvisos = document.getElementById("cuadro3");
    parrafoAvisos.innerHTML += "Empieza arrastrando\n";
    event.dataTransfer.setData("Text", event.target.id);
}
function drag() {
    var parrafoAvisos = document.getElementById("cuadro3");
    parrafoAvisos.innerHTML = "Se está arrastrando\n";
}
function dragEnd() {
    var parrafoAvisos = document.getElementById("cuadro3");
    parrafoAvisos.innerHTML += "Se ha soltado\n";
}

//Cambiar el cuadro2 para que no haga lo que hace normalmente
//Permitir que se arrastren cosas sobre él
function dragOver() {
    event.preventDefault();
}

//Cuando dejemos el objeto en el cuadro2 tenemos que añadir el objeto guardado en el datatransfer
function dejarObjeto() {
    event.preventDefault();
    var data = event.dataTransfer.getData("Text");
    event.target.appendChild(document.getElementById(data));
}

function cargar() {
    var div = document.getElementById("div1");
    var div2 = document.getElementById("div2");
    coor = document.getElementById("coor");

    div.addEventListener('dblclick', mensaje, false);//Doble click
    //tradicional
    div.oncontextmenu = function () {//Botón derecho
        alert("Mensaje generado con evento de forma tradicional");
    };

    div2.addEventListener('mousedown', mantenerPulsado, false);//Mantener pulsado el click
    div2.addEventListener('mouseup', soltarPulsado, false);//Al soltar el click

    coor.addEventListener('mousedown', ponerCoordenadas, false);//Al soltar el click escribo
    coor.addEventListener('mouseup', quitarCoordenadas, false);//Al soltar el click borra el evento

    //Mouse over entra en el mismo o cualquiera de sus hijos
    //y mouse enter entra en el elemento
    var padre = document.getElementById("padre");
    var hijo = document.getElementById("hijo");
//    
//    padre.addEventListener('click',alertar,true);
//    hijo.addEventListener('click',alertar,false);
    //attachEvent es el metodo utilizado por Microsoft
    //Ejemplo: var b1 = document.getElementById("b1");
    //b1.attachEvent('onclick',nomFuncion)

//    document.addEventListener('keypress',presionarTecla,false);
    document.addEventListener('copy', copiar, false);
    document.addEventListener('paste', pegar, false);

    var fecha = document.getElementById('date');
    fecha.addEventListener('change', cambiarFecha, false);

    var input2 = document.getElementById('texto2');
    input2.addEventListener('input', alIntroducir, false);

    var input3 = document.getElementById('texto3');
    input3.addEventListener('blur', alPerderElFoco, false);

    var email = document.getElementById('email');
    email.addEventListener('invalid', noValido, false);
    email.addEventListener('blur', noValido, false);

    var parrafo = document.getElementById('parrafo');
    parrafo.addEventListener('select', seleccionado, false);

    window.addEventListener('resize', alCambiarTamanio, false);//Al cambiar el tamaño de la ventana

    var enlace = document.getElementById("enlace");
    window.onbeforeunload = enlace;//Al salir hacia otra página
    window.addEventListener('resize', alCambiarTamanio, false);//Al cambiar el tamaño de la ventan

    var parrafoMover = document.getElementById("parrafoMover");
    parrafoMover.addEventListener('dragstart', dragStart, false);
    parrafoMover.addEventListener('drag', drag, false);
    parrafoMover.addEventListener('dragend', dragEnd, false);

    var div2 = document.getElementById("cuadro2");
    div2.addEventListener('dragover', dragOver, false);
    div2.addEventListener('drop', dejarObjeto, false);



}

window.addEventListener('load', cargar, false);