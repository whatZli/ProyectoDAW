<?php

require '../core/cabecera.php';
require '../core/conexion.php';
echo '<h1>Ejercicio 7 - 2 | Importar XML con DOMDocument</h1>';

try {
    $conn = new PDO("mysql:host=" . SERVER . ";dbname=" . DB, USER, PASSWD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $excepcion) {
    die("Error en la conexión a la base de datos"); //Error al guardar el fichero
}

$instruccion = "INSERT INTO Departamento VALUES (:codigo, :descripcion)";
$insercion = $conn->prepare($instruccion);
$ficheroXML = new DOMDocument();
$ficheroXML->load('../tmp/ficheroXML.xml');
//var_dump($ficheroXML);

$searchNode = $ficheroXML->getElementsByTagName( "Departamento" );
foreach( $searchNode as $searchNode ){
    echo "$searchNode->nodevalue \n";
}

//$departamentos = simplexml_load_file("../tmp/ficheroXML.xml");

foreach ($ficheroXML as $departamento) {
    try {

        $insercion->execute(array(':codigo' => $departamento->children()[0], ':descripcion' => $departamento->children()[1]));
        echo "<label style='color: green;'>El departamento " . $departamento->children()[0] . " se insertó correctamente.</label><br/>";
    } catch (PDOException $excepcion) {

        echo "<label style='color: red;'>El departamento " . $departamento->children()[0] . " no ha podido insertarse.</label><br/>";
    } finally {
        unset($conn); //Se cierra la conexion
    }
}

require '../core/pie.php';
?>
