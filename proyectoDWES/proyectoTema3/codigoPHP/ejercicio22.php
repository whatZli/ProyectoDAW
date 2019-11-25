<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <meta name="author" content="Alex Dominguez Dominguez"/>
        <meta name="generator" content="notepad++"/>
        <meta name="robots" content="index, follow">
        <link rel="shortcut icon" type="image/png" href="../../images/favicon.png"/>
        <link href="css/reset.css"   rel="stylesheet"         type="text/css" >
        <title>Alex Dominguez</title>
        <link href="../webroot/css/style.css"  rel="stylesheet"         type="text/css" title="Default style">
    </head>
    <body>
        <div id="logo">
		<a href="../../../"><h1>DAW</h1></a>
	</div>
	<div id="topBar"></div>
	<div id="menu">
		<a href="../../index.html"><h1>DWES</h1></a>
		<a href="../../../proyectoDWEC/index.html" >
			<h1>DWEC</h1>
		</a>
		<a href="../../../proyectoDAW/index.html">
			<h1>DAW</h1>
		</a>
		<a href="../../../proyectoDIW/index.html">
			<h1>DIW</h1>
		</a>
	</div>
        
        <div class="content">

        <h2>HTML Formularios</h2>
        <?php
        if (isset($_POST['enviar'])) {//Código que se ejecuta cuando se envía el formulario
            //Declaración de variables
            $primerNumero = "";
            $segundoNumero = "";
            $suma = "";
            $resta = "";
            $multiplicacion = "";
            $division = "";

            //Recoger los 2 números del $_POST
            $primerNumero = $_POST['primerNumero']; //variable que contiene el primer numero del formulario 
            $segundoNumero = $_POST['segundoNumero']; //variable que contiene el segundo numero del formulario
            $suma = $primerNumero + $segundoNumero; //variable que tiene una operacion. Suma los 2 numeros del formulario
            $resta = $primerNumero - $segundoNumero; //variable que tiene una operacion. resta los 2 numeros del formulario
            $multiplicacion = $primerNumero * $segundoNumero; //variable que tiene una operacion. Multiplica los 2 numeros del formulario
            if ($segundoNumero > 0) {
                $division = $primerNumero / $segundoNumero;
            }

            //Mostramos los datos por pantalla        
            echo $primerNumero . " + " . $segundoNumero . " es " . $suma . "<br>";
            echo $primerNumero . " - " . $segundoNumero . " es " . $resta . "<br>";
            echo $primerNumero . " * " . $segundoNumero . " es " . $multiplicacion . "<br>";
            //En caso de que el segundo numero sea menor o igual a 0
            if ($segundoNumero <= 0) {
                echo "No se puede dividir por 0<br>";
            } else {
                echo $primerNumero . " / " . $segundoNumero . " es " . $division . "<br>";
            }
        } else {//Código que se ejecuta antes de rellenar el formulario
            ?>
            <form name="form21" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <legend>Formulario Ejercicio 22 | Operar sobre el mismo php</legend>
                <div>
                    <label for="exampleNumero1">Primer Numero</label>
                    <input type="number" name="primerNumero" placeholder="Introduzca un numero">                
                </div>
                <div>
                    <label for="exampleNumero1">Segundo Numero</label>
                    <input type="number" name="segundoNumero" placeholder="Introduzca un numero">                
                </div>                    
                <input type="submit" value="Enviar" name="enviar">
            </form>
    <?php
}
?>
   </div>
        <a href="../indexProyectoTema3.html"><div id="atras">
            <img src="../images/atras.png" alt=""/>
        </div></a>
        <a href="../../index.html"><footer>
            <address>
                &copy2019 Alex Dominguez
            </address>
        </footer></a>
    </body>
</html> 
