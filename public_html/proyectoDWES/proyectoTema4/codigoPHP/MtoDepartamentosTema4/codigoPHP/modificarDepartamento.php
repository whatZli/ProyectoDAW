<?php
require '../core/validacionFormulariosAlexDominguez.php';

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
        $codigo = $result['CodDepartamento'];
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
    <h1>Modificación del Departamento <?php echo $_GET['cod']; ?></h1>
    <?php
    //Validación de los campos descripción y volumen de negocio
    //Declaración de variables
    $entradaOK = true;

    //Declaración del array de errores
    $aErrores['descripcion'] = null;
    $aErrores['volumenNegocio'] = null;
    $aErrores['fechaBaja'] = null;

    //Declaración del array de datos del formulario
    $aFormulario['descripcion'] = null;
    $aFormulario['volumenNegocio'] = null;
    $aFormulario['fechaBaja'] = null;
    
    if (isset($_POST['enviar'])) {//Código que se ejecuta cuando se env�a el formulario
        $aErrores['descripcion'] = validacionFormularios::comprobarAlfabetico($_POST['descripcion'], 255, 1, 1);
        $aErrores['volumenNegocio'] = validacionFormularios::comprobarFloat($_POST['volumenNegocio'],1000000000, 1, 1);
        $aErrores['fechaBaja'] = validacionFormularios::validarFecha($_POST['fechaBaja'],"2050-01-01", "1900-01-01", 1);

        foreach ($aErrores as $campo) { //recorre el array en busca de mensajes de error
            if ($campo != null) {
                $entradaOK = false; //cambia la condiccion de la variable
            }
        }
    } else {
        $entradaOK = false; //cambiamos el valor de la variable porque no se ha pulsado el bot�n de enviar
    }
    
    if ($entradaOK) { //si el valor es true procesamos los datos que hemos recogido 
        $aFormulario['descripcion'] = strtoupper($_POST['descripcion']); //en el array del formulario guardamos los datos
        $aFormulario['volumenNegocio'] = $_POST['volumenNegocio']; //en el array del formulario guardamos los datos
        $aFormulario['fechaBaja'] = $_POST['fechaBaja']; //en el array del formulario guardamos los datos
        
        $sql = "UPDATE Departamento SET DescDepartamento=:descDept, FechaBaja=:fechabaja, VolumenNegocio=:volumenNegocio WHERE CodDepartamento=:codDept"; //Los : que van delante, es para indicar que sera una consulta preparada
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":codDept", $codigo);
        $stmt->bindParam(":descDept", $aFormulario["descripcion"]);
        $stmt->bindParam(":volumenNegocio", $aFormulario["volNegocio"]);
        $stmt->bindParam(":fechabaja", $aFormulario["fechaBaja"]);
        $stmt->execute();
        
    }
    ?>
    <form style="text-align: center;" action="<?php echo 'modificarDepartamento.php?cod=' . $codigo; ?>" method="post">
        <label for="codigo">Codigo</label>
        <input type="text" value="<?php echo $codigo ?>" name="codigo" disabled><br>
        <label for="descripcion">Descripción</label>
        <input type="text" value="<?php echo $descripcion ?>" name="descripcion"><br>
        <label for="volumenNegocio">Volumen de Negocio</label>
        <input type="text" value="<?php echo $volumenNegocio ?>" name="volumenNegocio"><br>
        <label for="fechaBaja">Fecha de Baja</label>
        <input type="text" value="<?php echo $fechaBaja ?>" name="fechaBaja"><br>

        <input type="submit" name="enviar" value="Aceptar" style="width: 100px;font-size: 20px;display:inline-block; margin:20px; background-color: #0D47A1; padding:10px; border-radius: 10px; color: white;">
        <div id="botonCancelar" style="display:inline-block; margin:20px; background-color: #78909C; padding:10px; border-radius: 10px;">
            <a href="<?php basename($_SERVER['PHP_SELF']) ?>"><h3>Cancelar</h3></a>
        </div>
    </form>

    </div>
    <a href="../mtoDepartamentos.php">
        <div id="atras">
            <img src="../webroot/images/atras.png" alt=""/>
        </div>
    </a>
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
 

