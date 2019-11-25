<?php
require 'core/cabecera.php';
require 'config/DBconf.php';
require 'core/libreriaValidacionFormularios.php';

define("NUM_FORMULARIOS", 3); //Numero de formularios
//Declaración de variables
$entradaOK = true;

//Declaración del array de errores

$aErrores['buscar'] = null;

//Declaración del array de datos del formulario

$aFormulario['buscar'] = null;

if (isset($_POST['enviar'])) {//Código que se ejecuta cuando se env�a el formulario               
    $aErrores['buscar'] = validacionFormularios::comprobarAlfaNumerico($_POST['buscar'], 255, 1, 0);
    foreach ($aErrores as $campo) { //recorre el array en busca de mensajes de error
        if ($campo != null) {
            $entradaOK = false; //cambia la condiccion de la variable
        }
    }
} else {
    $entradaOK = false; //cambiamos el valor de la variable porque no se ha pulsado el bot�n de enviar
}
?>
<h2>Mantenimiento de departamentos </h2>
<form name="form1" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" style="text-align: center;">
    <label>Descripción departamento</label>
    <input type="text" name="buscar" placeholder="Descripcion Dept." value="<?php
    if ($aErrores['buscar'] == NULL && isset($_POST['buscar'])) {
        echo $_POST['buscar'];
    }
    ?>"> 
    <input type="submit" value="Buscar" name="enviar" style="width:90px; padding: 3px; margin-bottom: 10px; ">
    <!--//Si el valor es bueno, lo escribe en el campo-->
    <?php if ($aErrores['buscar'] != NULL) { ?>
        <div class="error">
            <?php echo $aErrores['buscar']; //Mensaje de error que tiene el array aErrores    ?>
        </div>   
    <?php } ?>  
</form>
<?php
if (isset($_POST['buscar'])) {
    $aFormulario['buscar'] = $_POST['buscar']; //en el array del formulario guardamos los datos
} else {
    $aFormulario['buscar'] = '';
}
//Se establece la conexión tanto si se ha posteado buscar como si no
try {
    $conn = new PDO("mysql:host=" . SERVER . ";dbname=" . DB, USER, PASSWD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $exc) {
    echo "Error: $exc->getMessage() <br>";
    echo "Codigo del error: $exc->getCode() <br>";
}
//Si se ha pasado por buscar, se hace una consulta filtrando por ese registro
if ($aErrores['buscar'] == null && $aFormulario['buscar'] != null) {
    try {
        $sql = "SELECT * FROM Departamento where DescDepartamento LIKE '%" . $aFormulario["buscar"] . "%'"; //Los : que van delante, es para indicar que sera una consulta preparada
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $consulta = $conn->query($sql);
    } catch (Exception $exc) {
        echo "Error: $exc->getMessage() <br>";
        echo "Codigo del error: $exc->getCode() <br>";
    } finally {
        unset($conn);
    }
//Si no se ha pasado por buscar se hace una búsqueda de todos los registros
} else {
    try {
        //Mostrar todos los registros en una tabla
        $sql = "SELECT * FROM Departamento";
        $consulta = $conn->query($sql);
    } catch (Exception $exc) {
        echo "Error: $exc->getMessage() <br>";
        echo "Codigo del error: $exc->getCode() <br>";
    } finally {
        unset($conn);
    }
}
echo '<h4>Listado de  departamentos</h4>';
echo '<table id="encuesta" style="text-align:center;margin-top:20px;margin-bottom:40px;">';
echo '<tr>';
echo '<th>Código</th>';
echo '<th>Descripción</th>';
echo '<th>Ver</th>';
echo '<th>Modificar</th>';
echo '<th>Borrar</th>';
echo '</tr>';
while ($registro = $consulta->fetchObject()) { //Al realizar el fetchObject, se pueden sacar los datos de $registro como si fuera un objeto
    $cod = $registro->CodDepartamento;
    echo '<tr>';
    echo "<td>" . $cod . "</td><td>" . $registro->DescDepartamento . "</td>";
    echo '<td><a href="codigoPHP/mostrarDepartamento.php?cod=' . $cod . '"><img src="webroot/images/view.png"></a></td>';
    echo '<td><a href="codigoPHP/modificarDepartamento.php?cod=' . $cod . '"><img src="webroot/images/pencil.png"></a></td>';
    echo '<td><a href="codigoPHP/borrarDepartamento.php?cod=' . $cod . '"><img src="webroot/images/cross.png"></a></td>';
    echo '</tr>';
}
?>

<?php require 'core/pie.php'; ?>