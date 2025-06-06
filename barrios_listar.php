<?php
    if (isset($_GET['ideliminar'])) {
        $sql = "UPDATE barrios SET deleted = 1 WHERE idbarrio = " . intval($_GET['ideliminar']);
        $resp = mysqli_query($cnn, $sql);
    }
?>

<div class="container mt-5">
    <!-- Título y botón agregar -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-black mb-0">Barrios</h2>
        <a class="btn btn-success" href="index.php?seccion=barrios&accion=edit">
        <i class="bi bi-plus-circle me-1"></i> Agregar
        </a>
    </div>

    <!-- Tabla -->
    <div class="table-responsive">
        <table class="table table-dark table-striped table-bordered align-middle">
        <thead>
            <tr>
            <th scope="col">ID Barrio</th>
            <th scope="col">Barrio</th>
            <th scope="col" class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = 'SELECT * FROM barrios WHERE deleted = 0';
            $resp = mysqli_query($cnn, $sql);
            while ($campos = mysqli_fetch_array($resp)) {
            ?>
            <tr>
                <td><?= $campos['idbarrio']; ?></td>
                <td><?= $campos['barrio']; ?></td>
                <td class="text-center">
                <a class="btn btn-sm btn-warning me-2" href="index.php?seccion=barrios&accion=edit&idbarrio=<?= $campos['idbarrio']; ?>">
                    <i class="bi bi-pencil-fill"></i> Editar
                </a>
                <a class="btn btn-sm btn-danger" onclick="confirmarEliminacion(event, 'index.php?seccion=barrios&accion=listar&ideliminar=<?= $campos['idbarrio']; ?>')">
                    <i class="bi bi-trash-fill"></i> Eliminar
                </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
        </table>
    </div>
</div>
