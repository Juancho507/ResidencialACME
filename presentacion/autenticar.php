<?php 
if(isset($_GET["sesion"])){
    if($_GET["sesion"] == "false"){
        session_destroy();
    }
}
$error=false;
if(isset($_POST["autenticar"])){
    $correo = $_POST["correo"];
    $clave = $_POST["clave"];
    $admin = new Administrador("", "", "", $correo, $clave);
    if($admin -> autenticar()){
        $_SESSION["id"] = $admin -> getId();
        $_SESSION["rol"] = "administrador";
        header("Location: ?pid=" . base64_encode("presentacion/sesionAdministrador.php"));
    }else {
        $propietario = new Propietario("", "", "", $correo, $clave);
        if($propietario -> autenticar()){
            $_SESSION["id"] = $propietario -> getId();
            $_SESSION["rol"] = "propietario";
            header("Location: ?pid=" . base64_encode("presentacion/sesionPropietario.php"));
        }else{
            $error=true;
        }
    }
}
?>
<body class="bg-light">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <h4 class="mt-1 mb-5 pb-1 text-danger">Autenticación</h4>
                </div>
                <form action="?pid=<?php echo base64_encode("presentacion/autenticar.php") ?>" method="post">
                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="email" id="form2Example11" name="correo" class="form-control"/>
                    <label class="form-label" for="form2Example11">Correo</label>
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="password" id="form2Example22" name="clave" class="form-control" />
                    <label class="form-label" for="form2Example22">Contraseña</label>
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button type="submit" class="btn btn-danger btn-block mb-3 shadow-lg" name="autenticar">Iniciar sesión</button>
                  	<a class="text-muted text-decoration-none px-2" href="?">Regresar</a>
                  </div>
                </form>
                <?php
    				if ($error){
    					echo "<div class='alert alert-danger mt-3' role='alert'>Credenciales incorrectas</div>";
    				}
    			?>
              </div>
            </div>
             <div class="col-lg-6 d-flex align-items-center gradient-custom-2 bg-danger rounded-3">
              <div class="px-3 py-4 p-md-5 mx-md-4">
              	  <img src="img/logo.png" alt="Logo Matasanos" class="img-fluid w-5">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

