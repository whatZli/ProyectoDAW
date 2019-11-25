<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <meta name="author" content="Alex Dominguez Dominguez"/>
        <meta name="generator" content="notepad++"/>
        <meta name="robots" content="index, follow">
        <link rel="shortcut icon" type="image/png" href="../../../core/images/favicon.png"/>
        <link href="css/reset.css"   rel="stylesheet"         type="text/css" >
        <title>Alex Dominguez</title>
        <link href="../webroot/css/style.css"  rel="stylesheet"         type="text/css" title="Default style">
        <script>

        </script>
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

        <div class="content" style=" ">


            <?php
            require '../core/validacionFormulariosAlexDominguez.php';
            define("NUM_FORMULARIOS", 1); //Numero de formularios
            //Declaración de variables
            $entradaOK = true;

            //Declaración del array de errores
            for ($i = 1; $i <= NUM_FORMULARIOS; $i++) {
                $aErrores[$i]['tName' . $i] = null;
                $aErrores[$i]['altura' . $i] = null;
                $aErrores[$i]['fechaNac' . $i] = null;
                $aErrores[$i]['valoracion' . $i] = null;
                $aErrores[$i]['color' . $i] = null;
                $aErrores[$i]['telefono' . $i] = null;
                $aErrores[$i]['email' . $i] = null;
            }
            //Declaración del array de datos del formulario
            for ($i = 1; $i <= NUM_FORMULARIOS; $i++) {
                $aFormulario[$i]['tName' . $i] = null;
                $aFormulario[$i]['altura' . $i] = null;
                $aFormulario[$i]['fechaNac' . $i] = null;
                $aFormulario[$i]['valoracion' . $i] = null;
                $aFormulario[$i]['color' . $i] = null;
                $aFormulario[$i]['telefono' . $i] = null;
                $aFormulario[$i]['email' . $i] = null;
            }
            if (isset($_POST['enviar'])) {//Código que se ejecuta cuando se env�a el formulario
                for ($i = 1; $i <= NUM_FORMULARIOS; $i++) {
                    $aErrores[$i]['tName' . $i] = validacionFormularios::comprobarAlfabetico($_POST['tName' . $i], 50, 1, 1);
                    $aErrores[$i]['altura' . $i] = validacionFormularios::comprobarFloat($_POST['altura' . $i], 3, 0, 1);
                    $aErrores[$i]['fechaNac' . $i] = validacionFormularios::validarFecha($_POST['fechaNac' . $i], "now", "1900-01-01", 1);
                    $aErrores[$i]['valoracion' . $i] = validacionFormularios::comprobarEntero($_POST['valoracion' . $i], 10, 0, 1);
                    $aErrores[$i]['color' . $i] = validacionFormularios::validarColor($_POST['color' . $i], 1);
                    $aErrores[$i]['email' . $i] = validacionFormularios::validarEmail($_POST['email' . $i], 0);
                }
                foreach ($aErrores as $campo) { //recorre el array en busca de mensajes de error
                    foreach ($campo as $error) {
                        if ($error != null) {
                            $entradaOK = false; //cambia la condiccion de la variable
                        }
                    }
                }
            } else {
                $entradaOK = false; //cambiamos el valor de la variable porque no se ha pulsado el bot�n de enviar
            }

            if ($entradaOK) { //si el valor es true procesamos los datos que hemos recogido   
                for ($i = 1; $i <= NUM_FORMULARIOS; $i++) {
                    $aFormulario[$i]['tName' . $i] = $_POST['tName' . $i]; //en el array del formulario guardamos los datos
                    $aFormulario[$i]['altura' . $i] = $_POST['altura' . $i]; //en el array del formulario guardamos los datos
                    $aFormulario[$i]['fechaNac' . $i] = $_POST['fechaNac' . $i]; //en el array del formulario guardamos los datos
                    $aFormulario[$i]['valoracion' . $i] = $_POST['valoracion' . $i]; //en el array del formulario guardamos los datos
                    $aFormulario[$i]['color' . $i] = $_POST['color' . $i]; //en el array del formulario guardamos los datos
                    $aFormulario[$i]['telefono' . $i] = $_POST['telefono' . $i]; //en el array del formulario guardamos los datos
                    $aFormulario[$i]['email' . $i] = $_POST['email' . $i]; //en el array del formulario guardamos los datos
                }
                //------------------------------TABLA 1 -----------------------------------
                echo '<h2>Encuesta para ' . NUM_FORMULARIOS . ' personas </h2>';
                echo '<table id="encuesta" style="text-align:center;margin-top:20px;margin-bottom:40px;">';
                echo '<caption>INFORME SOBRE LA ENCUESTA</caption>';
                echo '<tr>';
                echo '<th>ID</th>';
                echo '<th>Nombre</th>';
                echo '<th>Fecha Nacimiento</th>';
                echo '<th>Altura</th>';
                echo '<th>Estado de satisfación</th>';
                echo '<th>Color preferido</th>';
                echo '<th>Teléfono</th>';
                echo '<th>Email</th>';
                echo '</tr>';

                for ($i = 1; $i <= NUM_FORMULARIOS; $i++) {
                    echo '<tr>';
                    echo '<td>' . $i . '</td>';
                    echo '<td>' . $aFormulario[$i]['tName' . $i] . '</td>';
                    echo '<td>' . $aFormulario[$i]['fechaNac' . $i] . '</td>';
                    echo '<td>' . $aFormulario[$i]['altura' . $i] . '</td>';
                    echo '<td>' . $aFormulario[$i]['valoracion' . $i] . '/10</td>';
                    echo '<td style="background-color:' . $aFormulario[$i]['color' . $i] . '"></td>';
                    echo '<td>' . $aFormulario[$i]['telefono' . $i] . '</td>';
                    echo '<td>' . $aFormulario[$i]['email' . $i] . '</td>';
                    echo '</tr>';
                }
                echo '</table>';

                //--------------------------------GUARDAR LOS DATOS---------------------------------
                //Formato del archivo
                //Primera línea indicará el número de registros que contiene
                //Las demás líneas contendrán cada una un registro con todos los datos completos
                $archivo = "datosEncuesta.txt";
                $ruta = "encuesta/";
                $archivoRutaCompleta = $ruta . $archivo;
                
                if (file_exists($ruta)) {//Si existe la carpeta	
                    if (file_exists($archivoRutaCompleta)) {//Si existe el archivo
                        $file = fopen($archivoRutaCompleta, "r");
                        //Output a line of the file until the end is reached
                        $cont=0;
                        while(!feof($file)){
                            $aLinea[$cont]="ID ".$cont ." " .fgetss($file). "<br />";
                            $cont++;
                        }
                        fclose($file);

                        $fileM = fopen($archivoRutaCompleta, "a");
                        for($i=0;$i<3;$i++){
                            echo 'Línea añadida';
                            fwrite($fileM, "Añadimos línea 1" . PHP_EOL);
                        }
                        fclose($fileM);
                    } else {//Si no existe el fichero...
                        echo "No existe el fichero " . $archivo . "<br><br>";
                        echo "Se creará el fichero en la siguiente ruta " . $ruta . "<br><br>";
                        //Al abrir en modo w+ si no existe el fichero lo crea
                        //El contenido anterior del fichero se borrará
                        $f = fopen($archivoRutaCompleta, "w+");
                        if ($f) {
                            fwrite($f, 0);
                            fclose($f);
                        }
                        echo "El contador se ha inicializado a 0<br><br>";
                        echo "Archivo creado. Recarga la página";
                    }
                } else {//Si no existe la carpeta...
                    echo "No existe el directorio 'temporal/' . Se creará ahora...<br><br><br>";
                    if (mkdir($ruta, 0777)) {//Creamos la carpeta con el comando mkdir. Le pasamos la ruta, los permisos y
                        echo "Directorio creado. Recarga la página";
                    }
                }

                echo '</table>';
            } else {//Código que se ejecuta antes de rellenar el formulario
                ?>
                <h2>HTML Formularios</h2>
                <h3>Ejercicio 27 | Encuesta para <?php echo NUM_FORMULARIOS; ?> personas</h3>
                <form name="form1" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" style="text-align: center;">
    <?php for ($i = 1; $i <= NUM_FORMULARIOS; $i++) { ?>
                        <fieldset style="display: inline-block;width:31%;
                        <?php
                        if (isset($_POST['enviar'])) {//Si se ha enviado el formulario
                            if ($aErrores[$i]['tName' . $i] != null || $aErrores[$i]['altura' . $i] != null || $aErrores[$i]['fechaNac' . $i] != null) {//Si uno de los campos nombre o altura está mal...
                                echo 'background-color:#ffe6e6;';
                            }//Fondo de color rojo
                            else {
                                echo 'background-color:#ccffcc;';
                            } //Fondo de color verde
                        }
                        ?>">
                            <legend>Encuesta <?php echo $i; ?> ☺</legend>
                            <div class="obligatorio">
                                Nombre: 
                                <input type="text" name="<?php echo 'tName' . $i; ?>" placeholder="Nombre" value="<?php
                                if ($aErrores[$i]['tName' . $i] == NULL && isset($_POST['tName' . $i])) {
                                    echo $_POST['tName' . $i];
                                }
                                ?>"> <!--//Si el valor es bueno, lo escribe en el campo-->
                                    <?php if ($aErrores[$i]['tName' . $i] != NULL) { ?>
                                    <div class="error">
                                    <?php echo $aErrores[$i]['tName' . $i]; //Mensaje de error que tiene el array aErrores     ?>
                                    </div>   
        <?php } ?>                
                            </div>
                            <div class="obligatorio">
                                Fecha nacimiento: 
                                <input type="date" name="<?php echo 'fechaNac' . $i; ?>" placeholder="dd-mm-aaaa" value="<?php if ($aErrores[$i]['fechaNac' . $i] == NULL && isset($_POST['fechaNac' . $i])) {
                            echo $_POST['fechaNac' . $i];
                        } ?>"><br> <!--//Si el valor es bueno, lo escribe en el campo-->
                                <?php if ($aErrores[$i]['fechaNac' . $i] != NULL) { ?>
                                    <div class="error">
            <?php echo $aErrores[$i]['fechaNac' . $i]; //Mensaje de error que tiene el array aErrores    ?>
                                    </div>   
        <?php } ?>                
                            </div>                            
                            <div class="obligatorio">
                                Altura:
                                <input type="text" name="<?php echo 'altura' . $i; ?>" placeholder="0-3" value="<?php
                                       if ($aErrores[$i]['altura' . $i] == NULL && isset($_POST['altura' . $i])) {
                                           echo $_POST['altura' . $i];
                                       }
                                       ?>"> <!--//Si el valor es bueno, lo escribe en el campo-->
                                <?php if ($aErrores[$i]['altura' . $i] != NULL) { ?>
                                    <div class="error">
            <?php echo $aErrores[$i]['altura' . $i]; //Mensaje de error que tiene el array aErrores     ?>
                                    </div>   
        <?php } ?>     
                            </div>
                            <div class="obligatorio">
                                Estado de satisfación 0-10: 
                                <input type="range" min="0" max="10" name="<?php echo 'valoracion' . $i; ?>" value="<?php
                                       if ($aErrores[$i]['valoracion' . $i] == NULL && isset($_POST['valoracion' . $i])) {
                                           echo $_POST['valoracion' . $i];
                                       }
                                       ?>"> <!--//Si el valor es bueno, lo escribe en el campo-->
                                <?php if ($aErrores[$i]['valoracion' . $i] != NULL) { ?>
                                    <div class="error">
            <?php echo $aErrores[$i]['valoracion' . $i]; //Mensaje de error que tiene el array aErrores     ?>
                                    </div>   
        <?php } ?>     
                            </div>
                            <div>
                                Color preferido:
                                <input type="color" value="<?php
                                if (isset($_POST['enviar'])) {
                                    if ($aErrores[$i]['color' . $i] == NULL && isset($_POST['color' . $i])) {
                                        echo $_POST['color' . $i];
                                    }
                                } else {
                                    echo "#3B5998";
                                }
                                ?>" name="<?php echo 'color' . $i; ?>">
                                <?php if ($aErrores[$i]['color' . $i] != NULL) { ?>
                                    <div class="error">
            <?php echo $aErrores[$i]['color' . $i]; //Mensaje de error que tiene el array aErrores     ?>
                                    </div>   
                                <?php } ?>
                            </div>
                            <div>
                                Nº Teléfono
                                <input type="tel" name="<?php echo 'telefono' . $i; ?>" placeholder="xxxxxxxxx" pattern="[0-9]{9}" value="<?php
                                if ($aErrores[$i]['telefono' . $i] == NULL && isset($_POST['telefono' . $i])) {
                                    echo $_POST['telefono' . $i];
                                }
                                ?>">
                            </div>
                            <div class="obligatorio">
                                Email: 
                                <input type="text" name="<?php echo 'email' . $i; ?>" placeholder="asdfg@gmail.com" value="<?php if ($aErrores[$i]['email' . $i] == NULL && isset($_POST['email' . $i])) {
                            echo $_POST['email' . $i];
                        } ?>"><br> <!--//Si el valor es bueno, lo escribe en el campo-->
                        <?php if ($aErrores[$i]['email' . $i] != NULL) { ?>
                                    <div class="error">
            <?php echo $aErrores[$i]['email' . $i]; //Mensaje de error que tiene el array aErrores    ?>
                                    </div>   
        <?php } ?>                
                            </div>
                            <br>
                        </fieldset>
                <?php } ?>
                    <div>
                        <input type="submit" value="Enviar" name="enviar" style="width:290px; padding: 3px; margin-bottom: 10px; ">
                    </div>
                </form>
    <?php
}
?>
        </div>
        <a href="../indexProyectoTema3.html">
            <div id="atras">
                <img src="../images/atras.png" alt=""/>
            </div>
        </a>
        <a href="../../../">
            <footer>
                <address>
                    &copy2019 Alex Dominguez
                </address>
            </footer>
        </a>
    </body>
</html> 