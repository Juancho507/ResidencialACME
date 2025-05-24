<?php
require_once("persistencia/Conexion.php");
require_once("persistencia/PagoDAO.php");

class Pago{
    
    private $id;
    private $fechaPago;
    private $valorPagado;
    private $cuentaCobro;
    
    public function __construct($id="", $fechaPago="", $valorPagado="", $cuentaCobro=""){
        $this -> id = $id;
        $this -> fechaPago = $fechaPago;
        $this -> valorPagado = $valorPagado;
        $this -> cuentaCobro = $cuentaCobro;
    }
    
    public function getId(){
        return $this -> id;
    }
    
    public function getFechaPago(){
        return $this -> fechaPago;
    }
    
    public function getValorPagado(){
        return $this -> valorPagado;
    }
    
    public function getCuentaCobro(){
        return $this -> cuentaCobro;
    }
    
    public function consultar ($id=""){
        $conexion = new Conexion();
        $pagoDAO = new PagoDAO ();
        $conexion -> abrir();
        $conexion -> ejecutar($pagoDAO -> consultar( $id));
        $pagos = array();
        while(($datos = $conexion -> registro()) != null){
            $cuentaCobro = new CuentaCobro ($datos[3]);
            $pago = new Pago($datos[0], $datos[1], $datos[2], $cuentaCobro);
            array_push($pagos, $pago);
        }
        $conexion -> cerrar();
        return $pagos;
    }
    
    
    
}


?>