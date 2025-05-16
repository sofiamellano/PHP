<?php
    if (isset($_POST['btnGuardar'])) {
        $provincia = mysqli_real_escape_string($cnn, $_POST['provincia']); // Seguridad básica
        $idprovincia = isset($_POST['idprovincia']) ? intval($_POST['idprovincia']) : 0;

        if ($idprovincia > 0) {
            $sql = "UPDATE provincias SET provincia = '$provincia' WHERE idprovincia = $idprovincia";
            $success_message = 'Provincia actualizada correctamente.';
        } else {
            $sql = "INSERT INTO provincias (provincia) VALUES ('$provincia')";
            $success_message = 'Provincia guardada correctamente.';
        }

        $resp = mysqli_query($cnn, $sql);
    }

// Obtener datos para edición (si se proporciona ID)
$campos = [];
$titulo = 'Agregar Provincia';
$subtitulo = 'Complete el formulario para registrar una nueva provincia.';

if (isset($_GET['idprovincia'])) {
    $id = intval($_GET['idprovincia']);
    $sql = "SELECT * FROM provincias WHERE idprovincia = $id";  
    $resp = mysqli_query($cnn, $sql);
    
    if ($resp && mysqli_num_rows($resp) > 0) {
        $campos = mysqli_fetch_array($resp);
        $titulo = 'Editar Provincia';
        $subtitulo = 'Modifique los datos de la provincia.';
    } else {
        echo '<div class="alert alert-warning text-center">No se encontró la provincia solicitada.</div>';
    }
}
?>

<div class="container mt-5">
  <div class="text-center mb-4">
    <h2 class="fw-bold"><?php echo $titulo; ?></h2>
    <p class="text-muted"><?php echo $subtitulo; ?></p>
  </div>

  <form method="post" action="" class="bg-white p-4 rounded-4 shadow-sm border-0" style="max-width: 500px; margin: auto;">
    <input type="hidden" name="idprovincia" id="idprovincia" value="<?php echo isset($campos['idprovincia']) ? htmlspecialchars($campos['idprovincia']) : ''; ?>">

    <div class="mb-3">
      <label for="provincia" class="form-label fw-semibold">Provincia</label>
      <input type="text" class="form-control rounded-3" id="provincia" name="provincia" 
            value="<?php echo isset($campos['provincia']) ? htmlspecialchars($campos['provincia']) : ''; ?>" 
            placeholder="Ingrese el nombre de la provincia" required>
    </div>

    <div class="text-end">
      <button type="submit" name="btnGuardar" class="btn btn-primary rounded-pill px-4 me-2">
        <i class="bi bi-save me-1"></i>Guardar
      </button>
      <a href="index.php?seccion=provincias&accion=listar" class="btn btn-outline-secondary rounded-pill px-4">
        <i class="bi bi-arrow-left me-1"></i>Volver
      </a>
    </div>
  </form>
</div>