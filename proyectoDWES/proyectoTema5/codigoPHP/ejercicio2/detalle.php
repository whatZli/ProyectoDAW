<?php
    if(isset($_POST['volver'])){
        header('Location: programa.php');
    }
?>
<h1>Has accedido a detalle.php</h1>
<form action="<?php echo 'programa.php'?>" method="post">
    <input type="submit" name="volver" value="Volver">
</form>