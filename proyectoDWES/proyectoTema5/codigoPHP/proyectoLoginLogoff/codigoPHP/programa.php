<?php
session_start();
if (!isset($_SESSION["usuarioDAW205AppLogInLogOut"])) {
    header('Location: login.php');
}
if (isset($_POST['salir'])) {
    unset($_SESSION["usuarioDAW205AppLogInLogOut"]);
    unset($_SESSION["perfilDAW205AppLogInLogOut"]);
    unset($_SESSION["descripcionDAW205AppLogInLogOut"]);
    unset($_SESSION["uConexiónDAW205AppLogInLogOut"]);
    unset($_SESSION["numConexiónDAW205AppLogInLogOut"]);
    header('Location: login.php');
}
if (isset($_POST['detalle'])) {
    header('Location: detalle.php');
}
if (isset($_POST['perfil'])) {
    header('Location: editarPerfil.php');
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
            input{
                float:right;
                margin-left: 16px;
                position: relative;
                bottom: 30px;
            }
            #content{
                width:600px;
                margin: auto;
                margin-top: 200px;
                background: linear-gradient(to right,  hsl(211, 20%, 30%, 85%), hsl(211, 40%, 30%, 45%), hsl(211, 100%, 30% , 20%));
                padding: 50px;
                border-radius: 10px;
                color:white;
            }
        </style>
    </head>
    <body >
        <div id="topBar">Proyecto LogIn-LogOut</div>
        <div id="content">
            <form action="<?php echo 'programa.php' ?>" method="post">
                <input type="submit" name="salir" class="btn btn-warning" value="Cerrar Sesión">
                <input type="submit" name="perfil" class="btn btn-secondary" value="Perfil">
                <input type="submit" name="detalle" class="btn btn-secondary" value="Detalle"><br><br>
            </form>
            <br><br>
            <?php if ($_COOKIE['idioma'] == "cas") {
                ?><h2>Hola <?php echo ucfirst($_SESSION['descripcionDAW205AppLogInLogOut']); ?>. Esta es la <?php echo $_SESSION['numConexiónDAW205AppLogInLogOut'] ?>º vez que se conecta. La fecha de la última conexión fue <?php echo $_SESSION['uConexiónDAW205AppLogInLogOut'] ?></h2>
            <?php } else if ($_COOKIE['idioma'] == "eng") { ?>
                <h2>Welcome <?php echo ucfirst($_SESSION['descripcionDAW205AppLogInLogOut']); ?>. This is the <?php echo $_SESSION['numConexiónDAW205AppLogInLogOut'] ?>th time your connects. The time of last connection was <?php echo $_SESSION['uConexiónDAW205AppLogInLogOut'] ?></h2>
            <?php } ?>

<!--            <h4>Usuario: <?php echo $_SESSION['usuarioDAW205AppLogInLogOut']; ?></h4>
            <h4>Descripción: <?php echo $_SESSION['descripcionDAW205AppLogInLogOut']; ?></h4>
            <h4>Perfil: <?php echo $_SESSION['perfilDAW205AppLogInLogOut']; ?></h4>
            <h4>Idioma elegido: <?php echo $_COOKIE['idioma']; ?></h4>
            <h6>Última hora de conexión: <?php echo $_SESSION['uConexiónDAW205AppLogInLogOut'] ?></h6>
            <h6>Número de veces conectado: <?php echo $_SESSION['numConexiónDAW205AppLogInLogOut'] ?></h6>
-->

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