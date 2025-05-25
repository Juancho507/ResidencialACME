<?php
require_once("persistencia/Conexion.php");
require_once("logica/Persona.php");
require_once("persistencia/PropietarioDAO.php");

class Propietario extends Persona {
    
    public function __construct($id = "", $nombre = "", $apellido = "", $correo = "", $clave = ""){
        parent::__construct($id, $nombre, $apellido, $correo, $clave);
    }
    
    public function autenticar(){
        $conexion = new Conexion();
        $propietarioDAO = new PropietarioDAO("","","", $this -> correo, $this -> clave);
        $conexion -> abrir();
        $conexion -> ejecutar($propietarioDAO -> autenticar());
        if($conexion -> filas() == 1){
            $this -> id = $conexion -> registro()[0];
            $conexion->cerrar();
            return true;
        }else{
            $conexion->cerrar();
            return false;
        }
    }
    
    public function consultar(){
        $conexion = new Conexion();
        $propietarioDAO = new PropietarioDAO($this -> id);
        $conexion -> abrir();
        $conexion -> ejecutar($propietarioDAO -> consultar());
        $datos = $conexion -> registro();
        $this -> nombre = $datos[0];
        $this -> apellido = $datos[1];
        $this -> correo = $datos[2];
        $conexion->cerrar();
    }
    public function consultarTodos(){
        $conexion = new Conexion();
        $propietarioDAO = new PropietarioDAO(); 
        $conexion->abrir();
        $conexion->ejecutar($propietarioDAO->consultarTodos()); 
        $propietarios = array();
        while($registro = $conexion->registro()){ 
            $p = new Propietario($registro[0], $registro[1], $registro[2], $registro[3]);
            $propietarios[] = $p;
        }
        $conexion->cerrar();
        return $propietarios;
    }
}