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

  define('NUM_REG', 3);
  for($i=1;$i<=NUM_REG;$i++){
      $aInsert[$i]="insert into Departamento (CodDepartamento, DescDepartamento) values ('RG$i', 'Registro $i')";
  }  
  $conn->beginTransaction();
  for($i=1;$i<=NUM_REG;$i++){
      $conn->exec($aInsert[$i]);
  }
  $conn->commit();
  
  echo 'Se están cargando los siguientes registros:<br>';
  for($i=1;$i<=NUM_REG;$i++){
      echo '<i>'.$aInsert[$i].'</i><br>';
  }
  echo 'Se ha completado la transacción correctamente<br>';

  echo '<a href="ejercicio02Pdo.php">Comprobar las nuevas modificaciones</a>';
} catch (Exception $e) {
  $conn->rollBack();
  echo "No se completó la transacción: " . $e->getMessage();
}

?>

<?php require '../core/pie.php'; ?>