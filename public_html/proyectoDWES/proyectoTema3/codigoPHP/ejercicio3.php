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
        <h1>Fecha y hora en España en diferentes formatos (utilizando strftime)</h1>
        <?php
        /**
          @author: Alex Dominguez basado en el de Victor
          @since: 10/10/2019
          Comentarios:  Mostrar en tu página index la fecha y hora actual formateada en castellano
         */
        date_default_timezone_set("Europe/Madrid"); //seleccionamos la zona horaria de Portugal
        setlocale(LC_TIME, 'pt_PT.UTF-8'); //seleccionamos la zona horaria

        echo "<br>Fecha España: " . strftime("%A %d de %B del %Y"); //formateamos la salidad
        echo "<br>Hora España " . date('h:i:s a', time()) . "<br>"; //formateamos la salida
        
        /**        
        %A muestra el dia de la semana
        %d muestra el dia del mes en digito
        %B muestra el nombre del mes completo
        %Y muestra el año representado por 4 digitos
        %R muestra la hora        
        */    
        
        echo '<h2>Formato dia</h2>';
        echo '<br>Representación textual del dia con %a -> ' . strftime("%a");
        echo '<br>Representación completa del dia con %A -> ' . strftime("%A");
        echo '<br>Dos dígitos del dia del mes con ceros con %d -> ' . strftime("%d");
        echo '<br>Dia del mes sin ceros con %e ->' . strftime("%e");
        echo '<br>Día del año con 3 dígitos con %j -> ' . strftime("%j");
        echo '<br>Número del día en la semana con %w -> ' . strftime("%w");
        echo '<br>Número de semana del año %U -> ' . strftime("%U");
        echo '<h2>Formato mes</h2>';
        echo '<br>Mes abreviado con %b-> ' . strftime("%b");
        echo '<br>Mes completo con %B-> ' . strftime("%B");
        echo '<br>Dos dígitos para el mes con %m -> ' . strftime("%m");
        echo '<br>Nombre del mes abreviado con %h -> ' . strftime("%h");
        echo '<h2>Formato año</h2>';
        echo '<br>Siglo en el que estamos con %C -> ' . strftime("%C");
        echo '<br>Año completo con %G -> ' . strftime("%G");
        echo '<br>Dos dígitos para el año con %y -> ' . strftime("%y");
        echo '<h2>Formato Time</h2>';
        echo '<br>Dos dígitos para representar la hora %H -> ' . strftime("%H");
        echo '<br>Hora en formato 24 horas con %k -> ' . strftime("%k");
        echo '<br>Hora en formato 12 horas con %l -> ' . strftime("%l");
        echo '<br>Minutos con %M -> ' . strftime("%M");
        echo '<br>Segundos con %S -> ' . strftime("%S");
        echo '<br>Hora completa con %T -> ' . strftime("%T");       
        
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