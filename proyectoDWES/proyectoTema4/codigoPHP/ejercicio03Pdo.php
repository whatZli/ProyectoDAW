<?php
require '../core/cabecera.php';
require '../core/conexion.php';

require '../core/validacionFormulariosAlexDominguez.php';
define("NUM_FORMULARIOS", 3); //Numero de formularios
//Declaración de variables
$entradaOK = true;

//Declaración del array de errores

$aErrores['codDept'] = null;
$aErrores['nomDept'] = null;

//Declaración del array de datos del formulario

$aFormulario['codDept'] = null;
$aFormulario['nomDept'] = null;

if (isset($_POST['enviar'])) {//Código que se ejecuta cuando se env�a el formulario
    $aErrores['codDept'] = validacionFormularios::comprobarAlfabetico($_POST['codDept'], 3, 1, 1);
    $aErrores['nomDept'] = validacionFormularios::comprobarAlfabetico($_POST['nomDept'], 50, 1, 1);


    foreach ($aErrores as $campo) { //recorre el array en busca de mensajes de error
        if ($campo != null) {
            $entradaOK = false; //cambia la condiccion de la variable
        }
    }
} else {
    $entradaOK = false; //cambiamos el valor de la variable porque no se ha pulsado el bot�n de enviar
}

if ($entradaOK) { //si el valor es true procesamos los datos que hemos recogido   
    $aFormulario['codDept'] = strtoupper($_POST['codDept']); //en el array del formulario guardamos los datos
    $aFormulario['nomDept'] = $_POST['nomDept']; //en el array del formulario guardamos los datos
    //
                    try {
        $conn = new PDO("mysql:host=" . SERVER . ";dbname=" . DB, USER, PASSWD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO Departamento VALUES(:codDept, :nomDept)"; //Los : que van delante, es para indicar que sera una consulta preparada
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":codDept", $aFormulario["codDept"]);
        $stmt->bindParam(":nomDept", $aFormulario["nomDept"]);
        $stmt->execute();

        //Mostrar todos los registros en una tabla
        $sql1 = "SELECT * FROM Departamento";
        $consulta = $conn->query($sql1);

        echo '<h2>Listado de  departamentos añadidos </h2>';
        echo '<table id="encuesta" style="text-align:center;margin-top:20px;margin-bottom:40px;">';
        echo '<caption>DEPARTAMENTOS</caption>';
        echo '<tr>';
        echo '<th>Código</th>';
        echo '<th>Descripción</th>';
        echo '</tr>';
        while ($registro = $consulta->fetchObject()) { //Al realizar el fetchObject, se pueden sacar los datos de $registro como si fuera un objeto
            echo '<tr>';
            if ($registro->CodDepartamento == $aFormulario['codDept']) {
                echo "<td style='color:red;'>" . $registro->CodDepartamento . "</td><td style='color:red;'>" . $registro->DescDepartamento . "</td>";
            } else {
                echo "<td>" . $registro->CodDepartamento . "</td><td>" . $registro->DescDepartamento . "</td>";
            }
            echo '</tr>';
        }
    } catch (Exception $exc) {
        if($exc->getCode() == 23000){
            echo '<h1>El código de departamento ya existe</h1>';
        }
    } finally {
        unset($conn);
    }

    echo '</table>';
} else {//Código que se ejecuta antes de rellenar el formulario
    ?>
    <h3>Ejercicio 3 | Insertar Dept.</h3>
    <form name="form1" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" style="text-align: center;">
        <label>Añadir código de departamento</label>
        <input type="text" name="codDept" placeholder="Cod. Dept." value="<?php
    if ($aErrores['codDept'] == NULL && isset($_POST['codDept'])) {
        echo $_POST['codDept'];
    }
    ?>"> <!--//Si el valor es bueno, lo escribe en el campo-->
        <?php if ($aErrores['codDept'] != NULL) { ?>
            <div class="error">
            <?php echo $aErrores['codDept']; //Mensaje de error que tiene el array aErrores    ?>
            </div>   
        <?php } ?>  
        <br>
        <label>Añadir descripción de departamento</label>
        <input type="text" name="nomDept" placeholder="Nom. Dept." value="<?php
    if ($aErrores['nomDept'] == NULL && isset($_POST['nomDept'])) {
        echo $_POST['nomDept'];
    }
    ?>"> <!--//Si el valor es bueno, lo escribe en el campo-->
        <?php if ($aErrores['nomDept'] != NULL) { ?>
            <div class="error">
            <?php echo $aErrores['nomDept']; //Mensaje de error que tiene el array aErrores    ?>
            </div>   
        <?php } ?> 
        <br>
        <div>
            <input type="submit" value="Enviar" name="enviar" style="width:290px; padding: 3px; margin-bottom: 10px; ">
        </div>
    </form>
    <?php
}
?>

<?php require '../core/pie.php'; ?>