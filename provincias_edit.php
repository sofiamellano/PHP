<?php
if (isset($_POST['btnEnviar'])) {
    echo '<h1>Datos modificados</h1>';
    $sql = "UPDATE provincias SET provincia = '".$_POST['provincia']."' WHERE idprovincia = ".$_POST['idprovincia'];
    $resp = mysqli_query($cnn, $sql);
}

if (isset($_GET['idprovincia'])) {
    $id = $_GET['idprovincia'];
    $sql = "SELECT * FROM provincias WHERE idprovincia = $id";  
    $resp = mysqli_query($cnn, $sql);
    $campos = mysqli_fetch_array($resp);
} else {
    echo '<h1>No se ha proporcionado un ID de provincia</h1>';
}
?>


<form class="bg-white p-4 rounded-4 shadow-sm border-0" style="max-width: 500px; margin: auto;" method="post">
  <input type="hidden" name="idprovincia" id="idprovincia" value="<? = $campos['idprovincia'] ?>">

  <div class="mb-3">
    <label for="provincia" class="form-label fw-semibold">Provincia</label>
    <input type="text" class="form-control rounded-3" id="provincia" name="provincia" 
       value="<?php echo isset($campos['provincia']) ? htmlspecialchars($campos['provincia']) : ''; ?>" 
       placeholder="Ingrese el nombre de la provincia">

  </div>

  <div class="text-end">
    <button type="submit" class="btn btn-primary rounded-pill px-4">Guardar</button>
  </div>
</form>
