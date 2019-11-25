<?php
require '../core/validacionFormulariosAlexDominguez.php';
require '../config/DBconf.php';

if (isset($_POST['enviar'])) {
    try {
        $conn = new PDO("mysql:host=" . SERVER . ";dbname=" . DB, USER, PASSWD);
    } catch (Exception $e) {
        die("No se ha podido establecer la conexión:<br> " . $e->getMessage());
    }
    try {
        $sql = "DELETE FROM Departamento WHERE CodDepartamento=:codDept"; //Los : que van delante, es para indicar que sera una consulta preparada
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":codDept", $_GET['cod']);
        $stmt->execute();
        
        header("Location: ../mtoDepartamentos.php?pag=".$_GET['pag']);
    } catch (Exception $e) {
        die("Error en la insercción de datos:<br> " . $e->getMessage());
    }
}

if (isset($_GET['cod'])) {
    $codigo = $_GET['cod'];
    try {

        $conn = new PDO("mysql:host=" . SERVER . ";dbname=" . DB, USER, PASSWD);

        $sql = "SELECT * FROM Departamento WHERE CodDepartamento=:codigo"; //Los : que van delante, es para indicar que sera una consulta preparada
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":codigo", $codigo);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC); //Obtiene el resultado de la consulta en formato Array
        /* print_r($result); Muestra el Array completo */
        $cod = $result['CodDepartamento'];
        $descripcion = $result['DescDepartamento'];
        $fechaBaja = $result['FechaBaja'];
        $volumenNegocio = $result['VolumenNegocio'];
        
    } catch (Exception $e) {
        die("No se ha podido establecer la conexión:<br> " . $e->getMessage());
    }
    ?>
    <head>
        <link rel="stylesheet" href="../webroot/css/style.css">
    </head>
    <?php require '../core/cabecera.php'; ?>
    <h1>Borrar el Departamento <?php echo $_GET['cod']; ?></h1>

    <form style="text-align: center;" action="<?php echo 'borrarDepartamento.php?cod=' . $codigo.'&pag='.$_GET['pag']; ?>" method="post">
        <label for="codigo">Codigo</label>
        <input type="text" value="<?php echo $codigo ?>" name="codigo" disabled><br>
        <label for="descripcion">Descripción</label>
        <input type="text" value="<?php echo $descripcion ?>" name="descripcion" disabled><br>
        <label for="volumenNegocio">Volumen de Negocio</label>
        <input type="text" value="<?php echo $volumenNegocio ?>" name="volumenNegocio" disabled><br>

        <input type="submit" name="enviar" value="Borrar" style="width: 100px;font-size: 20px;display:inline-block; margin:20px; background-color: #0D47A1; padding:10px; border-radius: 10px; color: white;">
        <div id="botonCancelar" style="display:inline-block; margin:20px; background-color: #78909C; padding:10px; border-radius: 10px;">
            <a href="<?php echo '../mtoDepartamentos.php?pag='.$_GET['pag']; ?>"><h3>Volver</h3></a>
        </div>
    </form>

    </div>
    <a href="../../../../../mtoDepartamentos.php">
        <footer>
            <address>
                &copy2019 Alex Dominguez
            </address>
        </footer>
    </a>
    </body>
    </html> 
    <?php
} else {
    echo '<h1>No se puede acceder a esta página sin un código de departamento</h1>';
}
?>
 

