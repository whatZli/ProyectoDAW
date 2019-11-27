<?php

if ($_SERVER['PHP_AUTH_USER'] != 'heraclio' || $_SERVER['PHP_AUTH_PW'] != 'paso') {
    header('WWW-Authenticate: Basic Realm="Contenido restringido"');
    header('HTTP/1.0 401 Unauthorized');
    echo "Usuario no reconocido!";
    exit;
} else {
    header('Location: programa.php');
}
?>