<?php
// Inicializar valores por defecto
$titulo = 'Agregar Cliente';
$subtitulo = 'Complete el formulario para registrar un nuevo cliente.';
$campos = [];

// Conexión requerida
// require_once("conexion.php"); // Asegurate de tener esta línea según tu estructura

// Obtener datos para edición (si se proporciona ID)
if (isset($_GET['idcliente'])) {
    $id = intval($_GET['idcliente']);
    $sql = "SELECT * FROM clientes WHERE idcliente = $id";  
    $resp = mysqli_query($cnn, $sql);
    
    if ($resp && mysqli_num_rows($resp) > 0) {
        $campos = mysqli_fetch_array($resp);
        $titulo = 'Editar Cliente';
        $subtitulo = 'Modifique los datos del cliente.';
    } else {
        echo '<div class="alert alert-warning text-center">No se encontró el cliente solicitado.</div>';
    }
}

// Guardar cliente (INSERT o UPDATE)
if (isset($_POST['btnGuardar'])) {
    $idcliente = isset($_POST['idcliente']) ? intval($_POST['idcliente']) : 0;
    
    $cliente = mysqli_real_escape_string($cnn, $_POST['cliente']);
    $direccion = mysqli_real_escape_string($cnn, $_POST['direccion']);
    $documento = mysqli_real_escape_string($cnn, $_POST['documento']);
    $fecha_nacimiento = mysqli_real_escape_string($cnn, $_POST['fecha_nacimiento']);
    $idprovincia = intval($_POST['idprovincia']);
    $idlocalidad = intval($_POST['idlocalidad']);
    $idbarrio = intval($_POST['idbarrio']);
    $activo = intval($_POST['activo']);


    if ($idcliente > 0) {
        // UPDATE
        $sql = "UPDATE clientes SET 
                    cliente = '$cliente',
                    direccion = '$direccion',
                    documento = '$documento',
                    fecha_nacimiento = '$fecha_nacimiento',
                    idprovincia = $idprovincia,
                    idlocalidad = $idlocalidad,
                    idbarrio = $idbarrio,
                    activo = $activo
                WHERE idcliente = $idcliente";
        $success_message = 'Cliente actualizado correctamente.';
    } else {
        // INSERT
        $sql = "INSERT INTO clientes (cliente, direccion, documento, fecha_nacimiento, idprovincia, idlocalidad, idbarrio, activo)
                VALUES ('$cliente', '$direccion', '$documento', '$fecha_nacimiento', $idprovincia, $idlocalidad, $idbarrio, $activo)";
        $success_message = 'Cliente guardado correctamente.';
    }

    $resp = mysqli_query($cnn, $sql);

    if ($resp) {
        echo '<div class="alert alert-success text-center">' . $success_message . '</div>';
    } else {
        echo '<div class="alert alert-danger text-center">Error al guardar el cliente: ' . mysqli_error($cnn) . '</div>';
    }
}
?>


<div class="container mt-5">
  <div class="text-center mb-4">
    <h2 class="fw-bold"><?php echo $titulo; ?></h2>
    <p class="text-muted"><?php echo $subtitulo; ?></p>
  </div>

  <form method="post" action="" class="bg-white p-4 rounded-4 shadow-sm border-0" style="max-width: 500px; margin: auto;">
    <input type="hidden" name="idcliente" id="idcliente" value="<?php echo isset($campos['idcliente']) ? htmlspecialchars($campos['idcliente']) : ''; ?>">

<!-- Cliente -->
<div class="mb-3">
  <label for="cliente" class="form-label fw-semibold">Cliente</label>
  <input type="text" class="form-control rounded-3" id="cliente" name="cliente" 
        value="<?php echo isset($campos['cliente']) ? htmlspecialchars($campos['cliente']) : ''; ?>" 
        placeholder="Ingrese el nombre del cliente" required>
</div>


<!-- Dirección -->
<div class="mb-3">
  <label for="direccion" class="form-label fw-semibold">Dirección</label>
  <input type="text" class="form-control rounded-3" id="direccion" name="direccion" 
        value="<?php echo isset($campos['direccion']) ? htmlspecialchars($campos['direccion']) : ''; ?>" 
        placeholder="Ingrese la dirección" required>
