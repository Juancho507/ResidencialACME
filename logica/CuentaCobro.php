<?php
require_once("persistencia/Conexion.php");
require_once("persistencia/CuentaCobroDAO.php");

class CuentaCobro{
    
    private $id;
    private $fechaExpedicion;
    private $fechaVencimiento;
    private $valor;
    private $interesMora;
    private $apartamento;
    private $estadoCuenta;
    
    public function __construct($id="", $fechaExpedicion="", $fechaVencimiento="", $valor="", $interesMora="", $apartamento="", $estadoCuenta=""){
        $this -> id = $id;
        $this -> fechaExpedicion = $fechaExpedicion;
        $this -> fechaVencimiento = $fechaVencimiento;
        $this -> valor = $valor;
        $this -> interesMora = $interesMora;
        $this -> apartamento = $apartamento;
        $this -> estadoCuenta = $estadoCuenta;
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
    
    public function consultar ($rol="", $id=""){
        $conexion = new Conexion();
        $cuentaCobroDAO = new CuentaCobroDAO ();
        $conexion -> abrir();
        $conexion -> ejecutar($cuentaCobroDAO -> consultar($rol, $id));
        $cuentasCobro = array();
        while(($datos = $conexion -> registro()) != null){
            $apartamento = new Apartamento($datos[5], $datos[6], $datos[7]);
            $estadoCuenta = new EstadoCuentaCobro($datos[8], $datos[9]);
            $cuentaCobro = new CuentaCobro($datos[0], $datos[1], $datos[2], $datos[3], $datos[4], $apartamento, $estadoCuenta);
            array_push($cuentasCobro, $cuentaCobro);
        }
        $conexion -> cerrar();
        return $cuentasCobro;
    }
    
    
    
}


?>