<?php
class PagoDAO{
    
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
    
    public function consultarPorCuentaCobro($idCuentaCobro) {
        return "select p.idPago, p.FechaPago, p.ValorPagado
                from pago p
                where p.CuentaCobro_idCuentaCobro = " . $idCuentaCobro;         
    }
    
    public function crearPago() {
        return "INSERT INTO `pago`(`FechaPago`, `ValorPagado`, `CuentaCobro_idCuentaCobro`) 
                VALUES ('$this->fechaPago','$this->valorPagado','$this->cuentaCobro')";
    }
}
?>