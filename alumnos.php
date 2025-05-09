<?php
include 'cnn.php';

    if (isset($_POST['btnEnviar'])) {
        echo '<h1>Datos enviados correctamente</h1>';
        
        $sql = "INSERT INTO alumnos (nombre, direccion) VALUES ('".$_POST['nombre']."', '".$_POST['direccion']."')";	
        $resp = mysqli_query($cnn, $sql);
    }
?>

<a href="alumnos.php">Limpiar</a>

<form action="" method="post">

    <input type="text" name="nombre" placeholder="Nombre" id="">
    <br>
    <br>
    <input type="text" name="direccion" placeholder="Direccion" id="">
    <br>
    <br>
    <input type="submit" name="btnEnviar" value="Enviar">
</form>

<?php
include 'alumnos_listar.php';
?>