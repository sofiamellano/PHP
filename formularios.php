<?php
    if (isset($_GET['btnEnviar'])) {
        echo '<h1>Guardar datos que enviaron</h1>';
    }
?>

<a href="formularios.php">Limpiar</a>

<form action="" method="get">
    <input type="text" name="nombre" placeholder="Nombre" id="">
    <br>
    <input type="date" name="cumple" id="">
    <br>
    <input type="email" name="email" placeholder="Email" id="">
    <br>
    <input type="submit" name="btnEnviar" value="Enviar">
</form>