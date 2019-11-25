function clickme(){
     alert('Has pulsado el botón2');
}
function contenedor(){
    alert('Has pulsado el contenedor');
}
//function cambiarColor(){
//    document.getElementById("caja2").style(background-color(red));
//}
function llamada(){
    alert('Has hecho click en el boton Avanzado');
}
function cambiar(){
    botonCN.value="Cambiado nombre";
}
function click3(nombre,boton){
    alert("Has hecho click en el botón"+nombre);
    boton.onclick=null;
}
function despedir(){
    alert("Adiós");
}
function borrar(boton){
    alert("ñeñeñe");
    boton.removeEventListener('click',f,false);
}

function quienSoy(){
    alert("Soy el botón"+this.id);
}

function cargar(){
    var boton=document.getElementById("boton3");
    var value= boton.value;
    
    boton.onclick= function(){click3(value,boton);};/*La funcion click3 va sin paréntesis*/
    
    //Añadir eventos con addEventListener
    var botonA=document.getElementById("botonA");
    botonA.addEventListener('click',llamada,false);
    
    botonCN=document.getElementById("cambiarNombre");
    botonCN=addEventListener('click',function(){cambiar;},false);
    botonCN=addEventListener('click',function(){despedir;},false);
    
    var botonBorrar= document.getElementById("botonBorrar");
    f = function (){borrar(botonA);};
    botonBorrar.addEventListener('click',f,false);
    
    var a = document.getElementsByTagName("button");
    for(var i=0;i< a.length;i++){
        a[i].addEventListener('click',quienSoy,false);
    }
}