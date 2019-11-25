function leer(){
    console.log(event.data);
    console.log(event.origin);//Devuelve el dominio
}
function escribir(){
    console.log("se va a enviar");
    console.log(this);
    window.opener.postMessage('<li>'+this.innerHTML+'</li>','*');
}
function cargar(){
    //Añadimos que escuche un evento de tipo message
    window.addEventListener('message',leer,false);
    
    var lista=document.getElementsByTagName('li');
    for(var i=0;i<lista.length;i++){
        console.log(lista[i]);
        lista[i].addEventListener('click',escribir,false);
    }
    
}
window.addEventListener('load',cargar,false);