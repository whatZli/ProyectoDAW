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

        $result = $stmt->fetch(PDO::FETCH_ASSOC); //Obtiene el resultado de la consulta en formato Array
        /* print_r($result); Muestra el Array completo */
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
    <h1>Datos del Departamento <?php echo $_GET['cod']; ?></h1>
    <form style="text-align: center;" action="<?php echo 'borrarDepartamento.php?cod=' . $codigo; ?>" method="post">
        <label for="codigo">Codigo</label>
        <input type="text" value="<?php echo $codigo ?>" name="codigo" disabled><br>
        <label for="descripcion">Descripción</label>
        <input type="text" value="<?php echo $descripcion ?>" name="descripcion" disabled><br>
        <label for="volumenNegocio">Volumen de Negocio</label>
        <input type="text" value="<?php if ($volumenNegocio == null) {
        echo 0;
    } else {
        echo $volumenNegocio;
    } ?>" name="volumenNegocio" disabled><br>
        <label for="fechaBaja">Fecha de Baja</label>
        <input type="text" value="<?php if ($fechaBaja == null) {
        
    } else {
        echo $fechaBaja;
    } ?>" name="fechaBaja" disabled><br>

        <div id="botonCancelar" style="display:inline-block; margin:20px; background-color: #78909C; padding:10px; border-radius: 10px;">
            <a href="<?php echo '../mtoDepartamentos.php?pag='.$_GET['pag']; ?>"><h3>Volver</h3></a>
        </div>
    </form>
<?php } ?>
</div>

<a href="../../../../../">
    <footer>
        <address>
            &copy2019 Alex Dominguez
        </address>
    </footer>
</a>
</body>
</html> 

