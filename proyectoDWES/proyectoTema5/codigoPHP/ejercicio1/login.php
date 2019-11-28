<?php
    if ($_SERVER['PHP_AUTH_USER'] != 'alex' || $_SERVER['PHP_AUTH_PW'] != 'paso') {
        header('WWW-Authenticate: Basic Realm="Contenido restringido"');
        header('HTTP/1.0 401 Unauthorized');
    } else {
        header('Location: programa.php');
    }

?>