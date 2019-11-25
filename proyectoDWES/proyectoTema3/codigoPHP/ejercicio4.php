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
        /**
          @author: Alex Dominguez basado en el de Victor
          @since: 10/10/2019
          Comentarios:  Mostrar en tu página index la fecha y hora actual en Oporto formateada en portugues
         */
        date_default_timezone_set("Europe/Lisbon"); //seleccionamos la zona horaria de Portugal
        setlocale(LC_TIME, 'pt_PT.UTF-8'); //seleccionamos la zona horaria

        echo "<br>Fecha Oporto: " . strftime("%A %d de %B del %Y"); //formateamos la salidad
        echo "<br>Hora Oporto: " . date('h:i:s a', time()) . "<br>"; //formateamos la salida
        
        /**        
        %A muestra el dia de la semana
        %d muestra el dia del mes en digito
        %B muestra el nombre del mes completo
        %Y muestra el año representado por 4 digitos
        %R muestra la hora        
        */    
        
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