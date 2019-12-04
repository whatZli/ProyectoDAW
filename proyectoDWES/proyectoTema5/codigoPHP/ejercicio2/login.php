<?php

//define("SERVER", "192.168.0.49");
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
        $conn = new PDO("mysql:host=" . SERVER . ";dbname=" . DB, USER, PASSWD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $usuarioIntroducido = $_SERVER['PHP_AUTH_USER'];
        $passwordIntroducido = $_SERVER['PHP_AUTH_PW'];
        $sql = "SELECT * FROM `Usuario` WHERE CodUsuario='$usuarioIntroducido' AND Password=SHA2('$usuarioIntroducido$passwordIntroducido',256)";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $consulta = $conn->query($sql);
        
        $registro = $consulta->fetchObject();//S
        if($registro!=NULL){
            $usuarioDB =$registro->CodUsuario;
            $passwordDB =$registro->Password;
            header('Location: programa.php');
        }else{
            echo '<h1>Usuario incorrecto</h1>';
            echo '<a href="../../indexProyectoTema5.html">Atrás</a>';
        }
        
    } catch (PDOException $exc) {
        echo "Error: $exc->getMessage() <br>";
        echo "Codigo del error: $exc->getCode() <br>";
    } finally {
        unset($conn);
    }
    
    echo $usuario;
    echo $password;
}
?>