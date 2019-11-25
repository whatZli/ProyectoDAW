<?php
$codigo = $_GET['cod'];
if ($codigo != null) {
    try {
        require '../config/DBconf.php';
        $conn = new PDO("mysql:host=" . SERVER . ";dbname=" . DB, USER, PASSWD);

        $sql = "SELECT * FROM Departamento WHERE CodDepartamento=:codigo"; //Los : que van delante, es para indicar que sera una consulta preparada
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":codigo", $codigo);
        $stmt->execute();
      
        $result = $stmt->fetch(PDO::FETCH_ASSOC);//Obtiene el resultado de la consulta en formato Array
        /*print_r($result); Muestra el Array completo*/
        $descripcion=$result['DescDepartamento'];
        $fechaBaja=$result['FechaBaja'];
        $volumenNegocio=$result['VolumenNegocio'];
    } catch (Exception $e) {
        die("No se ha podido establecer la conexión:<br> " . $e->getMessage());
    }
    ?>
    <head>
        <link rel="stylesheet" href="../webroot/css/style.css">
    </head>
    <?php require '../core/cabecera.php'; ?>
    <h1>Datos del Departamento <?php echo $_GET['cod']; ?></h1>
    <table id="encuesta" style="text-align:center;">
        <tr>
            <td>Codigo</td>
            <td><?php echo $codigo; ?></td>
        </tr>
        <tr>
            <td>Descripción</td>
            <td><?php echo $descripcion; ?></td>
        </tr>
        <tr>
            <td>Volumen de Negocio</td>
            <td><?php if($volumenNegocio==null){echo 0;}else{echo $volumenNegocio;} ?></td>
        </tr>
        <tr>
            <td>Fecha de Baja</td>
            <td><?php if($fechaBaja==null){}else{echo $fechaBaja;} ?></td>
        </tr>
    </table>
    <?php
}
?>
 </div>
        <a href="../mtoDepartamentos.php">
            <div id="atras">
                <img src="../webroot/images/atras.png" alt=""/>
            </div>
        </a>
        <a href="../../../../../">
            <footer>
                <address>
                    &copy2019 Alex Dominguez
                </address>
            </footer>
        </a>
    </body>
</html> 

