<?php

class CuentaCobroDAO{
    
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
    public function consultar($rol, $id){
        $sentencia = "SELECT
                    cc.idCuentaCobro,
                    cc.FechaExpedicion,
                    cc.FechaVencimiento,
                    cc.Valor,
                    cc.InteresMora,
                    a.idApartamento,
                    a.Numero,
                    a.NombreTorre,
                    ec.idEstadoCuentaCobros,
                    ec.Nombre
                FROM CuentaCobro cc
                INNER JOIN Apartamento a ON cc.Apartamento_idApartamento = a.idApartamento
                INNER JOIN EstadoCuentaCobro ec ON cc.EstadoCuentaCobro_idEstadoCuentaCobros = ec.idEstadoCuentaCobros";
        
        if ($rol == "propietario") {
            $sentencia .= " WHERE a.Propietario_idPropietario = '$id'";
        }
        
        $sentencia .= " ORDER BY cc.FechaExpedicion DESC";
        return $sentencia;
    }
    
}
?>