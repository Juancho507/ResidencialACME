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
				<div class="card-header"><h4>Apartamentos</h4></div>
				<div class="card-body">
    				<?php
    				$apartamento = new Apartamento();
    				$apartamentos = $apartamento->consultar($rol, $id);

    				if (empty($apartamentos)) {
    				    echo "<div class='alert alert-warning'>No se encontraron apartamentos.</div>";
    				} else {
    				    echo "<table class='table table-striped table-hover'>";
    				    echo "<thead><tr><th>ID</th><th>Torre</th><th>Número</th>";
    				    if($rol != "propietario"){
    				        echo "<th>Propietario</th>";
    				    }
    				    echo "</tr></thead>"; 
    				    echo "<tbody>"; 
    				    foreach($apartamentos as $apt){
    				        echo "<tr>";
    				        echo "<td>" . $apt->getId() . "</td>";
    				        echo "<td>" . $apt->getTorre() . "</td>";
    				        echo "<td>" . $apt->getNumero() . "</td>";
    				        if($rol != "propietario"){
    				            echo "<td>" . $apt->getPropietario()->getNombre() . " " . $apt->getPropietario()->getApellido() . "</td>";
    				        }
    				        echo "</tr>";
    				    }
    				    echo "</tbody>"; 
    				    echo "</table>";
    				}
    				?>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
