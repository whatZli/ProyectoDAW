function cargar() {
    //Acceso directo a los nodos
    //por nombre
    console.log(document.getElementsByName("texto"));//Devuelve NodeList
    //Por etiqueta
    console.log(document.getElementsByTagName("input"));//Devuelve HTMLCollection
    //Por clase
    console.log(document.getElementsByClassName("text"));//Devuelve HTMLCollection
    //Por selector query
    console.log(document.querySelectorAll("input"));//Devuelve NodeList


    //Seleccionamos el texto por ID
    var elemento = document.getElementById('texto');
    console.log(elemento);
    console.log(elemento.nodeName);
    //Coger atributo
    var atributo = document.getElementById('texto').attributes['id'];
    console.log(atributo);
    //Nombre del atributo
    console.log(atributo.nodeName);
    //Sacar el contenido de un nodo de tipo texto
    var texto = document.getElementsByTagName('p')[0].firstChild;
    var texto2 = document.getElementsByTagName('p')[0];
    console.log(texto);
    //Ver el tipo de un nodo
    //https://www.w3schools.com/jsref/prop_node_nodetype.asp
    console.log(texto.nodeType);
    console.log(atributo.nodeType);
    console.log(elemento.nodeType);

    //Valor de elemento
    console.log(texto.nodeValue);
    console.log(atributo.nodeValue);
    console.log(elemento.nodeValue);
    
    //Padre del nodo
    console.log(texto.parentNode);
    console.log(atributo.parentNode);
    console.log(elemento.parentNode);
    
    //Si tiene hijos
    console.log(texto2.childNodes);
    console.log(atributo.childNodes);
    console.log(elemento.childNodes);
    
    //Primer y último hijo
    console.log(texto2.firstChild);
    console.log(texto2.lastChild);
    
    //Acceder a los hermanos del parrafo    
    console.log(texto2.previousSibling);
    console.log((texto2.previousSibling).previousSibling);//El hermano del anterior hermano
    console.log(texto2.nextSibling);
    
    //A quién pertenece(Document)
    console.log(texto2.ownerDocument);
    
    //Manejo de atributos
    //Ver todos
    console.log(elemento.attributes);
    //Acceder a un atributo
    console.log(elemento.getAttribute('class'));
    //Si existe lo modifica y si no lo crea
    elemento.setAttribute('size',60);
    //Borrar atributo
    elemento.removeAttribute('size');
    
    //Crear elementos en el DOM
    //Ejemplo con la lista
    //Meter al final de la lista
    var lista = document.createElement("li");
    var texto = document.createTextNode("Elemento creado");
    lista.appendChild(texto);
    var ul=document.getElementsByTagName("ul")[0];
    ul.appendChild(lista);
    
    //Meter algo al principio de la lista
    var lista = document.createElement("li");
    var texto = document.createTextNode("Hamburguesa");
    lista.appendChild(texto);
    var ul=document.getElementsByTagName("ul")[0];
    var liPrimero=document.getElementsByTagName('li')[0];
    ul.insertBefore(lista,liPrimero);
    
    //Clonar elemento
    var liPrimero=document.getElementsByTagName('li')[0];
    var clonado=liPrimero.cloneNode(true);
    
    var ul=document.getElementsByTagName("ul")[1];
    ul.appendChild(clonado);
    
    //Reemplazar el primero de abajo
    var macarrones=document.getElementsByTagName('li')[1];
    var clonado=macarrones.cloneNode(true);
    
    var ul2=document.getElementsByTagName("ul")[1].firstChild;
    ul.teplaceChild(clonado,li);
    
    //Borrar
    var liPrimero=document.getElementsByTagName('li')[0];
    var ul=document.getElementsByTagName("ul")[0];
    ul.removeChild('li');
}
window.addEventListener('load', cargar, false);
