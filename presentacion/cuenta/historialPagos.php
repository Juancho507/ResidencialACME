<?php
$id_propietario = $_SESSION["id"]; 
$rol = $_SESSION["rol"]; 

?>
<body>
<?php
include("presentacion/encabezado.php");
include ("presentacion/menu" . ucfirst($rol) . ".php");
?>

<div class="container mt-4">
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-header">
					<h4><i class="fa-solid fa-receipt"></i> Historial de Pagos</h4>
				</div>
				<div class="card-body">
    				<?php
    				$pago = new Pago();
    				$historial_pagos = $pago->consultarPagosPorPropietario($id_propietario);

    				if (empty($historial_pagos)) {
    				    echo "<div class='alert alert-info' role='alert'>";
    				    echo "No se encontraron pagos registrados para este propietario.";
    				    echo "</div>";
    				} else {
    				    echo "<div class='table-responsive'>";
        				    echo "<table class='table table-striped table-hover'>";
        				    echo "<thead>";
        				    echo "<tr>";
        				    echo "<th>ID Pago</th>";
        				    echo "<th>Fecha de Pago</th>";
        				    echo "<th>Valor Pagado</th>";
        				    echo "<th>Cuenta de Cobro (# Ref)</th>";
        				    echo "<th>Cuenta</th>";
        				    echo "<th>Valor Total Cuenta</th>";
        				    echo "<th>Estado Cuenta</th>";
        				    echo "<th>Apartamento</th>";
        				    echo "</tr>";
        				    echo "</thead>";
        				    echo "<tbody>";

        				    foreach($historial_pagos as $pago_individual){
        				       
        				        $cuenta_cobro_asociada = $pago_individual->getCuentaCobro();

        				        echo "<tr>";
        				        echo "<td>" . $pago_individual->getId() . "</td>";
        				        echo "<td>" . $pago_individual->getFechaPago() . "</td>";
        				        echo "<td>" . number_format($pago_individual->getValorPagado(), 2, ',', '.') . "</td>"; 

        				        if ($cuenta_cobro_asociada) {
        				            echo "<td>" . $cuenta_cobro_asociada->getId() . "</td>"; 
        				            echo "<td>" . "Factura Expedida el " . $cuenta_cobro_asociada->getFechaExpedicion() . " por " . number_format($cuenta_cobro_asociada->getValor(), 2, ',', '.') . "</td>"; 
                                    echo "<td>" . number_format($cuenta_cobro_asociada->getValor(), 2, ',', '.') . "</td>"; 
                                    echo "<td>" . $cuenta_cobro_asociada->getEstadoCuenta()->getNombre() . "</td>"; 
                                    echo "<td>" . $cuenta_cobro_asociada->getApartamento()->getNumero() . " - " . $cuenta_cobro_asociada->getApartamento()->getTorre() . "</td>"; 
        				        } else {
        				            echo "<td colspan='5' class='text-muted'>No asociada</td>"; 
        				        }
        				        echo "</tr>";
        				    }
        				    echo "</tbody>";
        				    echo "</table>";
    				    echo "</div>"; 
    				}
    				?>
				</div>
			</div>
		</div>
	</div>
</div>
</body>