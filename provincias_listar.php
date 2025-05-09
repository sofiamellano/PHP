<div class="container mt-5">
  <!-- Título y botón agregar -->
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="text-black mb-0">Provincias Listar</h2>
    <button class="btn btn-success">
      <i class="bi bi-plus-circle me-1"></i> Agregar
    </button>
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
                            <button class="btn btn-sm btn-warning me-2">
                            <i class="bi bi-pencil-fill"></i> Editar
                            </button>
                            <button class="btn btn-sm btn-danger">
                            <i class="bi bi-trash-fill"></i> Eliminar
                            </button>
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
