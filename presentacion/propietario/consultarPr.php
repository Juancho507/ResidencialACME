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
				<div class="card-header"><h4>Propietarios</h4></div>
				<div class="card-body">
    				<?php

    				$propietarioObj = new Propietario();
    			
    				$propietarios = $propietarioObj->consultarTodos();

    				if (empty($propietarios)) {
    				    echo "<div class='alert alert-warning'>No se encontraron propietarios.</div>";
    				} else {
    				    echo "<table class='table table-striped table-hover'>";
    				    echo "<thead><tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>Correo</th></tr></thead>";
    				    echo "<tbody>";
    				    foreach($propietarios as $prop){
    				        echo "<tr>";
    				        echo "<td>" . $prop->getId() . "</td>";
    				        echo "<td>" . $prop->getNombre() . "</td>";
    				        echo "<td>" . $prop->getApellido() . "</td>";
    				        echo "<td>" . $prop->getCorreo() . "</td>";
    				        echo "<td>";
    				      
    				        echo "</td>";
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