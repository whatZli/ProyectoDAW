<?php
    if(isset($_POST['volver'])){
        header('Location: programa.php');
    }
?>
<h1>Has accedido a detalle.php</h1>
<form action="<?php echo 'programa.php'?>" method="post">
    <input type="submit" name="volver" value="Volver">
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