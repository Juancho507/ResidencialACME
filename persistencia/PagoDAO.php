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
        return "insert into `pago`(`FechaPago`, `ValorPagado`, `CuentaCobro_idCuentaCobro`) 
                 values ('$this->fechaPago','$this->valorPagado','$this->cuentaCobro')";
    }
    public function consultarPagosConCuentaPorPropietario($idPropietario){

        return "select p.idPago, p.FechaPago, p.ValorPagado, cc.idCuentaCobro, cc.FechaExpedicion, cc.FechaVencimiento, cc.ValorAdministracion, cc.Valor, cc.InteresMora,                             
                cc.Apartamento_idApartamento, cc.EstadoCuentaCobro_idEstadoCuentaCobros, cc.Administrador_idAdministrador, a.idApartamento, a.NombreTorre, a.Numero, a.Propietario_idPropietario,                
                ec.idEstadoCuentaCobros, ec.Nombre AS NombreEstado                   
                from
                    Pago p
                inner join 
                    CuentaCobro cc ON p.CuentaCobro_idCuentaCobro = cc.idCuentaCobro
                inner join
                    Apartamento a ON cc.Apartamento_idApartamento = a.idApartamento
                inner join
                    EstadoCuentaCobro ec ON cc.EstadoCuentaCobro_idEstadoCuentaCobros = ec.idEstadoCuentaCobros
                where
                    a.Propietario_idPropietario = " . $idPropietario . "
                order by
                    p.FechaPago DESC";
    }
}
?>