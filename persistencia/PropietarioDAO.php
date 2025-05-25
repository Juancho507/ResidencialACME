<?php

class PropietarioDAO {
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    
    public function __construct($id = 0, $nombre = "", $apellido = "", $correo = "", $clave = "") {
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> correo = $correo;
        $this -> clave = $clave;
    }
    
    public function autenticar() {
        return "SELECT idPropietario
                FROM Propietario
                WHERE correo = '" . $this -> correo . "' AND clave = '" . md5($this -> clave) . "'";
    }
    
    public function consultar() {
        return "SELECT nombre, apellido, correo
                FROM Propietario
                WHERE idPropietario = " . $this->id;
    }
    public function consultarTodos() {
        return "SELECT idPropietario, Nombre, Apellido, Correo FROM Propietario";
    }
}
