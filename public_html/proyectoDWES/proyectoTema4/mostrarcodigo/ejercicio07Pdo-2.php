<?php require '../core/cabecera.php';?>
   <div class="content" style="text-align:left; background-color:white; font-size:15px;">
    <?php
    $nombreFichero=basename($_SERVER["PHP_SELF"]);
    
    highlight_file("../codigoPHP/ejercicio07Pdo-2.php");
    
    require '../core/pie.php';
