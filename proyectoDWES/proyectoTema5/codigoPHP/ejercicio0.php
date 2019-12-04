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
            session_start();
            echo '<h3>Variable Session</h3>';
            echo "<pre style='text-align:left;'>";
            print_r($_SESSION);
            echo "</pre>";
            echo '<h3>Variable Cookie</h3>';
            echo "<pre style='text-align:left;'>";
            print_r($_COOKIE);
            echo "</pre>";
            echo '<h3>Variable Server</h3>';
            echo "<pre style='text-align:left;'>";
            print_r($_SERVER) . '<br>';
            echo "</pre>";
            echo '<h3>PHP.ini</h3>';
            phpinfo();
            ?>
        </div>
        <a href="../indexProyectoTema5.html"><div id="atras">
                <img src="../images/atras.png" alt=""/>
            </div></a>
        <a href="../../index.html"><footer>
                <address>
                    &copy2020 Alex Dominguez
                </address>
            </footer></a>
    </body>
</html>