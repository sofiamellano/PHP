<?php
    if (isset($_GET['ideliminar'])) {
    $ideliminar = $_GET['ideliminar'];
    $sql = "UPDATE alumnos SET deleted = 1 WHERE idalumno = $ideliminar";
    mysqli_query($cnn, $sql);
    }
?>

<div class="container mt-5">
    <!-- Título y botón agregar -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-black mb-0">Alumnos</h2>
            <a class="btn btn-success" href="index.php?seccion=alumnos&accion=edit">
                <i class="bi bi-plus-circle me-1"></i> Agregar
            </a>
    </div>

    <!-- Tabla -->
    <div class="table-responsive">
        <table class="table table-dark table-striped table-bordered align-middle">
            <thead>
                <tr>
                    <th scope="col">ID Alumno</th>
                    <th scope="col">Alumno</th>
                    <th scope="col" class="text-center">Direccion</th>
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
            </thead>
                <tbody>
                <?php
                $sql = 'SELECT * FROM alumnos WHERE deleted = 0';
                $resp = mysqli_query($cnn, $sql);
                while ($campos = mysqli_fetch_array($resp)) {
                ?>
                    <tr>
                        <td><?= $campos['idalumno']; ?></td>
                        <td><?= $campos['alumno']; ?></td>
                        <td><?= $campos['direccion']; ?></td>
                        <td class="text-center">
                            <a class="btn btn-sm btn-warning me-2" href="index.php?seccion=alumnos&accion=edit&idalumno=<?= $campos['idalumno']; ?>">
                                <i class="bi bi-pencil-fill"></i> Editar
                            </a>
                            <a class="btn btn-sm btn-danger" onclick="confirmarEliminacion(event, 'index.php?seccion=alumnos&accion=listar&ideliminar=<?= $campos['idalumno']; ?>')">
                                <i class="bi bi-trash-fill"></i> Eliminar
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
        </table>
    </div>
</div>

