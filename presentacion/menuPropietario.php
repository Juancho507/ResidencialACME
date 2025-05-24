<?php
$id = $_SESSION["id"];
$propietario = new Propietario($id);
$propietario->consultar();
?>

<div class="d-flex">
  <div class="bg-dark text-white p-3 vh-100" style="width: 250px;">
    <h4 class="mb-4"><i class="fa-solid fa-building"></i> Panel</h4>
    
    <div class="mb-4">
      <strong><?php echo $propietario->getNombre() . " " . $propietario->getApellido(); ?></strong>
    </div>

    <ul class="nav flex-column">
      <li class="nav-item mb-2">
        <a class="nav-link text-white" href="?pid=<?php echo base64_encode("presentacion/sesionPropietario.php") ?>">
          <i class="fa-solid fa-house"></i> Inicio
        </a>
      </li>

      <li class="nav-item mb-2">
        <a class="nav-link text-white" data-bs-toggle="collapse" href="#apartamentosMenu" role="button" aria-expanded="false" aria-controls="apartamentosMenu">
          <i class="fa-solid fa-building-user"></i> Apartamentos
        </a>
        <div class="collapse ps-3" id="apartamentosMenu">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link text-white" href="?pid=<?php echo base64_encode("presentacion/apartamento/consultar.php") ?>">Ver mis apartamentos</a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item mb-2">
  <a class="nav-link text-white" data-bs-toggle="collapse" href="#cuentasMenu" role="button" aria-expanded="false" aria-controls="cuentasMenu">
    <i class="fa-solid fa-file-invoice-dollar"></i> Cuentas de cobro
  </a>
  <div class="collapse ps-3" id="cuentasMenu">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link text-white" href="?pid=<?php echo base64_encode("presentacion/cuentas/verCuentas.php") ?>">Consultar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="?pid=<?php echo base64_encode("presentacion/cuentas/pagarCuenta.php") ?>">Pagar</a>
      </li>
    </ul>
  </div>
</li>


      <li class="nav-item mb-2">
        <a class="nav-link text-white" href="?pid=<?php echo base64_encode("presentacion/perfil/editarPerfil.php") ?>">
          <i class="fa-solid fa-user-gear"></i> Editar Perfil
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-danger" href="?pid=<?php echo base64_encode("presentacion/autenticar.php") ?>&sesion=false">
          <i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión
        </a>
      </li>
    </ul>
  </div>

  <div class="flex-grow-1 p-4">

  </div>
</div>
