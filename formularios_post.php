<?php
    if (isset($_POST['btnEnviar'])) {
        echo '<h1>Guardar datos que enviaron</h1>';
        var_dump($_POST);
    }
?>

<a href="formularios_post.php">Limpiar</a>

<form action="" method="post">

    <input type="text" name="nombre" placeholder="Nombre" id="">
    <br>
    <input type="date" name="cumple" id="">
    <br>
    <input type="text" name="email" placeholder="Email" id="">
    <br>
    <input type="submit" name="btnEnviar" value="Enviar">
</form>