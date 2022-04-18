<?php

class Usario{

    private $idUsuario;
    private $nombre;
    private $apellidos;
    private $correo;
    private $contrasenia;

    function __construct(){
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }
    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    public function getNombre() {
        return $this->nombre;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellidos() {
        return $this->apedillos;
    }
    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;

        return $this;
    }

    public function getCorreo() {
        return $this->objetivo;
    }
    public function setCorreo($objetivo) {
        $this->objetivo = $objetivo;

        return $this;
    }

    public function getContrasenia() {
        return $this->descripcion;
    }
    public function setContrasenia($contrasenia) {
        $this->contrasenia = $contrasenia;

        return $this;
    }

}