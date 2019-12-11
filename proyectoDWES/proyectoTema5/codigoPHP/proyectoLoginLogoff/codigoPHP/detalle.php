<?php
session_start();
if (!isset($_SESSION["usuarioDAW205AppLogInLogOut"])) {
    header('Location: ../login.php');
}
if (isset($_POST['volver'])) {
    header('Location: programa.php');
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
        <title>Alex DominguezD</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="../webroot/css/style.css"  rel="stylesheet"         type="text/css" title="Default style">
        <style>
            #content{
                width:120%;
                margin: 0;
                background: white;
                padding: 20px;
                border-radius: 10px;
                color:black;
                text-align: left;
            }
        </style>
    </head>
    <body >
        <div id="content">
            <form action="<?php echo 'programa.php' ?>" method="post">
                <input type="submit" name="volver" value="Volver"><br><br>
            </form>
            <?php
            echo '<h3>Variable Session</h3>';
            echo "<pre style='text-align:left;'>";
            print_r($_SESSION);
            echo "</pre>";
            echo '<h3>Variable Cookie</h3>';
            echo "<pre style='text-align:left;'>";
            print_r($_COOKIE);
            echo "</pre>";
            echo '<h3>Variable Server</h3>';
            echo "<pre style='text-align:left;'>";
            print_r($_SERVER) . '<br>';
            echo "</pre>";
            echo '<h3>PHP.ini</h3>';
            phpinfo();
            ?>
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