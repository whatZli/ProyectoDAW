<?php
require '../core/cabecera.php';
require '../core/conexion.php';
?>

<?php
try {
  $conn = new PDO("mysql:host=" . SERVER . ";dbname=" . DB, USER, PASSWD);
  echo "Connectado correctamente<br>";
} catch (Exception $e) {
  die("No se ha podido conectar:<br> " . $e->getMessage());
}

try {  
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $conn->beginTransaction();
  $conn->exec("insert into Departamento (CodDepartamento, DescDepartamento) values ('AAA', 'aaaaaaa')");
  $conn->exec("insert into Departamento (CodDepartamento, DescDepartamento) values ('BBB', 'bbbbbbb')");
  $conn->exec("insert into Departamento (CodDepartamento, DescDepartamento) values ('CCC', 'ccccccc')");
  $conn->commit();
  
  echo 'Se están cargando los siguientes registros:<br>';
  echo "<i>insert into Departamento (CodDepartamento, DescDepartamento) values ('AAA', 'aaaaaaa')</i><br>";
  echo "<i>insert into Departamento (CodDepartamento, DescDepartamento) values ('BBB', 'bbbbbbb')</i><br>";
  echo "<i>insert into Departamento (CodDepartamento, DescDepartamento) values ('CCC', 'ccccccc')</i><br>";
  echo 'Se ha completado la transacción correctamente<br>';

  echo '<a href="ejercicio02Pdo.php">Comprobar las nuevas modificaciones</a>';
} catch (Exception $e) {
  $conn->rollBack();
  echo "No se completó la transacción: " . $e->getMessage();
}

?>

<?php require '../core/pie.php'; ?>