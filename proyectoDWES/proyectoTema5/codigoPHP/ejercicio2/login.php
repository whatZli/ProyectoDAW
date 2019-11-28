<?php

define("SERVER", "192.168.20.19");
define("USER", "usuarioDAW205DBProyectoTema5");
define("PASSWD", "paso");
define("DB", "DAW205DBProyectoTema5");

$usuario="";
$password="";
if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {
    header('WWW-Authenticate: Basic Realm="Contenido restringido"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Se ha cancelado el LogIn';
} else {
    try {
        echo '0';
        $conn = new PDO("mysql:host=" . SERVER . ";dbname=" . DB, USER, PASSWD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo '1';
        $sql = "SELECT * FROM `Usuario` WHERE CodUsuario='" + $_SERVER['PHP_AUTH_USER'] + "' AND Password=SHA2('" + $_SERVER['PHP_AUTH_USER'] + $_SERVER['PHP_AUTH_PW'] + "',256)";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $consulta = $conn->query($sql);
        
        $registro = $consulta->fetchObject();
        $usuario=$registro->CodUsuario;
        $password=$registro->Password;
    } catch (Exception $exc) {
        echo "Error: $exc->getMessage() <br>";
        echo "Codigo del error: $exc->getCode() <br>";
    } finally {
        unset($conn);
    }
    
    echo $usuario;
    echo $password;
}
?>