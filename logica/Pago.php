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
    
    public function setCuentaCobro(CuentaCobro $cuentaCobro){
      return $this -> cuentaCobro = $cuentaCobro;
    }
    
    public function consultar($id=""){
        $conexion = new Conexion();
        $pagoDAO = new PagoDAO ();
        $conexion -> abrir();
        $conexion -> ejecutar($pagoDAO -> consultar($id));
        $pagos = array();
        while(($datos = $conexion -> registro()) != null){
            $cuentaCobro = new CuentaCobro ($datos[3]);
            $pago = new Pago($datos[0], $datos[1], $datos[2], $cuentaCobro);
            array_push($pagos, $pago);
        }
        $conexion -> cerrar();
        return $pagos;
    }
    
    public function consultarPorCuentaCobro($idCuentaCobro){
        $conexion = new Conexion();
        $pagoDAO = new PagoDAO ();
        $conexion -> abrir();
        $conexion -> ejecutar($pagoDAO -> consultarPorCuentaCobro($idCuentaCobro));
        $pagos = array();
        while(($datos = $conexion -> registro()) != null){
            $pago = new Pago($datos[0], $datos[1], $datos[2]);
            array_push($pagos, $pago);
        }
        $conexion -> cerrar();
        return $pagos;
    }
    
    public function crearPago(){
        $conexion = new Conexion();
        $pagoDAO = new PagoDAO ("",$this->fechaPago,$this->valorPagado,$this->cuentaCobro);
        $conexion -> abrir();
        $conexion -> ejecutar($pagoDAO -> crearPago());
        $conexion -> cerrar();
    }
    
    public function consultarPagosPorPropietario($idPropietario){
        $conexion = new Conexion();
        $pagoDAO = new PagoDAO(); 
        $conexion->abrir();
        $conexion->ejecutar($pagoDAO->consultarPagosConCuentaPorPropietario($idPropietario)); 
        $pagos = array();
        while($datos = $conexion->registro()){
            $apartamento = new Apartamento($datos[12], $datos[13], $datos[14]); 
            $estadoCuenta = new EstadoCuentaCobro($datos[16], $datos[17]); 
            $cuentaCobro = new CuentaCobro($datos[3], $datos[4], $datos[5], $datos[6], $datos[7], $datos[8], $apartamento, $estadoCuenta );           
            $pago = new Pago($datos[0], $datos[1], $datos[2] );
            $pago->setCuentaCobro($cuentaCobro);
            $pagos[] = $pago;
        }
        $conexion->cerrar();    
        return $pagos;
    }
}
?>