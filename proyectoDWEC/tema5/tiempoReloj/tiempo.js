var intervalo;

function saluda(){
    setTimeout(function (){
        alert("Buenas");
    },);
}
function cambiar(){
    fondo=document.getElementById('body');
    var array=['red','green','blue'];
    var i=0;
    intervalo=setInterval(function (){
        fondo.style.backgroundColor=array[i%3];
        i++;
    },1000);
}
function parar(){
    clearInterval(intervalo);
}

function cargar(){
    boton=document.getElementById("boton");
    boton.addEventListener('click',saluda,false);
    cambiarFondo=document.getElementById("cambiarFondo");
    cambiarFondo.addEventListener('click',cambiar,false);
    pararFondo=document.getElementById("pararFondo");
    pararFondo.addEventListener('click',parar,false);
}

window.addEventListener('load',cargar,false);