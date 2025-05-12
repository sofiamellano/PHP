<?php

if (isset($_POST['btnGuardar'])) {
    $provincia = mysqli_real_escape_string($cnn, $_POST['provincia']); // Seguridad básica

    $sql = "INSERT INTO provincias (provincia) VALUES ('$provincia')";
    $resp = mysqli_query($cnn, $sql);

    if ($resp) {
        echo '<div class="alert alert-success text-center">Provincia guardada correctamente.</div>';
    } else {
        echo '<div class="alert alert-danger text-center">Error al guardar: ' . mysqli_error($cnn) . '</div>';
    }
}




?>

<div class="container mt-5">
  <div class="text-center mb-4">
    <h2 class="fw-bold">Agregar Provincia</h2>
    <p class="text-muted">Complete el formulario para registrar una nueva provincia.</p>
  </div>

  <form method="post" action="" class="bg-white p-4 rounded-4 shadow-sm border-0" style="max-width: 500px; margin: auto;">
    <input type="hidden" name="idprovincia" id="idprovincia" value="">

    <div class="mb-3">
      <label for="provincia" class="form-label fw-semibold">Provincia</label>
      <input type="text" class="form-control rounded-3" id="provincia" name="provincia" placeholder="Ingrese el nombre de la provincia" required>
    </div>

    <div class="text-end">
      <a href="index.php?seccion=provincias&accion=listar" onclick="document.forms[0].submit();" class="btn btn-primary rounded-pill px-4">
        <i class="bi bi-save me-1"></i>Guardar
      </a>
    </div>
  </form>
</div>