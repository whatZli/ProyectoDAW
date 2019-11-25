function empezarFuncion(){ 
                 var dias=new Array("lunes","martes","miercoles","jueves","viernes","sabado","domingo");
                 var parrafo=document.getElementById("mostrar1"); 
                 
                 for(var i=0; i< dias.length;i++){
                     parrafo.innerHTML+=(dias[i].toUpperCase()+" ");
                 }
             }