<?php
if (isset($_POST['btnGuardar'])) {
    $barrio = mysqli_real_escape_string($cnn, $_POST['barrio']); // Seguridad básica
    $idbarrio = isset($_POST['idbarrio']) ? intval($_POST['idbarrio']) : 0;

    if ($idbarrio > 0) {
        $sql = "UPDATE barrios SET barrio = '$barrio' WHERE idbarrio = $idbarrio";
        $success_message = 'Barrio actualizado correctamente.';
    } else {
        $sql = "INSERT INTO barrios (barrio) VALUES ('$barrio')";
        $success_message = 'Barrio guardado correctamente.';
    }

    $resp = mysqli_query($cnn, $sql);
}

// Obtener datos para edición (si se proporciona ID)
$campos = [];
$titulo = 'Agregar Barrio';
$subtitulo = 'Complete el formulario para registrar un nuevo barrio.';

if (isset($_GET['idbarrio'])) {
    $id = intval($_GET['idbarrio']);
    $sql = "SELECT * FROM barrios WHERE idbarrio = $id";
    $resp = mysqli_query($cnn, $sql);

    if ($resp && mysqli_num_rows($resp) > 0) {
        $campos = mysqli_fetch_array($resp);
        $titulo = 'Editar Barrio';
        $subtitulo = 'Modifique los datos del barrio.';
    } else {
        echo '<div class="alert alert-warning text-center">No se encontró el barrio solicitado.</div>';
    }
}
?>

<div class="container mt-5">
    <div class="text-center mb-4">
        <h2 class="fw-bold"><?php echo $titulo; ?></h2> 
        <p class="text-muted"><?php echo $subtitulo; ?></p>
    </div>

    <form method="post" action="" class="bg-white p-4 rounded-4 shadow-sm border-0" style="max-width: 500px; margin: auto;">
        <input type="hidden" name="idbarrio" id="idbarrio" value="<?php echo isset($campos['idbarrio']) ? htmlspecialchars($campos['idbarrio']) : ''; ?>">

        <div class="mb-3">
        <label for="barrio" class="form-label fw-semibold">Barrio</label>
        <input type="text" class="form-control rounded-3" id="barrio" name="barrio" 
                value="<?php echo isset($campos['barrio']) ? htmlspecialchars($campos['barrio']) : ''; ?>" 
                placeholder="Ingrese el nombre del barrio" required>
        </div>

        <div class="text-end">
        <button type="submit" name="btnGuardar" class="btn btn-primary rounded-pill px-4 me-2">
            <i class="bi bi-save me-1"></i>Guardar
        </button>
        <a href="index.php?seccion=barrios&accion=listar" class="btn btn-outline-secondary rounded-pill px-4">
            <i class="bi bi-arrow-left me-1"></i>Volver
        </a>
        </div>
    </form>
</div>
