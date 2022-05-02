<?php

class PacienteCabecera
{

    private $idPaciente;
    private $nombre;
    private $edad;
    private $genero;
    private $codigoGenero;

    function __construct()
    {
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
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }
    public function getGenero()
    {
        return $this->genero;
    }
    public function setGenero($genero)
    {
        $this->genero = $genero;

        return $this;
    }
    public function getEdad()
    {
        return $this->edad;
    }
    public function setEdad($edad)
    {
        $this->edad = $edad;

        return $this;
    }
    public function getCodigoGenero()
    {
        return $this->codigoGenero;
    }
    public function setCodigoGenero($codigoGenero)
    {
        $this->codigoGenero = $codigoGenero;

        return $this;
    }
}
