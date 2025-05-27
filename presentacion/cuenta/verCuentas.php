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
	<div class="row mt-2">
		<div class="col">
			<div class="card">
				<div class="card-header"><h4>Cuentas de Cobro</h4></div>
				<div class="card-body">
				<?php

				$cuenta = new CuentaCobro();
				$cuentas = $cuenta->consultar($rol, $id);
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
				        $apt = $c->getApartamento();
				        echo "<td>" . $apt->getTorre() . " - " . $apt->getNumero() . "</td>";
				        echo "<td>" . ucfirst($c->getEstadoCuenta()->getNombre()) . "</td>";
				        /*$mesDato = (new DateTime($c ->getFechaExpedicion()))->format('m');
				        if ($mesDato == date('m')) {
				            if($c->getEstadoCuenta()->getId()==3){
				               $cuenta ->actualizarEstadoCuentaCobro($c->getId(),2);
				               echo ucfirst($c->getEstadoCuenta()->getNombre()) . "</td>";
				            }else {
				                echo ucfirst($c->getEstadoCuenta()->getNombre()) . "</td>";
				            }
				        }else {
				            $cuenta ->actualizarEstadoCuentaCobro($c->getId(),3);
				        }*/
				        
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
