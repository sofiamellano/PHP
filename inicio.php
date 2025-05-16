 <!-- Título -->
 <div class="container mt-5">
    <h1 class="text-center fw-bold text-dark mb-4">Panel de Gestión</h1>

    <!-- Cards -->
    <div class="row g-4">
      <div class="col-md-6 col-lg-3">
        <div class="card border-0 shadow-lg rounded-4 text-center h-100">
          <div class="card-body">
            <i class="bi bi-person-fill display-4 text-primary mb-3"></i>
            <h5 class="card-title fw-semibold">Alumnos</h5>
            <p class="text-muted">Gestión completa de alumnos registrados.</p>
            <a href="index.php?seccion=alumnos&accion=listar" class="btn btn-primary btn-sm">Ir a Alumnos</a>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="card border-0 shadow-lg rounded-4 text-center h-100">
          <div class="card-body">
            <i class="bi bi-geo-alt-fill display-4 text-success mb-3"></i>
            <h5 class="card-title fw-semibold">Provincias</h5>
            <p class="text-muted">Organiza y administra provincias.</p>
            <a href="index.php?seccion=provincias&accion=listar" class="btn btn-success btn-sm">Ir a Provincias</a>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="card border-0 shadow-lg rounded-4 text-center h-100">
          <div class="card-body">
            <i class="bi bi-buildings-fill display-4 text-warning mb-3"></i>
            <h5 class="card-title fw-semibold">Localidades</h5>
            <p class="text-muted">Manejo de localidades por provincia.</p>
            <a href="index.php?seccion=localidades&accion=listar" class="btn btn-warning btn-sm text-white">Ir a Localidades</a>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="card border-0 shadow-lg rounded-4 text-center h-100">
          <div class="card-body">
            <i class="bi bi-house-door-fill display-4 text-danger mb-3"></i>
            <h5 class="card-title fw-semibold">Barrios</h5>
            <p class="text-muted">Registra y organiza barrios.</p>
            <a href="index.php?seccion=barrios&accion=listar" class="btn btn-danger btn-sm">Ir a Barrios</a>
          </div>
        </div>
      </div>
    </div>
  </div>