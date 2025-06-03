<?php

  // Eliminación lógica (marcar como eliminado)
  if (isset($_GET['ideliminar'])) {
    $sql = "UPDATE clientes SET deleted = 1 WHERE idcliente = " . $_GET['ideliminar'];
    $resp = mysqli_query($cnn, $sql);
  }
?>

<div class="container mt-5">
  <!-- Título y botón agregar -->
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="text-black mb-0">Clientes</h2>
    <a class="btn btn-success" href="index.php?seccion=clientes&accion=edit">
      <i class="bi bi-plus-circle me-1"></i> Agregar
    </a>
  </div>

  <!-- Tabla -->
  <div class="table-responsive">
    <table class="table table-dark table-striped table-bordered align-middle">
      <thead>
        <tr>
          <th>ID Cliente</th>
          <th>Cliente</th>
          <th>Dirección</th>
          <th>Documento</th>
          <th>Fecha Nac.</th>
          <th>Provincia</th>
          <th>Localidad</th>
          <th>Barrio</th>
          <th>Activo</th>
          <th class="text-center">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $sql = 'SELECT * FROM clientes WHERE deleted = 0';
          $resp = mysqli_query($cnn, $sql);

          while ($campos = mysqli_fetch_array($resp)) {
            // Obtener nombres de provincia, localidad y barrio
            $prov = mysqli_fetch_array(mysqli_query($cnn, "SELECT provincia FROM provincias WHERE idprovincia = " . $campos['idprovincia']));
            $loc = mysqli_fetch_array(mysqli_query($cnn, "SELECT localidad FROM localidades WHERE idlocalidad = " . $campos['idlocalidad']));
            $barrio = mysqli_fetch_array(mysqli_query($cnn, "SELECT barrio FROM barrios WHERE idbarrio = " . $campos['idbarrio']));
        ?>
          <tr>
            <td><?= $campos['idcliente']; ?></td>
            <td><?= $campos['cliente']; ?></td>
            <td><?= $campos['direccion']; ?></td>
            <td><?= $campos['documento']; ?></td>
            <td><?= date('d/m/Y', strtotime($campos['fecha_nacimiento'])); ?></td>
            <td><?= $prov['provincia'] ?? '—'; ?></td>
            <td><?= $loc['localidad'] ?? '—'; ?></td>
            <td><?= $barrio['barrio'] ?? '—'; ?></td>
            <td><?= $campos['activo'] ? 'Sí' : 'No'; ?></td>
            <td class="text-center">
              <a class="btn btn-sm btn-warning me-2" href="index.php?seccion=clientes&accion=edit&idcliente=<?= $campos['idcliente']; ?>">  
                <i class="bi bi-pencil-fill"></i> Editar
              </a>
              <a class="btn btn-sm btn-danger" onclick="confirmarEliminacion(event, 'index.php?seccion=clientes&accion=listar&ideliminar=<?= $campos['idcliente']; ?>')">
                <i class="bi bi-trash-fill"></i> Eliminar
              </a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

<script>
  function confirmarEliminacion(event, url) {
    event.preventDefault();
    if (confirm('¿Estás seguro de que deseas eliminar este cliente?')) {
      window.location.href = url;
    }
  }
</script>
