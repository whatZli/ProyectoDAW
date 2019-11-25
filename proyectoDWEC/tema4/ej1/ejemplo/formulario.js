function verFormulario() {
////Acceder al formulario
//Con id
    console.log(document.getElementById('formAlex'));
//Con forms
    //console.log(document.forms[0]);
//Con form y el nombre o id
    console.log(document.forms['formAlex']);
//Con nombre del formulario
    console.log(document.formAlex);
//Hijos del formulario
    console.log(document.formAlex.length);
    console.log(document.formAlex.elements);
    
    console.log(document.formAlex.elements[1]);
    console.log(document.formAlex.elements["nombre"]);
    
    document.formAlex.action="bienHTML.html";
    
    //Elemento input
    document.getElementById("nombre").value="alex";
    console.log(document.formAlex.elements["nombre"].value);
    
    //input nombre válido y sino "No válido"
    document.getElementById("nombre").defaultValue="No válido";
    
    //form
    console.log(document.getElementById("nombre").form);
    
    //Modificar el tamañó de caracteres
    document.getElementById("nombre").maxLength=5;
    document.getElementById("nombre").readOnly = true;//Sólo leer
    document.getElementById("nombre").style.backgroundColor="#EEE";
    document.getElementById("apellidos").style.color="red";
    
    //Cambiar el tamaño
    document.getElementById("nombre").size="30";
    document.getElementById("nombre").required=true;
}

function validar(){
    //Va a ser válido y va a mandar los datos sólo si nombre y apellido 
    //no están vacíos
    if(document.getElementById("nombre").value!=="" && document.getElementById("apellidos").value!==""){
        return true;
    }else{
        alert("Hay algún campo vacío");
        return false;
    }
}


