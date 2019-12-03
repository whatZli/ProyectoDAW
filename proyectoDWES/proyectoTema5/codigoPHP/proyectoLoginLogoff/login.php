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
        <link href="webroot/css/style.css"  rel="stylesheet"         type="text/css" title="Default style">
        <style>
            .bg-custom {
                background: linear-gradient(to right, #3848A2, #007bff, #039BE6, #028BCF, #3F51B5);
            }

            .bg-custom-1 {
                background: linear-gradient(to right,  #007bff, #039BE6, #028BCF);
            }
            #content{
                width:40%;
                margin: auto;
                margin-top: 200px;
                background: linear-gradient(to right,  #007bff, #039BE6, #028BCF);
                padding: 50px;
                border-radius: 10px;
                color:white;
            }
            @media (max-width: 1500px){
                #content{width:50%;}
            }
            @media (max-width: 1200px){
                #content{width:65%;}
            }
            @media (max-width: 1000px){
                #content{width:75%;}
            }
            @media (max-width: 700px){
                #content{width:90%;}
            }
        </style>
    </head>
    <body >
        <div id="topBar">Proyecto Tema 5: LogIn-LogOut</div>
        <div id="content">
            <?php
            if (isset($_POST['enviar'])) {

                define("SERVER", "192.168.20.19");
                define("USER", "usuarioDAW205DBProyectoTema5");
                define("PASSWD", "paso");
                define("DB", "DAW205DBProyectoTema5");

               
                    try {
                        $conn = new PDO("mysql:host=" . SERVER . ";dbname=" . DB, USER, PASSWD);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    } catch (PDOException $exc) {
                        echo "Error: $exc->getMessage() <br>";
                        echo "Codigo del error: $exc->getCode() <br>";
                    }
                    try{
                        session_start();
                        $_SESSION['usuarioDAW205AppLogInLogOut'] = $_POST['usuario'];
                        $_SESSION['passwordDAW205AppLogInLogOut'] = $_POST['password'];

                        $usuarioIntroducido = $_POST['usuario'];
                        $passwordIntroducido = $_POST['password'];
                        $sql = "SELECT * FROM `Usuario` WHERE CodUsuario='$usuarioIntroducido' AND Password=SHA2('$usuarioIntroducido$passwordIntroducido',256)";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $consulta = $conn->query($sql);

                        $registro = $consulta->fetchObject(); //S
                        if ($registro != NULL) {

                            header('Location: codigoPHP/programa.php');
                        } else {
                            echo '<h1>Error al iniciar sesión</h1>';
                        }
                    } catch (PDOException $exc) {
                        echo "Error: $exc->getMessage() <br>";
                        echo "Codigo del error: $exc->getCode() <br>";
                    } finally {
                        unset($conn);
                    }
                }
                if (isset($_POST['volver'])) {
                    header('Location: ../../indexProyectoTema5.html');
                }
            ?>
            <h1>Inicio de sesión</h1>
            <form name="form1" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <div class="form-group">
                    <label for="exampleInputText">Usuario</label>
                    <input type="text" name="usuario" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introduce usuario">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Contraseña</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Introduce contraseña">
                </div>
                <div class="form-group form-check">
                </div>
                <button type="submit" name="enviar" class="btn btn-primary">Enviar</button>
                <button type="submit" name="volver" class="btn btn-primary" style="float:right;">Volver atrás</button>
            </form>
        </div>
        <footer>
            <address>
                <a href="../../indexProyectoTema5.html	">&copy2019 Alex Dominguez</a>
                <a href="http://daw-usgit.sauces.local/Alex/ProyectoTema5/tree/master" target="_blank"><img src="images/gitlab.png" alt="asd" width="40" style="float:right;"/></a>
            </address>
        </footer>
    </body>
</html>