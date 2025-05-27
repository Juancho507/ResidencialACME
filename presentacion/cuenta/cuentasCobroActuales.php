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
				<div class="card-header"><h4>Cuentas de cobro periodo: <?php setlocale(LC_TIME, 'es_ES.UTF-8'); echo strftime("%B");?> </h4></div>
				<div class="card-body">
				<?php

				$cuenta = new CuentaCobro();
				$cuentas = $cuenta->consultarCuentasCobroActuales($rol, $id);
				$pagoTotal = 0;
				if (empty($cuentas)) {
				    echo "<div class='alert alert-warning'>No se encontraron cuentas de cobro.</div>";
				} else {
				    echo "<table class='table table-striped table-hover'>";
				    echo "<thead class='table-dark'><tr>
				            <th>ID</th>
				            <th>Fecha Expedición</th>
				            <th>Fecha Vencimiento</th>
				            <th>Valor Administracion</th>
                            <th>Valor a Pagar</th>
        			        <th>Valor Pagado</th>
				            <th>Apartamento</th>
				            <th>Estado</th>
				          </tr></thead>";
				    foreach($cuentas as $c){
				        echo "<tr>";
				        echo "<td>" . $c->getId() . "</td>";
				        echo "<td>" . $c->getFechaExpedicion() . "</td>";
				        echo "<td>" . $c->getFechaVencimiento() . "</td>";
				        echo "<td>$" . number_format($c->getValorAdministracion(), 0, ',', '.') . "</td>";
				        echo "<td>$" . number_format($c->getValor(), 0, ',', '.') . "</td>";
				        $pago = new Pago();
				        $pagos = $pago -> consultarPorCuentaCobro($c -> getId());
				        if (empty($pagos)){
				            echo "<td>$" . number_format(0, 0, ',', '.') . "</td>";
				        }else if (count($pagos) == 1) {
				            echo "<td>$" . number_format($pagos[0]->getValorPagado(), 0, ',', '.') . "</td>";
				        }else {
				            foreach ($pagos as $p){
				                $pagoTotal += $p -> getValorPagado();
				            }
				            echo "<td>$" . number_format($pagoTotal, 0, ',', '.') . "</td>";
				        }
				        $apt = $c->getApartamento();
				        echo "<td>" . $apt->getTorre() . " - " . $apt->getNumero() . "</td>";
				        echo "<td>" . ucfirst($c->getEstadoCuenta()->getNombre()) . "</td>";
				        echo "</tr>";
				    }
				    echo "</table>";
				}
				?>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
