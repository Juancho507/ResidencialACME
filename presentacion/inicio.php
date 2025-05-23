<body class="d-flex flex-column min-vh-100 bg-light">

  <nav class="navbar navbar-expand-lg navbar-dark bg-danger px-4">
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img src="img/logo.png" alt="Logo" width="80" height="80" class="rounded-circle me-2">
      <strong>Residencial ACME</strong>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white" href="#"><i class="fas fa-home"></i> Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="?pid=<?php echo base64_encode("presentacion/autenticar.php") ?>"><i class="fas fa-user"></i> Ingresar</a>
        </li>
      </ul>
    </div>
  </nav>

  <header class="bg-warning text-center py-5 container-fluid">
    <h1 class="display-5 fw-bold text-dark">¡Bienvenido a Residencial ACME!</h1>
    <p class="lead text-dark">Donde la diversión y la seguridad se encuentran. ¡Vive como si estuvieras en un capítulo de Looney Tunes!</p>
  </header>

  <section class="container py-5">
    <div class="row g-4">
      <div class="col-12 col-md-6 col-lg-3">
        <div class="card border-danger text-center h-100">
          <div class="card-body">
            <i class="fas fa-shield-alt fa-2x text-danger mb-3"></i>
            <h5 class="card-title fw-bold">Seguridad 24/7</h5>
            <p class="card-text">Vigilancia activa y cámaras. ¡Incluso el Coyote está vigilado!</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-3">
        <div class="card border-warning text-center h-100">
          <div class="card-body">
            <i class="fas fa-swimming-pool fa-2x text-warning mb-3"></i>
            <h5 class="card-title fw-bold">Zonas comunes</h5>
            <p class="card-text">Piscina, BBQ y juegos para niños. ¡Una experiencia digna de dibujos animados!</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-3">
        <div class="card border-success text-center h-100">
          <div class="card-body">
            <i class="fas fa-handshake fa-2x text-success mb-3"></i>
            <h5 class="card-title fw-bold">Convivencia</h5>
            <p class="card-text">Normas claras para una comunidad feliz (¡sin TNTs, por favor!).</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-3">
        <div class="card border-primary text-center h-100">
          <div class="card-body">
            <i class="fas fa-cogs fa-2x text-primary mb-3"></i>
            <h5 class="card-title fw-bold">Administración</h5>
            <p class="card-text">Pagos, reportes y reservas, todo desde tu hogar.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="container py-4">
    <div class="row text-center g-4">
      <div class="col-12 col-md-4">
        <div class="bg-white shadow-sm rounded p-4 h-100">
          <i class="fas fa-car fa-2x text-secondary mb-2"></i>
          <h6 class="fw-bold">Parqueadero amplio</h6>
          <p>Espacios para residentes y visitantes.</p>
        </div>
      </div>
      <div class="col-12 col-md-4">
        <div class="bg-white shadow-sm rounded p-4 h-100">
          <i class="fas fa-paw fa-2x text-warning mb-2"></i>
          <h6 class="fw-bold">Pet Friendly</h6>
          <p>Tu mascota también es bienvenida.</p>
        </div>
      </div>
      <div class="col-12 col-md-4">
        <div class="bg-white shadow-sm rounded p-4 h-100">
          <i class="fas fa-mobile-alt fa-2x text-info mb-2"></i>
          <h6 class="fw-bold">App de control</h6>
          <p>Haz reservas o reportes desde tu celular.</p>
        </div>
      </div>
    </div>
  </section>
  <section class="bg-white py-5">
    <div class="container text-center">
      <h2 class="fw-bold mb-4">¿Por qué elegirnos?</h2>
      <p class="mb-4">Un lugar seguro, divertido y cómodo para ti y tu familia.</p>
      <div class="row justify-content-center g-3">
        <div class="col-6 col-md-3">
          <i class="fas fa-star fa-2x text-warning mb-2"></i>
          <p class="fw-bold">Calidad de vida</p>
        </div>
        <div class="col-6 col-md-3">
          <i class="fas fa-clock fa-2x text-success mb-2"></i>
          <p class="fw-bold">Atención oportuna</p>
        </div>
        <div class="col-6 col-md-3">
          <i class="fas fa-thumbs-up fa-2x text-primary mb-2"></i>
          <p class="fw-bold">Satisfacción garantizada</p>
        </div>
      </div>
    </div>
  </section>
  <footer class="bg-dark text-white text-center py-3 mt-auto">
    <div class="container">
      <small>&copy; 2025 Residencial ACME | Inspirado en Looney Tunes™</small>
    </div>
  </footer>

</body>
