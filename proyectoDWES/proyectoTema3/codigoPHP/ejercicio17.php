<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
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
        
        <div class="content" style="">
<?php
        /**
          @author: Alex Dominguez basado en el de Victor Martinez
          @since: 15/10/2019
         */

//Crear el Array Multidimensional
$fila = 1; //damos valor a la variable de las filas
$columna = 1;//Variable que utilizaremos para mostrar la coloumna en la que nos encontramos
while ($fila <= 20) {
    $asiento = 1; //damos valor a la variable de los asientos
    while ($asiento <= 15) { //si se cumple las condicciones del bucle asignamos NULL
        $teatro[$fila][$asiento] = null;
        $asiento++; //sumamos 1 al asiento
    }
    $fila++; //sumamos 1 a la fila
}

//Asignar valores
$teatro[2][5] = "Roberto";
$teatro[5][6] = "Alicia";
$teatro[5][9] = "Carlos";
$teatro[6][3] = "David";
$teatro[1][3] = "Cristina";
$teatro[2][3] = "Jorge";
$teatro[4][7] = "Raquel";
$teatro[20][15] = "Marcos";
$teatro[20][8] = "Abel";


echo "<table style='position:fixed; right:10%; width:33%;text-align: center;'>";
    echo '<caption>Gr&aacutefico de asientos</caption>';
    echo "<tr>";
    echo "<td></td>";
    while ($columna <= 15){
         echo "<td style='background-color:#8fc7ff;'>C ". $columna ."</td>";
         $columna++;
    }
    echo "</tr>";
    
    foreach ($teatro as $fila => $posicion) { //recorremos el array de las filas con foreach
        echo "<tr style='background-color:#8fc7ff;'>";
        echo "<td style='width:23px;'>F ". $fila."</td>";
        foreach ($posicion as $asiento => $nombre) { //recorremos el array de los asientos con foreach
            if ($teatro[$fila][$asiento] != null) { //si la fila y el asiento no son NULL mostramos quien se ha sentado 
                echo '<td style="background-color:#ff9980;width:23px;" title="'. $teatro[$fila][$asiento] .'"/>';
            }else{//si la fila y el asiento es NULL lo mostramos vacío
                echo '<td style="background-color:#7ad652; width:23px;" title="Vacio"/>';
            }
        }
        echo "</tr>";
    }
echo "</table>";
        echo '<div style=" position:fixed; left:10%;">';
        echo "<h3>Mostramos los asientos ocupados con FOREACH</h3>";
        foreach ($teatro as $fila => $posicion) { //recorremos el array de las filas con foreach
            foreach ($posicion as $asiento => $nombre) { //recorremos el array de los asientos con foreach
                if ($teatro[$fila][$asiento] != null) { //si la fila y el asiento no son NULL mostramos quien se ha sentado 
                    echo "Fila: " . $fila . " Asiento: " . $asiento . " Nombre: " . $nombre . "<br>"; //mensaje de salida
                }
            }
        }
        echo "<h3>Mostramos los asientos ocupados con WHILE</h3>";
        $fila = 1; //damos valor a la variable        
        while ($fila <= 20) {
            $asiento = 1; //damos valor a la variable
            while ($asiento <= 15) {
                if ($teatro[$fila][$asiento]) { //si la fila y el asiento contienen algo lo mostramos
                    echo "Fila: " . $fila . " Asiento: " . $asiento . " Nombre: " . $teatro[$fila][$asiento] . "<br>"; //mensaje de salida
                }
                $asiento++; //sumamos 1 al asiento
            }
            $fila++; //sumamos 1 a la fila
        }
        echo "<h3>Mostramos los asientos ocupados con FOR</h3>";
        for ($fila = 1; $fila <= 20; $fila++) { //recorremos las filas con for
            for ($asiento = 1; $asiento <= 15; $asiento++) { //recorremos los asientos con for
                if ($teatro[$fila][$asiento]) { //si la fila y el asiento contienen algo lo mostramos
                    echo "Fila: " . $fila . " Asiento: " . $asiento . " Nombre: " . $teatro[$fila][$asiento] . "<br>"; //mensaje de salida
                }
            }
        }
        echo '</div>';
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