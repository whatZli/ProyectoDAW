<?php
require '../core/cabecera.php';
require '../core/conexion.php';

require '../core/validacionFormulariosAlexDominguez.php';
define("NUM_FORMULARIOS", 3); //Numero de formularios
//Declaración de variables
$entradaOK = true;

//Declaración del array de errores

$aErrores['buscar'] = null;

//Declaración del array de datos del formulario

$aFormulario['buscar'] = null;

if (isset($_POST['enviar'])) {//Código que se ejecuta cuando se env�a el formulario               
    $aErrores['buscar'] = validacionFormularios::comprobarAlfabetico($_POST['buscar'], 3, 1, 0);
    foreach ($aErrores as $campo) { //recorre el array en busca de mensajes de error
        if ($campo != null) {
            $entradaOK = false; //cambia la condiccion de la variable
        }
    }
} else {
    $entradaOK = false; //cambiamos el valor de la variable porque no se ha pulsado el bot�n de enviar
}
    ?>
    <h3>Ejercicio 4 | Buscar Dept.</h3>
    <form name="form1" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" style="text-align: center;">
        <label>Buscar departamento</label>
        <input type="text" name="buscar" placeholder="Cod. Dept." value="<?php
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
    if(isset($_POST['buscar'])){
        $aFormulario['buscar'] = $_POST['buscar']; //en el array del formulario guardamos los datos
    }else{
        $aFormulario['buscar'] = '';
    }
    
    if($aErrores['buscar']==null && $aFormulario['buscar']!=null){
    try {
        $conn = new PDO("mysql:host=" . SERVER . ";dbname=" . DB, USER, PASSWD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM Departamento where CodDepartamento LIKE '%".$aFormulario["buscar"]."%'"; //Los : que van delante, es para indicar que sera una consulta preparada
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $consulta = $conn->query($sql);
        
        echo '<h2>Listado de  departamentos</h2>';
        echo '<table id="encuesta" style="text-align:center;margin-top:20px;margin-bottom:40px;">';
        echo '<caption>DEPARTAMENTOS</caption>';
        echo '<tr>';
        echo '<th>Código</th>';
        echo '<th>Descripción</th>';
        echo '</tr>';
        while ($registro = $consulta->fetchObject()) { //Al realizar el fetchObject, se pueden sacar los datos de $registro como si fuera un objeto
            echo '<tr>';
                echo "<td>" . $registro->CodDepartamento . "</td><td>" . $registro->DescDepartamento . "</td>";
            echo '</tr>';
        }
        } catch (Exception $exc) {
            echo "Error: $exc->getMessage() <br>";
            echo "Codigo del error: $exc->getCode() <br>";
        } finally {
            unset($conn);
        }
    }else{
        try{
        $conn = new PDO("mysql:host=" . SERVER . ";dbname=" . DB, USER, PASSWD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //Mostrar todos los registros en una tabla
        $sql = "SELECT * FROM Departamento"; 
        $consulta = $conn->query($sql);

        echo '<h2>Listado de  departamentos</h2>';
        echo '<table id="encuesta" style="text-align:center;margin-top:20px;margin-bottom:40px;">';
        echo '<caption>DEPARTAMENTOS</caption>';
        echo '<tr>';
        echo '<th>Código</th>';
        echo '<th>Descripción</th>';
        echo '</tr>';
        while ($registro = $consulta->fetchObject()) { //Al realizar el fetchObject, se pueden sacar los datos de $registro como si fuera un objeto
            echo '<tr>';
                echo "<td>" . $registro->CodDepartamento . "</td><td>" . $registro->DescDepartamento . "</td>";
            echo '</tr>';
        }
        } catch (Exception $exc) {
            echo "Error: $exc->getMessage() <br>";
            echo "Codigo del error: $exc->getCode() <br>";
        } finally {
            unset($conn);
        }
    }

?>

<?php require '../core/pie.php'; ?>