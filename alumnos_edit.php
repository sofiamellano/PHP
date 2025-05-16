<?php

    if (isset($_POST['btnGuardar'])) {
        $alumno = mysqli_real_escape_string($cnn, $_POST['alumno']);
        $direccion = mysqli_real_escape_string($cnn, $_POST['direccion']);
        $idalumno = isset($_POST['idalumno']) ? intval($_POST['idalumno']) : 0;

    if ($idalumno > 0) {
            // Edición
            $sql = "UPDATE alumnos SET alumno = '$alumno', direccion = '$direccion' WHERE idalumno = $idalumno";
            $success_message = 'Alumno actualizado correctamente.';
        } else {
            // Alta
            $sql = "INSERT INTO alumnos (alumno, direccion) VALUES ('$alumno', '$direccion')";
            $success_message = 'Alumno guardado correctamente.';
        }
    $resp = mysqli_query($cnn, $sql);
}

// Obtener datos para edición (si se proporciona ID)
$campos = [];
$titulo = 'Agregar Alumno';
$subtitulo = 'Complete el formulario para registrar un nuevo alumno.';

if (isset($_GET['idalumno'])) {
    $id = intval($_GET['idalumno']);
    $sql = "SELECT * FROM alumnos WHERE idalumno = $id";
    $resp = mysqli_query($cnn, $sql);

    if ($resp && mysqli_num_rows($resp) > 0) {
        $campos = mysqli_fetch_array($resp);
        $titulo = 'Editar Alumno';
        $subtitulo = 'Modifique los datos del alumno.';
    } else {
        echo '<div class="alert alert-warning text-center">No se encontró el alumno solicitado.</div>';
    }
}
?>

<div class="container mt-5">
    <div class="text-center mb-4">
        <h2 class="fw-bold"><?php echo $titulo; ?></h2>
        <p class="text-muted"><?php echo $subtitulo; ?></p>
    </div>

    <form method="post" action="" class="bg-white p-4 rounded-4 shadow-sm border-0" style="max-width: 500px; margin: auto;">
        <input type="hidden" name="idalumno" id="idalumno" value="<?php echo isset($campos['idalumno']) ? htmlspecialchars($campos['idalumno']) : ''; ?>">

        <div class="mb-3">
            <label for="alumno" class="form-label fw-semibold">Alumno</label>
            <input type="text" class="form-control rounded-3" id="alumno" name="alumno" 
                value="<?php echo isset($campos['alumno']) ? htmlspecialchars($campos['alumno']) : ''; ?>" 
                placeholder="Ingrese el nombre del alumno" required>
        </div>

        <div class="mb-3">
            <label for="direccion" class="form-label fw-semibold">Dirección</label>
            <input type="text" class="form-control rounded-3" id="direccion" name="direccion" 
                value="<?php echo isset($campos['direccion']) ? htmlspecialchars($campos['direccion']) : ''; ?>" 
                placeholder="Ingrese la dirección del alumno" required>
        </div>

        <div class="text-end">
            <button type="submit" name="btnGuardar" class="btn btn-primary rounded-pill px-4 me-2">
                <i class="bi bi-save me-1"></i>Guardar
            </button>
            <a href="index.php?seccion=alumnos&accion=listar" class="btn btn-outline-secondary rounded-pill px-4">
                <i class="bi bi-arrow-left me-1"></i>Volver
            </a>
        </div>
    </form>
</div>
