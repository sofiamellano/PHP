<?php
  if (isset($_GET['ideliminar'])) {
  
    $sql = "UPDATE provincias SET deleted = 1 WHERE idprovincia = " . $_GET['ideliminar'];
    $resp = mysqli_query($cnn, $sql);
  }
?>



<div class="container mt-5">
  <!-- Título y botón agregar -->
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="text-black mb-0">Provincias Listar</h2>
    <a class="btn btn-success" href="index.php?seccion=provincias&accion=alta">
      <i class="bi bi-plus-circle me-1"></i> Agregar
    </a>
  </div>

  <!-- Tabla -->
  <div class="table-responsive">
    <table class="table table-dark table-striped table-bordered align-middle">
      <thead>
        <tr>
          <th scope="col">ID Provincia</th>
          <th scope="col">Provincia</th>
          <th scope="col" class="text-center">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <!-- Ejemplo de fila -->
        <tr>
            <?php
                $sql = 'SELECT * FROM provincias WHERE !deleted';
                $resp = mysqli_query($cnn, $sql);
                while ($campos = mysqli_fetch_array($resp)) {
                ?>
                    <tr>
                        <td><?=$campos['idprovincia'];?></td>
                        <td><?=$campos['provincia'];?></td>

                        <td class="text-center">
                            <a class="btn btn-sm btn-warning me-2" href="index.php?seccion=provincias&accion=edit&accion=edit&idprovincia=<?=$campos['idprovincia'];?>">
                            <i class="bi bi-pencil-fill"></i> Editar
                            </a>
                            <a class="btn btn-sm btn-danger" 
  onclick="confirmarEliminacion(event, 'index.php?seccion=provincias&accion=listar&ideliminar=<?=$campos['idprovincia'];?>')">
  <i class="bi bi-trash-fill"></i> Eliminar
</a>
                        </td>
                    </tr>
             <?php  } 
            ?>
        </tr>
        <!-- Más filas podrían agregarse aquí dinámicamente -->
      </tbody>
    </table>
  </div>
</div>
