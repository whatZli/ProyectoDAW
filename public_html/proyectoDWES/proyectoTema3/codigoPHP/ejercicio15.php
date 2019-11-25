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
<h1> Crear e inicializar un array con el sueldo percibido de lunes a domingo. Recorrer el array para calcular el sueldo percibido durante
la semana. (Array asociativo con los nombres de los días de la semana).</h1>
<?php
    $salario=0;
    $arraySueldo = [// Array con los días de la semana y el sueldo
        "Lunes" => 40,
        "Martes" => 10,
        "Miercoles" => 70,
        "Jueves" => 40,
        "Viernes" => 30,
        "Sabsdo" => 50,
        "Domingo" => 20
    ];
    
    foreach ($arraySueldo as $dia => $sueldoDiario) { //bucle que recorre el array
            echo 'El ' . $dia . ' ha cobrado ' . $sueldoDiario . ' euros' . "<br>"; //mensaje de salida
            $salario += $sueldoDiario; //operacion
        }

        echo 'Sueldo total: ' . $salario; //resultado de la suma de los datos del array
	
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