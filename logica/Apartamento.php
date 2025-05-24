<?php
require_once("persistencia/Conexion.php");
require_once("persistencia/ApartamentoDAO.php");

class Apartamento {
    private $id;
    private $torre;
    private $numero;
    private $propietario;
    
    public function __construct($id = "", $torre = "", $numero = "", $propietario = "") {
        $this->id = $id;
        $this->torre = $torre;
        $this->numero = $numero;
        $this->propietario = $propietario;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function getTorre() {
        return $this->torre;
    }
    
    public function getNumero() {
        return $this->numero;
    }
    
    public function getPropietario() {
        return $this->propietario;
    }
    
    public function consultar($rol = "", $id = "") {
        $conexion = new Conexion();
        $apartamentoDAO = new ApartamentoDAO();
        $conexion->abrir();        
        $conexion->ejecutar($apartamentoDAO->consultar($rol, $id));   
        $apartamentos = array();
        while (($datos = $conexion->registro()) != null) {
            $propietario = new Propietario($datos[3], $datos[4], $datos[5]);
            $apartamento = new Apartamento($datos[0], $datos[1], $datos[2], $propietario);
            array_push($apartamentos, $apartamento);
        }
        
        $conexion->cerrar();
        return $apartamentos;
    }
}
?>

    