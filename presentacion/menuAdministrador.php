<?php
$id = $_SESSION["id"];
$administrador = new Administrador($id); 
$administrador->consultar(); 
?>
<div class="bg-dark text-white p-3 vh-100" style="width: 250px;">
    <h4 class="mb-4"><i class="fa-solid fa-screwdriver-wrench"></i> Panel Admin</h4>
    <div class="mb-4">
      <strong><?php echo $administrador->getNombre() . " " . $administrador->getApellido(); ?></strong>
    </div>
    <ul class="nav flex-column">
      <li class="nav-item mb-2">
        <a class="nav-link text-white" href="?pid=<?php echo base64_encode("presentacion/sesionAdministrador.php") ?>">
          <i class="fa-solid fa-house"></i> Inicio Admin
        </a>
      </li>

      <li class="nav-item mb-2">
        <a class="nav-link text-white" data-bs-toggle="collapse" href="#gestionApartamentosMenu" role="button" aria-expanded="false" aria-controls="gestionApartamentosMenu">
          <i class="fa-solid fa-building-user"></i> Apartamentos
        </a>
        <div class="collapse ps-3" id="gestionApartamentosMenu">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link text-white" href="?pid=<?php echo base64_encode("presentacion/apartamento/consultar.php") ?>">Ver todos</a>
            </li>         
            </ul>
        </div>
      </li>

      <li class="nav-item mb-2">
        <a class="nav-link text-white" data-bs-toggle="collapse" href="#gestionPropietariosMenu" role="button" aria-expanded="false" aria-controls="gestionPropietariosMenu">
          <i class="fa-solid fa-users"></i> Propietarios
        </a>
        <div class="collapse ps-3" id="gestionPropietariosMenu">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link text-white" href="?pid=<?php echo base64_encode("presentacion/propietario/consultarPr.php") ?>">Ver todos</a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item mb-2">
        <a class="nav-link text-white" data-bs-toggle="collapse" href="#gestionCuentasMenu" role="button" aria-expanded="false" aria-controls="gestionCuentasMenu">
          <i class="fa-solid fa-file-invoice-dollar"></i> Cuentas de Cobro
        </a>
        <div class="collapse ps-3" id="gestionCuentasMenu">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link text-white" href="?pid=<?php echo base64_encode("presentacion/cuentas/verCuentas.php") ?>">Ver todas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="?pid=<?php echo base64_encode("presentacion/cuentas/crearCuenta.php") ?>">Crear nueva</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="?pid=<?php echo base64_encode("presentacion/cuentas/aprobarPagos.php") ?>">Aprobar Pagos</a>
            </li>
          </ul>
        </div>
      </li>


      <li class="nav-item">
        <a class="nav-link text-danger" href="?pid=<?php echo base64_encode("presentacion/autenticar.php") ?>&sesion=false">
          <i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión
        </a>
      </li>
    </ul>
</div>