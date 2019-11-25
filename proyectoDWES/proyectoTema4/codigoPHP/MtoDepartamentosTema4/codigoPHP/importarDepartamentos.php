<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <meta name="author" content="Alex Dominguez Dominguez"/>
        <meta name="generator" content="notepad++"/>
        <meta name="robots" content="index, follow">
        <link rel="shortcut icon" type="image/png" href="../../../core/images/favicon.png"/>
        <link href="css/reset.css"   rel="stylesheet"         type="text/css" >
        <title>Alex Dominguez</title>
        <link href="../webroot/css/style.css"  rel="stylesheet"         type="text/css" title="Default style">
        <script>

        </script>
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

        <div class="content" style=" ">
            <?php
            require '../config/DBconf.php';
            echo '<h1>Importar Departamentos en XML</h1>';

            try {
                $conn = new PDO("mysql:host=" . SERVER . ";dbname=" . DB, USER, PASSWD);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $excepcion) {
                die("Error en la conexión a la base de datos"); //Error al guardar el fichero
            }

            $instruccion = "INSERT INTO Departamento VALUES (:codigo, :descripcion, NULL,:volumenNegocio)";
            $insercion = $conn->prepare($instruccion);
            $departamentos = simplexml_load_file("../tmp/ficheroXML.xml");

            foreach ($departamentos as $departamento) {
                try {
                    $insercion->execute(array(':codigo' => $departamento->children()[0], ':descripcion' => $departamento->children()[1], ':volumenNegocio' => $departamento->children()[3]));
                    echo "<label style='color: green;'>El departamento " . $departamento->children()[0] . " se insertó correctamente.</label><br/>";
                } catch (PDOException $excepcion) {
                    echo "<label style='color: red;'>El departamento " . $departamento->children()[0] . " no ha podido insertarse.</label><br/>";
                } finally {
                    unset($conn); //Se cierra la conexion
                }
            }
            ?>
            <div id="botonCancelar" style="display:inline-block; margin:20px; background-color: #78909C; padding:10px; border-radius: 10px;">
                <a href="../mtoDepartamentos.php"><h3>Volver</h3></a>
            </div>
            <?php
            require '../core/pie.php';
            ?>
