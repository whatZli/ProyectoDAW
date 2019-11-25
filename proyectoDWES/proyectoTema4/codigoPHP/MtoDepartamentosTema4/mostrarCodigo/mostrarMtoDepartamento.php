<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <meta name="author" content="Alex Dominguez Dominguez"/>
        <meta name="generator" content="notepad++"/>
        <meta name="robots" content="index, follow">
        <link rel="shortcut icon" type="image/png" href="../webroot/images/favicon.png"/>
        <link href="css/reset.css"   rel="stylesheet"         type="text/css" >
        <title>Alex Dominguez</title>
        <style>
            body{
                margin-top:50px;
                padding: 0;
                background-color: #e6f2ff;
            }
            a:link,a:visited{
                text-decoration:none;
                color:white;
            }
            ul{
                position:fixed;
                top:0;
                width:100%;
                background-color: #0059b3;
                margin:auto;
                padding: 10px;
            }
            #atras{
                position:fixed;
                top:0;
                right:20px;
                padding: 10px;
                font-size: 30px;
            }
            li{
                list-style:none;
                display:inline-block;
                font-size: 30px;
                margin-right: 30px;
            }
        </style>
    </head>
    <body>
        <nav>
            <ul>
                <a href="#aniadir"><li>Añadir</li></a>
                <a href="#mostrar"><li>Mostrar</li></a>
                <a href="#modificar"><li>Modificar</li></a>
                <a href="#borrar"><li>Borrar</li></a>
                <a href="#exportar"><li>Exportar</li></a>
                <a href="#importar"><li>Importar</li></a>
                <a href="#altaLogica"><li>Alta Lógica</li></a>
                <a href="#bajaLogica"><li>Baja Lógica</li></a>
                
            </ul>
        </nav>
        <div id="atras">
            <a href="../../../indexProyectoTema4.html">Atrás</a>
        </div>
        <div id="aniadir">
            <br><br>
            <h2>Añadir Departamento</h2>
            <?php
            highlight_file("../codigoPHP/añadirDepartamento.php");
            ?>
        </div>
        <div id="mostrar">
            <br><br>
            <h2>Mostrar Departamento</h2>
            <?php
            highlight_file("../codigoPHP/mostrarDepartamento.php");
            ?>
        </div>
        <div id="modificar">
            <br><br>
            <h2>Modificar Departamento</h2>
            <?php
            highlight_file("../codigoPHP/modificarDepartamento.php");
            ?>
        </div>
        <div id="borrar">
            <br><br>
            <h2>Borrar Departamento</h2>
            <?php
            highlight_file("../codigoPHP/borrarDepartamento.php");
            ?>
        </div>
        <div id="exportar">
            <br><br>
            <h2>Exportar Departamentos</h2>
            <?php
            highlight_file("../codigoPHP/exportarXML.php");
            ?>
        </div>
        <div id="importar">
            <br><br>
            <h2>Importar Departamentos</h2>
            <?php
            highlight_file("../codigoPHP/importarDepartamentos.php");
            ?>
        </div>
        <div id="altaLogica">
            <br><br>
            <h2>Alta Lógica</h2>
            <?php
            highlight_file("../codigoPHP/altaLogicaDepartamento.php");
            ?>
        </div>
        <div id="bajaLogica">
            <br><br>
            <h2>Baja Lógica</h2>
            <?php
            highlight_file("../codigoPHP/bajaLogicaDepartamento.php");
            ?>
        </div>
    </body>
</html>

