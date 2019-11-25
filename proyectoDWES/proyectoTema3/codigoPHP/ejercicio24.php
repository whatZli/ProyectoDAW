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
        require '../core/validacionFormularios.php';
        
        define("MAX", PHP_FLOAT_MAX);
        define("MIN", PHP_FLOAT_MIN < 0);
        define("OBLIGATORIO", 1);

        //Declaración de variables
        $primerNumero = 0;
        $segundoNumero = 0;
        $suma = 0;
        $resta = 0;
        $multiplicacion = 0;
        $division = 0;
        $entradaOK = true;
        
        //Declaración del array de errores
        $aErrores = [
            'primerNumero' => null,
            'segundoNumero' => null,
        ];
        
        //Declaración del array de datos del formulario
        $aFormulario = [
            'primerNumero' => null,
            'segundoNumero' => null,
        ];
        
        if (isset($_POST['enviar'])) {//C�digo que se ejecuta cuando se env�a el formulario

            $aErrores['primerNumero'] = validacionFormularios::comprobarFloat($_POST['primerNumero'], MAX, MIN, OBLIGATORIO);
            $aErrores['segundoNumero'] = validacionFormularios::comprobarFloat($_POST['segundoNumero'], MAX, MIN, OBLIGATORIO);
            
            $aFormulario['primerNumero'] = $_POST['primerNumero']; //en el array del formulario guardamos los datos
            $aFormulario['segundoNumero'] = $_POST['segundoNumero']; //en el array del formulario guardamos los datos
            
            
             foreach ($aErrores as $campo => $error) { //recorre el array en busca de mensajes de error
                if ($error != null) { 
                    $entradaOK = false; //cambia la condiccion de la variable
                }
            }
        } else {
            $entradaOK = false; //cambiamos el valor de la variable porque no se ha pulsado el bot�n de enviar
        }
        
            
            
        if ($entradaOK) { //si el valor es true procesamos los datos que hemos recogido    
            $aFormulario['primerNumero'] = $_POST['primerNumero']; //en el array del formulario guardamos los datos
            $aFormulario['segundoNumero'] = $_POST['segundoNumero']; //en el array del formulario guardamos los datos
                        
            $suma = $aFormulario['primerNumero'] + $aFormulario['segundoNumero']; //variable que tiene una operacion. Suma los 2 numeros del formulario
            $resta = $aFormulario['primerNumero'] - $aFormulario['segundoNumero']; //variable que tiene una operacion. resta los 2 numeros del formulario
            $multiplicacion = $aFormulario['primerNumero'] * $aFormulario['segundoNumero']; //variable que tiene una operacion. Multiplica los 2 numeros del formulario
            if ($aFormulario['segundoNumero'] > 0) {
                $division = $aFormulario['primerNumero'] / $aFormulario['segundoNumero'];
            }

            //Mostramos los datos por pantalla        
            echo $aFormulario['primerNumero'] . " + " . $aFormulario['segundoNumero'] . " = " . $suma . "<br>";
            echo $aFormulario['primerNumero'] . " - " . $aFormulario['segundoNumero'] . " = " . $resta . "<br>";
            echo $aFormulario['primerNumero'] . " * " . $aFormulario['segundoNumero'] . " = " . $multiplicacion . "<br>";
            if ($aFormulario['segundoNumero'] <= 0) {
                echo "No se puede dividir por 0 o un numero inferior<br>";
            } else {
                echo $aFormulario['primerNumero'] . " / " . $aFormulario['segundoNumero'] . " es " . $division . "<br>";
            }
        } else {//Código que se ejecuta antes de rellenar el formulario
            ?>
            <form name="form21" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <legend>Formulario Ejercicio 24 | Control de errores manteniendo los datos</legend>
                <br>
                <div>
                    <label for="exampleNumero1">Primer Numero</label>
                    <input  <?php if ($aErrores['primerNumero'] != NULL) { echo "style='border-color: red;'";}?> 
                        type="text" name="primerNumero" 
                        value="<?php echo isset($_POST['primerNumero']) ? $_POST['primerNumero'] : ''?>">
                    
                    <?php if ($aErrores['primerNumero'] != NULL) { 
                       echo $aErrores['primerNumero']; //mensaje de error que tiene el array aErrores 
                    } ?> 
                </div>
                <div>
                    <label for="exampleNumero1">Segundo Numero</label>
                    <input <?php if ($aErrores['segundoNumero'] != NULL) { echo "style='border-color: red;'";}?> 
                        type="text" name="segundoNumero" 
                        value="<?php echo isset($_POST['segundoNumero']) ? $_POST['segundoNumero'] : '' ?>">
                    <?php if ($aErrores['segundoNumero'] != NULL) {
                             echo $aErrores['segundoNumero']; //mensaje de error que tiene el array aErrores  
                     } ?> 
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