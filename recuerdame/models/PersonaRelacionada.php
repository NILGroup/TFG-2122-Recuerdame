<?php

class PersonaRelacionada {

    private $idPersonaRelacionada;
    private $nombre;
    private $apellidos;
    private $telefono;
    private $ocupacion;
    private $email;
    private $idTipoRelacion;
    private $idPaciente;

    function __construct() {
    }

    public function getIdPersonaRelacionada()
    {
        return $this->idPersonaRelacionada;
    }
    public function setIdPersonaRelacionada($idPersonaRelacionada)
    {
        $this->idPersonaRelacionada = $idPersonaRelacionada;

        return $this;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }
    public function getApellidos()
    {
        return $this->apellidos;
    }
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }
    public function getTelefono()
    {
        return $this->telefono;
    }
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }
    public function getOcupacion()
    {
        return $this->ocupacion;
    }
    public function setOcupacion($ocupacion)
    {
        $this->ocupacion = $ocupacion;

        return $this;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
    public function getIdTipoRelacion()
    {
        return $this->idTipoRelacion;
    }
    public function setIdTipoRelacion($idTipoRelacion)
    {
        $this->idTipoRelacion = $idTipoRelacion;

        return $this;
    }
    public function getIdPaciente()
    {
        return $this->idPaciente;
    }
    public function setIdPaciente($idPaciente)
    {
        $this->idPaciente = $idPaciente;

        return $this;
    }
}

