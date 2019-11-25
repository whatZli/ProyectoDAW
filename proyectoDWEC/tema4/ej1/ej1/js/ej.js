function verFormulario() {
    //Modificar el tamaó de caracteres
    document.getElementById("nombre").maxLength=10;
    document.getElementById("apellidos").maxLength=30;
    document.getElementById("dni").maxLength=9;
    document.getElementById("email").maxLength=40;
    document.getElementById("ciudad").maxLength=30;
    document.getElementById("pais").maxLength=25;
    
    //Requerir campos
    /*document.getElementById("nombre").required=true;
    document.getElementById("apellidos").required=true;
    document.getElementById("dni").required=true;
    document.getElementById("email").required=true;
    document.getElementById("ciudad").required=true;
    document.getElementById("pais").required=true;*/
    
    
}

function validar(){
    //Va a ser válido y va a mandar los datos sólo si nombre y apellido 
    //no están vacíos
    if(document.getElementById("nombre").value!=="" 
        && document.getElementById("apellidos").value!==""
        && document.getElementById("dni").value!==""
        && document.getElementById("email").value!==""
        && document.getElementById("ciudad").value!==""
        && document.getElementById("pais").value!==""){
        
        /*Validación del nombre*/
        exp=/^[A-z]{1,10}$/;
        if(!exp.test(document.getElementById("nombre").value)){
            document.getElementById("nombre").style.borderColor="red";
            return false;
        }else{
            document.getElementById("nombre").style.borderColor="green";
        }
        
        /*Validación del apellido*/
        exp=/^[A-z]{1,30}$/;
        if(!exp.test(document.getElementById("apellidos").value)){
            document.getElementById("apellidos").style.borderColor="red";
            return false;
        }else{
            document.getElementById("apellidos").style.borderColor="green";
        }
        
        /*Validación del DNI*/
        exp=/^\d{8}\D{1}$/;
        var numeros=document.getElementById("dni").value.substring(0,8);
        var letra=document.getElementById("dni").value.substring(8,9);
        
        var cadena="TRWAGMYFPDXBNJZSQVHLCKE";
        
        console.log(numeros);
        console.log(letra);
        if(!exp.test(document.getElementById("dni").value)){
            document.getElementById("dni").style.borderColor="red";
            return false;
        }else{
            console.log(cadena.substr(numeros%23+1,1));
            if(cadena.substr(numeros%23,1)===letra){
                document.getElementById("dni").style.borderColor="green";
            }else{
                document.getElementById("dni").style.borderColor="red";
                return false;
            }
        }
        
        /*Validación del Email*/
        exp=/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
        if(!exp.test(document.getElementById("email").value)){
            document.getElementById("email").style.borderColor="red";
            return false;
        }else{
            document.getElementById("email").style.borderColor="green";
        }
        
        /*Validación del Ciudad*/
        exp=/^[A-z]{1,30}$/;
        if(!exp.test(document.getElementById("ciudad").value)){
            document.getElementById("ciudad").style.borderColor="red";
            return false;
        }else{
            document.getElementById("ciudad").style.borderColor="green";
        }
        
        /*Validación del Pais*/
        exp=/^[A-z]{1,25}$/;
        if(!exp.test(document.getElementById("pais").value)){
            document.getElementById("pais").style.borderColor="red";
            return false;
        }else{
            document.getElementById("pais").style.borderColor="green";
        }
        
        return true;
    }else{
        alert("Hay algún campo vacío");
        return false;
    }
}


