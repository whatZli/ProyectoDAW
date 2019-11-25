
<?php

$myDB = new mysqli();
//        $myDB->connect("localhost", "usuarioDAW208Departamentos", "paso", "DAW208DBdepartamentos");
$myDB->connect("daw-used.sauces.local", "usuarioDAW205Departamentos", "paso", "DAW205DBDepartamentos");

if ($myDB->connect_error) {
    echo "Error en la conexion <br>";
} else {
    echo "Conexion establecida <br>";
}

$sql = "SELECT * FROM Departamento";
if (!$resultado = $myDB->query($sql)) {
    echo "Error al ejecutar el query: " . $sql . "<br>";
    echo "Errno: " . $myDB->errno . "<br>";
    echo "Error: " . $myDB->error . "<br>";
} else {
//            $resultado->data_seek(0);
    $datos = $resultado->fetch_all(MYSQLI_ASSOC);


    foreach ($datos as $value) {
        echo "CodDepartamento: " . $value["CodDepartamento"] . ", Descripcion " . $value["DescDepartamento"];
        echo "<br>";
    }
//            foreach ($datos as $key => $value) {
//                echo "$key -> $value <br>";
//            }
}
?>
