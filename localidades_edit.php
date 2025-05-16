<?php
if (isset($_POST['btnGuardar'])) {
    $localidad = mysqli_real_escape_string($cnn, $_POST['localidad']); // Seguridad básica
    $idlocalidad = isset($_POST['idlocalidad']) ? intval($_POST['idlocalidad']) : 0;

    if ($idlocalidad > 0) {
        $sql = "UPDATE localidades SET localidad = '$localidad' WHERE idlocalidad = $idlocalidad";
        $success_message = 'Localidad actualizada correctamente.';
    } else {
        $sql = "INSERT INTO localidades (localidad) VALUES ('$localidad')";
        $success_message = 'Localidad guardada correctamente.';
    }

    $resp = mysqli_query($cnn, $sql);
}

// Obtener datos para edición (si se proporciona ID)
$campos = [];
$titulo = 'Agregar Localidad';
$subtitulo = 'Complete el formulario para registrar una nueva localidad.';

if (isset($_GET['idlocalidad'])) {
    $id = intval($_GET['idlocalidad']);
    $sql = "SELECT * FROM localidades WHERE idlocalidad = $id";  
    $resp = mysqli_query($cnn, $sql);

    if ($resp && mysqli_num_rows($resp) > 0) {
        $campos = mysqli_fetch_array($resp);
        $titulo = 'Editar Localidad';
        $subtitulo = 'Modifique los datos de la localidad.';
    } else {
        echo '<div class="alert alert-warning text-center">No se encontró la localidad solicitada.</div>';
    }
}
?>

<div class="container mt-5">
    <div class="text-center mb-4">
        <h2 class="fw-bold"><?php echo $titulo; ?></h2>
        <p class="text-muted"><?php echo $subtitulo; ?></p>
    </div>

    <form method="post" action="" class="bg-white p-4 rounded-4 shadow-sm border-0" style="max-width: 500px; margin: auto;">
        <input type="hidden" name="idlocalidad" id="idlocalidad" value="<?php echo isset($campos['idlocalidad']) ? htmlspecialchars($campos['idlocalidad']) : ''; ?>">

        <div class="mb-3">
        <label for="localidad" class="form-label fw-semibold">Localidad</label>
        <input type="text" class="form-control rounded-3" id="localidad" name="localidad" 
                value="<?php echo isset($campos['localidad']) ? htmlspecialchars($campos['localidad']) : ''; ?>" 
                placeholder="Ingrese el nombre de la localidad" required>
        </div>

        <div class="text-end">
        <button type="submit" name="btnGuardar" class="btn btn-primary rounded-pill px-4 me-2">
            <i class="bi bi-save me-1"></i>Guardar
        </button>
        <a href="index.php?seccion=localidades&accion=listar" class="btn btn-outline-secondary rounded-pill px-4">
            <i class="bi bi-arrow-left me-1"></i>Volver
        </a>
        </div>
    </form>
</div>
