<?php

class CuentaCobroDAO{
    
    private $id;
    private $fechaExpedicion;
    private $fechaVencimiento;
    private $valorAdministracion;
    private $valor;
    private $interesMora;
    private $apartamento;
    private $estadoCuenta;
    private $administrador;
    
    public function __construct($id="", $fechaExpedicion="", $fechaVencimiento="", $valorAdministracion="", $valor="", $interesMora="", $apartamento="", $estadoCuenta="",  $administrador=""){
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
    public function consultar($rol, $id){
        $sentencia = "SELECT
                    cc.idCuentaCobro,
                    cc.FechaExpedicion,
                    cc.FechaVencimiento,
                    cc.ValorAdministracion,
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
    public function consultarCuentasCobroActuales($rol, $id){
        $sentencia = "SELECT
        cc.idCuentaCobro,
        cc.FechaExpedicion,
        cc.FechaVencimiento,
        cc.ValorAdministracion,
        cc.Valor,
        cc.InteresMora,
        a.idApartamento,
        a.Numero,
        a.NombreTorre,
        ec.idEstadoCuentaCobros,
        ec.Nombre
    FROM CuentaCobro cc
    INNER JOIN Apartamento a ON cc.Apartamento_idApartamento = a.idApartamento
    INNER JOIN EstadoCuentaCobro ec ON cc.EstadoCuentaCobro_idEstadoCuentaCobros = ec.idEstadoCuentaCobros
    WHERE '" . date("Y-m-d") ."' BETWEEN cc.FechaExpedicion AND cc.FechaVencimiento";
        
        if ($rol == "propietario") {
            $sentencia .= " WHERE a.Propietario_idPropietario = '$id'";
        }
        
        $sentencia .= " ORDER BY cc.FechaExpedicion DESC";
        return $sentencia;
    }
    
    public function consultarCuentasCobroPorApartamento($idApartamento){
       return "select c.idCuentaCobro, c.FechaExpedicion, c.FechaVencimiento, c.ValorAdministracion, c.Valor, c.InteresMora, c.EstadoCuentaCobro_idEstadoCuentaCobros, e.Nombre
               from cuentacobro c join estadocuentacobro e on c.EstadoCuentaCobro_idEstadoCuentaCobros = e.idEstadoCuentaCobros
               where c.Apartamento_idApartamento = " . $idApartamento;
    }
    
    public function consultarValorAdministracion(){
        return "select c.ValorAdministracion
                from cuentacobro c
                order by c.idCuentaCobro DESC
                limit 1";
    }
    
    public function crearCuentaCobro(){
        return "INSERT INTO `cuentacobro`(`FechaExpedicion`, `FechaVencimiento`, `ValorAdministracion`, `Valor`, `InteresMora`, `Apartamento_idApartamento`, `EstadoCuentaCobro_idEstadoCuentaCobros`, `Administrador_idAdministrador`) 
                VALUES ('" . $this->fechaExpedicion . "',' $this->fechaVencimiento ',' $this->valorAdministracion ','$this->valor','$this->interesMora','$this->apartamento','$this->estadoCuenta','$this->administrador')";
    }
    
    public function consultarPendientes($rol, $id){
        $sentencia = "SELECT
        cc.idCuentaCobro,
        cc.FechaExpedicion,
        cc.FechaVencimiento,
        cc.ValorAdministracion,
        cc.Valor,
        cc.InteresMora,
        a.idApartamento,
        a.Numero,
        a.NombreTorre,
        ec.idEstadoCuentaCobros,
        ec.Nombre
    FROM CuentaCobro cc
    INNER JOIN Apartamento a ON cc.Apartamento_idApartamento = a.idApartamento
    INNER JOIN EstadoCuentaCobro ec ON cc.EstadoCuentaCobro_idEstadoCuentaCobros = ec.idEstadoCuentaCobros
    WHERE ec.idEstadoCuentaCobros != 1 and a.Propietario_idPropietario = '$id'" ;
        $sentencia .= " ORDER BY cc.FechaExpedicion DESC";
        return $sentencia;
    }
    
    public function consultarCuentaCobro(){
        return "SELECT
        cc.idCuentaCobro,
        cc.FechaExpedicion,
        cc.FechaVencimiento,
        cc.ValorAdministracion,
        cc.Valor,
        cc.InteresMora,
        a.idApartamento,
        a.Numero,
        a.NombreTorre,
        ec.idEstadoCuentaCobros,
        ec.Nombre
    FROM CuentaCobro cc
    INNER JOIN Apartamento a ON cc.Apartamento_idApartamento = a.idApartamento
    INNER JOIN EstadoCuentaCobro ec ON cc.EstadoCuentaCobro_idEstadoCuentaCobros = ec.idEstadoCuentaCobros
    WHERE cc.idCuentaCobro = $this->id ";
    }
    
    public function actualizarCuentaCobro() {
        return "UPDATE cuentacobro SET
        Valor = '" . $this->valor . "',
        EstadoCuentaCobro_idEstadoCuentaCobros = '" . $this->estadoCuenta . "'
        WHERE idCuentaCobro = " . $this->id;
    }
    
    
}
?>