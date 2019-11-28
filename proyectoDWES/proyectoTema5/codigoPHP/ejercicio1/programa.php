<?php
if (isset($_POST['salir'])) {
    header('Location: ../../indexProyectoTema5.html');
}
if (isset($_POST['detalle'])) {
    header('Location: detalle.php');
}
?>
<h1>Has accedido a programa.php</h1>

<p>Usuario: <?php echo $_SERVER['PHP_AUTH_USER']; ?></p>
<p>Password: <?php echo $_SERVER['PHP_AUTH_PW']; ?></p>
<form action="<?php echo 'programa.php' ?>" method="post">
    <input type="submit" name="salir" value="Salir">
    <input type="submit" name="detalle" value="Detalle">
</form>
