<?php
if($_SESSION["rol"] != "propietario"){
    header("Location: ?pid=" . base64_encode("presentacion/noAutorizado.php"));
}
$id = $_SESSION["id"];
?>
<body>
<?php 
include ("presentacion/encabezado.php");
include ("presentacion/menuPropietario.php");
$propietario = new Propietario($id);
$propietario ->consultar();
?>
<div class="container mt-5">
  <div class="row">
    <div class="col-md-7 mx-auto"> <!-- Centrado horizontal -->
      <div class="card">
        <div class="card-body">
        <h2 class="my-2">Perfil</h2>
          <div class="table-responsive-sm my-2">
            <table class="table table-striped">
              <tr>
                <th>Nombre</th>
                <td><?php echo $propietario->getNombre(); ?></td>
              </tr>
              <tr>
                <th>Apellido</th>
                <td><?php echo $propietario->getApellido(); ?></td>
              </tr>
              <tr>
                <th>Correo</th>
                <td><?php echo $propietario->getCorreo(); ?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


</body>