<?php
session_start();
if (!isset($_SESSION["usuarioDAW205AppLogInLogOut"])) {
    header('Location: login.php');
}
if (isset($_POST['volver'])) {
    header('Location: editarPerfil.php');
}
if (isset($_POST['guardarClave'])) {
    require '../core/libreriaValidacionFormularios.php';
    //Declaración de variables
    $entradaOK = true;

//Declaración del array de errores
    $aErrores['passActual'] = null;
    $aErrores['passNueva'] = null;
    $aErrores['repPassNueva'] = null;

//Declaración del array de datos del formulario
    $aFormulario['passActual'] = null;
    $aFormulario['passNueva'] = null;
    $aFormulario['repPassNueva'] = null;

//Validación de campos
    $aErrores['passActual'] = validacionFormularios::comprobarAlfabetico($_POST['passActual'], 64, 1, 1);
    $aErrores['passNueva'] = validacionFormularios::comprobarAlfabetico($_POST['passNueva'], 64, 1, 1);
    $aErrores['repPassNueva'] = validacionFormularios::comprobarAlfabetico($_POST['repPassNueva'], 64, 1, 1);

    foreach ($aErrores as $campo) { //recorre el array en busca de mensajes de error
        if ($campo != null) {
            $entradaOK = false; //cambia la condiccion de la variable
        }
    }

    if ($entradaOK) { //si el valor es true procesamos los datos que hemos recogido   
        $aFormulario['passActual'] = $_POST['passActual'];
        $aFormulario['passNueva'] = $_POST['passNueva'];
        $aFormulario['repPassNueva'] = $_POST['repPassNueva'];

        if ($aFormulario['passNueva'] === $aFormulario['repPassNueva']) {
            require '../config/conexion.php';
            try {
                $conn = new PDO("mysql:host=" . SERVER . ";dbname=" . DB, USER, PASSWD);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $exc) {
                echo "Error: " . $exc->getMessage() . "<br>";
                echo "Codigo del error: " . $exc->getCode() . "<br>";
            }

            try {
                $sql = "SELECT PASSWORD FROM `Usuario` WHERE `CodUsuario`=':codUser'";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":codUser", $_SESSION['usuarioDAW205AppLogInLogOut']);
                $stmt->execute();
                $consulta = $conn->query($sql);

                $registro = $consulta->fetchObject(); //S
                echo '<br><br>';
                echo $_SESSION['usuarioDAW205AppLogInLogOut'];
                var_dump($registro);
            } catch (PDOException $exc) {
                echo "<br><br>Error: " . $exc->getMessage();
                echo "<br>Codigo del error: " . $exc->getCode();
            }
        } else {
            $aErrores['coincidencia'] = "No coincide la nueva contraseña";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <meta name="author" content="Alex Dominguez Dominguez"/>
        <meta name="generator" content="notepad++"/>
        <meta name="robots" content="index, follow">
        <link rel="shortcut icon" type="image/png" href="../../core/images/favicon.png"/>
        <link href="css/reset.css"   rel="stylesheet"         type="text/css" >
        <title>Alex Dominguez</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="../webroot/css/style.css"  rel="stylesheet"         type="text/css" title="Default style">
        <style>
            input,label{
                float:left;
            }
            .form-control{
                width: 70%;
                float: right;
            }
            input[type='submit']{
                margin: 10px;
                float:right;
            }
            #content{
                width:650px;
                height: 500px;
                margin: auto;
                margin-top: 200px;
                padding: 50px;
                border-radius: 10px;
                color:white;
                background: linear-gradient(to right,  hsl(211, 20%, 30%, 85%), hsl(211, 40%, 30%, 45%), hsl(211, 100%, 30% , 20%));
            }
        </style>
    </head>
    <body >
        <div id="topBar">Proyecto Tema 5: LogIn-LogOut</div>
        <div id="content">
            <?php if ($_COOKIE['idioma'] == "cas") {
                ?><h1>Cambiar Contraseña No funciona de momento</h1>
            <?php } else if ($_COOKIE['idioma'] == "eng") { ?>
                <h1>Change Password</h1>
            <?php } ?>
            <form action="<?php echo 'cambiarPassword.php' ?>" method="post">
                <div class="form-group">
                    <label for="passActual">Password actual</label>
                    <input type="password" name="passActual" class="form-control" id="passActual" aria-describedby="passActual">
                </div><br>
                <div class="form-group">
                    <label for="passNueva">Password nueva</label>
                    <input type="password" name="passNueva" class="form-control" id="passNueva" aria-describedby="passNueva">
                </div><br>
                <div class="form-group">
                    <label for="repPassNueva">Repita la password</label>
                    <input type="password" name="repPassNueva" class="form-control" id="repPassNueva" aria-describedby="repPassNueva">
                </div><br>
                <?php
                if (isset($aErrores['passActual'])) {
                    echo '<div class="alert alert-danger" role="alert">';
                    echo 'La password actual no es válida';
                    echo '</div>';
                } else if (isset($aErrores['coincidencia'])) {
                    echo '<div class="alert alert-danger" role="alert">';
                    echo $aErrores['coincidencia'];
                    echo '</div>';
                }
                ?>
                <input type="submit" name="volver" class="btn btn-secondary" value="Volver">
                <input type="submit" name="guardarClave" class="btn btn-primary" value="Guardar">
            </form>
        </div>
    </body>
    <footer>
        <address>
            <a href="../../indexProyectoTema5.html">&copy2019 Alex Dominguez</a>
            <a href="http://daw-usgit.sauces.local/Alex/proyectoLogInLogOff/tree/master" target="_blank"><img src="../images/gitlab.png" alt="asd" width="40" style="float:right;"/></a>
        </address>
    </footer>
</body>
</html>