<?php
$id = $_SESSION["id"];
$administrador = new Administrador($id); 
$administrador->consultar(); 
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3">
  <a class="navbar-brand" href="?pid=<?php echo base64_encode("presentacion/sesionAdministrador.php") ?>">
    <i class="fa-solid fa-screwdriver-wrench"></i> Panel Admin
  </a>

  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarAdmin" aria-controls="navbarAdmin" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarAdmin">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <!-- Inicio -->
      <li class="nav-item">
        <a class="nav-link" href="?pid=<?php echo base64_encode("presentacion/sesionAdministrador.php") ?>"><i class="fa-solid fa-house"></i> Inicio Admin</a>
      </li>

      <!-- Apartamentos -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="apartamentosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-solid fa-building-user"></i> Apartamentos
        </a>
        <ul class="dropdown-menu" aria-labelledby="apartamentosDropdown">
          <li><a class="dropdown-item" href="?pid=<?php echo base64_encode("presentacion/apartamento/consultar.php") ?>">Ver todos</a></li>
        </ul>
      </li>

      <!-- Propietarios -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="propietariosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-solid fa-users"></i> Propietarios
        </a>
        <ul class="dropdown-menu" aria-labelledby="propietariosDropdown">
          <li><a class="dropdown-item" href="?pid=<?php echo base64_encode("presentacion/propietario/consultarPr.php") ?>">Ver todos</a></li>
        </ul>
      </li>

      <!-- Cuentas de cobro -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="cuentasDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-solid fa-file-invoice-dollar"></i> Cuentas de Cobro
        </a>
        <ul class="dropdown-menu" aria-labelledby="cuentasDropdown">
          <li><a class="dropdown-item" href="?pid=<?php echo base64_encode("presentacion/cuenta/verCuentas.php") ?>">Ver todas</a></li>
          <li><a class="dropdown-item" href="?pid=<?php echo base64_encode("presentacion/cuenta/crearCuentaCobro.php") ?>">Crear nueva</a></li>
          <li><a class="dropdown-item" href="?pid=<?php echo base64_encode("presentacion/cuenta/cuentasCobroActuales.php") ?>">Cuentas de cobro actuales</a></li>
        </ul>
      </li>
    </ul>

    <!-- Usuario y cerrar sesión -->
    <ul class="navbar-nav mb-2 mb-lg-0">
      <li class="nav-item">
        <span class="navbar-text text-white me-3">
          <?php echo $administrador->getNombre() . " " . $administrador->getApellido(); ?>
        </span>
      </li>
      <li class="nav-item">
        <a class="nav-link text-danger" href="?pid=<?php echo base64_encode("presentacion/autenticar.php") ?>&sesion=false">
          <i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión
        </a>
      </li>
    </ul>
  </div>
</nav>



