partidas=1;
partidasGanadas1=0;
partidasGanadas2=0;
jugador = "1";//Variable que se utilizará para saber a que jugador le toca

function cargar(){
  aCasilla = document.getElementsByTagName("td");
  pJugadas=document.getElementById("partidasJugadas");
  jugador1=document.getElementById("marcador1");
  jugador2=document.getElementById("marcador2");
  numMovimiento=0;//Contador que se irá incrementando a medida que pase la partida hasta 9
  ganador=false;
  colorFondoCasilla=document.getElementById("colorFondoCasillas");
  colorFondoCasilla.addEventListener('change',alCambiarColorFondo,false);
  colorCasillaVacia=document.getElementById("colorCasillasVacias");
  colorCasillaVacia.addEventListener('change',alCambiarColorVacia,false);
  colorJugador1=document.getElementById("colorJugador1");
  colorJugador1.addEventListener('change',alCambiarColorJugador1,false);
  colorJugador2=document.getElementById("colorJugador2");
  colorJugador2.addEventListener('change',alCambiarColorJugador2,false);
  
    for(var i = 0; i <9; i++){
        aCasilla[i].addEventListener('mouseenter',alEntrar,false);
        aCasilla[i].addEventListener('mouseleave',alSalir,false);
        aCasilla[i].addEventListener('click',alSeleccionar,false);
        aCasilla[i].addEventListener('dblclick',recuperarFicha,false);
        aCasilla[i].addEventListener('select',noSeleccionar,false);
        aCasilla[i].style.color=colorCasillaVacia.value;
        aCasilla[i].style.backgroundColor=colorFondoCasilla.value;
      
    }
  
}
function alEntrar(){
    this.style.fontSize="150px";
    this.style.fontWeight ="1000";
    this.style.transition="all 0.25s";
    this.style.opacity="0.8";
    if(jugador === "1"){
      this.style.color = colorJugador1.value;
      this.innerHTML = '⌾';
    }else{
      this.style.color = colorJugador2.value;
      this.innerHTML = '⍟';
    }    
}
function alSalir(){
  this.style.opacity="1";
  this.style.fontSize="120px";
  this.style.color = colorCasillaVacia.value;
  this.innerHTML = '-';
}
function alSeleccionar(){
  this.style.opacity="1";
  this.style.fontSize="90px";
  this.removeEventListener('mouseenter', alEntrar, false);
  this.removeEventListener('mouseleave', alSalir, false);
  this.removeEventListener('click', alSeleccionar, false); //Quitamos el evento para que no se pueda seleccionar de nuevo
    if(jugador === "1"){
        this.innerHTML = '⌾';
      }else{
        this.innerHTML = '⍟';
      }
    numMovimiento++;
    ultimoMovimiento=this;
    if(numMovimiento=>5){
      comprobarGanador(); 
    }
    if(jugador === "1"){
        jugador = "2";
      }else{
        jugador = "1";
      }
    if(numMovimiento===9 && !ganador){
      alert("La partida ha acabado en empate");
      jugarDeNuevo();
      }
}
function recuperarFicha(){
  if(this===ultimoMovimiento){
    this.addEventListener('mouseenter', alEntrar, false);
    this.addEventListener('mouseleave', alSalir, false);
    this.addEventListener('click', alSeleccionar, false); //Permitimos el evento para que se pueda seleccionar de nuevo
    this.innerHTML = '-';  
    if(jugador === "1"){
          jugador = "2";
        }else{
          jugador = "1";
        }
      numMovimiento--;
    }
}
function comprobarGanador(){
  //Comprobación fila 1
  if(aCasilla[0].textContent == aCasilla[1].textContent && aCasilla[1].textContent == aCasilla[2].textContent && (aCasilla[0].textContent == "⌾" || aCasilla[0].textContent == "⍟")) {
    ganador=true;
  }
  //Comprobación fila 2
  if(aCasilla[3].textContent == aCasilla[4].textContent && aCasilla[4].textContent == aCasilla[5].textContent && (aCasilla[3].textContent == "⌾" || aCasilla[3].textContent == "⍟")) {
    ganador=true;
  }
  //Comprobación fila 3
  if(aCasilla[6].textContent == aCasilla[7].textContent && aCasilla[7].textContent == aCasilla[8].textContent && (aCasilla[6].textContent == "⌾" || aCasilla[6].textContent == "⍟")) {
    ganador=true;
  }
  //Comprobación columna 1
  if(aCasilla[0].textContent == aCasilla[3].textContent && aCasilla[3].textContent == aCasilla[6].textContent && (aCasilla[0].textContent == "⌾" || aCasilla[0].textContent == "⍟")) {
    ganador=true;
  }
  //Comprobación columna 2
  if(aCasilla[1].textContent == aCasilla[4].textContent && aCasilla[4].textContent == aCasilla[7].textContent && (aCasilla[1].textContent == "⌾" || aCasilla[1].textContent == "⍟")) {
    ganador=true;
  }
  //Comprobación columna 3
  if(aCasilla[2].textContent == aCasilla[5].textContent && aCasilla[5].textContent == aCasilla[8].textContent && (aCasilla[2].textContent == "⌾" || aCasilla[2].textContent == "⍟")) {
    ganador=true;
  }
  //Comprobación diagonal 1
  if(aCasilla[0].textContent == aCasilla[4].textContent && aCasilla[4].textContent == aCasilla[8].textContent && (aCasilla[0].textContent == "⌾" || aCasilla[0].textContent == "⍟")) {
    ganador=true;
  }
  //Comprobación diagonal 2
  if(aCasilla[2].textContent == aCasilla[4].textContent && aCasilla[4].textContent == aCasilla[6].textContent && (aCasilla[2].textContent == "⌾" || aCasilla[2].textContent == "⍟")) {
    ganador=true;
  }
  if(ganador){
    alert("Ha ganado el Jugador "+jugador);
    jugarDeNuevo()
  }
}
function jugarDeNuevo(){
   cambiarMarcador();
   if (confirm("¿Quieres jugar otra vez?")) {
     resetearPartida(); 
   }else{//Si no se quiere jugar de nuevo se bloquean todas las casillas
     for(var i = 0; i <9; i++){
        aCasilla[i].removeEventListener('mouseenter',alEntrar,false);
        aCasilla[i].removeEventListener('mouseleave',alSalir,false);
        aCasilla[i].removeEventListener('click',alSeleccionar,false);
        aCasilla[i].removeEventListener('dblclick',recuperarFicha,false);
    }
   }
}
function cambiarMarcador(){
     pJugadas.innerHTML=partidas;
     partidas++;
    if(jugador==="1" && ganador){
      partidasGanadas1++;
      jugador1.innerHTML=partidasGanadas1;
    }else if(jugador==="2" && ganador){
      partidasGanadas2++;
      jugador2.innerHTML=partidasGanadas2;
    }
}
function resetearPartida(){
  for(var i = 0; i <9; i++){
        aCasilla[i].style.color = 'white';
        aCasilla[i].innerHTML='-';
    }
  numMovimiento=0;
  ganador=false;
  cargar();
}
function noSeleccionar(){
  return false;
}
function alCambiarColorVacia(){
  var color=document.getElementById('colorCasillasVacias');
  for(var i = 0; i <9; i++){
    if(aCasilla[i].textContent==='-'){
      aCasilla[i].style.color=color.value; 
    }
  }
}
function alCambiarColorFondo(){
  var color=document.getElementById('colorFondoCasillas');
  for(var i = 0; i <9; i++){
    aCasilla[i].style.backgroundColor=color.value; 
  }
}
function alCambiarColorJugador1(){
  var color=document.getElementById('colorJugador1');
  for(var i = 0; i <9; i++){
    if(aCasilla[i].textContent==='⌾'){
      aCasilla[i].style.color=color.value; 
    }
  }
}
function alCambiarColorJugador2(){
  var color=document.getElementById('colorJugador2');
  for(var i = 0; i <9; i++){
    if(aCasilla[i].textContent==='⍟'){
      aCasilla[i].style.color=color.value; 
    }
  }
}