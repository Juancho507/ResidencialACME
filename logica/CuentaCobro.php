<?php
require_once("persistencia/Conexion.php");
require_once("persistencia/CuentaCobroDAO.php");

class CuentaCobro{
    
    private $id;
    private $fechaExpedicion;
    private $fechaVencimiento;
    private $valorAdministracion;
    private $valor;
    private $interesMora;
    private $apartamento;
    private $estadoCuenta;
    private $administrador;
    
    public function __construct($id="", $fechaExpedicion="", $fechaVencimiento="", $valorAdministracion="", $valor="", $interesMora="", $apartamento="", $estadoCuenta="", $administrador=""){
        $this -> id = $id;
        $this -> fechaExpedicion = $fechaExpedicion;
        $this -> fechaVencimiento = $fechaVencimiento;
        $this -> valorAdministracion = $valorAdministracion;
        $this -> valor = $valor;
        $this -> interesMora = $interesMora;
        $this -> apartamento = $apartamento;
        $this -> estadoCuenta = $estadoCuenta;
        $this -> administrador = $administrador;
    }
    
    public function getId(){
        return $this -> id;
    }
    
    public function getFechaExpedicion(){
        return $this -> fechaExpedicion;
    }
    
    public function getFechaVencimiento(){
        return $this -> fechaVencimiento;
    }
    
    public function getValorAdministracion(){
        return $this -> valorAdministracion;
    }
    
    public function getValor(){
        return $this -> valor;
    }
    public function getInteresMora(){
        return $this -> interesMora;
    }
    
    public function getApartamento(){
        return $this -> apartamento;
    }
    
    public function getEstadoCuenta(){
        return $this -> estadoCuenta;
    }
    
    public function getAdministrador(){
        return $this -> administrador;
    }
    
    public function consultar ($rol="", $id=""){
        $conexion = new Conexion();
        $cuentaCobroDAO = new CuentaCobroDAO ();
        $conexion -> abrir();
        $conexion -> ejecutar($cuentaCobroDAO -> consultar($rol, $id));
        $cuentasCobro = array();
        while(($datos = $conexion -> registro()) != null){
            $apartamento = new Apartamento($datos[6], $datos[8], $datos[7]);
            $estadoCuenta = new EstadoCuentaCobro($datos[9], $datos[10]);
            $cuentaCobro = new CuentaCobro($datos[0], $datos[1], $datos[2], $datos[3], $datos[4], $datos[5], $apartamento, $estadoCuenta);
            array_push($cuentasCobro, $cuentaCobro);
        }
        $conexion -> cerrar();
        return $cuentasCobro;
    }
    
    public function consultarCuentasCobroActuales($rol="", $id=""){
        $conexion = new Conexion();
        $cuentaCobroDAO = new CuentaCobroDAO ();
        $conexion -> abrir();
        $conexion -> ejecutar($cuentaCobroDAO -> consultarCuentasCobroActuales($rol, $id));
        $cuentasCobro = array();
        while(($datos = $conexion -> registro()) != null){
            $apartamento = new Apartamento($datos[5], $datos[6], $datos[7]);
            $estadoCuenta = new EstadoCuentaCobro($datos[9], $datos[10]);
            $cuentaCobro = new CuentaCobro($datos[0], $datos[1], $datos[2], $datos[3], $datos[4], $datos[5], $apartamento, $estadoCuenta);
            array_push($cuentasCobro, $cuentaCobro);
        }
        $conexion -> cerrar();
        return $cuentasCobro;
    }
    
    public function consultarCuentasCobroPorApartamento($idApartamento){
        $conexion = new Conexion();
        $cuentaCobroDAO = new CuentaCobroDAO ();
        $conexion -> abrir();
        $conexion -> ejecutar($cuentaCobroDAO -> consultarCuentasCobroPorApartamento($idApartamento));
        $cuentasCobro = array();
        while(($datos = $conexion -> registro()) != null){
            $estadoCuenta = new EstadoCuentaCobro($datos[6], $datos[7]);
            $cuentaCobro = new CuentaCobro($datos[0], $datos[1], $datos[2], $datos[3], $datos[4], $datos[5], "", $estadoCuenta);
            array_push($cuentasCobro, $cuentaCobro);
        }
        $conexion -> cerrar();
        return $cuentasCobro;
    }
    
    public function consultarValorAdministracion(){
        $conexion = new Conexion();
        $cuentaCobroDAO = new CuentaCobroDAO ();
        $conexion -> abrir();
        $conexion -> ejecutar($cuentaCobroDAO -> consultarValorAdministracion());
        $cuentasCobro = array();
        while(($datos = $conexion -> registro()) != null){
            $cuentaCobro = new CuentaCobro("", "", "", $datos[0]);
            array_push($cuentasCobro, $cuentaCobro);
        }
        $conexion -> cerrar();
        return $cuentasCobro;
    }
    
    public function crearCuentaCobro(){
        $conexion = new Conexion();
        $cuentaCobroDAO = new CuentaCobroDAO("", $this ->fechaExpedicion, $this->fechaVencimiento, $this->valorAdministracion, $this->valor, $this->interesMora, $this->apartamento, $this->estadoCuenta, $this->administrador);
        $conexion -> abrir();
        $conexion -> ejecutar($cuentaCobroDAO -> crearCuentaCobro());
        $conexion -> cerrar();
    }
    
    public function consultarPendientes($rol="", $id=""){
        $conexion = new Conexion();
        $cuentaCobroDAO = new CuentaCobroDAO ();
        $conexion -> abrir();
        $conexion -> ejecutar($cuentaCobroDAO -> consultarPendientes($rol, $id));
        $cuentasCobro = array();
        while(($datos = $conexion -> registro()) != null){
            $apartamento = new Apartamento($datos[5], $datos[6], $datos[7]);
            $estadoCuenta = new EstadoCuentaCobro($datos[9], $datos[10]);
            $cuentaCobro = new CuentaCobro($datos[0], $datos[1], $datos[2], $datos[3], $datos[4], $datos[5], $apartamento, $estadoCuenta);
            array_push($cuentasCobro, $cuentaCobro);
        }
        $conexion -> cerrar();
        return $cuentasCobro;
    }
    
    public function consultarCuentaCobro(){
        $conexion = new Conexion();
        $cuentaCobroDAO = new CuentaCobroDAO ($this->id);
        $conexion -> abrir();
        $conexion -> ejecutar($cuentaCobroDAO -> consultarCuentaCobro());
        $datos = $conexion -> registro();
            $apartamento = new Apartamento($datos[6], $datos[8], $datos[7]);
            $estadoCuenta = new EstadoCuentaCobro($datos[9], $datos[10]);
            $this ->id = $datos[0];
            $this->fechaExpedicion = $datos[1];
            $this->fechaVencimiento = $datos[2];
            $this->valorAdministracion = $datos[3];
            $this->valor = $datos[4];
            $this->interesMora = $datos[5];
            $this->apartamento = $apartamento;
            $this->estadoCuenta = $estadoCuenta;
        $conexion -> cerrar();
    }
    
    public function actualizarCuentaCobro(){
        $conexion = new Conexion();
        $cuentaCobroDAO = new CuentaCobroDAO ($this->id,"","","",$this->valor,"","",$this->estadoCuenta);
        $conexion -> abrir();
        $conexion -> ejecutar($cuentaCobroDAO -> actualizarCuentaCobro());
        $conexion -> cerrar();
    }
}


?>