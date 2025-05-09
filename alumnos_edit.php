<?php
include 'cnn.php';

if (isset($_POST['btnEnviar'])) {
    echo '<h1>Datos modificados</h1>';
    $sql = "UPDATE alumnos SET nombre = '".$_POST['nombre']."',
    direccion = '".$_POST['direccion']."' WHERE idalumno = ".$_POST['idalumno'];
    $resp = mysqli_query($cnn, $sql);
}

if (isset($_GET['idalumno'])) {
    $idalumno = $_GET['idalumno'];
    $sql = "SELECT * FROM alumnos WHERE idalumno = $idalumno";  
    $resp = mysqli_query($cnn, $sql);
    $campos = mysqli_fetch_array($resp);
} else {
    echo '<h1>No se ha proporcionado un ID</h1>';
}
?>

<a href="alumnos.php">Limpiar</a>

<form action="" method="post">
    <input type="hidden" name="idalumno" value="<?= $campos['idalumno']; ?>">
    <input type="text" name="nombre" placeholder="Nombre" value="<?= $campos['nombre']; ?>" id="">
    <br><br>
    <input type="text" name="direccion" placeholder="Dirección" value="<?= $campos['direccion']; ?>" id="">
    <br><br>
    <input type="submit" name="btnEnviar" value="Enviar">
</form>

<?php
include 'alumnos_listar.php';
?>
