<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <meta name="noticias" content="Indice"/>
        <meta name="author" content="Alex Dominguez Dominguez"/>
        <meta name="keywods" content="Indice"/>
        <meta name="generator" content="notepad++"/>
        <meta name="robots" content="index, follow"/>

        <link rel="shortcut icon" type="image/png" href="core/images/favicon.png"/>
        <link href="core/css/style.css"  rel="stylesheet" type="text/css" title="Default style"/> 
        <script src="core/js/reloj.js"></script>

    </head>
    <body onload="reloj()">
        <div id="logo">
            <a><h1>DAW</h1></a>
        </div>
        <div id="topBar"></div>
        <div id="menu">
            <a href="proyectoDWES/index.html">
                <h1>DWES</h1>
            </a>
            <a href="proyectoDWEC/index.html" >
                <h1>DWEC</h1>
            </a>
            <a href="proyectoDAW/index.html">
                <h1>DAW</h1>
            </a>
            <a href="proyectoDIW/index.html">
                <h1>DIW</h1>
            </a>
        </div>

        <div class="content">
            <div class="title">
                <h1>DAW</h1>
                <h2>Desarrollo de Aplicaciones Web</h2>
                <h3>Alex Domínguez Domínguez</h3>
            </div>
            <div class="portada">

                <a href="proyectoDWES/index.html"><table>
                        <tr><td><img src="core/images/php2.png" alt="practica"/></td></tr>

                    </table></a>
                <a href="proyectoDWEC/index.html"><table>
                        <tr><td><img src="core/images/javascript2.png" alt="practica"/></td></tr>

                    </table></a>
                <a href="proyectoDAW/index.html"><table>
                        <tr><td><img src="core/images/apache2.png" alt="practica"/></td></tr>

                    </table></a>
                <a href="proyectoDIW/index.html"><table>
                        <tr><td><img src="core/images/diseño2.png" alt="practica"/></td></tr>

                    </table></a>
            </div>
            <div>
                <p id="hora">

                </p>
            </div>
            <div id="contador">
                <?php 
                $archivo = "contador.txt";
                $ruta = "core/temp/";
                $archivoRutaCompleta = $ruta . $archivo;
                if (file_exists($ruta)) {//Si existe la carpeta	
                    if (file_exists($archivoRutaCompleta)) {//Si existe el archivo
                        $f = fopen($archivoRutaCompleta, "r"); //abrimos el archivo en modo de lectura
                        if ($f) {
                            $contador = fread($f, filesize($archivoRutaCompleta)); //leemos el archivo
                            $contador++; //sumamos +1 al contador
                            fclose($f);
                        }
                        
                        //abrimos el archivo en modo de escritura
                        //La opción w+ sobreescribe el fichero
                        $f = fopen($archivoRutaCompleta, "w+");
                        if ($f) {
                            fwrite($f, $contador); //Escribimos en el fichero lo que contenga $contador
                            fclose($f); //Cerramos el fichero
                        }
                        echo "<h4>Nº de visitas: " . $contador . "</h4>";
                    } else {//Si no existe el fichero...
                        echo "No existe el fichero " . $archivo . "<br>";
                        echo "Se creará el fichero en la siguiente ruta " . $ruta . "<br>";
                        //Al abrir en modo w+ si no existe el fichero lo crea
                        //El contenido anterior del fichero se borrará
                        $f = fopen($archivoRutaCompleta, "w+");
                        if ($f) {
                            fwrite($f, 0);
                            fclose($f);
                        }
                        chmod($archivoRutaCompleta,01777);
                        echo "El contador se ha inicializado a 0<br>";
                        echo "Archivo creado. Recarga la página";
                    }
                } else {//Si no existe la carpeta...
                    echo "No existe el directorio 'temporal/' . Se creará ahora...<br>";
                    if (mkdir($ruta, 0755)) {//Creamos la carpeta con el comando mkdir. Le pasamos la ruta, los permisos y
                        echo "Directorio creado. Recarga la página";
                    }
                }
                ?>
            </div>

        </div>
        <footer>
            <address>
                &copy2019 Alex Dominguez
            </address>
        </footer>
    </body>
</html>