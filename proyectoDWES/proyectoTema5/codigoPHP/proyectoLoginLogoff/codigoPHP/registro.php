<?php
session_start();
if (isset($_SESSION['usuarioDAW205AppLogInLogOut'])) {
    header('Locate: programa.php');
}
if (isset($_POST['volver'])) {
    header('Location: ../index.php');
}
if (isset($_POST['registrar'])) {
    require '../core/libreriaValidacionFormularios.php';
//Declaración de variables
    $entradaOK = true;

//Declaración del array de errores

    $aErrores['codUser'] = null;
    $aErrores['descUser'] = null;
    $aErrores['password'] = null;

//Declaración del array de datos del formulario

    $aFormulario['codUser'] = null;
    $aFormulario['descUser'] = null;
    $aFormulario['password'] = null;

    $aErrores['codUser'] = validacionFormularios::comprobarAlfabetico($_POST['codUser'], 15, 1, 1);
    $aErrores['descUser'] = validacionFormularios::comprobarAlfabetico($_POST['descUser'], 250, 1, 1);
    $aErrores['password'] = validacionFormularios::comprobarAlfaNumerico($_POST['password'], 20, 1, 1);

    foreach ($aErrores as $campo) { //recorre el array en busca de mensajes de error
        if ($campo != null) {
            $entradaOK = false; //cambia la condiccion de la variable
        }
    }

    if ($entradaOK) { //si el valor es true procesamos los datos que hemos recogido   
        $aFormulario['codUser'] = strtolower($_POST['codUser']); //en el array del formulario guardamos los datos
        $aFormulario['descUser'] = $_POST['descUser']; //en el array del formulario guardamos los datos
        $aFormulario['password'] = $_POST['password']; //en el array del formulario guardamos los datos

        require '../config/conexion.php';
        try {
            $conn = new PDO("mysql:host=" . SERVER . ";dbname=" . DB, USER, PASSWD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exc) {
            echo "Error: $exc->getMessage() <br>";
            echo "Codigo del error: $exc->getCode() <br>";
        }
        try {
            $sql = "INSERT INTO `Usuario` (`CodUsuario`, `DescUsuario`, `Password`, `Perfil`, `FechaHoraUltimaConexion`, `NumConexiones`, `ImagenUsuario`) VALUES (:codUser, :descUser, :password, 'usuario', CURRENT_TIMESTAMP, '0', NULL)"; //Los : que van delante, es para indicar que sera una consulta preparada
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":codUser", $aFormulario["codUser"]);
            $stmt->bindParam(":descUser", $aFormulario["descUser"]);
            $passwordHash = hash('sha256', $aFormulario["codUser"] . $aFormulario['password']);
            $stmt->bindParam(":password", $passwordHash);
            $stmt->execute();

            header('Location: login.php');
        } catch (PDOException $exc) {
            echo "Error: " . $exc->getMessage();
            echo "<br>Codigo del error: " . $exc->getCode();
            if ($exc->getCode() === "23000") {
                $aErrores['codUserDuplicado'] = "Ya existe este usuario";
            }
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
            body{
                box-sizing: border-box;
            }
            #content{
                width:600px;
                height: 650px;
                margin: auto;
                margin-top: 120px;
                background: linear-gradient(to right,  hsl(211, 20%, 30%, 85%), hsl(211, 40%, 30%, 45%), hsl(211, 100%, 30% , 20%));
                padding: 50px;
                border-radius: 10px;
                color:white;
            }
            a, a:hover, a:link, a:active{
                text-decoration: none;
                color: white;
            }
            .menu{
                display:inline-block;
                width:49%;
                text-align: center;
                background: #0069D9;
                padding: 15px 20px;
                color:white;
                border-radius: 7px;
                font-family: Montserrat, sans-serif;
                position: relative;
                transition: 0.3s ease;
            }
            .menu:hover{
                 background: linear-gradient(to right,  hsl(211, 20%, 30%, 85%), hsl(211, 40%, 30%, 45%), hsl(211, 100%, 30% , 20%));
            }
            button{
                width:100%;
                margin-bottom: 10px;
            }
            article{
                width:500px;
                height: 400px;
                position:absolute;
                color:white;
            }
            .seleccionado{
                display:inline-block;
                width:49%;
                text-align: center;
                background: linear-gradient(to right,  hsl(211, 20%, 30%, 85%), hsl(211, 40%, 30%, 45%), hsl(211, 100%, 30% , 20%));
                padding: 15px 20px;
                color:white;
                border-radius: 7px;
                font-family: Montserrat, sans-serif;
                position: relative;
                transition: 0.3s ease;
            }
        </style>
    </head>
    <body >
        <div id="topBar">Proyecto LogIn-LogOut</div>
        <div id="content">
            <nav >
                <?php
                if($_COOKIE['idioma']==="cas"){
                    echo '<a href="login.php" class="menu" >Iniciar Sesión<a>';
                    echo '<a href="#" class="seleccionado">Registro<a>';
                }else{
                    echo '<a href="login.php" class="menu">Log In<a>';
                    echo '<a href="#" class="seleccionado">Sign In<a>';
                }
                
                ?>
                <article id="a2">
                    <form name="registro" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                        <div class="form-group">
                            <label for="codUser">Código de usuario</label>
                            <input type="text" name="codUser" class="form-control" id="codUser" aria-describedby="codUser" placeholder="Introduce código de usuario" value="<?php 
                            if(isset($_POST['registrar']) &&!isset($aErrores['codUserDuplicado']) && !isset($aErrores['codUser'])){
                                echo $_POST['codUser'];
                            }
                            ?>">
                            <?php
                            if (isset($aErrores['codUserDuplicado'])) {
                                echo '<div class="alert alert-danger" role="alert">';
                                echo 'Ya existe el usuario '.$_POST['codUser']; 
                                echo '</div>';
                            }else if (isset($aErrores['codUser'])) {
                                echo '<div class="alert alert-danger" role="alert">';
                                echo 'Introduce un código válido'; 
                                echo '</div>';
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="descUser">Descripción</label>
                            <input type="text" name="descUser" class="form-control" id="descUser" aria-describedby="descUser" placeholder="Introduce descripción del usuario" value="<?php 
                            if(isset($_POST['registrar']) && !isset($aErrores['descUser']) && !isset($aErrores['codUserDuplicado'])){
                                echo $_POST['descUser'];
                            }?>">
                            <?php
                            if (isset($aErrores['descUser'])) {
                                echo '<div class="alert alert-danger" role="alert">';
                                echo 'Introduce una descripción válida'; 
                                echo '</div>';
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Contraseña</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Introduce contraseña">
                            <?php
                            if (isset($aErrores['password'])) {
                                echo '<div class="alert alert-danger" role="alert">';
                                echo 'Introduce una contraseña válida'; 
                                echo '</div>';
                            }
                            ?>
                        </div>
                        <div class="form-group form-check">
                        </div>
                        <button type="submit" name="registrar" class="btn btn-primary">Registrar usuario</button>
                        <button type="submit" name="volver" class="btn btn-secondary" style="float:right;">Volver atrás</button>
                    </form>
                </article>
            </nav>

        </div>
        <footer>
            <address>
                <a href="../../../indexProyectoTema5.html	">&copy2019 Alex Dominguez</a>
                <a href="http://daw-usgit.sauces.local/Alex/proyectoLogInLogOff/tree/master" target="_blank"><img src="../images/gitlab.png" alt="asd" width="40" style="float:right;"/></a>
            </address>
        </footer>
    </body>
</html>