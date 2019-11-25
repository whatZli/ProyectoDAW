function empezarFuncion(){
    class Rectangulo{
        //Crear constructor
        constructor(base,altura,color){
            this.base=base;
            this.altura=altura;
            this.color=color;
        }
        //Metodos a mayores
        mostrar(id){
            document.getElementById(id).innerHTML = "Ancho ->" + this.base+ "px. Alto ->" +this.altura+"px. Color ->#"+this.color;
        }
        asignarAId(id){
            document.getElementById(id).style.width = this.base + "px";
            document.getElementById(id).style.height = this.altura + "px";
            document.getElementById(id).style.backgroundColor = "#"+this.color;
        }
    }
    var rectangulo1 = new Rectangulo(Math.floor(Math.random()*750),150,Math.floor(Math.random()*15).toString(16)+Math.floor(Math.random()*15).toString(16)+Math.floor(Math.random()*15).toString(16));
    var rectangulo2 = new Rectangulo(Math.floor(Math.random()*750),150,Math.floor(Math.random()*15).toString(16)+Math.floor(Math.random()*15).toString(16)+Math.floor(Math.random()*15).toString(16));
    var rectangulo3 = new Rectangulo(Math.floor(Math.random()*750),150,Math.floor(Math.random()*15).toString(16)+Math.floor(Math.random()*15).toString(16)+Math.floor(Math.random()*15).toString(16));
    var rectangulo4 = new Rectangulo(Math.floor(Math.random()*750),150,Math.floor(Math.random()*15).toString(16)+Math.floor(Math.random()*15).toString(16)+Math.floor(Math.random()*15).toString(16));
    
    rectangulo1.asignarAId("rec1");
    rectangulo2.asignarAId("rec2");
    rectangulo3.asignarAId("rec3");
    rectangulo4.asignarAId("rec4");

    rectangulo1.mostrar("prec1");
    rectangulo2.mostrar("prec2");
    rectangulo3.mostrar("prec3");
    rectangulo4.mostrar("prec4");
	
}
