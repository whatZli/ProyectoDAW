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
<h1> Inicializar y mostrar una variable que tiene una marca de tiempo (timestamp)</h1>

<p>
<h3>Utilización de la función date_create</h3>
El primer número es la fecha actual con el formato de marca temporal de Unix
<a href="https://www.php.net/manual/es/datetime.settimestamp.php">+Info</a><br>
    <?php 
            $fecha = date_create();
            echo date_format($fecha, 'U = Y-m-d H:i:s') . "<br>";

            date_timestamp_set($fecha, 1369437637 );
            echo date_format($fecha, 'U = Y-m-d H:i:s') . "<br>";
    ?>
</p>
<p>
<h3>Utilización de la clase datetime Orientado a Objetos</h3>
    <!DOCTYPE html>

        <?php
        /**
          @author: Victor Martinez Mielgo
          @since: 24/09/2019
          Comentarios:  Inicializar y mostrar una variable que tiene una marca de tiempo (timestamp)
         */
        $miFecha = new DateTime(); //instanciamos un objeto de la clase DateTime        
        //$fecha->setTimestamp(microtime(time())); //microtime devuelve la fecha Unix actual con microsegundos y setTimestamp establece la fecha y la hora basándose en una marca temporal de Unix

        echo "<h3>Fecha del sistema</h3>";
        echo "<p>Timestamp: " . $miFecha->getTimestamp() . "</p>"; //mostramos la fecha en timestamp
        echo "<p>Fecha: " . $miFecha->format('Y-m-d H:i:s') . "</p>"; //formateamos la salida de la fecha que tenemos

        $miFecha->setDate(1994, 8, 22); //asigamos la fecha que nosotros queramos con setDate

        echo "<h3>Mi Fecha</h3>";
        echo "<p>Timestamp: " . $miFecha->getTimestamp() . "</p>"; //mostramos la fecha en timestamp
        echo "<p>Fecha: " . $miFecha->format('Y-m-d') . "</p>"; //formateamos la salida de la fecha que tenemos
	?>
</p>
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
