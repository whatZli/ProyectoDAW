<?php
require '../config/DBconf.php';

if (isset($_GET['cod'])) {

        try {
            $conn = new PDO("mysql:host=" . SERVER . ";dbname=" . DB, USER, PASSWD);
        } catch (Exception $e) {
            die("No se ha podido establecer la conexión:<br> " . $e->getMessage());
        }
        try {
            $sql = "UPDATE `Departamento` SET `FechaBaja` = now() WHERE `Departamento`.`CodDepartamento` = :codDept;"; //Los : que van delante, es para indicar que sera una consulta preparada
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":codDept", $_GET['cod']);
            $stmt->execute();
            print_r($stmt);
            header('Location: ../mtoDepartamentos.php?pag='.$_GET['pag']);
        } catch (Exception $e) {
            die("Error en la insercción de datos:<br> " . $e->getMessage());
        }

}
?>