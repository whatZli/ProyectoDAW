<?php
require '../core/cabecera.php';
require '../core/conexion.php';

try {
    $conn = new PDO("mysql:host=".SERVER.";dbname=".DB, USER, PASSWD);

    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<h1>Conexión correcta</h1>";
    
    $attributes = array( //array que contiene los atributos del PDO::ATTR 
                "AUTOCOMMIT", "ERRMODE", "CASE", "CLIENT_VERSION", "CONNECTION_STATUS",
                "ORACLE_NULLS", "PERSISTENT", "SERVER_INFO", "SERVER_VERSION"
            );
    echo "<h2>Atributos de la conexion</h2>";
    foreach ($attributes as $val) { //mediante un foreach recorremos el array de atributos
        echo "PDO::ATTR_$val: ";
        echo '<strong style="color:#C11;">'.$conn->getAttribute(constant("PDO::ATTR_$val")) . "</strong><br>"; //mostramos mensaje de salida
    }
    
    //conexión erronea
    $conn2 = new PDO("mysql:host=".SERVER.";dbname=".DB, USER,"paso123");
    // set the PDO error mode to exception
    $conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "<h1>Error en la conexión</h2> " . $e->getMessage();
    }
finally {
    unset($conn); //Cerramos la conexion
}

require '../core/pie.php';
?>