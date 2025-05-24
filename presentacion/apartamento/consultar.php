<?php 
$id = $_SESSION["id"];
$rol = $_SESSION["rol"];
?>
<body>
<?php 
include("presentacion/encabezado.php");
include("presentacion/menu" . ucfirst($rol) . ".php");
?>
<div class="container">
	<div class="row mt-3">
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
    				    echo "<tr><td>ID</td><td>Torre</td><td>Número</td>";
    				    if($rol != "propietario"){
    				        echo "<td>Propietario</td>";
    				    }
    				    echo "</tr>";
    				    
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
    				    echo "</table>";
    				}
    				?>			
				</div>
			</div>
		</div>
	</div>
</div>
</body>

