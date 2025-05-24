<?php
class ApartamentoDAO{
    
    private $id;
    private $torre;
    private $numero;
    private $propietario;
    
    
    public function __construct($id="", $torre="", $numero="", $propietario=""){
        $this -> id = $id;
        $this -> torre = $torre;
        $this -> numero = $numero;
        $this -> propietario = $propietario;
    }
    
    public function consultar($rol, $id){
        $sentencia = "SELECT a.idApartamento, a.NombreTorre, a.Numero, p.idPropietario, p.Nombre, p.Apellido
                  FROM Apartamento a
                  JOIN Propietario p ON a.Propietario_idPropietario = p.idPropietario";
        
        if ($rol == "propietario") {
            $sentencia .= " WHERE p.idPropietario = '" . $id . "'";
        }
        
        return $sentencia;
    }
    
}
    
    ?>