<?php
session_start();
if (isset($_SESSION['usuarioDAW205AppLogInLogOut'])) {
    header('Locate: programa.php');
}
require 'config/conexion.php';
try {
    $conn = new PDO("mysql:host=" . SERVER . ";dbname=" . DB, USER, PASSWD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exc) {
    echo "Error: <br>" . $exc->getMessage();
    echo "Codigo del error: <br>" . $exc->getCode();
}

$sql = "SELECT * FROM `Departamento`";
$stmt = $conn->prepare($sql);
$stmt->execute();
$consulta = $conn->query($sql);
$registro = $consulta->fetchObject(); //S
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            :root{
                --colorLetraMain:white;
                --colorLetraHeader:black;
                --colorLetraAside:black;
                --colorLetraFooter:black;
            }
            * {
                box-sizing: border-box;
                margin:0;
                padding: 0;
            }
            body{
                width: 100%;
                height: 100vh;
                background-image: radial-gradient( circle farthest-corner at 95.9% 51.2%,  rgba(255,124,0,1) 0%, rgba(255,124,0,0.6) 15.9%, rgba(255,163,77,0.6) 15.9%, rgba(255,163,77,1) 24.4%, rgba(70,30,19,1)40.5%, rgba(19,30,37,1) 66% ) ;
            }
            header{
                background-color:#e5e5e5;
                padding:15px;
                text-align:center;
                color: var(--colorLetraHeader);
            }
            .menu {
                float:right;
                width:20%;
                text-align:center;
            }
            .menu a {
                background-color:#e5e5e5;
                padding:8px;
                margin-top:7px;
                display:block;
                width:100%;
                color: black;
            }
            .main {
                float:right;
                width:80%;
                background-color: rgba(123, 120, 124, 0.2);
                padding:0 20px;
                color: var(--colorLetraMain);
            }
            .column {
                float: right;
                width: 50%;
                padding: 15px;
            }
            .right {
                background-color:#e5e5e5;
                float:left;
                width:20%;
                padding:15px;
                margin-top:7px;
                text-align:center;
                color: var(--colorLetraAside);
            }
            footer{
                position: fixed;
                bottom: 10px;
                width: 100%;
                color: var(--colorLetraFooter);
            }
            @media only screen and (max-width:620px) {
                /* For mobile phones: */
                .menu, .main, .right ,.row, .column{
                    width:100%;
                }
            }
        </style>
    </head>
    <body style="font-family:Verdana;color:#aaaaaa;">

        <header>
            <h1>Proyecto LogInLogOut</h1>
        </header>

        <div style="overflow:auto">
            <div class="menu">
                <a href="#">Home</a>
                <a href="codigoPHP/login.php">Ir al login</a>
                <a href="../../indexProyectoTema5.html">Salir de la App</a>
            </div>

            <div class="main">
                <h2>Listado de departamentos</h2>
                <div class="row">
                    <?php  while ($registro = $consulta->fetchObject()) {?>
                    <div class="column">
                        <h2><?php echo $registro->CodDepartamento;?></h2>
                        <p>Descripción: <?php echo $registro->DescDepartamento;?></p>
                        <p>Volumen de negocio: <?php echo $registro->VolumenNegocio;?></p>
                    </div>
                    <?php } ?>
                </div>
            </div>

<!--            <div class="right">
                <h2>Acerda de</h2>
                <p>Información adicional</p>
            </div>-->
        </div>

        <footer style="background-color:#e5e5e5;text-align:center;padding:10px;margin-top:7px;"><a href="../../indexProyectoTema5.html">©2019 AlexDominguez</a></footer>

    </body>
</html>