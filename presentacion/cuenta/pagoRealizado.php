<?php
$id = $_SESSION["id"];
$rol = $_SESSION["rol"];
$mensaje = false;
if(isset($_GET["idCuenta"])){
$idCuenta = $_GET["idCuenta"];
}else if(isset($_POST["idCuenta"])){
    $idCuenta = $_POST["idCuenta"];
    if(isset($_POST["pagar"])&&isset($_POST["valorPago"])&&isset($_POST["valor"])&&isset($_POST["estado"])){
        $pago = new Pago("", date('Y-m-d'), $_POST['valorPago'], $idCuenta);
        $pago -> crearPago();
        $nuevoValor = $_POST['valor'] -  $_POST['valorPago'];
        if($nuevoValor == 0){
            $cuenta1 = new CuentaCobro($idCuenta,"","","",$nuevoValor,"","",1);
            $cuenta1-> actualizarCuentaCobro();
        }else if($_POST["estado"]==2){
            $cuenta1 = new CuentaCobro($idCuenta,"","","",$nuevoValor,"","",2);
            $cuenta1 -> actualizarCuentaCobro();
        } else if($_POST["estado"]==3){
            $cuenta1 = new CuentaCobro($idCuenta,"","","",$nuevoValor,"","",3);
            $cuenta1 -> actualizarCuentaCobro();
        }else if($_POST["estado"]==4){
            $cuenta1 = new CuentaCobro($idCuenta,"","","",$nuevoValor,"","",2);
            $cuenta1 -> actualizarCuentaCobro();
        }
        $mensaje = true;
    }
}
$cuenta = new CuentaCobro($idCuenta);
$cuenta->consultarCuentaCobro();
?>
<body>
<?php 
include("presentacion/encabezado.php");
include ("presentacion/menu" . ucfirst($rol) . ".php");
?>

<div class="container">
	<div class="row mt-3">
		<div class="col">
				<?php 
				if($mensaje){
				    echo "<div class='alert alert-success' role='alert'>Se realizó exitosamente el pago</div>";
				}
				?>
				<div class="card shadow-sm p-4" style="max-width: 600px; margin: auto;">
                  <h5 class="mb-3 text-center">Detalle de Cuenta de Cobro</h5>
                  <div class="mb-3">
                    <label class="form-label fw-bold">ID Cuenta:</label>
                    <p class="form-control-plaintext"><?php echo $idCuenta?></p>
                  </div>
                
                  <div class="mb-3">
                    <label class="form-label fw-bold">Fecha de Expedición:</label>
                    <p class="form-control-plaintext"><?php echo $cuenta->getFechaExpedicion();?></p>
                  </div>
                
                  <div class="mb-3">
                    <label class="form-label fw-bold">Fecha de Vencimiento:</label>
                    <p class="form-control-plaintext"><?php echo $cuenta->getFechaVencimiento();?></p>
                  </div>
                 
                 <div class="mb-3">
                    <label class="form-label fw-bold">Torre / Apartamento:</label>
                    <p class="form-control-plaintext"><?php echo $cuenta->getApartamento()->getTorre() . "-" . $cuenta->getApartamento()->getNumero();?></p>
                  </div>
                 
                 <div class="mb-3">
                    <label class="form-label fw-bold">Valor Administración:</label>
                    <p class="form-control-plaintext"><?php echo $cuenta->getValorAdministracion();?></p>
                  </div>
                 
                  <div class="mb-3">
                    <label class="form-label fw-bold">Valor Total:</label>
                    <p class="form-control-plaintext"><?php 
                    if($cuenta ->getEstadoCuenta()->getId()==3){
                        $fechaActual = new DateTime();
                        $fechaVencida = new DateTime($cuenta -> getFechaVencimiento());
                        $diferencia = $fechaVencida->diff($fechaActual);
                        $valor = $cuenta->getValor() + ($cuenta ->getValorAdministracion() * $cuenta -> getInteresMora() *($diferencia->days));
                        echo $valor;
                    } else {
                        $valor = $cuenta->getValor();
                        echo $valor;
                    }?></p>
                  </div>
                
                  <form action="?pid=<?php echo base64_encode("presentacion/cuenta/pagoRealizado.php"); ?>" method="post">
                    <input type="hidden" name="idCuenta" value="<?php echo $idCuenta; ?>">
                    <input type="hidden" name="valor" value="<?php echo $valor; ?>">
                    <input type="hidden" name="estado" value="<?php echo $cuenta->getEstadoCuenta()->getId(); ?>">
                    <div class="mb-3">
                      <label for="valorPago" class="form-label fw-bold">Valor a Pagar:</label>
                      <input type="number" class="form-control" id="valorPago" name="valorPago" min="20000" step="50" required placeholder="<?php echo $cuenta->getValorAdministracion();?>">
                    </div>
                
                    <div class="d-flex justify-content-between">
					<a href="?pid=<?php echo base64_encode("presentacion/cuenta/pagarCuentas.php"); ?>" class="btn btn-secondary">
                        <i class="fa-solid fa-xmark"></i> Cancelar
                      </a>
                      <button type="submit" name="pagar" class="btn btn-success">
                        <i class="fa-solid fa-check"></i> Pagar
                      </button>
                    </div>
                  </form>
                </div>
				</div>
			</div>
		</div>
</body>