</div>

<!-- Documento -->
<div class="mb-3">
  <label for="documento" class="form-label fw-semibold">Documento</label>
  <input type="text" class="form-control rounded-3" id="documento" name="documento" 
        value="<?php echo isset($campos['documento']) ? htmlspecialchars($campos['documento']) : ''; ?>" 
        placeholder="Ingrese el documento" required>
</div>

<!-- Fecha de Nacimiento -->
<div class="mb-3">
  <label for="fecha_nacimiento" class="form-label fw-semibold">Fecha de Nacimiento</label>
  <input type="date" class="form-control rounded-3" id="fecha_nacimiento" name="fecha_nacimiento" 
        value="<?php echo isset($campos['fecha_nacimiento']) ? htmlspecialchars($campos['fecha_nacimiento']) : ''; ?>" 
        required>
</div>

<!-- Provincia -->
<div class="mb-3">
  <label for="idprovincia" class="form-label fw-semibold">Provincia</label>
  <select class="form-select rounded-3" id="idprovincia" name="idprovincia" required>
    <option value="0" selected>Seleccione una provincia</option>
    <?php
      $sql = "SELECT * FROM provincias WHERE !deleted";
      $resp = mysqli_query($cnn, $sql);
      while ($prov = mysqli_fetch_array($resp)) {
        $selected = (isset($campos['idprovincia']) && $campos['idprovincia'] == $prov['idprovincia']) ? 'selected' : '';
        echo "<option value='{$prov['idprovincia']}' $selected>{$prov['provincia']}</option>";
      }
    ?>
  </select>
</div>

  <!-- Localidad -->
<div class="mb-3">
  <label for="idlocalidad" class="form-label fw-semibold">Localidad</label>
  <select class="form-select rounded-3" id="idlocalidad" name="idlocalidad" required>
    <option value="">Seleccione una localidad</option>
    <?php
      $sql = "SELECT * FROM localidades WHERE !deleted";
      $resp = mysqli_query($cnn, $sql);
      while ($loc = mysqli_fetch_array($resp)) {
        $selected = (isset($campos['idlocalidad']) && $campos['idlocalidad'] == $loc['idlocalidad']) ? 'selected' : '';
        echo "<option value='{$loc['idlocalidad']}' $selected>{$loc['localidad']}</option>";
      }
    ?>
  </select>
</div>

<!-- Barrio -->
<div class="mb-3">
  <label for="idbarrio" class="form-label fw-semibold">Barrio</label>
  <select class="form-select rounded-3" id="idbarrio" name="idbarrio" required>
    <option value="0" selected>Seleccione un barrio</option>
    <?php
      // Asegura que haya un valor por defecto seguro
      $valueIdBarrio = isset($campos['idbarrio']) ? intval($campos['idbarrio']) : 0;

      $sql = "SELECT * FROM barrios WHERE !deleted";
      $resp = mysqli_query($cnn, $sql);
      while ($barrio = mysqli_fetch_array($resp)) {
        $selected = ($valueIdBarrio == $barrio['idbarrio']) ? 'selected' : '';
        echo "<option value='{$barrio['idbarrio']}' $selected>{$barrio['barrio']}</option>";
      }
    ?>
  </select>
</div>


<!-- Campo oculto para enviar 0 si el checkbox está desmarcado -->
<input type="hidden" name="activo" value="0">

<div class="form-check mb-3">
  <input class="form-check-input" type="checkbox" id="activo" name="activo" value="1"
    <?php echo (isset($campos['activo']) && $campos['activo'] == 1) ? 'checked' : ''; ?>>
  <label class="form-check-label fw-semibold" for="activo">
    Activo
  </label>
</div>




<div class="text-end">
      <button type="submit" name="btnGuardar" class="btn btn-primary rounded-pill px-4 me-2">
        <i class="bi bi-save me-1"></i>Guardar
      </button>
      <a href="index.php?seccion=clientes&accion=listar" class="btn btn-outline-secondary rounded-pill px-4">
        <i class="bi bi-arrow-left me-1"></i>Volver
      </a>
    </div>
  </form>
</div>
