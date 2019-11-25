function empezarFuncion(){
    //Variables donde se va a almacenar el contenido para mostralo en HTML
    var pProfesores = document.getElementById("profesores");
    var pAlumnos = document.getElementById("alumnos");
    var pEntregas = document.getElementById("entregas");
    class Persona{
        constructor(nombre,apellido1,apellido2,dni){
            this.nombre=nombre;
            this.apellido1=apellido1;
            this.apellido2=apellido2;
            this.dni=dni;
        }
    }
    class Estudiante extends Persona{
        constructor(nombre,apellido1,apellido2,dni,asigRecibe){
            super(nombre,apellido1,apellido2,dni);
            this.asigRecibe=asigRecibe;
            pAlumnos.innerHTML += "He sido creado y mis atributos son: Nombre->"+this.nombre+" Apellido1->"+this.apellido1+" Apellido2->"+this.apellido2+" DNI->"+this.dni+" Asignaturas->"+this.asigRecibe+"<br>";
        }
        entrega(ejercicio,profesor){
            pEntregas.innerHTML +="El alumno "+this.nombre+" ha entregado el ejercicio "+ ejercicio+"<br>";
            profesor.corrige(ejercicio,this);
        }
    }
    class Profesor extends Persona{
        constructor(nombre,apellido1,apellido2,dni,asigImparte){
            super(nombre,apellido1,apellido2,dni);
            this.asigImparte=asigImparte;
            pProfesores.innerHTML += "He sido creado y mis atributos son: Nombre->"+this.nombre+" Apellido1->"+this.apellido1+" Apellido2->"+this.apellido2+" DNI->"+this.dni+" Asignaturas->"+this.asigImparte+"<br>";
        }
        corrige(ejercicio,alumno){
            console.log(alumno);
            pEntregas.innerHTML +="El profesor "+this.nombre+" ha corregido el ejercicio " + ejercicio + " y la nota para el ejercicio " + ejercicio + " es "+ Math.round(Math.random()*10)+"<br>";
        }
    }
    
    //Crear profesores
    var profe1=new Profesor("Profe1","Apell1","Apell2","69003322R",new Array("Mates","Lengua"));
    var profe2=new Profesor("Profe2","Apell1","Apell2","70123123Z",new Array("Ingles","Historia","Informatica"));
    //Crear alumnos
    var alumno1=new Estudiante("Alumno1","Apell1","Apell2","71003322R",new Array("Mates","Lengua","Informatica"));
    var alumno2=new Estudiante("Alumno2","Apell1","Apell2","72003322R",new Array("Ingles","Lengua","Informatica"));
    var alumno3=new Estudiante("Alumno3","Apell1","Apell2","73003322R",new Array("Mates","Historia","Ingles"));
    var alumno4=new Estudiante("Alumno4","Apell1","Apell2","74003322R",new Array("Mates","Lengua","Informatica"));
    //Emtrega de trabajos
    alumno1.entrega("Trabajo1", profe1);
    alumno1.entrega("Trabajo2", profe2);
    alumno2.entrega("Trabajo1", profe1);
    alumno2.entrega("Trabajo2", profe2);
}