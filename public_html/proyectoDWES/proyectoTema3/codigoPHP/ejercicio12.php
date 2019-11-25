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
        
        <div class="content" style="text-align:left;">
        <?php
        /**
          @author: Alex Dominguez Basado en el de Victor
          @since: 24/09/2019
          Comentarios: Mostrar variables superglobales
         */
        echo '<h1>Variables con Print_r</h1>';
        echo '<h3>Variable Server</h3>';
        echo "<pre>";
        print_r($_SERVER) . '<br>';
        echo "</pre>";
        echo '<h3>Variable Env</h3>';
        print_r($_ENV) . '<br>';
        echo '<h3>Variable Files</h3>';
        print_r($_FILES) . '<br>';
        echo '<h3>Variable Get</h3>';
        print_r($_GET) . '<br>';
        echo '<h3>Variable Post</h3>';
        print_r($_POST) . '<br>';
        echo '<h3>Variable Request</h3>';
        print_r($_REQUEST) . '<br>';
        echo '<h3>Variable Session</h3>';
        print_r($_SESSION);

        echo '<h1>Variables con foreach</h1>';
        echo '<h3>Variable Server</h3>';
        foreach ($_SERVER as $key => $value) {
            echo "<b>[$key]</b> -> $value <br>";
        }
        echo '<h3>Variable Cookie</h3>';
        foreach ($_COOKIE as $key => $value) {
            echo "<pre>";
            echo "[$key] => $value" . '<br>';
            echo "</pre>";
        }
        echo '<h3>Variable Env</h3>';
        foreach ($_ENV as $key => $value) {
            echo "<pre>";
            echo "[$key] => $value" . '<br>';
            echo "</pre>";
        }
        echo '<h3>Variable Files</h3>';
        foreach ($_FILES as $key => $value) {
            echo "<pre>";
            echo "[$key] => $value" . '<br>';
            echo "</pre>";
        }
        echo '<h3>Variable Get</h3>';
        foreach ($_GET as $key => $value) {
            echo "<pre>";
            echo "[$key] => $value" . '<br>';
            echo "</pre>";
        }
        echo '<h3>Variable Post</h3>';
        foreach ($_POST as $key => $value) {
            echo "<pre>";
            echo "[$key] => $value" . '<br>';
            echo "</pre>";
        }
        echo '<h3>Variable Request</h3>';
        foreach ($_REQUEST as $key => $value) {
            echo "<pre>";
            echo "[$key] => $value" . '<br>';
            echo "</pre>";
        }
        echo '<h3>Variable Session</h3>';
        foreach ($_SESSION as $key => $value) {
            echo "<pre>";
            echo "[$key] => $value" . '<br>';
            echo "</pre>";
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