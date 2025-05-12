<?php
include "cnn.php";

$lcSeccion = '';
$lcAccion = '';

if (isset($_GET['seccion'])) {
    $lcSeccion = $_GET['seccion'];
}

if (isset($_GET['accion'])) {
    $lcAccion = $_GET['accion'];
}

$lcArchivo = $lcSeccion.'_'.$lcAccion.'.php';

if (!file_exists($lcArchivo)) {
    $lcArchivo = 'inicio.php';
}


?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Panel de Gestión</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold" href="index.php"><i class="bi bi-speedometer2 me-2"></i>Inicio</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-3">
          <li class="nav-item">
            <a class="nav-link active" href="index.php/seccion=alumnos&accion=listar"><i class="bi bi-person-fill me-1"></i>Alumnos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?seccion=provincias&accion=listar"><i class="bi bi-geo-alt-fill me-1"></i>Provincias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php/seccion=localidadess&accion=listar"><i class="bi bi-buildings-fill me-1"></i>Localidades</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php/seccion=barrios&accion=listar"><i class="bi bi-house-door-fill me-1"></i>Barrios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="bi bi-gear-fill me-1"></i>Configuraciones</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main class="container my-5" >
    <?php
        include $lcArchivo;
    ?>
  </main>

 <!-- Footer -->
<footer class="bg-dark text-white text-center py-4 mt-5">
  <div class="container">
    <p class="mb-1">&copy; 2025 Panel de Gestión. Todos los derechos reservados.</p>
    <p class="mb-0">
      <a href="#" class="text-decoration-none text-light me-3">Términos</a>
      <a href="#" class="text-decoration-none text-light me-3">Privacidad</a>
      <a href="#" class="text-decoration-none text-light">Contacto</a>
    </p>
  </div>
</footer>


  <!-- Scripts Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <
  
<script>
  function confirmarEliminacion(event, url) {
    event.preventDefault();
    Swal.fire({
      title: '¿Estás seguro?',
      text: "Esta acción eliminará la provincia.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#6c757d',
      confirmButtonText: 'Sí, eliminar',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = url;
      }
    });
  }
</script>

</body>
</html>
