<?php
require '../core/cabecera.php';
require '../core/conexion.php';

        try {
            $myDB = new PDO("mysql:host=".SERVER.";dbname=".DB, USER, PASSWD);
            $myDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql1 = "SELECT * FROM Departamento";
            $consulta = $myDB->query($sql1);

            echo 'Numero de registros de la consulta <strong><i>'.$sql1.'</i></strong>: <strong style="color:blue;">' . $consulta->rowCount()."</strong><br>";
            while ($registro = $consulta->fetchObject()) { //Al realizar el fetchObject, se pueden sacar los datos de $registro como si fuera un objeto
                echo "Codigo: <strong>" . $registro->CodDepartamento . "</strong>, descripcion: <strong>" . $registro->DescDepartamento . "</strong><br>";
            }
        } catch (Exception $exc) {
            echo "Error: $exc->getMessage() <br>";
            echo "Codigo del error: $exc->getCode() <br>";
        } finally {
            unset($myDB);
        }
        
require '../core/pie.php';
?>