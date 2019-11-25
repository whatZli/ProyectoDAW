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
            
            define("MIN_TEXT", 0);
            define("MAX_TEXT", 50);
            define("OBLIGATORIO", 1);

            //Declaración de variables
            $entradaOK = true;

            //Declaración del array de errores
            $aErrores = [
                'firstname' => null,
                'firstnameOpc' => null,
                'lastname' => null,
                'lastnameOpc' => null,
                'bday' => null,
                'bdayOpc' => null,
                'opcionRadio' => null,
                'email' => null,
                'psw' => null,
                'opcionTel' => null,
            ];

            //Declaración del array de datos del formulario
            $aFormulario = [
                'firstname' => null,
                'firstnameOpc' => null,
                'lastname' => null,
                'lastnameOpc' => null,
                'bday' => null,
                'bdayOpc' => null,
                'email' => null,
                'psw' => null,
                'opcionRadio' => null,
                'opcionTel' => null,
            ];

            if (isset($_POST['enviar'])) {//Código que se ejecuta cuando se env�a el formulario
                $aErrores['firstname'] = validacionFormularios::comprobarAlfabetico($_POST['firstname'],MAX_TEXT,MIN_TEXT,1);
                $aErrores['firstnameOpc'] = validacionFormularios::comprobarAlfabetico($_POST['firstnameOpc'],MAX_TEXT,MIN_TEXT,0);
                $aErrores['lastname'] = validacionFormularios::comprobarAlfaNumerico($_POST['lastname'],MAX_TEXT,MIN_TEXT,1);
                $aErrores['lastnameOpc'] = validacionFormularios::comprobarAlfaNumerico($_POST['lastnameOpc'],MAX_TEXT,MIN_TEXT,0);
                $aErrores['bday'] = validacionFormularios::validarFecha($_POST['bday'],1);
                $aErrores['bdayOpc'] = validacionFormularios::validarFecha($_POST['bdayOpc'],0);
                $aErrores['email'] = validacionFormularios::validarEmail($_POST['email'],50,4,1);
                $aErrores['opcionTel'] = validacionFormularios::validaTelefono($_POST['opcionTel'],0);
                $aErrores['psw'] = validacionFormularios::validarPassword($_POST['psw'],1,4);
                
                $aFormulario['firstname'] = $_POST['firstname']; //en el array del formulario guardamos los datos
                $aFormulario['firstnameOpc'] = $_POST['firstnameOpc']; //en el array del formulario guardamos los datos
                $aFormulario['lastname'] = $_POST['lastname']; //en el array del formulario guardamos los datos
                $aFormulario['lastnameOpc'] = $_POST['lastnameOpc']; //en el array del formulario guardamos los datos
                $aFormulario['bday'] = $_POST['bday']; //en el array del formulario guardamos los datos
                $aFormulario['bdayOpc'] = $_POST['bdayOpc']; //en el array del formulario guardamos los datos
                $aFormulario['opcionTel'] = $_POST['opcionTel']; //en el array del formulario guardamos los datos
                $aFormulario['email'] = $_POST['email']; //en el array del formulario guardamos los datos
                $aFormulario['psw'] = $_POST['psw']; //en el array del formulario guardamos los datos
                
                foreach ($aErrores as $campo => $error) { //recorre el array en busca de mensajes de error
                    if ($error != null) {
                        $entradaOK = false; //cambia la condiccion de la variable
                    }
                }
            } else {
                $entradaOK = false; //cambiamos el valor de la variable porque no se ha pulsado el bot�n de enviar
            }



            if ($entradaOK) { //si el valor es true procesamos los datos que hemos recogido    
                echo "EntradaOK <br>"; //en el array del formulario guardamos los datos
                echo "<br>El campo `firstname` obligatorio contiene: " . $_POST['firstname'];
                echo "<br>El campo `firstnameOpc` opcional contiene: " . $_POST['firstnameOpc'];
                echo "<br>El campo `lastname` obligatorio contiene: " . $_POST['lastname'];
                echo "<br>El campo `bday` obligatorio contiene: " . $_POST['bday'];
                echo "<br>El campo `opcionRadio` obligatorio contiene: " . $_POST['opcionRadio'];
                echo "<br>El campo `opcionTel` NO obligatorio contiene: " . $_POST['opcionTel'];
                echo "<br>El campo `email` obligatorio contiene: " . $_POST['email'];
                echo "<br>El campo `psw` obligatorio contiene: " . $_POST['psw'];
            } else {//Código que se ejecuta antes de rellenar el formulario
                ?>
                <h3>Ejercicio 25 | Prueba de diferentes tipos de entrada en formularios</h3>
                <form name="form21" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" style="">
                    <fieldset>
                        <legend>Formulario de registro</legend>
                        <div>
                            <label for="Text">Alfabetico</label>
                            <input type="text" name="firstname" placeholder="Nombre" style="background-color: #FDD" value="<?php if(!$aErrores['firstname']){echo $aFormulario['firstname'];} ?>"/>
                            <?php if ($aErrores['firstname'] != NULL) { 
                                
                                echo $aErrores['firstname']; //mensaje de error que tiene el array aErrores 
                             }?> 
                        </div>
                        <div>
                            <label for="Text">Alfabetico Opcional</label>
                            <input type="text" name="firstnameOpc" placeholder="Nombre" value="<?php if(!$aErrores['firstnameOpc']){echo $aFormulario['firstnameOpc'];} ?>"/>
                            <?php if ($aErrores['firstnameOpc'] != NULL) { 
                                echo $aErrores['firstnameOpc']; //mensaje de error que tiene el array aErrores 
                             }?> 
                        </div>
                        <div>
                            <label for="Text">Alfanumérico
                                
                            </label>
                            <input type="text" name="lastname" placeholder="Apellido" style="background-color: #FDD" value="<?php if(!$aErrores['lastname']){echo $aFormulario['lastname'];} ?>">
                            <?php if ($aErrores['lastname'] != NULL) { 
                                echo $aErrores['lastname']; //mensaje de error que tiene el array aErrores 
                             } ?>
                        </div>
                        <div>
                            <label for="Text">Alfanumérico Opcional</label>
                            <input type="text" name="lastnameOpc" placeholder="Apellido" value="<?php if(!$aErrores['lastnameOpc']){echo $aFormulario['lastnameOpc'];} ?>">
                            <?php if ($aErrores['lastnameOpc'] != NULL) { 
                                echo $aErrores['lastnameOpc']; //mensaje de error que tiene el array aErrores 
                             } ?>
                        </div>
                        <div>
                            <label for="Date">Fecha 
                                
                            </label>
                            <input type="date" name="bday" style="background-color: #FDD" value="">
                            <?php if ($aErrores['bday'] != NULL) { 
                                echo $aErrores['bday']; //mensaje de error que tiene el array aErrores 
                             } ?>
                        </div>
                        <div>
                            <label for="Date">Fecha Opcional
                                
                            </label>
                            <input type="date" name="bdayOpc" value="">
                            <?php if ($aErrores['bdayOpc'] != NULL) { 
                                echo $aErrores['bdayOpc']; //mensaje de error que tiene el array aErrores 
                             } ?>
                        </div>
                        <div>
                            <label for="Genero">Radio Obligatorio
                               
                            </label><br>
                            <input type="radio" name="opcionRadio" value="opcion1" <?php if(is_null($aFormulario['opcionRadio'])){echo "checked";}?>> Opcion1
                            <input type="radio" name="opcionRadio" value="opcion2" > Opcion2
                            <input type="radio" name="opcionRadio" value="opcion3" > Opcion3
                        </div>
                        <div>
                            <label for="Number">Nº Telefono</label>
                            <input type="tel" name="opcionTel" placeholder="654987321" value="<?php if(!$aErrores['opcionTel']){echo $aFormulario['opcionTel'];} ?>">
                            <?php if ($aErrores['opcionTel'] != NULL) { 
                                echo $aErrores['opcionTel']; //mensaje de error que tiene el array aErrores 
                             } ?>
                        </div>
                        <div>
                            <label for="Email">Email
                               
                            </label>
                            <input type="email" name="email" placeholder="prueba@prueba.com" style="background-color: #FDD" value="<?php if(!$aErrores['email']){echo $aFormulario['email'];} ?>">
                            <?php if ($aErrores['email'] != NULL) { 
                                echo $aErrores['email']; //mensaje de error que tiene el array aErrores 
                             } ?>
                        </div>
                        <div>
                            <label for="Password">Contraseña
                                
                            </label>
                            <input type='password' name='psw' style='background-color: #FDD' value="<?php if(!$aErrores['psw']){echo $aFormulario['psw'];} ?>"><br>
                            <?php if ($aErrores['psw'] != NULL) { 
                                
                                echo $aErrores['psw']; //mensaje de error que tiene el array aErrores 
                             } ?>
                        </div>            
                        <div>
                            <label for="File">Subir documento</label>
                            <input type="file" name="myFile">
                        </div>
                        <br>
                        <input type="submit" value="Enviar" name="enviar" style="width:190px; margin-bottom: 10px;">
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