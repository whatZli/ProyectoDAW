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
<?php
echo '<h3>Variable Session</h3>';
echo '<h3>Variable Server</h3>';
echo '<pre>';
print_r($_SERVER);
echo '</pre>';
echo '<h3>Variable Server</h3>';
echo "<pre style='text-align:left;'>";
print_r($_SERVER) . '<br>';
echo "</pre>";
echo '<h3>Variable Cookies</h3>';
print_r($_COOKIE);
?>