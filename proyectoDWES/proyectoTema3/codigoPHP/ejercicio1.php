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
		<a href="../../index.html"><h1>DAW</h1></a>
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
			$string = "Contenido de string";
			$int = 2;
			$float = 2.567;
			$bool = true;
			
			 //muestra el contenido de las variables
        
			echo 'La variable $string contiene un dato de tipo ' . gettype($string); //gettype obtiene el tipo de una variable
			echo '<br>';
			echo 'La variable $int contiene un dato de tipo ' . gettype($int); //gettype obtiene el tipo de una variable
			echo '<br>';
			echo 'La variable $float contiene un dato de tipo ' . gettype($float); //gettype obtiene el tipo de una variable
			echo '<br>';
			echo 'La variable $bool contiene un dato de tipo ' . gettype($bool); //gettype obtiene el tipo de una variable
			echo '<br>';
			?>
			<h1>Distintos tipos de variables mostrados con echo</h1>
			<p><strong>String</strong>-><?php echo $string ?></p>
			<p><strong>Int</strong>-><?php echo $int ?></p>
			<p><strong>Float</strong>-><?php echo $float ?></p>
			<p><strong>Bool</strong>-><?php echo $bool ?></p>

			<h1>Distintos tipos de variables mostrados con print</h1>
			<p><strong>String</strong>-><?php print $string ?></p>
			<p><strong>Int</strong>-><?php print $int ?></p>
			<p><strong>Float</strong>-><?php print $float ?></p>
			<p><strong>Bool</strong>-><?php print $bool ?></p>

			<h1>Distintos tipos de variables mostrados con printf()</h1>
			<p><strong>String</strong>-><?php printf($string) ?></p>
			<p><strong>Int</strong>-><?php printf($int) ?></p>
			<p><strong>Float</strong>-><?php printf($float) ?></p>
			<p><strong>Bool</strong>-><?php printf($bool) ?></p>

			<h1>Distintos tipos de variables mostrados con print_r()</h1>
			<p><strong>String</strong>-><?php print_r($string) ?></p>
			<p><strong>Int</strong>-><?php print_r($int) ?></p>
			<p><strong>Float</strong>-><?php print_r($float) ?></p>
			<p><strong>Bool</strong>-><?php print_r($bool) ?></p>

			<h1>Distintos tipos de variables mostrados con var_dump()</h1>
			<p><strong>String</strong>-><?php var_dump($string) ?></p>
			<p><strong>Int</strong>-><?php var_dump($int) ?></p>
			<p><strong>Float</strong>-><?php var_dump($float) ?></p>
			<p><strong>Bool</strong>-><?php var_dump($bool) ?></p>
			
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