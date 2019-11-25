function cargar(){
  for(var i=1;i<=4;i++){
    var cogerPieza = document.getElementById("pieza"+i);
    cogerPieza.addEventListener('dragstart', dragStart, false);
    cogerPieza.addEventListener('dragend', dragEnd, false);
    cogerPieza.addEventListener('mouseover', mouseOver,false);
    cogerPieza.addEventListener('mouseleave', mouseLeave,false);
  
    var soltarPieza = document.getElementById("resultadoPieza"+i);
    soltarPieza.addEventListener('dragover', dragOver, false);
    soltarPieza.addEventListener('drop', dejarObjeto, false); 
    cogerPieza.style.transition="all 0.25s";
    cogerPieza.style.opacity="0.7";
  }
}
function mouseOver(){
  this.style.opacity="1";
  this.style.transform="scale(1.05)";
}
function mouseLeave(){
  this.style.opacity="0.7";
  this.style.transform="scale(1)";
}
//Comenzar a arrastrar las piezas de la izquierda
function dragStart(e) {
  e.dataTransfer.effecAllowed = 'move'; 
	e.dataTransfer.setData("Text", e.target.id); // Coje el elemento que se va a mover
  var fondo=document.getElementById("fondo");
  fondo.style.backgroundColor="#E65100";
  fondo.style.transition="all 0.5s";
}
function dragEnd(e){
	e.dataTransfer.clearData("Data");			
  this.style.opacity="1";
  var fondo=document.getElementById("fondo");
  fondo.style.backgroundColor="#B71C1C";
}
function dragOver() {
    event.preventDefault();
}
function dejarObjeto() {
    event.preventDefault();
    var data = event.dataTransfer.getData("Text");
    event.target.appendChild(document.getElementById(data));
  comprobarPuzzle();
}
function comprobarPuzzle(){
	if((document.getElementById('pieza2').parentNode.id=='resultadoPieza1') &&
		(document.getElementById('pieza4').parentNode.id=='resultadoPieza2') &&
		(document.getElementById('pieza1').parentNode.id=='resultadoPieza3') &&
		(document.getElementById('pieza3').parentNode.id=='resultadoPieza4'))
	{
    fondo=document.getElementById("fondo");
    fondo.style.backgroundColor="#4CAF50";
    fondo.style.transition="all 6s";
    var mensajeTitulo=document.getElementById("mensajeTitulo");
    mensajeTitulo.style.visibility="hidden";
    var mensajeResuelto=document.getElementById("mensajeResuelto");
    mensajeResuelto.style.visibility="visible";
    var contenedorCogerPieza=document.getElementById("contenedorCogerPieza");
    contenedorCogerPieza.style.display="none";
    var contenedorResultado=document.getElementById("contenedorResultado");
    contenedorResultado.style.float="none";
    contenedorResultado.style.display="block";
    contenedorResultado.style.margin="auto";
    contenedorResultado.style.transition="all 8s";
    
    //Quitar todos los eventos una vez que está resuelto
    for(var i=1;i<=4;i++){
      var cogerPieza = document.getElementById("pieza"+i);
      cogerPieza.removeEventListener('dragstart', dragStart, false);
      cogerPieza.removeEventListener('dragend', dragEnd, false);
      cogerPieza.removeEventListener('mouseover', mouseOver,false);
      cogerPieza.removeEventListener('mouseleave', mouseLeave,false);
      cogerPieza.style.opacity="1";
      cogerPieza.style.transform="scale(1)";
      
      var soltarPieza = document.getElementById("resultadoPieza"+i);
      soltarPieza.removeEventListener('dragover', dragOver, false);
      soltarPieza.removeEventListener('drop', dejarObjeto, false); 
    }
	}
}