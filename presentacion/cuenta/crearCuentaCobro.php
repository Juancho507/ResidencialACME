<?php
$id = $_SESSION["id"];
$rol = $_SESSION["rol"];
?>
<body>
<?php 
include("presentacion/encabezado.php");
include ("presentacion/menu" . ucfirst($rol) . ".php");
?>

<div class="container">
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-header"><h4>Generar cuentas de cobro </h4></div>
				<div class="card-body">
				<div class="p-2">
				<?php 
				$cuentas = new CuentaCobro();
				$valor = $cuentas -> consultarValorAdministracion();
				foreach ($valor as $cu){
				    $valorAdministracion = $cu -> getValorAdministracion();
				}
				?>
				<div class="card shadow-sm mb-3" style="max-width: 350px;">
                  <div class="card-body text-center">
                    <h6 class="card-subtitle mb-2 text-muted">Valor actual de administración</h6>
                    <h4 class="card-title text-primary"><?php echo number_format($valorAdministracion, 0, ',', '.');?></h4>
                  </div>
                </div>
				<!-- Botón para generar cuentas de cobro masivas -->
                 <form action="?pid=<?php echo base64_encode('presentacion/cuenta/crearCuentaCobro.php');?>" method="post">
                    <button type="submit" class="btn btn-success" name="generar">
                      <i class="fa-solid fa-layer-group"></i> Generar Cuentas Masivas
                    </button>
                  </form>
                </div>
                <div class="p-2">                  
                  <?php 
                  if(isset($_POST['generar'])){
                      /*echo "<form method='post' class='p-4 border rounded shadow-sm mx-auto' style='max-width: 400px;'>
                            <h5 class='mb-3'>¿Cambiar valor de administración?</h5>
                    		    
                            <div class='mb-3'>
                              <label for='nuevoValor' class='form-label'>Nuevo valor ($):</label>
                              <input type='number' class='form-control' id='nuevoValor' name='nuevo_valor' step='0.01' min='150000.0' required>
                            </div>
                    		    
                            <button type='submit' name='actualizar_valor' class='btn btn-primary'>
                              <i class='fa-solid fa-pen'></i> Actualizar
                            </button>
                            <button type='submit' name='saltar' class='btn btn-primary'>
                              <i class='fa-solid fa-pen'></i> Omitir
                            </button>
                          </form>";
                    }
                    if(isset($_POST['nuevo_valor'])){
                        $valorAdministracion = $_POST['nuevo_valor'];
                    }else {*/
                        $cuentas = new CuentaCobro();
                        $valor = $cuentas -> consultarValorAdministracion();
                        foreach ($valor as $cu){
                            $valorAdministracion = $cu -> getValorAdministracion();
                        }
                    //}
                    $apartamento1 = new Apartamento();
                    $apartamentos = $apartamento1 ->consultar($rol,$id);
                    $fechaActual = new DateTime();
                    $fechaVencimiento = date("Y-m-t");
                      foreach ($apartamentos as $apartamento){
                          $cont = 0;
                          $sumaDeuda = 0;
                          $cuenta = new CuentaCobro();
                          $cuentas = $cuenta -> consultarCuentasCobroPorApartamento($apartamento -> getId());
                          if(empty($cuentas)){
                              $valorCuota = $valorAdministracion;
                          } else {
                              foreach ($cuentas as $cuenta) {
                                  if($cuenta ->getEstadoCuenta()->getId()==3){
                                      $fechaVencida = new DateTime($cuenta -> getFechaVencimiento());
                                      $diferencia = $fechaVencida->diff($fechaActual);
                                      $sumaDeuda += $cuenta ->getValor() + ($cuenta ->getValor() * $cuenta -> getInteresMora() * $diferencia->days);
                                  }
                                  $mesDato = (new DateTime($cuenta ->getFechaExpedicion()))->format('m');
                                  if ($mesDato == date('m')) {
                                      $cont++;
                                  }
                              }
                              $valorCuota = $sumaDeuda + $valorAdministracion;
                          }
                          if($cont == 0){
                              $fechaExpedicion = $fechaActual->format('Y-m-d');
                              $c = new CuentaCobro("", $fechaExpedicion, $fechaVencimiento, $valorAdministracion, $valorCuota, 0.000330, $apartamento -> getId(), 4, $id);
                              $c -> crearCuentaCobro();
                              echo "<div class='alert alert-success' role='alert'>Se generó una nueva cuenta de cobro para el apartamento ". $apartamento -> getTorre() . "-" . $apartamento -> getNumero() . "</div>";
                          }else {
                              echo "<div class='alert alert-danger mt-3' role='alert'>Ya existe cuenta de cobro del mes actual para el apartamento ". $apartamento -> getTorre() . "-" . $apartamento -> getNumero() . "</div>";
                          }
                      }
                  }
                  ?>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</body>
