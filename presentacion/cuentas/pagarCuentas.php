<?php
$id = $_SESSION["id"];
$rol = $_SESSION["rol"];
?>
<body>
<?php 
include("presentacion/encabezado.php");
?>
<div class="container">
	<div class="row mt-3">
		<div class="col">
			<div class="card">
				<div class="card-header"><h4>Pagar Cuenta</h4></div>
				<div class="card-body">
				<?php
				$cuenta = new CuentaCobro();
				$cuentas = $cuenta->consultarPendientes($rol, $id); 

				if (empty($cuentas)) {
				    echo "<div class='alert alert-success'>No tiene cuentas pendientes por pagar.</div>";
				} else {
				    echo "<table class='table table-striped table-hover'>";
				    echo "<tr><td>ID</td><td>Fecha</td><td>Valor</td><td>Acción</td></tr>";
				    foreach($cuentas as $c){
				        echo "<tr>";
				        echo "<td>" . $c->getId() . "</td>";
				        echo "<td>" . $c->getFecha() . "</td>";
				        echo "<td>$" . number_format($c->getValor(), 0, ',', '.') . "</td>";
				        echo "<td><a class='btn btn-success btn-sm' href='?pid=" . base64_encode("presentacion/cuentas/pagoRealizado.php") . "&idCuenta=" . $c->getId() . "'>Pagar</a></td>";
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
