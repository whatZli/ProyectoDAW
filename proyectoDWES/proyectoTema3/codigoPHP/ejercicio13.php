<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <meta name="author" content="Alex Dominguez Dominguez"/>
        <meta name="generator" content="notepad++"/>
        <meta name="robots" content="index, follow">
        <link rel="shortcut icon" type="image/png" href="../../images/favicon.png"/>
        <link href="css/reset.css"   rel="stylesheet" type="text/css" >
        <title>Alex Dominguez</title>
        <link href="../webroot/css/style.css"  rel="stylesheet" type="text/css" title="Default style">
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
		<?php
				$archivo = "contador.txt"; 
				$ruta = "../temporal/";
				$archivoRutaCompleta = $ruta . $archivo;
				if (file_exists($ruta)) {//Si existe la carpeta	
					if(file_exists($archivoRutaCompleta)){//Si existe el archivo
						$f = fopen($archivoRutaCompleta, "r"); //abrimos el archivo en modo de lectura
						if($f){
							$contador = fread($f, filesize($archivoRutaCompleta)); //leemos el archivo
							$contador++; //sumamos +1 al contador
							fclose($f);
						}			
						//abrimos el archivo en modo de escritura
						//La opción w+ sobreescribe el fichero
						$f = fopen($archivoRutaCompleta, "w+");
						if($f){
							fwrite($f, $contador);//Escribimos en el fichero lo que contenga $contador
							fclose($f);//Cerramos el fichero
						}
						echo "<h2>Nº de visitas: " . $contador . "</h2>";
					}
					else{//Si no existe el fichero...
						echo "No existe el fichero " . $archivo ."<br><br>";
						echo "Se creará el fichero en la siguiente ruta " . $ruta ."<br><br>";
						//Al abrir en modo w+ si no existe el fichero lo crea
						//El contenido anterior del fichero se borrará
						$f = fopen($archivoRutaCompleta, "w+");
						if($f){
							fwrite($f, 0);
							fclose($f);
						}
						echo "El contador se ha inicializado a 0<br><br>";
						echo "Archivo creado. Recarga la página"; 
					}
				}else{//Si no existe la carpeta...
					echo "No existe el directorio 'temporal/' . Se creará ahora...<br><br><br>";
					if(mkdir($ruta, 0777)){//Creamos la carpeta con el comando mkdir. Le pasamos la ruta, los permisos y
						echo "Directorio creado. Recarga la página"; 
					}
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