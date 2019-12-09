<?php
session_start();
if (isset($_SESSION['usuarioDAW205AppLogInLogOut'])) {
    header('Locate: programa.php');
}
if (isset($_POST['volver'])) {
    header('Location: ../index.php');
}
if (isset($_POST['iniciarSesion'])) {
    require '../config/conexion.php';
    try {
        $conn = new PDO("mysql:host=" . SERVER . ";dbname=" . DB, USER, PASSWD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $exc) {
        echo "Error: $exc->getMessage() <br>";
        echo "Codigo del error: $exc->getCode() <br>";
    }
    try {
        $usuarioIntroducido = $_POST['loginUsuario'];
        $passwordIntroducido = $_POST['loginPassword'];
        $sql = "SELECT * FROM `Usuario` WHERE CodUsuario='$usuarioIntroducido' AND Password=SHA2('$usuarioIntroducido$passwordIntroducido',256)";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $consulta = $conn->query($sql);

        $registro = $consulta->fetchObject(); //S
        if ($registro != NULL) {
            $_SESSION['usuarioDAW205AppLogInLogOut'] = $registro->CodUsuario;
            $_SESSION['descripcionDAW205AppLogInLogOut'] = $registro->DescUsuario;
            $_SESSION['perfilDAW205AppLogInLogOut'] = $registro->Perfil;
            $_SESSION['uConexiónDAW205AppLogInLogOut'] = $registro->FechaHoraUltimaConexion; //Se guarda la última fecha de conexión
            $_SESSION['numConexiónDAW205AppLogInLogOut'] = $registro->NumConexiones + 1; //Se guarda el número de conexiones
//Cambiar la fecha de conexión a la actual
            try {
                $sql1 = "UPDATE `Usuario` SET `FechaHoraUltimaConexion` = NULL  WHERE `Usuario`.`CodUsuario` = '$usuarioIntroducido'";
                $stmt = $conn->prepare($sql1);
                $stmt->execute();
            } catch (Exception $exc) {
                echo "Error: $exc->getMessage() <br>";
                echo "Codigo del error: $exc->getCode() <br>";
            }
//Cambiar el numero de conexiones a la app
            try {
                $sql2 = "UPDATE `Usuario` SET `NumConexiones` = `NumConexiones`+1 WHERE `Usuario`.`CodUsuario` = '$usuarioIntroducido'";
                $stmt2 = $conn->prepare($sql2);
                $stmt2->execute();
            } catch (Exception $exc) {
                echo "Error: $exc->getMessage() <br>";
                echo "Codigo del error: $exc->getCode() <br>";
            } finally {
                unset($conn);
            }

            header('Location: programa.php');
        } else {
            $aErrores['errorLogin'] = "Error en el usuario o contraseña";
        }
    } catch (PDOException $exc) {
        echo "Error: $exc->getMessage() <br>";
        echo "Codigo del error: $exc->getCode() <br>";
    } finally {
        unset($conn);
    }
}
if (isset($_GET['idioma'])) {
    if ($_GET['idioma'] === "eng") {
        setcookie('idioma', "eng", time() + 7 * 24 * 60 * 60); //La Cookie tiene un periodo de vida de 7 días
        header("Location: login.php");
    }
    if ($_GET['idioma'] === "cas") {
        setcookie('idioma', "cas", time() + 7 * 24 * 60 * 60); //La Cookie tiene un periodo de vida de 7 días
        header("Location: login.php");
    }
}
if (!isset($_COOKIE['idioma'])) {
    setcookie('idioma', "cas", time() + 7 * 24 * 60 * 60); //La Cookie tiene un periodo de vida de 7 días
    header("Location: login.php");
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
            .bg-custom {

            }

            .bg-custom-1 {
                background: linear-gradient(to right,  #007bff, #039BE6, #028BCF);
            }
            #content{
                width:600px;
                height: 500px;
                margin: auto;
                margin-top: 70px;
                background: linear-gradient(to right,  #007bff, #039BE6, #028BCF);
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
                background: #039BE6;
                padding: 15px 20px;
                color:white;
                border-radius: 7px;
                font-family: Montserrat, sans-serif;
                position: relative;
                transition: 0.3s ease;
            }
            .menu:hover{
                background: #2F60BB;
            }
            .seleccionado{
                display:inline-block;
                width:49%;
                text-align: center;
                background: #2F60BB;
                padding: 15px 20px;
                color:white;
                border-radius: 7px;
                font-family: Montserrat, sans-serif;
                position: relative;
                transition: 0.3s ease;
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

            .idioma{
                margin-top: 100px;
                display: block;
                text-align: center;
            }
            .idioma a{
                margin: 0 20px 10px 20px;
            }
        </style>
    </head>
    <body >
        <div id="topBar">Proyecto Tema 5: LogIn-LogOut</div>
        <nav class="idioma">
            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?idioma=cas">Castellano</a>
            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?idioma=eng">English</a>
        </nav>
        <div id="content">
            <nav >
                <?php
                if (isset($_COOKIE['idioma'])) {
                    if ($_COOKIE['idioma'] === "eng") {
                        echo '<a href="#" class="seleccionado">Log In</a>';
                        echo '<a href="registro.php" class="menu">Sign Up</a>';
                    } else if ($_COOKIE['idioma'] === "cas") {
                        echo '<a href="#" class="seleccionado">Iniciar Sesión</a>';
                        echo '<a href="registro.php" class="menu">Registro</a>';
                    }
                } else if ($_COOKIE['idioma'] === "cas") {
                    echo '<a href="#" class="seleccionado">Iniciar Sesión</a>';
                    echo '<a href="registro.php" class="menu">Registro</a>';
                }
                ?>
                <article id="a1">
                    <form name="logIn" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                        <div class="form-group">
                            <label for="loginUsuario">Usuario</label>
                            <input type="text" name="loginUsuario" class="form-control" id="loginUsuario" aria-describedby="loginUsuario" placeholder="Introduce usuario">
                        </div>
                        <div class="form-group">
                            <label for="loginPassword">Contraseña</label>
                            <input type="password" name="loginPassword" class="form-control" id="loginPassword" placeholder="Introduce contraseña">
                        </div>
                        <div class="form-group form-check">
                        </div>
                        <?php
                        if(isset($_POST['iniciarSesion']) && isset($aErrores['errorLogin'])){
                        echo '<div class="alert alert-danger" role="alert">';
                        echo $aErrores['errorLogin'];
                        echo '</div>';
                        }
                        ?>
                        <button type="submit" name="iniciarSesion" class="btn btn-primary">Iniciar Sesión</button>
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