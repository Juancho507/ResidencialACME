<?php 
session_start();
require ("logica/Propietario.php");
require ("logica/Administrador.php");


?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Residencial ACME</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<?php 
$paginas_sin_autenticacion = array (
    "presentacion/inicio.php",
    "presentacion/autenticar.php",
);

$paginas_con_autenticacion = array (
    "presentacion/sesionAdministrador.php",
    "presentacion/sesionPropietario.php",
);

if(!isset($_GET["pid"])){
    include ("presentacion/inicio.php");
}else{
    
    $pid = base64_decode($_GET["pid"]);
    if(in_array($pid, $paginas_sin_autenticacion)){
        include $pid;
    }else if(in_array($pid, $paginas_con_autenticacion)){
        if(!isset($_SESSION["id"])){
            include "presentacion/autenticar.php";
        }else{
            include $pid;
        }
    }else{
        echo "error 404";
    }
}
?>
</html>



