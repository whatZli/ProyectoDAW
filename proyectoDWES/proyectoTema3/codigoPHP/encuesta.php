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
            require '../core/validacionFormulariosMateo.php';
            
            define("MIN_TEXT", 0);
            define("MAX_TEXT", 50);
            define("OBLIGATORIO", 1);

            //Declaración de variables
            $entradaOK = true;

            //Declaración del array de errores
            $aErrores = [
                'tName' => null,
                'dBirthday' => null,
                'rbFelling' => null,
                'nTelefono' => null,
                'nValoracionCurso'=> null,
                'lVacaciones' => null,
                'textArea' => null,
            ];

            //Declaración del array de datos del formulario
            $aFormulario = [
                'tName' => null,
                'dBirthday' => null,
                'rbFelling' => null,
                'nTelefono' => null,
                'nValoracionCurso'=> null,
                'lVacaciones' => null,
                'textArea' => null,
            ];

            if (isset($_POST['enviar'])) {//Código que se ejecuta cuando se env�a el formulario
                $aErrores['tName'] = validacionFormularios::comprobarAlfabetico($_POST['tName'],MAX_TEXT,MIN_TEXT,1);
                $aErrores['dBirthday'] = validacionFormularios::validarFecha($_POST['dBirthday'],"2999-12-12", "1900-01-01", 1);
                if(!isset($_POST['rbFelling'])){$aErrores['rbFelling'] = "Debe marcarse un valor";}//Si no se ha marcado ning�n valor en el radio button...
                $aErrores['nTelefono'] = validacionFormularios::validaTelefono($_POST['nTelefono'],0);
                $aErrores['nValoracionCurso'] = validacionFormularios::comprobarEntero($_POST['nValoracionCurso'],10,1,1);
                $aErrores['lVacaciones'] = validacionFormularios::validarElementoEnLista($_POST['lVacaciones'], array("ni idea", "con la familia", "trabajando", "de fiesta")); // opciones
                $aErrores['textArea'] = validacionFormularios::comprobarAlfaNumerico($_POST['textArea'], 255, 1, 1); //maximo, m�nimo y opcionalidad
                
                $aFormulario['tName'] = $_POST['tName']; //en el array del formulario guardamos los datos
                $aFormulario['dBirthday'] = $_POST['dBirthday']; //en el array del formulario guardamos los datos
                $aFormulario['nTelefono'] = $_POST['nTelefono']; //en el array del formulario guardamos los datos
                $aFormulario['nValoracionCurso'] = $_POST['nValoracionCurso']; //en el array del formulario guardamos los datos
                $aFormulario['lVacaciones'] = $_POST['lVacaciones']; //en el array del formulario guardamos los datos
                $aFormulario['textArea'] = $_POST['textArea']; //en el array del formulario guardamos los datos
                
                foreach ($aErrores as $campo => $error) { //recorre el array en busca de mensajes de error
                    if ($error != null) {
                        $entradaOK = false; //cambia la condiccion de la variable
                    }
                }
            } else {
                $entradaOK = false; //cambiamos el valor de la variable porque no se ha pulsado el bot�n de enviar
            }



            if ($entradaOK) { //si el valor es true procesamos los datos que hemos recogido    
                date_default_timezone_set("Europe/Madrid"); //seleccionamos la zona horaria de Portugal
                setlocale(LC_ALL,"es_ES" );
                $aDias = array("Domingo","Lunes","Martes","Mi&eacute;rcoles","Jueves","Viernes","S&aacute;bado");
                $aMeses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                
                $datetime1 = new DateTime(date("Y-m-d"));
                $datetime2 = new DateTime($aFormulario['dBirthday']);
                $interval = $datetime1->diff($datetime2);
                
                
                echo '<h1>INFORME DE SATISFACCIÓN PERSONAL</h1><br>';
                echo 'Hoy '.date("l").' '.date("d").' de '.date("F").' de '.date("Y").' a las '. date("h:i:s").'<br>';
                echo "Don " . $aFormulario['tName'] . " nacido hace ". $interval->format('%y ') ."  se siente ".$_POST['rbFelling']."<br>";
                if(isset($aFormulario['nTelefono'])){
                    echo 'Con número de teléfono: '.$aFormulario['nTelefono'].'<br>';
                }
                echo 'Valora su curso actual con un '.$aFormulario['nValoracionCurso'].' sobre 10<br>';
                echo 'Estas navidades las dedicará: '.$aFormulario['lVacaciones'].'<br>';
                echo 'Y además opina que: '.$aFormulario['textArea'];
                
            } else {//Código que se ejecuta antes de rellenar el formulario
                ?>
                <h3>Ejercicio 27 | Encuesta de satisfacción personal para 1 persona</h3>
                <form name="form21" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" style="">
                    <fieldset>
                        <legend>Encuesta de satisfacción personal ☺</legend>
                        <div class="obligatorio">
                            Nombre y apellidos: 
                            <input type="text" name="tName" placeholder="Nombre y apellidos" value="<?php if($aErrores['tName'] == NULL && isset($_POST['tName'])){ echo $_POST['tName'];} ?>"> <!--//Si el valor es bueno, lo escribe en el campo-->
                            <?php if ($aErrores['tName'] != NULL) { ?>
                            <div class="error">
                                <?php echo $aErrores['tName']; //Mensaje de error que tiene el array aErrores   ?>
                            </div>   
                            <?php } ?>                
                        </div>
                        <div class="obligatorio">
                            Fecha: 
                            <input type="date" name="dBirthday" value="<?php if($aErrores['dBirthday'] == NULL && isset($_POST['dBirthday'])){ echo $_POST['dBirthday'];} ?>"> <!--//Si el valor es bueno, lo escribe en el campo-->
                            <?php if ($aErrores['dBirthday'] != NULL) { ?>
                            <div class="error">
                                <?php echo $aErrores['dBirthday']; //Mensaje de error que tiene el array aErrores   ?>
                            </div>   
                            <?php } ?>                
                        </div>
                        <div>
                            ¿Cómo te sientes hoy? 
                            <?php if ($aErrores['rbFelling'] != NULL) { ?>
                            <div class="error">
                                <?php echo $aErrores['rbFelling']; //Mensaje de error que tiene el array aErrores   ?>
                            </div>   
                            <?php } ?>  
                            <br/>
                            <input type="radio" id="RO1" name="rbFelling" value="muy mal" <?php if(isset($_POST['rbFelling']) && $_POST['rbFelling'] == "muy mal"){ echo 'checked';} ?>> <!--//Recuerda la selecci�n-->
                                <label for="RO1">Muy mal</label><br/>
                            <input type="radio" id="RO2" name="rbFelling" value="mal" <?php if(isset($_POST['rbFelling']) && $_POST['rbFelling'] == "mal"){ echo 'checked';} ?>> <!--//Recuerda la selecci�n-->
                                <label for="RO2">Mal</label><br/>
                            <input type="radio" id="RO3" name="rbFelling" value="regular" <?php if(isset($_POST['rbFelling']) && $_POST['rbFelling'] == "regular"){ echo 'checked';} ?>> <!--//Recuerda la selecci�n-->
                                <label for="RO3">Regular</label><br/>
                            <input type="radio" id="RO4" name="rbFelling" value="bien" <?php if(isset($_POST['rbFelling']) && $_POST['rbFelling'] == "bien"){ echo 'checked';} ?>> <!--//Recuerda la selecci�n-->
                                <label for="RO4">Bien</label><br/>
                            <input type="radio" id="RO5" name="rbFelling" value="muy bien" <?php if(isset($_POST['rbFelling']) && $_POST['rbFelling'] == "muy bien"){ echo 'checked';} ?>> <!--//Recuerda la selecci�n-->
                                <label for="RO5">Muy bien</label>            
                        </div>
                        <div>
                            <label for="Number">Nº Telefono</label>
                            <input type="tel" name="nTelefono" placeholder="654987321" value="<?php if($aErrores['nTelefono'] == NULL && isset($_POST['nTelefono'])){ echo $_POST['nTelefono'];} ?>"> <!--//Si el valor es bueno, lo escribe en el campo-->
                            <?php if ($aErrores['nTelefono'] != NULL) { ?>
                            <div class="error">
                                <?php echo $aErrores['nTelefono']; //Mensaje de error que tiene el array aErrores   ?>
                            </div>   
                            <?php } ?>
                        </div>
                        <div>
                            <label for="Number">¿Cómo va el curso?</label>
                            <input type="number" name="nValoracionCurso" placeholder="" value="<?php if($aErrores['nValoracionCurso'] == NULL && isset($_POST['nValoracionCurso'])){ echo $_POST['nValoracionCurso'];} ?>"> <!--//Si el valor es bueno, lo escribe en el campo-->
                            <?php if ($aErrores['nValoracionCurso'] != NULL) { ?>
                            <div class="error">
                                <?php echo $aErrores['nValoracionCurso']; //Mensaje de error que tiene el array aErrores   ?>
                            </div>   
                            <?php } ?>
                        </div>
                        <div class="obligatorio">
                            ¿Cómo se presenta las vacaciones de navidad
                            <select name="lVacaciones">
                            <option value="ni idea" <?php if(isset($_POST['lVacaciones'])){if($aErrores['lVacaciones'] == NULL && $_POST['lVacaciones'] == "ni idea"){ echo "selected";}} ?>>ni idea</option>
                            <option value="con la familia" <?php if(isset($_POST['lVacaciones'])){if($aErrores['lVacaciones'] == NULL && $_POST['lVacaciones'] == "con la familia"){ echo "selected";}} ?>>con la familia</option>
                            <option value="trabajando" <?php if(isset($_POST['lVacaciones'])){if($aErrores['lVacaciones'] == NULL && $_POST['lVacaciones'] == "trabajando"){ echo "selected";}} ?>>trabajando</option>
                            <option value="de fiesta" <?php if(isset($_POST['lVacaciones'])){if($aErrores['lVacaciones'] == NULL && $_POST['lVacaciones'] == "de fiesta"){ echo "selected";}} ?>>de fiesta</option>
                            </select>
                            <?php if ($aErrores['lVacaciones'] != NULL) { ?>
                            <div class="error">
                                <?php echo $aErrores['lVacaciones']; //Mensaje de error que tiene el array aErrores   ?>
                            </div>   
                            <?php } ?>                             
                        </div>
                        <div class="obligatorio">
                            Describe brevemente el estado de ánimo : 
                            <textarea name="textArea" placeholder="Describe brevemente el estado de ánimo "><?php if($aErrores['textArea'] == NULL && isset($_POST['textArea'])){ echo trim($_POST['textArea']);}?></textarea> <!--//Si el valor es bueno, lo escribe en el campo-->
                            <?php if ($aErrores['textArea'] != NULL) { ?>
                            <div class="error">
                                <?php echo $aErrores['textArea']; //Mensaje de error que tiene el array aErrores   ?>
                            </div>   
                            <?php } ?>                
                        </div>
                        <br>
                        <input type="submit" value="Enviar" name="enviar" style="width:290px; padding: 3px; margin-bottom: 10px;">
                    </fieldset>
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